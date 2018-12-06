<?php

use app\components\Helper;
use app\models\Member;
use app\models\Ticket;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model Member */

$this->title = 'Member ' . $model->name;

if ($model->avatar){
    Yii::$app->params['og_image']['content'] = Url::to(['images/normal/' . $model->avatar], true);
    Yii::$app->params['twitter_image']['content'] = Url::to(['images/normal/' . $model->avatar], true);
}

Yii::$app->params['og_type']['content'] = 'article';

?>

<div class="member-view">
    <div class="row">
        <div class="col-md-4 col-xs-6 col-sm-6">
            <?php if (empty($model->avatar)): ?>
                <?= Html::img(['/images/site/user.png'], ['class' => 'img-responsive img-center img-thumbnail', 'alt' => 'Avatar']) ?>
            <?php else: ?>
                <?= Html::img(['/images/thumbnail/' . $model->avatar], ['class' => 'img-responsive img-center img-thumbnail', 'alt' => 'Avatar']) ?>
            <?php endif; ?>
        </div>
        <div class="col-md-4 col-xs-6 col-sm-6">
            <h2 style="margin-top: 0;">
                <?= Html::encode($model->name) ?>

                <?php if ($model->id != Member::MEMBER_ANONYMOUS): ?>
                    <?= Html::img(['/images/flags/' . strtolower($model->country_code) . '.svg'], ['class' => 'flag', 'alt' => $model->country_code, 'title' => $model->country_code]) ?>
                <?php endif; ?>
            </h2>

            <div class="widget">
                <ul class="list-group font-alt">
                    <li class="list-group-item">
                        <a href="<?= Url::to(['redirect/member', 'slug' => $model->slug]) ?>">
                            Go to <strong><?= Html::encode($model->name) ?></strong> Aliexpress profile
                        </a>
                    </li>
                    <li class="list-group-item">
                        <?= Html::a('Report this member', ['ticket/create',
                            'type' => Ticket::TYPE_MEMBER,
                            'object_id' => $model->slug
                        ], ['class' => 'report-link']) ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12">
            <h3 style="margin-top: 0;"><strong><?= Html::encode($model->name) ?></strong>
                has <?= $dataProvider->getTotalCount() ?> <?= \app\components\Helper::varietyOfWord('pic', $dataProvider->getTotalCount()) ?>
            </h3>
        </div>
        <div class="col-md-12 col-xs-12 col-sm-12">
            <?= $this->render('../common/_image-view', [
                'dataProvider' => $dataProvider,
                'itemView' => '../image/_image',
            ]) ?>
        </div>
    </div>

    <?php if ($long = Helper::systemConfig('long-ad-bottom')): ?>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12">
                <div class="long long-bottom">
                    <?= $long ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
