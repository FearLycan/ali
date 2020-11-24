<?php

use yii\helpers\Html;

?>

<h2>New message from <?= Yii::$app->name ?></h2>
<p>From: <?= Html::encode($email) ?></p>
<p>Name: <?= Html::encode($name) ?></p>
<p>Message: <?= Html::encode($message) ?></p>
