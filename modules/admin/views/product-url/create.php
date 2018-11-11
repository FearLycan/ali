<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductUrl */

$this->title = 'Create Product Url';
$this->params['breadcrumbs'][] = ['label' => 'Product Urls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-url-create">
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
