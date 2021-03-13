<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $email
 * @property string $password
 * @property string $avatar
 * @property string $description
 * @property integer $role
 * @property integer $status
 * @property string $registered_at
 * @property string $last_login_at
 * @property string $last_seen
 * @property string $auth_key
 * @property string $verification_code
 *
 */
class User extends ActiveRecord implements IdentityInterface
{
    //statusy
    const STATUS_INACTIVE = 0; //użytkownik zarejestrował się ale nie potwierdził danych z forum.
    const STATUS_ACTIVE = 1;   //aktywny użytkownik
    const STATUS_BAN = 3;

    //role
    const ROLE_USER = 1;
    const ROLE_MODERATOR = 2;
    const ROLE_BOT = 3;
    const ROLE_ADMIN = 10;

    const BOT_SPACE_BOB_ID = 2;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role', 'status'], 'integer'],
            [['registered_at', 'last_login_at', 'last_seen'], 'safe'],
            [['name', 'email', 'password', 'auth_key', 'verification_code'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 300],
            [['name', 'email', 'password', 'auth_key', 'verification_code', 'avatar'], 'string', 'max' => 255],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'email' => 'E-mail',
            'password' => 'Password',
            'role' => 'Role',
            'status' => 'Status',
            'registered_at' => 'Registered At',
            'last_login_at' => 'Last Login At',
            'last_seen' => 'Last Seen',
            'auth_key' => 'Auth Key',
            'verification_code' => 'Verification Code',
        ];
    }

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
                    ActiveRecord::EVENT_BEFORE_INSERT => ['registered_at'],
                ],
                'value' => date("Y-m-d H:i:s"),
            ],
            'slug' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
            ],
        ];
    }

    /**
     * @return string[]
     */
    public static function getStatusNames()
    {
        return [
            self::STATUS_ACTIVE => 'Aktywny',
            self::STATUS_INACTIVE => 'Nieaktywny',
            self::STATUS_BAN => 'BAN',
        ];
    }

    /**
     * @return string
     */
    public function getStatusName()
    {
        return User::getStatusNames()[$this->status];
    }

    /**
     * @return string[]
     */
    public static function getRolesNames()
    {
        return [
            self::ROLE_USER => 'User',
            self::ROLE_BOT => 'Bot',
            self::ROLE_MODERATOR => 'Moderator',
            self::ROLE_ADMIN => 'Administrator',
        ];
    }

    /**
     * @return string
     */
    public function getRoleName()
    {
        return self::getRolesNames()[$this->role];
    }

    /**
     * @return array
     */
    public static function getAdministratorRoles()
    {
        return [
            self::ROLE_ADMIN,
        ];
    }

    /**
     * @return int[]
     */
    public static function getModeratorRoles()
    {
        return [
            static::ROLE_MODERATOR,
            static::ROLE_ADMIN,
        ];
    }


    /**
     * @return bool
     */
    public function isAdministrator()
    {
        return in_array($this->role, self::getAdministratorRoles()) && $this->isActive();
    }

    /**
     * @return bool
     */
    public function isUser()
    {
        return $this->role == static::ROLE_USER && $this->isActive();
    }

    /**
     * @return bool
     */
    public function isBot()
    {
        return $this->role == static::ROLE_BOT && $this->isActive();
    }

    /**
     * @return bool
     */
    public function isModerator()
    {
        return in_array($this->role, static::getModeratorRoles()) && $this->isActive();
    }

    /**
     * @return bool
     */
    public function isOnline()
    {
        return ((strtotime($this->last_seen) + 600) > time());
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->status == self::STATUS_ACTIVE;
    }

    /**
     * @return bool
     */
    public function isBanned()
    {
        return $this->status == static::STATUS_BAN;
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return User
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return User
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * @param $password
     * @return bool
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public static function hashPassword($password)
    {
        return Yii::$app->getSecurity()->generatePasswordHash($password);
    }

    public static function generateUniqueRandomString()
    {
        $code = Yii::$app->getSecurity()->generateRandomString(32);

        $verification_code = self::find()
            ->where(['verification_code' => $code])
            ->orWhere(['auth_key' => $code])
            ->one();

        if (empty($verification_code)) {
            return $code;
        } else {
            return self::generateUniqueRandomString();
        }
    }

    /**
     * @return ActiveQuery
     */
    public function getProductUrls()
    {
        return $this->hasMany(ProductUrl::className(), ['author_id' => 'id']);
    }

    /**
     * @return string
     */
    public function getDefaultAvatar()
    {
        if (empty($this->avatar)) {
            return 'https://www.gravatar.com/avatar/' . md5($this->email) . '?s=250&d=identicon&r=PG';
        }

        return Url::to('@web/images/user/avatar/' . $this->avatar);
    }

    public function getBadge()
    {

    }
}
