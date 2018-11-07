<?php

namespace app\commands;

use app\models\Category;
use app\models\Image;
use app\models\Product;
use app\models\ProductCategory;
use app\models\ProductUrl;
use yii\console\Controller;
use yii\httpclient\Client;
use Symfony\Component\DomCrawler\Crawler;

class AliController extends Controller
{

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

                } else {
                    die(var_dump($data));
                }
            }

            $offset = $offset + $limit;

        } while (!empty($urls));

    }

}