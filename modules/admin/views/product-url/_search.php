<?php

use app\modules\admin\models\ProductUrl;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\searches\ProductUrlSearch */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="product-url-search">

        <div class="row">
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'id' => 'product-url-search',
                'method' => 'get',
                'options' => [
                    'data-pjax' => 1
                ],
            ]); ?>

            <div class="col-md-2 col-lg-offset-4">
                <?= $form->field($model, 'status')
                    ->label(false)
                    ->dropDownList(ProductUrl::getStatusNames(), ['prompt' => 'Status']); ?>
            </div>

            <div class="col-md-2">
                <?= $form->field($model, 'id')->label(false)->textInput(['placeholder' => 'ID']) ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'url')->label(false)->textInput(['placeholder' => 'URL Name']) ?>
            </div>
            <input type="submit" style="position: absolute; left: -9999px"/>
            <?php ActiveForm::end(); ?>
        </div>

    </div>

<?php $this->beginBlock('script') ?>
    <script>
        $(document).on('change', '#producturlsearch-status', function () {
            $(this).closest('form').submit();
        })
    </script>
<?php $this->endBlock(); ?>