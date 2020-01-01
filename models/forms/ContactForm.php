<?php

namespace app\models\forms;

use Yii;
use yii\db\ActiveRecord;

class ContactForm extends ActiveRecord
{
    public $name;
    public $email;
    public $message;
    public $website;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'name', 'message'], 'required'],
            [['email'], 'email'],
            [['message'], 'string', 'min' => 15, 'max' => 500],
            [['website'], 'string', 'min' => 5, 'max' => 100],
            [['name'], 'string', 'min' => 5, 'max' => 100],
            [['name','message'], 'antiSpam', 'skipOnEmpty' => false, 'skipOnError' => false],
        ];
    }

    public function antiSpam($attribute)
    {
        if (preg_match('/http|www/i', $this->{$attribute})) {
            $this->addError($attribute, 'We do not allow to send url.');
        }
    }

    /**
     * @return bool
     */
    public function send()
    {
        if ($this->validate() && empty($this->website)) {

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