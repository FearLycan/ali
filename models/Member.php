<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%member}}".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $ali_member_id
 * @property string $country_code
 * @property string $avatar
 * @property int $status
 * @property int $type
 * @property int $click
 * @property string $created_at
 * @property string $updated_at
 */
class Member extends ActiveRecord
{
    const MEMBER_ANONYMOUS = 0;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    const TYPE_NORMAL = 1;
    const TYPE_USER = 2;

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
            'sluggable' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'ali_member_id',
                'slugAttribute' => 'slug',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%member}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ali_member_id', 'country_code', 'name'], 'required'],
            [['status', 'type','click'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['ali_member_id', 'name', 'avatar'], 'string', 'max' => 255],
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
            'ali_member_id' => 'Ali Member ID',
            'country_code' => 'Country Code',
            'status' => 'Status',
            'type' => 'Type',
            'click' => 'Click',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function create($crawler)
    {
        $profil_url = $crawler->filterXPath("//span[contains(@class, 'user-name')]//a")->extract(['href'])[0];

        $parts = parse_url($profil_url);
        parse_str($parts['query'], $query);
        $ali_member_id = $query['ownerMemberId'];

        $member = Member::find()->where(['ali_member_id' => $ali_member_id])->one();

        if (empty($member)) {
            $member = new Member();

            $member->name = $crawler->filterXPath("//span[contains(@class, 'user-name')]//a")->text();
            $member->ali_member_id = $ali_member_id;
            $member->country_code = $crawler->filterXPath("//b[contains(@class, 'css_flag')]")->text();
            $member->status = Member::STATUS_ACTIVE;
            $member->type = Member::TYPE_NORMAL;

            $member->save();

        }

        return $member->id;
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
     * @return string[]
     */
    public static function getTypesNames()
    {
        return [
            static::TYPE_NORMAL => 'Normal',
            static::TYPE_USER => 'User',
        ];
    }

    /**
     * @return string
     */
    public function getTypeName()
    {
        return self::getTypesNames()[$this->type];
    }

    public function increasClick()
    {
        $this->click++;
        $this->save(false, ['click']);
    }
}
