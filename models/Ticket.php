<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%ticket}}".
 *
 * @property int $id
 * @property int $reason
 * @property int $status
 * @property int $type
 * @property int $model_id
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 */
class Ticket extends \yii\db\ActiveRecord
{
    const TYPE_USER = 1;
    const TYPE_IMAGE = 2;
    const TYPE_OTHER = 3;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    const STATUS_DONE = 2;

    const REASON_FAKE = 1;
    const REASON_ERROR = 2;
    const REASON_OTHER = 3;
    const REASON_DUPLICATE = 4;
    const REASON_UNSUITABLE = 5;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ticket}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reason', 'type', 'model_id', 'description'], 'required'],
            [['reason', 'status', 'type', 'model_id'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reason' => 'Reason',
            'status' => 'Status',
            'type' => 'Type',
            'model_id' => 'Model ID',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return string[]
     */
    public static function getStatusNames()
    {
        return [
            static::STATUS_ACTIVE => 'Active',
            static::STATUS_INACTIVE => 'Inactive',
            static::STATUS_DONE => 'Done',
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
    public static function getTypeNames()
    {
        return [
            static::TYPE_USER => 'User',
            static::TYPE_IMAGE => 'Image',
            static::TYPE_OTHER => 'Other',
        ];
    }

    /**
     * @return string
     */
    public function getTypeName()
    {
        return self::getTypeNames()[$this->type];
    }

    /**
     * @return string[]
     */
    public static function getReasonNames()
    {
        return [
            self::REASON_FAKE => 'This is not real',
            self::REASON_ERROR => 'Got error here',
            self::REASON_DUPLICATE => 'Duplicate',
            self::REASON_UNSUITABLE => 'It does not fit here',
            self::REASON_OTHER => 'Other',
        ];
    }

    /**
     * @return string
     */
    public function getReasonName()
    {
        return self::getReasonNames()[$this->reason];
    }
}
