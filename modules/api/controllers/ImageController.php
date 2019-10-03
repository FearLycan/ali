<?php

namespace app\modules\api\controllers;

use app\models\Member;
use app\modules\admin\models\Image;
use app\modules\api\components\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * Image controller for api.
 *
 * @author Damian Brończyk <damian.bronczyk@gmail.com.pl>
 */
class ImageController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'view' => ['POST'],
                ],
            ],
        ]);
    }

    public function actionView()
    {
        $id = $this->request->post('id');

        $image = $this->findModel($id);

        if (empty($image)) {
            $this->notFound();
        }

    }

    /**
     * Finds the Image model based on its slug value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Image the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $model = Image::findOne($id);

        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}