<?php

/* @var $model \app\models\Image */

use yii\helpers\Url;

?>



<button
        data-value="<?= Url::to(['image/view', 'slug' => $model->slug]) ?>"
        type="button"
        data-title="<?= $model->member->name ?>"
        data-member-url="<?= Url::to(['member/view', 'id' => $model->member->ali_member_id]) ?>"
        class="show-modal button-clear"
>
    <img src="<?= $model->getNormalSizeImage() ?>"/>
</button>


