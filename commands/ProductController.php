<?php

namespace app\commands;

use app\models\Image;
use app\models\Product;
use yii\console\Controller;

class ProductController extends Controller
{
    public function actionSynchronization($id = null)
    {
        if ($id == null) {
            echo "ID can not be null";
            return;
        }

        $product = Product::findOne($id);

        if (!empty($product)) {
            Image::extractImages($product->id);
        } else {
            echo "No product with ID: " . $id;
            return;
        }
    }

    public function actionDownload($id = null)
    {
        if ($id == null) {
            echo "ID can not be null \n";
            return;
        }

        $images = Image::findAll(['product_id' => $id, 'status' => Image::STATUS_PENDING]);

        if (!empty($images)) {
            /* @var $image Image */
            foreach ($images as $image) {
                if ($image->download()) {
                    $image->createNormal();
                    $image->createThumbnail();
                    $image->status = Image::STATUS_ACCEPTED;
                    $image->save();
                }
            }
        } else {
            echo "No product with ID: " . $id ."\n";
            return;
        }
    }
}