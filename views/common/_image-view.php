<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\bootstrap\Modal;
use app\models\searches\ImageSearch;
use app\models\Banner;
use yii\helpers\Url;

?>
<?= ListView::widget([
    'layout' => "<div class=\"grid are-images-unloaded\"><div class=\"grid__col-sizer\"></div><div class=\"grid__gutter-sizer\"></div>{items}</div>\n{pager}",
    'dataProvider' => $dataProvider,
    'summary' => false,
    'itemOptions' => ['class' => 'grid__item'],
    'afterItem' => function ($model, $key, $index, $widget) use ($dataProvider) {
        $n = floor(ImageSearch::DEFAULT_ITEMS_PER_PAGE / Yii::$app->params['banners_per_page']);

        if ($index != 0 && ($index % $n) == 0) {
            /** @var Banner $banner */
            $banner = Yii::$app->banner->getByCountryCode(Yii::$app->visitors->ip->getCountryCode());
            if (!empty($banner)) {
                return '<div class="grid__item"><a href="' . $banner->url . '"><img src="' . Url::to('@web/' . Banner::LOCATION . $banner->image) . '"></a></div>';
            }
        }

        $totalCount = $dataProvider->getTotalCount();

        if (($index + 1) == $totalCount && ($totalCount < 10 && $totalCount >= 3)) {
            /** @var Banner $banner */
            $banner = Yii::$app->banner->getByCountryCode(Yii::$app->visitors->ip->getCountryCode());
            if (!empty($banner)) {
                return '<div class="grid__item"><a href="' . $banner->url . '"><img src="' . Url::to('@web/' . Banner::LOCATION . $banner->image) . '"></a></div>';
            }
        }

        return null;
    },
    'itemView' => $itemView,
    'pager' => [
        'maxButtonCount' => 0,
        'class' => \app\components\LinkPager::className(),
        'prevOptions' => ['rel' => 'prev'],
        'nextOptions' => ['rel' => 'next']
    ],
]); ?>

<div class="page-load-status">
    <div class="loader-ellips infinite-scroll-request">
        <span class="loader-ellips__dot"></span>
        <span class="loader-ellips__dot"></span>
        <span class="loader-ellips__dot"></span>
        <span class="loader-ellips__dot"></span>
    </div>
    <p class="infinite-scroll-last font-alt">End of content</p>
    <p class="infinite-scroll-error font-alt">No more pages to load</p>
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
    var oldURL;
    var newURL;

    $(document).on('click', 'button.show-modal', function () {
        $('#modal')
            .modal('show')
            .find('#modalContent')
            .load($(this).attr('data-value'), function (result) {
                $('.lazy').Lazy({
                    scrollDirection: 'vertical',
                    effect: 'fadeIn',
                    effectTime: 1000,
                    enableThrottle: true,
                    throttle: 250
                });
            });
        $('.modal-header h3').html(
            '<a href="' + $(this).attr('data-member-url') + '">' + $(this).attr('data-title') + '</a>'
        );

        oldURL = $(location).attr("href");
        newURL = window.location.origin + $(this).attr('data-value');

        window.history.pushState("object or string", "Title", newURL);

        $('#w1-collapse').addClass('w1-collapse-margin');
        $('.navbar-brand').addClass('navbar-brand-margin');

    });

    $('#modal').on('hidden.bs.modal', function (e) {
        var $modalContent = $('#modal').find('#modalContent');
        $modalContent.find('div').html('');
        $modalContent.append('<?= Html::img(['/images//site/wait.gif'], ['class' => 'img-center', 'alt' => 'Wait for it'])?>');
        window.history.pushState("object or string", "Title", oldURL);
        $('#w1-collapse').removeClass('w1-collapse-margin');
        $('.navbar-brand').removeClass('navbar-brand-margin');
    });

</script>
<?php $this->endBlock(); ?>
