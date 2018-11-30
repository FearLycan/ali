<?php

use app\models\Ticket;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Create new ticket' . ' - ' . Yii::$app->name;

?>

<div class="ticket-create">
    <div class="row">

        <div class="col-sm-6 col-sm-offset-3">
            <h2 class="module-title font-alt">
                Create new ticket
            </h2>
            <div class="module-subtitle font-serif">

            </div>
        </div>

        <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <strong>Thank you!</strong> Your ticket was sent.
                </div>
            </div>
        <?php endif; ?>

        <div class="col-md-6">

            <?php if ($type == Ticket::TYPE_IMAGE): ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="media-body">
                            <a href="<?= Url::to(['member/view', 'slug' => $object->member->slug]) ?>"
                               style="float: left; margin-right: 10px;">
                                <h4 class="media-heading"><?= Html::encode($object->member->name) ?></h4>
                            </a>

                            <?php if ($object->member->id != \app\models\Member::MEMBER_ANONYMOUS): ?>
                                <?= Html::img(['/images/flags/' . strtolower($object->member->country_code) . '.svg'], ['class' => 'flag', 'alt' => $object->member->country_code, 'title' => $object->member->country_code]) ?>
                            <?php endif; ?>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <hr>
                    </div>

                    <div class="col-md-12">
                        <img src="<?= $object->getNormalSizeImage() ?>" alt="Image" class="img-responsive"
                             style="margin: 0 auto;"/>
                    </div>

                </div>

            <?php elseif ($type == Ticket::TYPE_PRODUCT): ?>

                <div class="row">
                    <div class="col-md-12">
                       <h3>
                           <?= Html::encode($object->name) ?>
                       </h3>
                    </div>

                    <div class="col-md-12">
                        <hr>
                    </div>

                    <div class="col-md-12">
                        <img src="<?= $object->image ?>" class="img-responsive img-center img-thumbnail" alt="Product">
                    </div>

                </div>

            <?php elseif ($type == Ticket::TYPE_MEMBER): ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="media-body">
                            <a href="<?= Url::to(['member/view', 'slug' => $object->slug]) ?>"
                               style="float: left; margin-right: 10px;">
                                <h4 class="media-heading"><?= Html::encode($object->name) ?></h4>
                            </a>

                            <?php if ($object->id != \app\models\Member::MEMBER_ANONYMOUS): ?>
                                <?= Html::img(['/images/flags/' . strtolower($object->country_code) . '.svg'], ['class' => 'flag', 'alt' => $object->country_code, 'title' => $object->country_code]) ?>
                            <?php endif; ?>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <hr>
                    </div>

                    <div class="col-md-12">
                        <?php if (empty($object->avatar)): ?>
                            <?= Html::img(['/images/site/user.png'], ['class' => 'img-responsive img-center img-thumbnail', 'alt' => 'Avatar']) ?>
                        <?php else: ?>
                            <?= Html::img(['/images/thumbnail/' . $object->avatar], ['class' => 'img-responsive img-center img-thumbnail', 'alt' => 'Avatar']) ?>
                        <?php endif; ?>
                    </div>

                </div>

            <?php elseif ($type == Ticket::TYPE_OTHER): ?>

            <?php endif; ?>

        </div>

        <div class="col-md-6 col-xs-12 col-sm-12">
            <hr>
        </div>

        <div class="col-md-6">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>


    </div>
</div>
