<?php

use yii\widgets\ListView;

/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<?php if ($dataProvider->count): ?>

    <?= $this->render('_search', ['model' => $searchModel, 'image' => $image]); ?>

    <section>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_comment',
            'summary' => false,
            'itemOptions' => ['class' => 'media'],
        ]); ?>
    </section>

<?php endif; ?>