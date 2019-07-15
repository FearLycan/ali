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
     * @throws Exception
     * @throws InvalidConfigException
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

            /* @var $product ProductUrl */
            foreach ($products as $product) {
                $request = $client->createRequest()
                    ->setMethod('get')
                    ->setUrl($product->url);
                $data = $request->send();

                if ($data->isOk) {
                    $crawler = new Crawler($data->content);

                    //eq 0 -> do kary produktu
                    //eq 46 -> productId
                    //eq 43 -> pierwsza recenzja?

                    $scripts = $crawler->filterXPath("//script");
                    die(var_dump($scripts->eq(12)->text()));

                    foreach ($scripts as $key => $script){
                        die(var_dump($script->textContent));
                        if (strpos($script->textContent, 'runParams') !== false) {
                            echo $key . "\n";
                        }
                    }

                    die();

                    //die(var_dump($crawler->filterXPath("//script[contains(@text, 'window.runParams')]")->extract(['_text'])));
                    ///html/body/script[16]
                    $breadcrumb = $crawler
                        ->filterXpath("//div[contains(@class, 'ui-breadcrumb')]");

                    $breadcrumb = $breadcrumb->filterXPath("//a");

                    $category_id = Category::create($breadcrumb);

                    if ($category_id) {
                        $product_id = Product::create($crawler, $product->url, $category_id);

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

    public function actionSynchronization()
    {
        $today = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") - 31, date("Y")));

        $products = Product::find()
            ->where(['status' => Product::STATUS_ACTIVE])
            ->andWhere(['<=', 'synchronized_at', $today])
            ->limit($this->limit)
            ->all();

        foreach ($products as $product) {
            Image::extractImages($product->id);
        }
    }

}