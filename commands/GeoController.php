<?php

namespace app\commands;

use app\models\Visitor;
use Yii;
use yii\console\Controller;
use yii\db\Expression;
use yii\helpers\VarDumper;
use yii\httpclient\Client;
use yii\httpclient\Exception;

class GeoController extends Controller
{
    /**
     * @param int $limit
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function actionSetIpLocations($limit = 10)
    {
        if (isset(Yii::$app->params['ipinfodb_keyApi'])) {
            $apiKey = Yii::$app->params['ipinfodb_keyApi'];
        } else {
            echo "No API KEY.\n";
            return;
        }

        $client = new Client();

        $link = 'http://api.ipinfodb.com/v3/ip-country';

        $visitors = Visitor::find()
            ->where(['is', 'country', new Expression('null')])
            ->limit($limit)
            ->all();

        foreach ($visitors as $visitor) {
            $request = $client->createRequest()
                ->setMethod('get')
                ->setOptions([
                    'timeout' => 60, // set timeout to 5 seconds for the case server is not responding
                ])
                ->setData([
                    'key' => $apiKey,
                    'ip' => $visitor->ip,
                ])->setUrl($link);

            $response = $request->send();

            if ($response->isOk) {
                $data = explode(';', $response->content);
                if ($data[0] == 'OK') {
                    $visitor->country = $data['4'];
                    $visitor->country_code = $data['3'];
                    $visitor->save();
                } else {
                    throw new Exception(
                        "Request to $request->url failed with response: \n"
                        . VarDumper::dumpAsString($response->data)
                    );
                }
            }

            //api restriction rate limit of 2 queries per second
            sleep(1);
        }

        Visitor::updateAll(['country_code' => 'UK'], ['=', 'country_code', 'GB']);
    }
}