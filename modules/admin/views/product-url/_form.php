<?php

use app\modules\admin\models\ProductUrl;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductUrl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-url-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-10">
        <?= $form->field($model, 'url', ['errorOptions' => ['class' => 'help-block', 'encode' => false]])->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-2">
        <?= $form->field($model, 'status')
            ->dropDownList(ProductUrl::getStatusNames()); ?>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
