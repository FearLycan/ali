<?php

use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" lang="en" style="background:#f3f3f3">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width">
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>

    <body style="-moz-box-sizing:border-box; -ms-text-size-adjust:100%; -webkit-box-sizing:border-box; -webkit-text-size-adjust:100%; box-sizing:border-box; margin:0; min-width:100%; padding:0; color: #111111; font-family:Helvetica, Arial, sans-serif; font-weight:normal; line-height:1.3; text-align:center; font-size:16px; width:100%; background:#f3f3f3"
          align="left" width="100%">

    <table class="body" style="border-collapse:collapse; border-spacing:0; padding:0; text-align:center;
                vertical-align:top; background:#f3f3f3; height:100%; width:100%; color:#111111;
                font-family:Helvetica, Arial, sans-serif; font-weight:normal; line-height:1.3; margin:0; font-size:16px"
           align="left" valign="top" height="100%" width="100%">
        <tr style="padding:0; text-align:center; vertical-align:top" align="left" valign="top">
            <td align="center" valign="top"
                style="-moz-hyphens:auto; -webkit-hyphens:auto; hyphens:auto; word-wrap:break-word; padding:0; text-align:center; vertical-align:top; color:#111111; font-family:Helvetica, Arial, sans-serif; font-weight:normal; line-height:1.3; margin:0 auto; font-size:16px; float:none; border-collapse:collapse">
                <center data-parsed="" style="min-width:580px; width:100%" width="100%">
                    <table style="border-collapse:collapse; border-spacing:0; padding:0; text-align:center; vertical-align:top; width:100%; float:none; margin:0 auto"
                           align="center" valign="top" width="100%">
                        <tbody>
                        <tr style="padding:0; text-align:center; vertical-align:top" align="left" valign="top">
                            <td height="16px"
                                style="-moz-hyphens:auto; -webkit-hyphens:auto; hyphens:auto; word-wrap:break-word; padding:0; text-align:center; vertical-align:top; color:#111111; font-family:Helvetica, Arial, sans-serif; font-weight:normal; line-height:16px; margin:0; font-size:16px; mso-line-height-rule:exactly; border-collapse:collapse"
                                align="left" valign="top"></td>
                        </tr>
                        </tbody>
                    </table>
                    <table align="center" class="container body-drip float-center"
                           style="border-collapse:collapse; border-spacing:0; padding:0; text-align:center; vertical-align:top; border-top:8px solid #0A0A0A; background:#fefefe; margin:0 auto; width:580px; float:none"
                           valign="top" width="580">
                        <tbody>
                        <tr style="padding:0; text-align:center; vertical-align:top" align="left" valign="top">
                            <td style="-moz-hyphens:auto; -webkit-hyphens:auto; hyphens:auto; word-wrap:break-word; padding:0; text-align:center; vertical-align:top; color:#111111; font-family:Helvetica, Arial, sans-serif; font-weight:normal; line-height:1.3; margin:0; font-size:16px; border-collapse:collapse"
                                align="left" valign="top">

                                <table class="spacer"
                                       style="border-collapse:collapse; border-spacing:0; padding:0; text-align:center; vertical-align:top; width:100%"
                                       align="left" valign="top" width="100%">
                                    <tbody>
                                    <tr style="padding:0; text-align:center; vertical-align:top" align="left"
                                        valign="top">
                                        <td height="16px"
                                            style="-moz-hyphens:auto; -webkit-hyphens:auto; hyphens:auto; word-wrap:break-word; padding:0; text-align:center; vertical-align:top; color:#111111; font-family:Helvetica, Arial, sans-serif; font-weight:normal; line-height:16px; margin:0; font-size:16px; mso-line-height-rule:exactly; border-collapse:collapse"
                                            align="left" valign="top"></td>
                                    </tr>
                                    </tbody>
                                </table>

                                <?php $this->beginBody() ?>
                                <?= $content ?>
                                <?php $this->endBody() ?>

                                <?= $this->render('..\partials\_footer-with-social') ?>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </center>
            </td>
        </tr>


    </table>
    </body>

    </html>
<?php $this->endPage() ?>