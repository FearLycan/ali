<?php

use app\models\Comment;
use app\models\CommentVote;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\timeago\TimeAgo;

/* @var $model Comment */

?>


<div class="media-left">
    <a href="#">
        <img class="media-object"
             src="https://www.gravatar.com/avatar/<?= md5($model->author->email) ?>?s=150&d=identicon&r=PG"
             alt="<?= $model->author->name ?>">
    </a>
</div>
<div class="media-body">
    <h4 class="media-heading"> <?= Html::encode($model->author->name) ?>
        <small class="text-muted">
            <?= TimeAgo::widget(['timestamp' => $model->created_at]); ?>
        </small>
    </h4>
    <?= Html::encode($model->content) ?>
    <div class="row">
        <div class="col-xs-12" data-model="<?= $model->id ?>">

            <a href="<?= Url::to(['comment/vote', 'type' => CommentVote::TYPE_UP, 'comment_id' => $model->id]) ?>"
               class="vote up-vote-a <?= !Yii::$app->user->isGuest && Yii::$app->user->identity->voteThis($model->id, CommentVote::TYPE_UP) ? 'active' : '' ?>"
               id="voteUp<?= $model->id ?>">
                <i class="fa fa-chevron-up up-vote" aria-hidden="true"></i><span><?= $model->up_vote ?></span>
            </a>

            <div class="post-votes__separator"></div>

            <a href="<?= Url::to(['comment/vote', 'type' => CommentVote::TYPE_DOWN, 'comment_id' => $model->id]) ?>"
               class="vote down-vote-a <?= !Yii::$app->user->isGuest && Yii::$app->user->identity->voteThis($model->id, CommentVote::TYPE_DOWN) ? 'active' : '' ?>"
               id="voteDown<?= $model->id ?>">
                <i class="fa fa-chevron-up down-vote" aria-hidden="true"></i><span><?= $model->down_vote ?></span>
            </a>

            <!--            <div class="post-votes__separator"></div>-->

            <!--            <a href="#">-->
            <!--                <i class="fa fa-reply" aria-hidden="true"></i> Reply-->
            <!--            </a>-->

        </div>
    </div>
</div>
