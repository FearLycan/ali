<?php

namespace app\commands;


use app\models\Image;
use app\models\Member;
use yii\console\Controller;

class FunctionController extends Controller
{
    public function actionSmartFixes()
    {
        Member::updateAll(['country_code' => 'UK'], ['=', 'country_code', 'GB']);
        Member::updateAll(['country_code' => 'SRB'], ['=', 'country_code', 'RS']);
        Member::updateAll(['country_code' => 'MNE'], ['=', 'country_code', 'ME']);
    }

    public function actionImage()
    {
        $images = Image::find()->where(['status' => Image::STATUS_ACCEPTED]);

        foreach ($images->each(100) as $image) {
            /* @var $image Image */
            $image->downloaded_at = $image->updated_at;
            $image->save(false);
        }
    }
}