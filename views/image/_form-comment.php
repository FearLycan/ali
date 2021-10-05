<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\forms\CommentForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model CommentForm */
/* @var $form yii\widgets\ActiveForm */
?>
<?php Pjax::begin([
    //'scrollTo' => true,
    'id' => 'pjaxComment',
]); ?>
<div class="comment-form" style="margin: 10px 0 0;">

    <?php $form = ActiveForm::begin(['options' => ['data' => ['pjax' => true]]]); ?>

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
</div>
<?php Pjax::end(); ?>

<?php $this->beginBlock('script') ?>
<script>
    $("#commentform-content").click(function () {
        $(this).attr('rows', 4);
    });

    $(document).on('pjax:success', function () {
        //$.pjax.reload({container: '#pjaxComments'});
    });
</script>
<?php $this->endBlock(); ?>
