<?php

namespace app\controllers;

use app\components\Controller;
use app\models\Comment;
use app\models\CommentVote;
use app\models\searches\CommentSearch;
use app\modules\admin\models\Image;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class CommentController extends Controller
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
                    'vote' => ['POST'],
                ],
            ],
        ]);
    }

    public function actionList($image_id)
    {
        $image = $this->findImage($image_id);

        $searchModel = new CommentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $image->id);

        return $this->renderPartial('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'image' => $image,
        ]);
    }

    public function actionVote($comment_id, $type)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        if (Yii::$app->user->isGuest) {
            return ['message' => 'Please log in to add comment.'];
        }

        $comment = $this->findComment($comment_id);

        if (Yii::$app->user->identity->id == $comment->author_id) {
            return ['message' => 'You can\'t vote for your own comment.'];
        }

        if (!in_array($type, CommentVote::getTypes())) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $vote = CommentVote::findOne([
            'comment_id' => $comment_id,
            'user_id' => Yii::$app->user->identity->id,
        ]);

        if ($vote) {
            if ($vote->type == $type) {
                //the same type - remove
                $this->changeVote($vote, $type, -1);
                $vote->delete();
                $type = 'delete';
            } else {
                //different types - change
                //+1 to main value, -1 to other value
                if ($type == CommentVote::TYPE_UP) {
                    $this->changeVote($vote, CommentVote::TYPE_UP, 1);
                    $this->changeVote($vote, CommentVote::TYPE_DOWN, -1);
                }

                if ($type == CommentVote::TYPE_DOWN) {
                    $this->changeVote($vote, CommentVote::TYPE_UP, -1);
                    $this->changeVote($vote, CommentVote::TYPE_DOWN, 1);
                }

                $vote->type = $type;
                $vote->save();
            }
        } else {
            $vote = new CommentVote();
            $vote->type = $type;
            $vote->comment_id = $comment_id;
            $vote->user_id = Yii::$app->user->identity->id;
            $vote->save();
            $this->changeVote($vote, $type, 1);
        }

        $comment->refresh();

        return [
            'status' => 'ok',
            'type' => $type,
            'votes' => [
                'up' => $comment->up_vote,
                'down' => $comment->down_vote,
            ]
        ];
    }

    private function changeVote(CommentVote &$vote, $type, $value)
    {
        if ($type == CommentVote::TYPE_UP) {
            $vote->comment->upVote($value);
            return $vote->comment->up_vote;
        }

        if ($type == CommentVote::TYPE_DOWN) {
            $vote->comment->downVote($value);
            return $vote->comment->down_vote;
        }
    }

    private function findImage($id)
    {
        if (($model = Image::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function findComment($id)
    {
        if (($model = Comment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}