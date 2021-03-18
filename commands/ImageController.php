<?php

namespace app\commands;

use app\models\Image;
use yii\console\Controller;
use yii\helpers\BaseConsole as Console;

class ImageController extends Controller
{
    public function actionDownload($limit = 100)
    {
        $images = Image::find()
            ->where(['status' => Image::STATUS_PENDING])
            ->limit($limit);

        /* @var $image Image */
        foreach ($images->each(100) as $image) {

            echo $image->id . "\n";

            if ($image->download()) {
                $image->createNormal();
                $image->createThumbnail();
                $image->status = Image::STATUS_ACCEPTED;
                $image->save();

                //if user do not have avatar
                if (empty($image->member->avatar)) {
                    $image->member->avatar = $image->file;
                    $image->member->save();
                }
            }
        }
    }

    public function actionDownloadCron()
    {
        $images = Image::find()
            ->where(['status' => Image::STATUS_PENDING])
            ->limit(100)
            ->all();

        /* @var $image Image */
        foreach ($images as $image) {

            echo $image->id . "\n";

            if ($image->download()) {
                $image->createNormal();
                $image->createThumbnail();
                $image->status = Image::STATUS_ACCEPTED;
                $image->save();

                if (empty($image->member->avatar)) {
                    $image->member->avatar = $image->file;
                    $image->member->save();
                }
            }

            sleep(rand(5, 20));
        }
    }

    public function actionSetActive($limit = 100)
    {
        $images = Image::find()
            ->where(['status' => Image::STATUS_PENDING])
            ->limit($limit)
            ->all();

        foreach ($images as $image) {
            $image->status = Image::STATUS_ACCEPTED;
            $image->save();
        }
    }

    public function actionWatermark()
    {
        $images = Image::find()->where(['status' => Image::STATUS_ACCEPTED]);

        foreach ($images->each(100) as $image) {
            /* @var $image Image */
            $image->addWatermark();
        }
    }

    public function actionFill()
    {
        $images = Image::find()->where(['status' => Image::STATUS_ACCEPTED])->orderBy(['id' => SORT_DESC]);
        $n = $images->count();

        $img = [
            'U56b92728e83e4c70acd4d5bf8e4c36eeg.jpg',
            'Udda2d2538978412fa91d8bff4d17df829.jpg',
            'UTB8_14JPVfFXKJk43Otq6xIPFXaP.jpg',
            'UTB890JrLVfFXKJk43Otq6xIPFXak.jpg',
            'UTB83Z92q_zIXKJkSafVq6yWgXXaB.jpg',
            'UTB8UWdqQyDEXKJk43Oqq6Az3XXay.jpg',
        ];


        /*for ($n = 1; $n <= 1000; $n++) {
            usleep(1000);
            Console::updateProgress($n, 1000);
        }
        Console::endProgress();*/


        $i = 1;
        Console::startProgress(0, $n);
        foreach ($images->each(100) as $image) {
            $image->file = $img[rand(0, 5)];

            $image->save();
            Console::updateProgress($i, $n);
            $i++;
        }

        Console::endProgress();
    }
}
