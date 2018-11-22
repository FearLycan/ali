<?php

$this->title = 'Login' . ' - ' . Yii::$app->name;

?>

<div class="login-form">
    <?= $this->render('_login-form', [
        'model' => $model,
    ]) ?>
</div>