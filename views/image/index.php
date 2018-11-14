<?php

/* @var $this yii\web\View */

use yii\widgets\ListView;

$this->title = Yii::$app->name;
?>
<div class="site-index">

    <?= ListView::widget([
        'layout' => "<div class=\"grid are-images-unloaded\"><div class=\"grid__col-sizer\"></div><div class=\"grid__gutter-sizer\"></div>{items}</div>\n{pager}",
        'dataProvider' => $dataProvider,
        'summary' => false,
        'itemOptions' => ['class' => 'grid__item'],
        'itemView' => '_image',
    ]); ?>

    <div class="page-load-status">
        <div class="loader-ellips infinite-scroll-request">
            <span class="loader-ellips__dot"></span>
            <span class="loader-ellips__dot"></span>
            <span class="loader-ellips__dot"></span>
            <span class="loader-ellips__dot"></span>
        </div>
        <p class="infinite-scroll-last">End of content</p>
        <p class="infinite-scroll-error">No more pages to load</p>
    </div>

</div>
