<?php

namespace app\models;

use Symfony\Component\DomCrawler\Crawler;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\VarDumper;
use yii\httpclient\Client;
use yii\httpclient\Exception;

/**
 * This is the model class for table "{{%image}}".
 *
 * @property int $id
 * @property string $url
 * @property int $product_id
 * @property int $member_id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Member $member
 * @property Product $product
 */
class Image extends ActiveRecord
{
    const STATUS_NEW = 1;
    const STATUS_PENDING = 2;
    const STATUS_ACCEPTED = 3;
    const STATUS_TO_DELETE = 4;


    /**
     * @param bool $insert
     * @return array
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => date("Y-m-d H:i:s"),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%image}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'member_id', 'status'], 'required'],
            [['product_id', 'member_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['url'], 'string', 'max' => 255],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['member_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'product_id' => 'Product ID',
            'member_id' => 'Member ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(Member::className(), ['id' => 'member_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    public static function extractImages($product_id)
    {
        /* @var $product Product */
        $product = Product::find()
            ->where(['id' => $product_id])
            ->one();

        if (empty($product)) {
            return false;
        } else {
            if ($product->synchronized_at == null) {
                //new product - download all photos
                $date = null;
            } else {
                //old product - download only new photos younger than last update
                $date = date('Y-m-d H:i:s');
            }

            $client = new Client();

            $link = 'https://feedback.aliexpress.com/display/productEvaluation.htm';

            $n = 1;
            $page = 1;

            while ($page <= $n) {

                $request = $client->createRequest()
                    ->setMethod('get')
                    ->setData([
                        'productId' => $product->ali_product_id,
                        'ownerMemberId' => $product->ali_owner_member_id,
                        'page' => $page,
                        'withPictures' => 'true'
                    ])->setUrl($link);

                $response = $request->send();

                if ($response->isOk) {
                    $crawler = new Crawler($response->content);

                    if ($n == 1) {
                        $pagination = $crawler
                            ->filterXpath("//div[@id='simple-pager']//label")->text();

                        $n = explode("/", $pagination);
                        $n = $n[1];
                    }

                    echo "n: " . $n . "\n";

                    $results = $crawler
                        ->filterXpath("//div[contains(@class, 'feedback-item')]");

                    foreach ($results as $result) {

                        $itemCrawler = new Crawler($result);

                        $time = $itemCrawler->filterXpath("//dd[contains(@class, 'r-time')]");

                        $creation_date = strtotime($time->text());
                        $creation_date = date('Y-m-d H:i:s', $creation_date);

                        if ($creation_date > $date) {
                            $member = $itemCrawler->filterXpath("//span[contains(@class, 'user-name')]");

                            if ($member->text() == 'AliExpress Shopper') {
                                $member_id = Member::MEMBER_ANONYMOUS;
                            } else {
                                // cerate member
                                $member_id = Member::create($itemCrawler);
                            }

                            $images = $itemCrawler->filterXpath("//li[contains(@class, 'pic-view-item')]//img")
                                ->extract(['src']);

                            foreach ($images as $url) {
                                $image = new Image();
                                $image->url = $url;
                                $image->member_id = $member_id;
                                $image->product_id = $product_id;
                                $image->status = Image::STATUS_NEW;
                                $image->save();

                                unset($image);
                            }
                        }
                    }

                } else {
                    throw new Exception(
                        "Request to $request->url failed with response: \n"
                        . VarDumper::dumpAsString($response->data)
                    );
                }

                unset($request);
                unset($results);
                unset($response);
                unset($images);

                $page++;
            }

            $product->synchronized_at = date('Y-m-d H:i:s');
            $product->save();
        }
    }

    /**
     * @return string[]
     */
    public static function getStatusNames()
    {
        return [
            self::STATUS_NEW => 'New',
            self::STATUS_PENDING => 'Pending to download',
            self::STATUS_ACCEPTED => 'Accepted',
            self::STATUS_TO_DELETE => 'To delete',
        ];
    }

    /**
     * @return string
     */
    public function getStatusName()
    {
        return self::getStatusNames()[$this->status];
    }
}