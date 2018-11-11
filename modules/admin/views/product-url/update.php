<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductUrl */

$this->title = 'Update Product Url: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Product Urls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-url-update">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-link" aria-hidden="true"></i> URL</h3>
                </div>
                <div class="panel-body">
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
