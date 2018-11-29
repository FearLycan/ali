<?php

namespace app\controllers;

use app\components\Controller;
use app\models\forms\ContactForm;
use app\models\forms\ProductUrlForm;
use app\models\forms\TicketForm;
use app\models\ProductUrl;
use app\models\forms\AgeVerifyForm;
use app\widgets\AgeVerify;
use Yii;
use yii\web\Response;
use yii\filters\VerbFilter;

class TicketController extends Controller
{
    public function actionCreate($type)
    {
        $model = new TicketForm();

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }
}