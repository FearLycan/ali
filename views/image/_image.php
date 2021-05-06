<?php

/* @var $model Image */

/* @var $index int */

use app\components\Helper;
use app\models\Image;
use yii\helpers\Url;

$style = '';
?>

<img
        data-value="<?= Url::to(['image/view', 'slug' => $model->slug]) ?>"
        data-title="<?= $model->member->name ?>"
        data-member-url="<?= Url::to(['member/view', 'slug' => $model->member->slug]) ?>"
        class="show-modal button-clear"
        src="<?= $model->getNormalSizeImage() ?>" <?= $style ?> alt="<?= $model->product->name ?>"/>

<div class="likeIt">
    <i id="like<?= $model->id ?>"
       class="fa fa-heart fa-2x like <?= !Yii::$app->user->isGuest && Yii::$app->user->identity->likeThis($model->id) ? 'liked' : '' ?>"
       data-toggle="tooltip" data-placement="bottom"
       data-real-value="1000" data-model="<?= $model->id ?>"
       data-url="<?= Url::to(['/like/toggle', 'id' => $model->id]) ?>"
       title="<?= Helper::shortNumber($model->likes) ?>"></i>
</div>
