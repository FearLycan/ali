<?php

namespace app\controllers;

use app\components\Controller;
use app\models\Category;
use app\models\Image;
use app\models\searches\ImageSearch;
use Yii;
use yii\web\NotFoundHttpException;

class ImageController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex($category = null)
    {
        $cat = null;
        if ($category != null) {
            $cat = Category::find()->where(['slug' => $category])->one();
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
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('view', [
                'model' => $this->findSlugModel($slug),
            ]);
        }

        return $this->render('view', [
            'model' => $this->findSlugModel($slug),
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
}