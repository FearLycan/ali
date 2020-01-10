<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%visitor}}".
 *
 * @property int $id
 * @property string $ip
 * @property integer $count
 * @property string $country
 * @property string $country_code
 * @property string $comment
 * @property string $created_at
 * @property string $updated_at
 */
class Visitor extends ActiveRecord
{

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
            [['count'], 'integer'],
            [['country', 'comment'], 'string', 'max' => 255],
            [['country_code'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip' => 'IP',
            'country' => 'Country',
            'country_code' => 'Country Code',
            'comment' => 'Comment',
            'count' => 'Count',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function addVisit()
    {
        $this->count++;
        $this->save(false);
    }
}
