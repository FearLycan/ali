<?php

/* @var $model Image */
/* @var $index int */

use app\components\Helper;
use app\models\Image;
use yii\helpers\Url;
$style = '';
?>
<button
        data-value="<?= Url::to(['image/view', 'slug' => $model->slug]) ?>"
        type="button"
        data-title="<?= $model->member->name ?>"
        data-member-url="<?= Url::to(['member/view', 'slug' => $model->member->slug]) ?>"
        class="show-modal button-clear"
>
    <img src="<?= $model->getNormalSizeImage() ?>" <?= $style ?> alt="Image <?= $model->id ?>"/>
</button>
