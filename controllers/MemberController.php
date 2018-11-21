<?php

namespace app\controllers;

use app\components\Controller;
use app\models\Image;
use app\models\Member;
use app\models\searches\ImageSearch;
use Yii;
use yii\web\NotFoundHttpException;

class MemberController extends Controller
{
    public function actionView($slug)
    {
        $model = $this->findModel($slug);

        $searchModel = new ImageSearch();
        $query = Image::find()
            ->where(['member_id' => $model->id, 'status' => Image::STATUS_ACCEPTED]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $query);

        return $this->render('view', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the Image model based on its slug value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $slug
     * @return Member the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($slug)
    {
        $model = Member::find()
            ->where(['slug' => $slug, 'status' => Member::STATUS_ACTIVE])
            ->one();

        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}