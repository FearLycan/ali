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
            <?= $form->field($model, 'id')->textInput(['placeholder' => 'ID'])->label(false) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'name')->textInput(['placeholder' => 'Name'])->label(false) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'parent_id')->textInput(['placeholder' => 'Parent ID'])->label(false) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'main_category')->textInput(['placeholder' => 'Main Category'])->label(false) ?>
        </div>

        <di4 class="col-md-2">
            <?= $form->field($model, 'created_at')->textInput(['placeholder' => 'Created At'])->label(false) ?>
        </di4>

        <input type="submit" style="position: absolute; left: -9999px"/>

        <?php ActiveForm::end(); ?>

    </div>
</div>
