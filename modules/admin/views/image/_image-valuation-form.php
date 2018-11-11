<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="image-form">

    <?php $form = ActiveForm::begin(['id' => 'image-form']); ?>

    <?= $form->field($model, 'images', [
        'template' => '<div class="class"> {label}{input} </div>',
    ])
        ->checkboxList($model->imageList(), [
            'encode' => false,
            'itemOptions' => [
                'labelOptions' => [
                    'class' => 'col-md-2',
                ],
            ],
        ]) ?>

    <?= $form->field($model, 'unchecked')->hiddenInput(['id' => 'unchecked'])->label(false); ?>

    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
