<?php

namespace app\controllers;

use app\components\Controller;
use app\models\forms\ContactForm;
use app\models\forms\ProductUrlForm;
use app\models\ProductUrl;
use app\models\forms\AgeVerifyForm;
use app\widgets\AgeVerify;
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $success = true;
            $model->url = null;
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
}
