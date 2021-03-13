<?php

use yii\helpers\Html;
use yii\web\View;
use app\models\User;

/** @var $this View */
/** @var $model User */

?>
<section class="module-small" style="padding-top: 0;">
    <div class="row">
        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
            <img src="<?= $model->getDefaultAvatar() ?>" class="img-responsive thumbnail" title="<?= $model->name; ?>">

            <button class="btn btn-b btn-round btn-role" type="button">
                <i class="fa fa-paper-plane-o"></i>
                <?= $model->getRoleName() ?>
            </button>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

            <h2>
                <?= Html::encode($model->name) ?>

                <?php if ($model->isOnline()): ?>
                    <span title="Online" class="circle online"></span>
                <?php endif; ?>
            </h2>

            <div class="row" style="margin-bottom: 10px;">
                <div class="col-xs-2">
                    <strong>123</strong> products
                </div>
                <div class="col-xs-2">
                    <strong>188</strong> followers
                </div>
                <div class="col-xs-2">
                    <strong>206</strong> following
                </div>
            </div>

            <?php if (!empty($model->description)): ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="description">
                            <p>
                                <?= Html::encode($model->description) ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <span class="label label-default">Default</span>
            <span class="label label-primary">Primary</span>
            <span class="label label-success">Success</span>
            <span class="label label-info">Info</span>
            <span class="label label-warning">Warning</span>
            <span class="label label-danger">Danger</span>

        </div>
    </div>
</section>