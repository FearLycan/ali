<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

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
 * @property int $type
 * @property string $created_at
 * @property string $updated_at
 * @property string $synchronized_at
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
            [['name', 'url', 'ali_owner_member_id', 'ali_product_id', 'image'], 'required'],
            [['status', 'type'], 'integer'],
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function create($crawler, $url)
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
        $product->status = self::STATUS_PENDING;

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
}
