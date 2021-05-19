<?php

use app\models\User;
use yii\helpers\Url;

$this->title = 'Account activation' . ' - ' . Yii::$app->name;
/* @var $user User */
?>

<section class="slice--offset slice sct-color-1">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 text-center">
                <h4 class="font-alt mb-0">Your account has been confirmed.</h4>
                <hr class="divider-w mt-10 mb-20">
                <p class="module-subtitle font-serif">
                    <strong><?= $user->name ?></strong>
                    Thank you for confirming your account.
                </p>
                <p class="module-subtitle font-serif">Just <a href="<?= Url::to(['auth/login']) ?>"><strong>log
                            in</strong></a> and have fun ;)</p>
            </div>
        </div>
    </div>
</section>
