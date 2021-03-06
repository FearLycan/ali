<?php

use app\modules\admin\models\Member;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\searches\MemberSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['placeholder' => 'Name od Slug'])->label(false) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'country_code')->textInput(['placeholder' => 'Country Code'])->label(false) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'status')
                ->dropDownList(Member::getStatusNames(),[
                    'prompt' => 'Status', [
                        'disabled' => true,
                    ]
                ])->label(false); ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'type')
                ->dropDownList(Member::getTypesNames(),[
                    'prompt' => 'Type', [
                        'disabled' => true,
                    ]
                ])->label(false); ?>
        </div>

        <input type="submit" style="position: absolute; left: -9999px"/>

    </div>
    <?php ActiveForm::end(); ?>

</div>

<?php $this->beginBlock('script') ?>
<script>
    $(document).on('change', '#membersearch-status, #membersearch-type', function () {
        $(this).closest('form').submit();
    })
</script>
<?php $this->endBlock(); ?>
