<?php

namespace app\controllers;

use app\components\AuthorizationController;
use app\models\Image;
use app\models\NotSexy;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\Response;


class NotSexyController extends AuthorizationController
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
                    'set' => ['POST'],
                ],
            ],
        ]);
    }

    public function actionSet($id)
    {
        $image = $this->findImage($id);

        $notSexy = $this->findNotSexy(Yii::$app->user->identity->id, $image->id);

        if (!$notSexy) {
            $notSexy = new NotSexy();
            $notSexy->user_id = Yii::$app->user->identity->id;
            $notSexy->image_id = $image->id;
            $notSexy->save(false);

            $image->increaseNotSexy();
        }

        Yii::$app->response->format = Response::FORMAT_JSON;
        return ['status' => 'ok'];
    }

    /**
     * @param $image_id
     * @return Image
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findImage($image_id)
    {
        if (($model = Image::findOne($image_id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested image does not exist.');
    }

    /**
     * @param $user_id
     * @param $image_id
     * @return NotSexy
     */
    protected function findNotSexy($user_id, $image_id)
    {
        return NotSexy::findOne(['user_id' => $user_id, 'image_id' => $image_id]);
    }
}
