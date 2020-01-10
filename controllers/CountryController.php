<?php

namespace app\controllers;

use app\components\Controller;
use app\models\Country;
use app\models\searches\CountrySearch;
use app\models\searches\ImageSearch;
use Yii;
use yii\web\NotFoundHttpException;

class CountryController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new CountrySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($slug)
    {
        $model = $this->findCountryModel($slug);

        $searchModel = new ImageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, null, null, $model);

        return $this->render('view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'country' => $model,
        ]);
    }


    /**
     * Finds the Country model based on its slug value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $slug
     * @return array|\yii\db\ActiveRecord
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findCountryModel($slug)
    {
        $model = Country::find()
            ->where(['slug' => $slug])
            ->one();

        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}