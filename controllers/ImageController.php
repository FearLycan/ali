<?php

namespace app\controllers;

use app\components\Controller;
use app\models\Category;
use app\models\Country;
use app\models\Image;
use app\models\searches\ImageSearch;
use Yii;
use yii\web\NotFoundHttpException;

class ImageController extends Controller
{
    /**
     * Displays homepage.
     *
     * @param null $category
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionIndex($category = null)
    {
        $cat = null;
        if ($category != null) {
            $cat = $this->findCategoryModel($category);
        }

        $searchModel = new ImageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, null, $cat);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'category' => $cat,
        ]);
    }

    public function actionView($slug)
    {
        $ajaxView = false;
        $model = $this->findSlugModel($slug);
        $model->addView();
        if (Yii::$app->request->isAjax) {
            $ajaxView = true;

            return $this->renderAjax('view', [
                'model' => $model,
                'ajaxView' => $ajaxView,
            ]);
        }

        return $this->render('view', [
            'model' => $model,
            'ajaxView' => $ajaxView,
        ]);
    }

    /**
     * Finds the Image model based on its slug value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $slug
     * @return Image the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findSlugModel($slug)
    {
        $model = Image::find()
            ->where(['slug' => $slug])
            ->one();

        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the Category model based on its slug value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $slug
     * @return array|\yii\db\ActiveRecord
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findCategoryModel($slug)
    {
        $model = Category::find()
            ->where(['slug' => $slug])
            ->one();

        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
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
