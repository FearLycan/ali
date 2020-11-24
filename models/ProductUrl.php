<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "{{%product_url}}".
 *
 * @property int $id
 * @property string $url
 * @property int $status
 * @property int $author_id
 * @property string $created_at
 *
 * @property Product $product
 * @property User $author
 */
class ProductUrl extends ActiveRecord
{
    const STATUS_NEW = 1;
    const STATUS_TO_DELETE = 2;
    const STATUS_ERROR = 3;
    const STATUS_DONE = 4;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product_url}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url', 'author_id'], 'required'],
            [['status', 'author_id'], 'integer'],
            [['created_at'], 'safe'],
            [['url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return string[]
     */
    public static function getStatusNames()
    {
        return [
            self::STATUS_NEW => 'New',
            self::STATUS_TO_DELETE => 'To delete',
            self::STATUS_ERROR => 'Error',
            self::STATUS_DONE => 'Done',
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
     * @return ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['url_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }
}
