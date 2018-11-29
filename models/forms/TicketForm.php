<?php

namespace app\models\forms;


use app\models\Ticket;

class TicketForm extends Ticket
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reason', 'description'], 'required'],
        ];
    }
}