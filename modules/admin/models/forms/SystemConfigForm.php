<?php

namespace app\modules\admin\models\forms;


use app\modules\admin\models\SystemConfig;

class SystemConfigForm extends SystemConfig
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'value', 'status'], 'required'],
            [['name', 'value'], 'string'],
            [['status'], 'integer'],
        ];
    }
}