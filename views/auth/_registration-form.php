<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\form\ActiveForm;

/* @var $model \app\models\forms\RegistrationForm */

?>
<div class="col-sm-6 col-sm-offset-3">
    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => true,
        'options' => ['class' => 'form-default'],
    ]) ?>

    <h2 class="text-center font-alt">Registration</h2>

    <div class="row" style="margin-bottom: 10px;">
        <div class="col-md-6">
            <?= $form->field($model, 'name', [
                'addon' => ['prepend' => ['content' => '<i class="fa fa-user" aria-hidden="true"></i>']]
            ])->textInput(['placeholder' => 'Nazwa'])->label(false); ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'email', [
                'addon' => ['prepend' => ['content' => '<i class="fa fa-envelope" aria-hidden="true"></i>']]
            ])->textInput(['placeholder' => 'Adres e-mail'])->label(false); ?>
        </div>
    </div>

    <div class="row" style="margin-bottom: 10px;">
        <div class="col-md-6">
            <?= $form->field($model, 'password_first', [
                'addon' => ['prepend' => ['content' => '<i class="fa fa-lock"></i></span>']],
            ])->passwordInput(['placeholder' => 'Password'])->label(false); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'password_second', [
                'addon' => ['prepend' => ['content' => '<i class="fa fa-repeat"></i></span>']],
            ])->passwordInput(['placeholder' => 'Powtórz hasło'])->label(false); ?>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-block btn-round btn-d">REGISTER</button>
    </div>

    <?php ActiveForm::end() ?>

    <p class="text-center text-muted small">Do you have an account? <a href="<?= Url::to(['auth/login']) ?>">Login
            here!</a></p>

</div>