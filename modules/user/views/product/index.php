<?php

use app\models\Product;
use app\modules\admin\components\Helper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel \app\modules\user\models\Product */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products added by ' . Yii::$app->user->identity->name . ' - ' . Yii::$app->name;

?>
<?= $this->render('../profile/_header', [
    'model' => Yii::$app->user->identity,
]) ?>

<hr class="divider-w">

<?= $this->render('../profile/_menu', [
    //'model' => Yii::$app->user,
]) ?>

<style>
    ul.pagination {
        display: block;
    }
</style>

<section class="module-small" style="padding-top: 0;">
    <div class="row">
        <div class="col-xs-12">
            <h2 class="font-alt">Your added products</h2>
        </div>

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_item',
            'summary' => false,
            'itemOptions' => ['class' => 'col-xs-12 col-sm-12 col-md-12 col-lg-12'],
        ]); ?>

    </div>
</section>

<?php $this->beginBlock('script') ?>
<script>
    $('ul.pagination').addClass('col-xs-12 col-sm-12 col-md-12 col-lg-12 font-alt');

    $(document).on('pjax:success', function () {
        $('ul.pagination').addClass('col-xs-12 col-sm-12 col-md-12 col-lg-12 font-alt');
    });
</script>
<?php $this->endBlock(); ?>
