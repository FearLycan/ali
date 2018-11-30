<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\searches\CategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-search">
    <div class="row">

        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
            'options' => [
                'data-pjax' => 1
            ],
        ]); ?>

        <div class="col-md-2">
            <?= $form->field($model, 'id') ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'name') ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'parent_id') ?>
        </div>

        <di4 class="col-md-4">
            <?= $form->field($model, 'created_at') ?>
        </di4>

        <input type="submit" style="position: absolute; left: -9999px"/>

        <?php ActiveForm::end(); ?>

    </div>
</div>
