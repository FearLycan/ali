<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */

/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;

$this->registerCss(".wrap{padding: 0;}");
?>


<section class="home-section home-parallax home-fade home-full-height bg-dark bg-dark-30" id="home"
         data-background="<?= Url::to('@web/images/site/404/'.rand(1,30).'.jpg') ?>">
    <div class="titan-caption">
        <div class="caption-content">
            <div class="font-alt mb-30 titan-title-size-4"><?= $this->title ?></div>
            <div class="font-alt"><?= nl2br(Html::encode($message)) ?><br/>That is all we know.
            </div>
            <div class="font-alt mt-30">
                <a class="btn btn-border-w btn-round" href="<?= Yii::$app->homeUrl ?>">
                    Back to home page
                </a>
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

