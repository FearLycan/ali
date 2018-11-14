<?php

$this->title = 'Valuation images';

$this->params['breadcrumbs'][] = ['label' => 'Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerCss(".green-border{border-color: green;}");

?>

<div class="row">

    <div class="col-md-12">

        <?php if (!empty($imageList = $model->imageList())): ?>

            <div class="alert alert-warning" role="alert">
                <strong>Warning!</strong> Select only good images.
            </div>

            <hr>

            <?= $this->render('_image-valuation-form', [
                'model' => $model,
                'imageList' => $imageList,
            ]) ?>

        <?php else: ?>
            <div class="alert alert-success" role="alert">
                <strong>Well done!</strong> There is no more photos do valuate.
            </div>
        <?php endif; ?>
    </div>
</div>

<?php $this->beginBlock('script') ?>
<script>
    $("#valuationimageform-images img").on("click", function (e) {
        if ($(this).hasClass('green-border')) {
            $(this).removeClass('green-border');
        } else {
            $(this).addClass('green-border');
        }
    });

    $('form#image-form').submit(function () {
        var values = [];
        $("input:checkbox:not(:checked)").each(function (index) {
            values.push($(this).val());
        });

        $('input#unchecked').val(values);
    });

</script>
<?php $this->endBlock(); ?>
