<?php

namespace app\commands;

use app\models\Category;
use app\models\Image;
use app\models\Product;
use app\models\ProductCategory;
use app\models\ProductUrl;
use Exception;
use yii\console\Controller;
use yii\helpers\VarDumper;
use yii\httpclient\Client;
use Symfony\Component\DomCrawler\Crawler;

class AliController extends Controller
{

    /**
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\httpclient\Exception
     */
    public function actionProduct()
    {
        $limit = 10;
        $offset = 0;

        $client = new Client();

        do {

            $products = ProductUrl::find()
                ->where(['status' => ProductUrl::STATUS_NEW])
                ->offset($offset)
                ->all();

            foreach ($products as $product) {
                $request = $client->createRequest()
                    ->setMethod('get')
                    ->setUrl($product->url);
                $data = $request->send();

                if ($data->isOk) {
                    $crawler = new Crawler($data->content);

                    $breadcrumb = $crawler
                        ->filterXpath("//div[contains(@class, 'ui-breadcrumb')]");

                    $breadcrumb = $breadcrumb->filterXPath("//a");

                    $category_id = Category::create($breadcrumb);

                    if ($category_id) {
                        $product_id = Product::create($crawler, $product->url);

                        if ($product_id) {
                            ProductCategory::connect($product_id, $category_id);
                        }

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


            }

            $offset = $offset + $limit;


        } while (!empty($urls));


    }

}