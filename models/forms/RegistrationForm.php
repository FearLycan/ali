<?php

namespace app\models\forms;

use app\models\User;
use Yii;


class RegistrationForm extends User
{
    public $password_first;
    public $password_second;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'email'], 'unique'],
            [['name', 'email', 'password_first', 'password_second'], 'required'],
            ['email', 'email'],
            [['password_first', 'password_second'], 'string', 'length' => [8, 40]],
            [['name'], 'string', 'length' => [4, 16]],
            [['email'], 'string', 'length' => [4, 40]],
            ['password_second', 'confirmPassword'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'email' => 'E-mail',
            'password_first' => 'Password',
            'password_second' => 'Confirm password',
        ];
    }


    public function confirmPassword($attribute)
    {
        if ($this->password_first != $this->password_second) {
            $this->addError($attribute, 'The Password and Confirm Password that you enter must be identical.');
        }
    }


    public function sendEmail()
    {
        Yii::$app->mailer
            ->compose("registration-confirm", [
                'user' => $this,
            ])
            ->setFrom([Yii::$app->params['admin-email'] => Yii::$app->name])
            ->setTo([$this->email => $this->name])
            ->setSubject('Your account has been created')
            ->send();
    }
}
