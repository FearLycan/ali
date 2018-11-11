<?php

$this->title = 'Valuation images';

$this->registerCss(".green-border{border-color: green;}");

?>

<div class="row">

    <div class="col-md-12">
        <div class="alert alert-warning" role="alert">
            <strong>Warning!</strong> Select only good images.
        </div>
    </div>

    <div class="col-md-12">
        <?= $this->render('_image-valuation-form', [
            'model' => $model,
        ]) ?>
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
