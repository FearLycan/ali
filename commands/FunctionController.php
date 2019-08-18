<?php

namespace app\commands;


use app\models\Member;
use yii\console\Controller;

class FunctionController extends Controller
{
    public function actionSmartFixes()
    {
        Member::updateAll(['country_code' => 'UK'], ['=', 'country_code', 'GB']);
        Member::updateAll(['country_code' => 'RS'], ['=', 'country_code', 'SRB']);
    }
}