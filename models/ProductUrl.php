<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%product_url}}".
 *
 * @property int $id
 * @property string $url
 * @property string $short_url
 * @property int $status
 * @property string $created_at
 */
class ProductUrl extends \yii\db\ActiveRecord
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
            [['url'], 'required'],
            [['status'], 'integer'],
            [['created_at'], 'safe'],
            [['url','short_url'], 'string', 'max' => 255],
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
            'short_url' => 'Short Url',
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
}
