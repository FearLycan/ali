<?php

use yii\web\View;
use app\models\User;

/** @var $this View */
/** @var $model User */


$this->title = $model->name . '\'s Profile - ' . Yii::$app->name;

?>

<?= $this->render('_header', [
    'model' => $model,
]) ?>

    <hr class="divider-w">

<?= $this->render('_menu', [
    'model' => $model,
]) ?>