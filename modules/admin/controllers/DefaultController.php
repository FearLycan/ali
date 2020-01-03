<?php

namespace app\modules\admin\controllers;

use app\models\Product;
use app\modules\admin\components\Controller;
use app\modules\admin\models\Image;
use app\modules\admin\models\Member;
use app\modules\admin\models\ProductUrl;
use app\modules\admin\models\Visitor;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $links = ProductUrl::find()->where(['status' => ProductUrl::STATUS_NEW])->count();
        $visitors = Visitor::find()->count();
        $images_new = Image::find()->where(['status' => Image::STATUS_NEW])->count();
        $images_pending = Image::find()->where(['status' => Image::STATUS_PENDING])->count();
        $images = Image::find()->where(['status' => Image::STATUS_ACCEPTED])->count();
        $members = Member::find()->where(['status' => Member::STATUS_ACTIVE])->count();
        $products = Product::find()->where(['status' => Product::STATUS_ACTIVE])->count();

        return $this->render('index', [
            'links' => $links,
            'visitors' => $visitors,
            'images_new' => $images_new,
            'images' => $images,
            'images_pending' => $images_pending,
            'members' => $members,
            'products' => $products,
        ]);
    }
}
