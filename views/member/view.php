<?php

use app\components\Helper;
use app\models\Member;
use app\models\Ticket;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model Member */

$this->title = 'Member ' . $model->name;

if ($model->avatar) {
    Yii::$app->params['og_image']['content'] = Url::to(['images/normal/' . $model->avatar], true);
    Yii::$app->params['twitter_image']['content'] = Url::to(['images/normal/' . $model->avatar], true);
}

Yii::$app->params['og_type']['content'] = 'article';

?>

<div class="member-view">
    <div class="row">
        <div class="col-md-4 col-xs-6 col-sm-6">
            <?php if (empty($model->avatar)): ?>
                <?= Html::img(['/images/site/user.png'], ['class' => 'img-responsive img-center img-thumbnail', 'alt' => 'Avatar']) ?>
            <?php else: ?>
                <?= Html::img(['/images/thumbnail/' . $model->avatar], ['class' => 'img-responsive img-center img-thumbnail', 'alt' => 'Avatar']) ?>
            <?php endif; ?>
        </div>
        <div class="col-md-4 col-xs-6 col-sm-6">
            <h1 class="product-title font-alt" style="margin-top: 0;">
                <?= Html::encode($model->name) ?>

                <?php if ($model->id != Member::MEMBER_ANONYMOUS): ?>
                    <a href="<?= Url::to(['country/view', 'slug' => $model->country->slug]) ?>">
                        <?= Html::img(['/images/flags/' . strtolower($model->country_code) . '.svg'], ['class' => 'flag', 'alt' => $model->country->name, 'title' => $model->country->name]) ?>
                    </a>
                <?php endif; ?>
            </h1>

            <div class="widget">
                <ul class="list-group font-alt">
                    <li class="list-group-item">
                        <a href="<?= Url::to(['redirect/member', 'slug' => $model->slug]) ?>">
                            Go to <strong><?= Html::encode($model->name) ?></strong> Aliexpress profile
                        </a>
                    </li>
                    <li class="list-group-item">
                        <?= Html::a('Report this member', ['ticket/create',
                            'type' => Ticket::TYPE_MEMBER,
                            'object_id' => $model->id
                        ], ['class' => 'report-link']) ?>
                    </li>

                    <?php if(!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdministrator()): ?>
                        <li class="list-group-item">
                            <?= Html::a('Edit', ['/admin/member/update', 'id' => $model->id]) ?>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12">
            <h3 style="margin-top: 0;"><strong><?= Html::encode($model->name) ?></strong>
                has <?= $dataProvider->getTotalCount() ?> <?= \app\components\Helper::varietyOfWord('pic', $dataProvider->getTotalCount()) ?>
            </h3>
        </div>
        <div class="col-md-12 col-xs-12 col-sm-12">
            <?= $this->render('../common/_image-view', [
                'dataProvider' => $dataProvider,
                'itemView' => '../image/_image',
            ]) ?>
        </div>
    </div>

</div>

<?php if ($members = $model->getSimilarByCountry(4)): ?>
    <section class="module-small">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">
                        Related members from

                        <a href="<?= Url::to(['country/view', 'slug' => $model->country->slug], true) ?>" data-pjax="0">
                            <?= Html::encode($model->country->name) ?>
                        </a>

                    </h2>
                </div>
            </div>
            <div class="row multi-columns-row">

                <?php foreach ($members as $model): ?>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        <div class="shop-item">
                            <div class="shop-item-image">

                                <?php if (empty($model->avatar)): ?>
                                    <?= Html::img(['/images/site/user.png'], ['alt' => 'Avatar']) ?>
                                <?php else: ?>

                                    <img class="lazy" src="<?= Url::to(['/images/site/wait.gif']) ?>"
                                    data-src="<?= Url::to(['/images/normal/' . $model->avatar]) ?>"
                                         alt="<?= $model->name ?>">
                                <?php endif; ?>

                                <div class="shop-item-detail">
                                    <a class="btn btn-round btn-b"
                                       href="<?= Url::to(['country/view', 'slug' => $model->country->slug], true) ?>"
                                       data-pjax="0">
                                        <?= Html::encode($model->country->name) ?>
                                    </a>
                                </div>
                            </div>
                            <h4 class="shop-item-title font-alt">
                                <a href="<?= Url::to(['member/view', 'slug' => $model->slug], true) ?>" data-pjax="0">
                                    <?= Helper::cutThis($model->name, 45) ?>
                                </a>
                            </h4>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
<?php endif; ?>

<?php if($block = Helper::systemConfig('native-ads-01')): ?>
<div class="row">
    <div class="col-xs-12">
        <hr>
        <h2 class="module-title font-alt text-center">
            You May Also Like
        </h2>
        <?= $block ?>
    </div>
</div>
<?php endif; ?>