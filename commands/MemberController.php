<?php

namespace app\commands;

use app\models\Image;
use app\models\Member;
use yii\console\Controller;
use yii\db\Expression;

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
            ->where(['status' => Image::STATUS_NEW])->one();

        if (empty($images)) {

            if ($this->all) {
                $members = Member::find();
            } else {
                $members = Member::find()
                    ->where(['>=', 'created_at', date("Y-m-j H:i:s", strtotime('-7 days'))]);
            }

            foreach ($members->each(100) as $member) {
                if (!$member->images) {
                    $member->delete();
                } else {
                    if (empty($member->avatar)) {
                        $img = $member->images;

                        $n = array_rand($img, 1);

                        $member->avatar = $img[$n]->file;
                        $member->save();

                        unset($img);
                    }
                }
            }

            unset($members);
        } else {
            echo "First of all, please rate all photos";
        }
    }
}