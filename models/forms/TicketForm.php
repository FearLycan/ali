<?php

namespace app\models\forms;


use app\models\Ticket;

class TicketForm extends Ticket
{
    //public $reason;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reason', 'description'], 'required'],
            [['description'], 'string', 'min' => 15],
            [['reason'], 'in', 'range' => self::getTicketReasons()],
        ];
    }
}