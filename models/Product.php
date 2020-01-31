<?php

namespace app\models;

use app\components\Helper;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property int $id
 * @property string $name
 * @property string $ali_owner_member_id
 * @property string $ali_product_id
 * @property string $image
 * @property string $brand
 * @property string $description
 * @property string $stars
 * @property int $status
 * @property int $price
 * @property int $review_count
 * @property int $rating_value
 * @property int $category_id
 * @property int $type
 * @property int $click
 * @property int $url_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $synchronized_at
 *
 * @property Category $category
 * @property ProductUrl $url
 */
class Product extends ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_PENDING = 2;

    const TYPE_PRODUCT = 1;

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => date("Y-m-d H:i:s"),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'url', 'ali_owner_member_id', 'ali_product_id', 'image', 'category_id'], 'required'],
            [['status', 'type', 'category_id', 'click', 'review_count'], 'integer'],
            [['created_at', 'updated_at', 'synchronized_at', 'rating_value', 'price'], 'safe'],
            [['name', 'url', 'ali_owner_member_id', 'ali_product_id', 'brand'], 'string', 'max' => 255],
            [['image', 'description', 'stars'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'url' => 'Url',
            'ali_owner_member_id' => 'Ali Owner Member ID',
            'ali_product_id' => 'Ali Product ID',
            'image' => 'Image',
            'status' => 'Status',
            'type' => 'Type',
            'click' => 'Click',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getURL()
    {
        return $this->hasOne(ProductUrl::className(), ['id' => 'url_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['product_id' => 'id']);
    }

    public static function create($crawler, $category_id)
    {
        $content = $crawler->filter('script:contains("window.runParams")')->text();

        $ali_product_id = Helper::getBetween($content, '"productId":', ',');

        $product = Product::find()->where(['ali_product_id' => $ali_product_id])->one();

        if (empty($product)) {
            $product = new Product();
            $product->type = self::TYPE_PRODUCT;
            $product->status = self::STATUS_ACTIVE;
            $product->category_id = $category_id;
        }

        $product->name = Helper::getBetween($content, '"subject":"', '",');
        $product->ali_owner_member_id = Helper::getBetween($content, '"sellerAdminSeq":', ',');
        $product->ali_product_id = Helper::getBetween($content, '"productId":', ',');
        $product->image = '[' . Helper::getBetween($content, '"imagePathList":[', '],') . ']';

        $brand = Helper::getBetween($content, '"attrName":"Brand Name","attrNameId":2,"attrValue":"', '",');
        $price = Helper::getBetween($content, '"actSkuMultiCurrencyCalPrice":"', '",');
        $description = Helper::getBetween($content, '"description":"', '",');
        $rating_value = Helper::getBetween($content, '"averageStar":"', '",');

        $product->brand = $brand;
        $product->price = $price;
        $product->description = $description;
        $product->rating_value = $rating_value;
        $product->url = 'https://www.aliexpress.com/item/' . $ali_product_id . '.html';

        $fiveStarNum = Helper::getBetween($content, '"fiveStarNum":', ',');
        $fourStarNum = Helper::getBetween($content, '"fourStarNum":', ',');
        $threeStarNum = Helper::getBetween($content, '"threeStarNum":', ',');
        $twoStarNum = Helper::getBetween($content, '"twoStarNum":', ',');
        $oneStarNum = Helper::getBetween($content, '"oneStarNum":', ',');

        $review_count = $oneStarNum + $twoStarNum + $threeStarNum + $fourStarNum + $fiveStarNum;
        $product->review_count = $review_count;

        $stars = [
            'one' => $oneStarNum,
            'two' => $twoStarNum,
            'three' => $threeStarNum,
            'four' => $fourStarNum,
            'five' => $fiveStarNum,
        ];

        $product->stars = json_encode($stars);

        $product->save();

        return $product->id;
    }

    /**
     * @return string[]
     */
    public static function getStatusNames()
    {
        return [
            static::STATUS_ACTIVE => 'Active',
            static::STATUS_PENDING => 'Pending',
        ];
    }

    /**
     * @return string
     */
    public function getStatusName()
    {
        return self::getStatusNames()[$this->status];
    }

    /**
     * @return string[]
     */
    public static function getTypesNames()
    {
        return [
            static::TYPE_PRODUCT => 'Product',
        ];
    }

    /**
     * @return string
     */
    public function getTypeName()
    {
        return self::getTypesNames()[$this->type];
    }

    public function increaseClick()
    {
        $this->click++;
        $this->save(false, ['click']);
    }

    public function getSimilar($limit = 4)
    {
        $products = self::find()
            ->where([
                'category_id' => $this->category_id,
                'status' => Product::STATUS_ACTIVE
            ])
            ->andWhere(['!=', 'id', $this->id])
            ->orderBy(new Expression('rand()'))
            ->limit($limit)
            ->all();

        return $products;
    }

    /**
     * @return mixed
     */
    public function getProductsImages()
    {
        return json_decode($this->image);
    }
}
