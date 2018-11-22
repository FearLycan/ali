<?php

use app\models\Member;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model Member */

$this->title = 'Member ' . $model->name;

?>

<div class="member-view">
    <div class="row">
        <div class="col-md-4">
            <?php if (empty($model->avatar)): ?>
                <?= Html::img(['/images/site/user.png'], ['class' => 'img-responsive img-center img-thumbnail', 'alt' => 'Avatar']) ?>
            <?php else: ?>
                <?= Html::img(['/images/normal/' . $model->avatar], ['class' => 'img-responsive img-center img-thumbnail', 'alt' => 'Avatar']) ?>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <h2 style="margin-top: 0;">
                <?= Html::encode($model->name) ?>

                <?php if ($model->id != Member::MEMBER_ANONYMOUS): ?>
                    <?= Html::img(['/images/flags/' . strtolower($model->country_code) . '.svg'], ['class' => 'flag', 'alt' => $model->country_code, 'title' => $model->country_code]) ?>
                <?php endif; ?>
            </h2>

            <div class="widget">
                <ul class="list-group font-alt">
                    <li class="list-group-item">
                        <a href="#">Go to <strong><?= Html::encode($model->name) ?></strong> Ali profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3 style="margin-top: 0;"><strong><?= Html::encode($model->name) ?></strong>
                have <?= $dataProvider->getTotalCount() ?> <?= \app\components\Helper::varietyOfWord('photo', $dataProvider->getTotalCount()) ?>
            </h3>
        </div>
        <div class="col-md-12">
            <?= $this->render('../common/_image-view', [
                'dataProvider' => $dataProvider,
                'itemView' => '../image/_image',
            ]) ?>
        </div>
    </div>
</div>
