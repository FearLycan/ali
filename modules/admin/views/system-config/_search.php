<?php

use app\modules\admin\models\SystemConfig;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\searches\SystemConfigSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="system-config-search">
    <div class="row">

        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
            'options' => [
                'data-pjax' => 1
            ],
        ]); ?>


        <div class="col-md-4 col-md-offset-3">
            <?= $form->field($model, 'name')->label(false)->textInput(['placeholder' => 'Name']) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'author')->label(false)->textInput(['placeholder' => 'Author']) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'status')
                ->label(false)
                ->dropDownList(SystemConfig::getStatusNames(), ['prompt' => 'Status']); ?>
        </div>
        <input type="submit" style="position: absolute; left: -9999px"/>
        <?php ActiveForm::end(); ?>

    </div>
</div>

<?php $this->beginBlock('script') ?>
<script>
    $(document).on('change', '#systemconfigsearch-status', function () {
        $(this).closest('form').submit();
    })
</script>
<?php $this->endBlock(); ?>
