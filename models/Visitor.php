<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%visitor}}".
 *
 * @property int $id
 * @property string $ip
 * @property string $country
 * @property string $created_at
 * @property string $updated_at
 */
class Visitor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%visitor}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ip'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['ip'], 'string', 'max' => 15],
            [['country'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip' => 'Ip',
            'country' => 'Country',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
