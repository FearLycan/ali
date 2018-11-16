<?php

namespace app\modules\admin\models\forms;


use app\modules\admin\models\Member;

class MemberForm extends Member
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ali_member_id', 'country_code', 'name'], 'required'],
            [['status', 'type'], 'integer'],
            [['ali_member_id', 'name', 'avatar'], 'string', 'max' => 255],
            [['avatar'], 'string', 'max' => 255, 'on' => self::SCENARIO_UPDATE],
            [['country_code'], 'string', 'max' => 10],
        ];
    }
}