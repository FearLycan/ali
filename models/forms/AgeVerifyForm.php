<?php

namespace app\models\forms;

use DateTime;
use yii\db\ActiveRecord;

class AgeVerifyForm extends ActiveRecord
{
    public $day;
    public $month;
    public $year;

    public $age = 18;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['day', 'month', 'year'], 'required'],
            [
                'day', 'integer',
                'integerOnly' => true,
                'min' => 1,
                'max' => 31,
            ],
            [
                'month', 'integer',
                'integerOnly' => true,
                'min' => 1,
                'max' => 12,
            ],
            [
                'year', 'integer',
                'integerOnly' => true,
                'min' => 1920,
                'max' => date('Y'),
            ],
            ['year', 'checkDateValidator', 'skipOnEmpty' => false, 'skipOnError' => false],
        ];
    }

    public function checkDateValidator($attribute, $params)
    {
        if (!checkdate($this->month, $this->day, $this->year)) {
            $this->addError($attribute, 'Data is invalid.');
        } else {
            $born = new DateTime($this->year . '-' . $this->month . '-' . $this->day);
            $today = new DateTime;
            $result = $today->diff($born);

            if ($result->format('%y') < $this->age) {
                $this->addError($attribute, 'Sorry, but you are under ' . $this->age);
            }
        }
    }
}