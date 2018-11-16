<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\bootstrap\Modal;

$this->title = Yii::$app->name;
?>
<div class="site-index">

    <?= ListView::widget([
        'layout' => "<div class=\"grid are-images-unloaded\"><div class=\"grid__col-sizer\"></div><div class=\"grid__gutter-sizer\"></div>{items}</div>\n{pager}",
        'dataProvider' => $dataProvider,
        'summary' => false,
        'itemOptions' => ['class' => 'grid__item'],
        'itemView' => '_image',
    ]); ?>

    <div class="page-load-status">
        <div class="loader-ellips infinite-scroll-request">
            <span class="loader-ellips__dot"></span>
            <span class="loader-ellips__dot"></span>
            <span class="loader-ellips__dot"></span>
            <span class="loader-ellips__dot"></span>
        </div>
        <p class="infinite-scroll-last">End of content</p>
        <p class="infinite-scroll-error">No more pages to load</p>
    </div>

</div>

<?php
Modal::begin([
    'header' => '<h3 class="modal-title"></h3>',
    'id' => 'modal',
    'size' => 'modal-xl',
]);

echo '<div id="modalContent">' .
    Html::img(['/images/site/wait.gif'], ['class' => 'img-center', 'alt' => 'Wait for it'])
    . '</div>';

Modal::end();
?>

<?php $this->beginBlock('script') ?>
<script>


    $(document).on('click', 'button.show-modal', function () {
        $('#modal')
            .modal('show')
            .find('#modalContent')
            .load($(this).attr('data-value'));
        $('.modal-header h3').html(
            '<a href="' + $(this).attr('data-member-url') + '">' + $(this).attr('data-title') + '</a>'
        )
    });

    $('#modal').on('hidden.bs.modal', function (e) {
        var $modalContent = $('#modal').find('#modalContent');
        $modalContent.find('div').html('');
        $modalContent.append('<?= Html::img(['/images//site/wait.gif'], ['class' => 'img-center', 'alt' => 'Wait for it'])?>');
    })


</script>
<?php $this->endBlock(); ?>
