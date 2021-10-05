<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\forms\CommentForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model CommentForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banner-form">
    <?php Pjax::begin([
        'scrollTo' => true,
        'id' => 'pjaxComment'
    ]); ?>
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'content')->textarea([
                'maxlength' => true,
                'placeholder' => 'Tell me what you think about...'
            ])->label('Your comment') ?>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <?= Html::submitButton('Post', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>
</div>


<?php $this->beginBlock('script') ?>
<script>
    $("#commentform-content").click(function () {
        $(this).attr('rows', 4);
    });
</script>
<?php $this->endBlock(); ?>
