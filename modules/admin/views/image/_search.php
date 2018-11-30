<?php

use app\modules\admin\models\Image;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\searches\ImageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="image-search">
    <div class="row">

        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
            'options' => [
                'data-pjax' => 1
            ],
        ]); ?>

        <div class="col-md-2">
            <?= $form->field($model, 'id')->textInput(['placeholder' => 'ID'])->label(false) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'url')->textInput(['placeholder' => 'URL'])->label(false) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'product_id')->textInput(['placeholder' => 'Product ID'])->label(false) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'member_id')->textInput(['placeholder' => 'Member ID'])->label(false) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'status')
                ->dropDownList(Image::getStatusNames(),[
                    'prompt' => 'Status', [
                        'disabled' => true,
                    ]
                ])->label(false); ?>
        </div>

        <input type="submit" style="position: absolute; left: -9999px"/>

        <?php ActiveForm::end(); ?>

    </div>
</div>

<?php $this->beginBlock('script') ?>
<script>
    $(document).on('change', '#imagesearch-status', function () {
        $(this).closest('form').submit();
    })
</script>
<?php $this->endBlock(); ?>
