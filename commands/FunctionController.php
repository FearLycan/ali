<?php

namespace app\commands;


use app\models\Image;
use app\models\Member;
use app\models\Product;
use app\models\ProductUrl;
use app\modules\admin\components\Helper;
use yii\console\Controller;

class FunctionController extends Controller
{
    public function actionSmartFixes()
    {
        Member::updateAll(['country_code' => 'UK'], ['=', 'country_code', 'GB']);
        Member::updateAll(['country_code' => 'SRB'], ['=', 'country_code', 'RS']);
        Member::updateAll(['country_code' => 'ME'], ['=', 'country_code', 'MNE']);
        //UPDATE member SET country_code = ME WHERE country_code = MNE;
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

    public function actionMember()
    {
        $members = Member::find()->where(['status' => Member::STATUS_ACTIVE]);

        foreach ($members->each(100) as $member) {
            $member->view = $member->click;
            $member->save(false);
        }
    }

    public function actionSetProductUrl()
    {
        $products = Product::find();

        foreach ($products->each(100) as $product) {
            /** @var ProductUrl $url */
            $url = ProductUrl::find()->where(['like', 'url', $product->ali_product_id])->one();

            if (!empty($url)) {
                /** @var Product $product */
                $product->url_id = $url->id;
                $product->save();
            }
        }
    }

    public function actionProducts()
    {
        $ursl = ProductUrl::find()->where(['status' => ProductUrl::STATUS_DONE]);

        foreach ($ursl->each(10) as $url) {
            $link = Helper::getBetween($url->url, 'item/', '.html');

            $n = explode('/', $link);

            $phrase = end($n);
            $product = Product::find()->where(['ali_product_id' => $phrase])->one();

            if (!$product) {
                $url->status = ProductUrl::STATUS_NEW;
                $url->save(false);
            }
        }
    }
}