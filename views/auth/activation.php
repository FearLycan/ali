<?php

use yii\helpers\Url;
use \app\models\User;

/* @var $user User */
?>

<section class="slice--offset slice sct-color-1">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h4 class="font-alt mb-0">Your account has been confirmed.</h4>
                <hr class="divider-w mt-10 mb-20">
                <p>
                    <strong><?= $user->name ?></strong>
                    Thank you for confirming your account.
                </p>
                <p>Just <a href="<?= Url::to(['auth/login']) ?>">log in</a> and have fun ;)</p>
            </div>
        </div>
    </div>
</section>
