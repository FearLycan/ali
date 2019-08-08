<?php

namespace app\commands;

use app\models\Image;
use yii\console\Controller;

class ImageController extends Controller
{
    public function actionDownload()
    {
        do {
            $images = Image::find()
                ->where(['status' => Image::STATUS_PENDING])
                ->limit(100)
                ->all();

            /* @var $image Image */
            foreach ($images as $image) {
                if ($image->download()) {
                    $image->createNormal();
                    $image->createThumbnail();
                    $image->status = Image::STATUS_ACCEPTED;
                    $image->save();
                }
            }

        } while (!empty($images));
    }

    public function actionDownloadCron()
    {
        $images = Image::find()
            ->where(['status' => Image::STATUS_PENDING])
            ->limit(100)
            ->all();

        /* @var $image Image */
        foreach ($images as $image) {
            if ($image->download()) {
                $image->createNormal();
                $image->createThumbnail();
                $image->status = Image::STATUS_ACCEPTED;
                $image->save();
            }
        }
    }
}