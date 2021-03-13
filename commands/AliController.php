<?php

namespace app\commands;

use app\models\Category;
use app\models\Image;
use app\models\Product;
use app\models\ProductUrl;
use Exception;
use yii\base\InvalidConfigException;
use yii\console\Controller;
use yii\helpers\VarDumper;
use yii\httpclient\Client;
use Symfony\Component\DomCrawler\Crawler;

class AliController extends Controller
{

    public $limit;

    public function options($actionID)
    {
        return ['limit'];
    }

    public function optionAliases()
    {
        return ['limit' => 'limit'];
    }

    /**
     * @param int $limit
     * @throws InvalidConfigException
     * @throws \yii\httpclient\Exception
     */
    public function actionProduct($limit = 100)
    {
        $client = new Client();

        $products = ProductUrl::find()
            ->where(['status' => ProductUrl::STATUS_NEW])
            ->limit($limit)
            ->all();

        /* @var $product ProductUrl */
        foreach ($products as $product) {
            $request = $client->createRequest()
                ->setMethod('get')
                ->setUrl($product->url);
            $data = $request->send();

            if ($data->isOk) {
                $crawler = new Crawler($data->content);

                $breadcrumb = $crawler
                    ->filterXpath("//div[contains(@class, 'breadcrumb')]");

                $breadcrumb = $breadcrumb->filterXPath("//a");

                $category_id = Category::create($breadcrumb);

                if ($category_id) {
                    $product_id = Product::create($crawler, $category_id);

                    Image::extractImages($product_id);
                }

                $product->status = ProductUrl::STATUS_DONE;
                $product->save();

            } else {

                $product->status = ProductUrl::STATUS_ERROR;
                $product->save();

                throw new Exception(
                    "Request to $request->url failed with response: \n"
                    . VarDumper::dumpAsString($data->content)
                );
            }

            sleep(rand(5, 20));
        }

    }

    public function actionSynchronization($limit = 100)
    {
        $today = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") - 31, date("Y")));

        $products = Product::find()
            ->where(['status' => Product::STATUS_ACTIVE])
            ->andWhere(['<=', 'synchronized_at', $today])
            ->limit($limit)
            ->all();

        foreach ($products as $product) {
            Image::extractImages($product->id);
        }
    }

    public function actionChangeProductImage()
    {
        $products = Product::find();

        foreach ($products->each(100) as $product) {

            $link = str_replace(['[', ']', '"'], '', $product->image);

            $product->image = '["' . $link . '"]';
            $product->save();
        }
    }

    public function actionChangeProductReviewCount()
    {
        $products = Product::find()->where(['review_count' => 0]);

        /* @var $product Product */
        foreach ($products->each(100) as $product) {

            $product->review_count = 1;
            $product->rating_value = 5;
            $product->save();
        }
    }

}
