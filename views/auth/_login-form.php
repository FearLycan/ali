<?php

use kartik\form\ActiveForm;
use yii\helpers\Url;

/* @var $model \app\models\forms\LoginForm */

?>
<div class="col-sm-4 col-sm-offset-4">
    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-default'],
        'id' => 'loginForm'
    ]) ?>

    <h1 class="text-center font-alt">LOGIN</h1>

    <?= $form->field($model, 'referer')->hiddenInput(['value' => Yii::$app->request->referrer])->label(false) ?>

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
        <?= $form->field($model, 'rememberMe')->checkbox() ?>
    </div>

    <?php ActiveForm::end() ?>

    <p class="text-center text-muted small">Don't have an account?
        <a href="<?= Url::to(['auth/registration']) ?>">Create it here!</a>
    </p>
</div>
