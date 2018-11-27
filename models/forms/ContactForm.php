<?php

namespace app\models\forms;

use Yii;
use yii\db\ActiveRecord;

class ContactForm extends ActiveRecord
{
    public $name;
    public $email;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'name', 'message'], 'required'],
            [['email'], 'email'],
            [['message'], 'string', 'min' => 15],
            [['name'], 'string', 'min' => 5],
        ];
    }

    /**
     * @return bool
     */
    public function send()
    {
        if ($this->validate()) {

            Yii::$app->mailer->compose('contact', [
                'name' => $this->name,
                'email' => $this->email,
                'message' => $this->message,
            ])
                ->setFrom([Yii::$app->params['admin-email'] => Yii::$app->name])
                ->setTo('damian.bronczyk@gmail.com')
                ->setSubject('New message from Contact Page')
                ->send();

            return true;
        }
        return false;
    }
}