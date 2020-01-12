<?php

namespace app\models;

use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "{{%banner}}".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string $url
 * @property string $image
 * @property int $clicks
 * @property int $choices
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property BannerCountry[] $bannerCountries
 * @property Country[] $countries
 */
class Banner extends ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    const LOCATION = '/images/extra/';

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
            'slug' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'slugAttribute' => 'slug',
                'immutable' => 'true',
                'ensureUnique' => 'true',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%banner}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'url', 'image'], 'required'],
            [['clicks', 'choices', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'slug', 'description', 'url', 'image'], 'string', 'max' => 255],
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
            'slug' => 'Slug',
            'description' => 'Description',
            'url' => 'Url',
            'image' => 'Image',
            'clicks' => 'Clicks',
            'choices' => 'Choices',
            'status' => 'Status',
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
            static::STATUS_INACTIVE => 'None',
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
    public function getBannerCountries()
    {
        return $this->hasMany(BannerCountry::className(), ['banner_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getCountries()
    {
        return $this->hasMany(Country::className(), ['id' => 'country_id'])->viaTable('{{%banner_country}}', ['banner_id' => 'id']);
    }
}
