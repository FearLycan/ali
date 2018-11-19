<?php

namespace app\controllers;

use app\components\Controller;
use app\models\Image;
use app\models\Product;
use app\models\searches\ImageSearch;
use Yii;
use yii\web\NotFoundHttpException;


class ProductController extends Controller
{
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $searchModel = new ImageSearch();
        $query = Image::find()
            ->where(['product_id' => $model->id, 'status' => Image::STATUS_ACCEPTED]);
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
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $model = Product::find()
            ->where(['ali_product_id' => $id, 'status' => Product::STATUS_ACTIVE])
            ->one();

        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}