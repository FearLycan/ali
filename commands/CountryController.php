<?php

namespace app\commands;

use app\models\Country;
use yii\console\Controller;

class CountryController extends Controller
{
    public function actionSlug()
    {
        $countries = Country::find()
            ->where(['slug' => null])
            ->all();

        foreach ($countries as $country) {
            $country->save();
        }
    }
}