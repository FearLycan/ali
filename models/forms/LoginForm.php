<?php

namespace app\models\forms;

use app\models\User;
use Yii;

class LoginForm extends User
{
    private $_user = false;
    public $rememberMe = true;
    public $referer = true;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            ['email', 'email'],
            ['rememberMe', 'boolean'],

            [['referer'], 'string', 'max' => 150],
            [['referer'], 'checkRefererLink'],

            [['password'], 'required'],
            ['password', 'validatePasswordData']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => 'E-mail',
            'password' => 'Password',
            'rememberMe' => 'Remember Me',
        ];
    }

    public function checkRefererLink($attribute)
    {
        $this->referer = strtolower($this->referer);

        if (!YII_ENV_DEV) {
            if (strpos($this->referer, 'aligonewild') !== false) {
                //ok
            } else {
                $this->addError($attribute, 'Incorrect referer page.');
            }

            if (substr_count($this->referer, 'http') > 2) {
                $this->addError($attribute, 'Incorrect referer page.');
            }
        }
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     * @return bool|void
     */
    public function validatePasswordData($attribute, $params)
    {
        if (!$this->hasErrors()) {
            /* @var $user User */
            $user = $this->getUser();

            if ($user && $user->status == User::STATUS_INACTIVE) {
                $this->addError($attribute, 'The account has not been activated.');
            }

            if (!$user || !Yii::$app->getSecurity()->validatePassword($this->password, $user->password)) {
                $this->addError($attribute, 'Incorrect e-mail address or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            $duration = $this->rememberMe ? (30 * 24 * 3600) : 0;
            return Yii::$app->user->login($this->getUser(), $duration);
        }
        return false;
    }

    /**
     * Finds user by [[email]]
     *
     * @return array|bool|\yii\db\ActiveRecord
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::find()->where(['email' => $this->email])->one();
        }

        return $this->_user;
    }
}
