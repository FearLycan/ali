<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $optional bool */
?>

<footer style="color:#333; margin-top:30px;">
    <hr/>
    <p>
        <small>
            This is an automated message - please do not reply directly to this email.<br/>
            <?php if ($optional): ?>
                Dostajesz tę wiadomość ponieważ masz włączone powiadomienia o nowych wiadomościach.
                Możesz je wyłączyć w <?= Html::a('ustawieniach konta', Url::to(['/user/settings'], true)) ?>.
            <?php endif; ?>
        </small>
    </p>
</footer>
