<?php
/** @var \app\models\User $model */
$this->title = 'Registration' . ' - ' . Yii::$app->name;
?>

<?php if ($status == true): ?>
    <section class="slice--offset slice sct-color-1" id="register">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h4 class="font-alt mb-0">Your account has been successfully created.</h4>
                    <hr class="divider-w mt-10 mb-20">
                    <p>
                        <strong><?= $model->name ?>!</strong>
                        An email with verification code has been sent to your email address
                    </p>
                    <p>Please confirm your account.</p>
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
