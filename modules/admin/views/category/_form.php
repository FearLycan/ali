<?php

use app\modules\admin\models\Category;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <div class="row">
        <?php $form = ActiveForm::begin(); ?>

        <div class="col-md-9">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'parent_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Category::find()->all(), 'id', 'name'),
                'language' => 'en',
                'options' => ['placeholder' => 'Select category parent ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('Parent category'); ?>
        </div>


        <div class="col-md-12">
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
