<?php

$this->title = 'Login';

?>

<div class="login-form">
    <?= $this->render('_login-form', [
        'model' => $model,
    ]) ?>
</div>