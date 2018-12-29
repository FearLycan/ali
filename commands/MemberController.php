<?php

namespace app\commands;

use app\models\Image;
use app\models\Member;
use yii\console\Controller;

class MemberController extends Controller
{
    public $all = false;

    public function options($actionID)
    {
        return ['all'];
    }

    public function optionAliases()
    {
        return ['all' => 'all'];
    }

    public function actionIndex()
    {
        echo $this->all . "\n";
    }

    public function actionRemoveEmpty()
    {
        $images = Image::find()
            ->where(['status' => Image::STATUS_NEW])
            ->all();

        if (empty($images)) {

            if ($this->all) {
                $members = Member::find()->all();
            } else {
                $members = Member::find()
                    ->where([['>=', 'created_at', date("Y-m-j H:i:s", strtotime('-7 days'))]])
                    ->all();
            }

            foreach ($members as $member) {
                if (!$member->images) {
                    $member->delete();
                }
            }

        } else {
            echo "First of all, please rate all photos";
        }
    }
}