<?php

use app\models\Product;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\searches\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="product-search">

        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
            'options' => [
                'data-pjax' => 1
            ],
        ]); ?>

        <div class="col-md-4 col-lg-offset-6">
            <?= $form->field($model, 'name')->label(false)->textInput(['placeholder' => 'Name']) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'status')
                ->dropDownList(Product::getStatusNames(),[
                    'prompt' => 'Status', [
                        'disabled' => true,
                    ]
                ])->label(false); ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>

<?php $this->beginBlock('script') ?>
<script>
    $(document).on('change', '#productsearch-status', function () {
        $(this).closest('form').submit();
    })
</script>
<?php $this->endBlock(); ?>
