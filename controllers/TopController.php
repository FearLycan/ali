<?php

namespace app\controllers;

use app\components\Controller;
use app\models\searches\TopImageSearch;
use Yii;

class TopController extends Controller
{
    /**
     * Displays homepage.
     *
     * @param $top
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionIndex($top)
    {
        if (!in_array($top, array_keys(TopImageSearch::getTopsNames()))) {
            $this->notFound();
        }

        $searchModel = new TopImageSearch();
        $dataProvider = $searchModel->searchTop(Yii::$app->request->queryParams, $top);

        return $this->render('/image/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'top' => $top
        ]);
    }
}
