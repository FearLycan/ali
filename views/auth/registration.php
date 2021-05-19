<?php
/** @var \app\models\User $model */
$this->title = 'Registration' . ' - ' . Yii::$app->name;
?>

<?php if ($status == true): ?>
    <section class="slice--offset slice sct-color-1" id="register">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text-center">
                    <h4 class="font-alt mb-0">Your account has been successfully created.</h4>
                    <hr class="divider-w mt-10 mb-20">
                    <p class="module-subtitle font-serif">
                        <strong><?= $model->name ?>!</strong>
                        An email with verification code has been sent to your email address
                    </p>
                    <p class="module-subtitle font-serif">Please confirm your account.</p>

                    <hr class="divider-w mt-10 mb-20">

                    <p>
                        When signing up for an account on our website, you will receive a confirmation email shortly
                        after.<br>
                        Please check for this email and proceed to active your account.<br>
                        If the email was sent to
                        your spam folder please mark it as not spam so that future emails get delivered to your inbox.
                    </p>

                    <p>
                        If you have any issues, please email
                        <a href="mailto:<?= Yii::$app->params['admin-email'] ?>">
                            <strong><?= Yii::$app->params['admin-email'] ?></strong>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <div class="login-form registration-form">
        <?= $this->render('_registration-form', [
            'model' => $model,
        ]) ?>
    </div>
<?php endif; ?>
