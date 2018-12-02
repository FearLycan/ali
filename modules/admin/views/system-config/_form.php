<?php

use app\modules\admin\models\SystemConfig;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\SystemConfig */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="system-config-form">

    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-4">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'status')
                ->dropDownList(SystemConfig::getStatusNames()); ?>
        </div>

        <div class="col-md-12">
            <?= $form->field($model, 'value')->textarea(['rows' => 6]) ?>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
