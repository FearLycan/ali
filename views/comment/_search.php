<?php

use app\models\searches\ProductSearch;
use yii\widgets\ActiveForm;

/* @var $model ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'action' => ['/comment/list', 'image_id' => $image->id],
    'method' => 'get',
    'id' => 'commentSearch',
    'options' => [
        'data-pjax' => 1,
        'class' => 'row'
    ],
]); ?>

<div class="col-sm-2 mb-sm-20 col-sm-offset-10">
    <?= $form->field($model, 'sort')
        ->dropDownList([
            '-created_at' => 'Latest',
            'created_at' => 'Eldest',
            'best' => 'Best',
            '-best' => 'Worst',
        ])->label(false); ?>
</div>

<!--<div class="col-sm-2">-->
<!--    <button class="btn btn-block btn-round btn-g" type="submit">Apply</button>-->
<!--</div>-->

<?php ActiveForm::end(); ?>
