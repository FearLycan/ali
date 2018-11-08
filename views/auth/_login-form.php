<?php

use yii\helpers\Url;
use kartik\form\ActiveForm;

/* @var $model \app\models\forms\LoginForm */

?>
<div class="col-sm-4 col-sm-offset-4">
    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-default'],
    ]) ?>

    <h2 class="text-center font-alt">LOGIN</h2>

    <?= $form->field($model, 'email', [
        'addon' => ['prepend' => ['content' => '<i class="fa fa-user" aria-hidden="true"></i>']]
    ])->textInput(['placeholder' => 'E-mail address'])->label(false); ?>

    <?= $form->field($model, 'password', [
        'addon' => ['prepend' => ['content' => '<i class="fa fa-lock"></i></span>']],
    ])->passwordInput(['placeholder' => 'Password'])->label(false); ?>

    <div class="form-group">
        <button type="submit" class="btn btn-block btn-round btn-d">LOGIN</button>
    </div>
    <div class="clearfix">
        <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
        <a href="#" class="pull-right">Forgot Password?</a>
    </div>

    <?php ActiveForm::end() ?>

    <p class="text-center text-muted small">Don't have an account? <a href="<?= Url::to(['auth/registration']) ?>">Create
            it here!</a></p>
</div>