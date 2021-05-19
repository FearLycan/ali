<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */

/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Maintenance Mode' . ' - ' . Yii::$app->name;

$this->registerCss(".wrap{padding: 0;}");
?>


<section class="home-section home-parallax home-fade home-full-height bg-dark bg-dark-30" id="home"
         data-background="<?= Url::to('@web/images/site/404/' . rand(1, 35) . '.jpg') ?>">
    <div class="titan-caption">
        <div class="caption-content">
            <div class="font-alt mb-30 titan-title-size-4">Maintenance Mode</div>
            <div class="font-alt">
                We are changing for you <i class="fa fa-heart" style="color: red" aria-hidden="true"></i>
            </div>

        </div>
    </div>
</section>

<?php $this->beginBlock('script') ?>
<script>
    $('.navbar-custom').remove();
    $('.footer').remove();
    $('body > div.wrap > div.container').removeClass('container');
</script>
<?php $this->endBlock(); ?>

