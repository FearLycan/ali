<?php

/* @var $this yii\web\View */

use yii\widgets\ListView;

$this->title = Yii::$app->name;
?>
<div class="site-index">

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'itemOptions' => ['class' => 'grid-item'],
        'itemView' => '_image',
        'options' => [
            'tag' => 'div',
            'class' => 'grid',
        ],
        'pager' => false,
    ]); ?>

</div>
