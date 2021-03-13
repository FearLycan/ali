<?php

namespace app\modules\user\controllers;

use app\components\Controller;
use app\modules\user\models\searches\UrlSearch;
use Yii;

class UrlController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new UrlSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}