<?php

namespace app\controllers;

use app\components\Controller;
use app\models\forms\ProductUrlForm;
use app\models\ProductUrl;
use app\models\searches\ImageSearch;
use Yii;
use yii\web\Response;
use yii\filters\VerbFilter;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'new-url' => ['post'],
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ImageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }


    public function actionNewUrl()
    {
        $model = new ProductUrlForm();
        $model->status = ProductUrl::STATUS_NEW;
        $success = false;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $success = true;
            $model->url = null;
        }

        return $this->render('..\..\widgets\views\addNewURLForm', [
            'model' => $model,
            'success' => $success
        ]);
    }
}
