<?php

namespace app\controllers;

use app\components\Controller;
use app\components\Helper;
use app\models\Category;
use app\models\Country;
use app\models\forms\ContactForm;
use app\models\forms\ProductUrlForm;
use app\models\Product;
use app\models\ProductUrl;
use app\models\forms\AgeVerifyForm;
use app\widgets\AgeVerify;
use Yii;
use yii\helpers\Url;
use yii\web\Response;
use yii\filters\VerbFilter;

class SiteController extends Controller
{
    // added for test purposes, random csrf error
    public function beforeAction($action)
    {
        if (in_array($action->id, ['age-verify'])) {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'new-url' => ['post'],
                    'age-verify' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionNewUrl()
    {
        $model = new ProductUrlForm();
        $model->status = ProductUrl::STATUS_NEW;
        $success = false;

        if ($model->load(Yii::$app->request->post())) {
            //$model->mobile_url = 'https://m.aliexpress.com/item/item/' . Helper::getAliProductID($model->url) . '.html';
            $model->save();
            $success = true;
            $model->url = null;
            //$model->mobile_url = null;
        }

        return $this->renderAjax('../../widgets/views/addNewURLForm', [
            'model' => $model,
            'success' => $success
        ]);
    }

    public function actionAgeVerify()
    {
        /* @var $model AgeVerifyForm */
        $model = new AgeVerifyForm();
        $view = true;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $cookies = Yii::$app->response->cookies;

            $cookies->add(new \yii\web\Cookie([
                'name' => 'age',
                'value' => AgeVerify::AGE_CONFIRMED,
                'expire' => time() + 86400 * 31,
            ]));

            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->render('../../widgets/views/ageVerify', [
            'model' => $model,
            'view' => $view,
        ]);
    }

    public function actionRules()
    {
        return $this->render('rules');
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $success = false;
        $model = new ContactForm();

        if ($model->load(Yii::$app->request->post()) && $model->send()) {
            $success = true;
            $model = new ContactForm();

        }

        return $this->render('contact', [
            'model' => $model,
            'success' => $success,
        ]);
    }

    public function actionCategories()
    {
        $categories = Category::find()
            ->select(['id', 'name', 'slug'])
            ->orderBy(['name' => SORT_ASC])
            ->asArray()
            ->all();

        return $this->render('categories', [
            'categories' => $categories
        ]);
    }

    public function actionJson($phrase)
    {
        $results = [];

        if (strlen($phrase) >= 3) {

            $countries = Country::find()
                ->where(['like', 'name', $phrase])
                ->orderBy(['name' => SORT_DESC])
                ->limit(5)
                ->all();

            $categories = Category::find()
                ->where(['like', 'name', $phrase])
                ->orderBy(['name' => SORT_DESC])
                ->limit(5)
                ->all();

            $products = Product::find()
                ->where(['like', 'name', $phrase])
                ->andWhere(['status' => Product::STATUS_ACTIVE])
                ->orderBy(['name' => SORT_DESC])
                ->limit(5)
                ->all();


            /* @var $country Country */
            foreach ($countries as $country) {
                $results[] = [
                    'id' => $country->id,
                    'name' => $country->name,
                    'link' => Url::to(['country/view', 'slug' => $country->slug], true),
                    'type' => 'country',
                    'count' => $country->countPics()
                ];
            }

            /* @var $category Category */
            foreach ($categories as $category) {
                $results[] = [
                    'id' => $category->id,
                    'name' => $category->name,
                    'link' => Url::to(['image/index', 'category' => $category->slug], true),
                    'type' => 'category',
                ];
            }

            /* @var $product Product */
            foreach ($products as $product) {
                $results[] = [
                    'id' => $product->id,
                    'name' => Helper::cutThis($product->name),
                    'link' => Url::to(['product/view', 'id' => $product->ali_product_id], true),
                    'type' => 'product',
                ];
            }

        }

        Yii::$app->response->format = Response::FORMAT_JSON;
        return $results;


    }
}
