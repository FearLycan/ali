<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property string $ali_owner_member_id
 * @property string $ali_product_id
 * @property string $image
 * @property int $status
 * @property int $category_id
 * @property int $type
 * @property int $click
 * @property string $created_at
 * @property string $updated_at
 * @property string $synchronized_at
 *
 * @property Category $category
 */
class Product extends ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_PENDING = 2;

    const TYPE_PRODUCT = 1;

    /**
     * @param bool $insert
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
            [['status', 'type', 'category_id', 'click'], 'integer'],
            [['created_at', 'updated_at', 'synchronized_at'], 'safe'],
            [['name', 'url', 'ali_owner_member_id', 'ali_product_id', 'image'], 'string', 'max' => 255],
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
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['product_id' => 'id']);
    }

    public static function create($crawler, $url, $category_id)
    {

        $ali_product_id = $crawler->filterXpath("//input[contains(@name, 'objectId')]")->extract(['value'])[0];

        $product = Product::find()->where(['ali_product_id' => $ali_product_id])->one();

        if (empty($product)) {
            $product = new Product();
        }

        $product->name = $crawler->filterXpath("//h1[contains(@class, 'product-name')]")->text();
        $product->url = $url;
        $product->ali_owner_member_id = $crawler->filterXpath("//a[contains(@class, 'send-mail-btn')]")->extract(['data-id1'])[0];
        $product->ali_product_id = $crawler->filterXpath("//input[contains(@name, 'objectId')]")->extract(['value'])[0];
        $product->image = $crawler->filterXpath("//a[contains(@class, 'ui-image-viewer-thumb-frame')]//img")->extract(['src'])[0];
        $product->type = self::TYPE_PRODUCT;
        $product->status = self::STATUS_ACTIVE;
        $product->category_id = $category_id;

        //$brand = $crawler->filter('li#product-prop-2')->extract(['data-title'])[0];

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
            ->where(['category_id' => $this->category_id])
            ->andWhere(['!=', 'id', $this->id])
            ->orderBy(new Expression('rand()'))
            ->limit($limit)
            ->all();

        return $products;
    }
}
