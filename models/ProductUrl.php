<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%product_url}}".
 *
 * @property int $id
 * @property string $url
 * @property int $status
 * @property string $created_at
 */
class ProductUrl extends \yii\db\ActiveRecord
{
    const STATUS_NEW = 1;
    const STATUS_TO_DELETE = 2;
    const STATUS_ERROR = 3;


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
}
