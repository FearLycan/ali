<?php

namespace app\controllers;

use app\components\AuthorizationController;
use app\components\Helper;
use app\models\Image;
use app\models\Like;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class LikeController extends AuthorizationController
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
                    'toggle' => ['POST'],
                ],
            ],
        ]);
    }

    public function actionToggle($id)
    {
        $image = $this->findImage($id);

        $like = $this->findLike(Yii::$app->user->identity->id, $image->id);

        if ($like) {
            $likes = $like->image->decreaseLikes();
            $like->delete();

            $status = [
                'status' => 'ok',
                'action' => 'delete',
                'image' => [
                    'likes' => $likes,
                    'short_likes' => Helper::shortNumber($likes),
                ],
            ];
        } else {
            $like = new Like();
            $like->user_id = Yii::$app->user->identity->id;
            $like->image_id = $image->id;
            $like->save();

            $likes = $like->image->increaseLikes();

            $status = [
                'status' => 'ok',
                'action' => 'create',
                'image' => [
                    'likes' => $likes,
                    'short_likes' => Helper::shortNumber($likes),
                ],
            ];
        }

        Yii::$app->response->format = Response::FORMAT_JSON;
        return $status;
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
     * @return Like
     */
    protected function findLike($user_id, $image_id)
    {
        return Like::findOne(['user_id' => $user_id, 'image_id' => $image_id]);
    }
}
