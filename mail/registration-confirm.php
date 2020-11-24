<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var \app\models\User $user */

?>

<center data-parsed="" style="min-width:580px; width:100%" width="100%">
    <img src="https://aligonewild.com/favicon/apple-icon-120x120.png" alt="AliGoneWild"
         align="center" class="float-center"
         style="-ms-interpolation-mode:bicubic; clear:both; display:block; max-width:100%; outline:none; text-decoration:none; width:auto; float:none; margin:0 auto; text-align:center"
         width="auto">
</center>
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

<table class="row"
       style="border-collapse:collapse; border-spacing:0; padding:0; text-align:center; vertical-align:top; position:relative; width:100%; display:table"
       align="left" valign="top" width="100%">
    <tbody>
    <tr style="padding:0; text-align:center; vertical-align:top" align="left"
        valign="top">
        <th class="small-12 large-12 columns first last"
            style="color:#111111; font-family:Helvetica, Arial, sans-serif; font-weight:normal; line-height:1.3; margin:0 auto; padding:0; text-align:center; font-size:16px; padding-bottom:16px; padding-left:16px; padding-right:16px; width:564px"
            align="left" width="564">
            <table style="border-collapse:collapse; border-spacing:0; padding:0; text-align:center; vertical-align:top; width: 100%;"
                   align="left" valign="top">
                <tr style="padding:0; text-align:center; vertical-align:top"
                    align="left"
                    valign="top">
                    <th style="color:#111111; font-family:Helvetica, Arial, sans-serif; font-weight:normal; line-height:1.3; margin:0; padding:0; text-align:center; font-size:16px"
                        align="left">
                        <center>
                            <h4 class="text-center"
                                style="color:inherit; font-family:Helvetica, Arial, sans-serif; font-weight:normal; line-height:1.3; margin:0; padding:0; text-align:center; margin-bottom:10px; word-wrap:normal; font-size:24px"
                                align="center">
                                Welcome to <strong><?= Yii::$app->name ?></strong>
                            </h4>
                            <p style="margin:0; color:#111111; font-family:Helvetica, Arial, sans-serif; font-weight:normal; line-height:1.3; padding:0; text-align:center; font-size:16px; margin-bottom:10px"
                               align="center">
                                The biggest customer pics collection from
                                Aliexpress feedback
                            </p>
                        </center>
                    </th>
                    <th style="color:#111111; font-family:Helvetica, Arial, sans-serif; font-weight:normal; line-height:1.3; margin:0; padding:0; text-align:center; font-size:16px; visibility:hidden; width:0"
                        align="left" width="0"></th>
                </tr>
            </table>
        </th>
    </tr>
    </tbody>
</table>


<hr>


<table class="row"
       style="border-collapse:collapse; border-spacing:0; padding:0; text-align:center; vertical-align:top; position:relative; width:100%; display:table"
       align="left" valign="top" width="100%">
    <tbody>
    <tr style="padding:0; text-align:center; vertical-align:top" align="left"
        valign="top">
        <th class="small-12 large-12 columns first last"
            style="color:#111111; font-family:Helvetica, Arial, sans-serif; font-weight:normal; line-height:1.3; margin:0 auto; padding:0; text-align:center; font-size:16px; padding-bottom:16px; padding-left:16px; padding-right:16px; width:564px"
            align="left" width="564">
            <table style="border-collapse:collapse; border-spacing:0; padding:0; text-align:center; vertical-align:top"
                   align="left" valign="top">
                <tr style="padding:0; text-align:center; vertical-align:top"
                    align="left"
                    valign="top">
                    <th style="color:#111111; font-family:Helvetica, Arial, sans-serif; font-weight:normal; line-height:1.3; margin:0; padding:0; text-align:center; font-size:16px"
                        align="left">
                        <p style="margin:0; color:#111111; font-family:Helvetica, Arial, sans-serif; font-weight:normal; line-height:1.3; padding:0; text-align:center; font-size:16px; margin-bottom:10px"
                           align="center">

                            Hi, <strong><?= $user->name ?></strong>.
                            Before you go out and play on <strong><?= Yii::$app->name ?></strong>,
                            please verify your
                            email address.
                        </p>

                        <p style="margin:0; color:#111111; font-family:Helvetica, Arial, sans-serif; font-weight:normal; line-height:1.3; padding:0; text-align:center; font-size:16px; margin-bottom:10px"
                           align="center">
                            To finish signing up, you just need to confirm that we got your email right.
                        </p>


                        <p class="text-center"
                           style="margin:0; color:#111111; font-family:Helvetica, Arial, sans-serif; font-weight:normal; line-height:1.3; padding:0; text-align:center; font-size:16px; margin-bottom:10px"
                           align="center">
                            If you did not create a <strong><?= Yii::$app->name ?></strong>
                            account using this address, please contact us at
                            <a href="mailto:<?= Yii::$app->params['admin-email'] ?>"><?= Yii::$app->params['admin-email'] ?></a>
                        </p>
                        <center data-parsed="" style="min-width:532px; width:100%"
                                width="100%">
                            <table class="button success float-center"
                                   style="border-collapse:collapse; border-spacing:0; padding:0; text-align:center; vertical-align:top; float:none; margin:0 0 16px 0; width:auto"
                                   align="center" valign="top" width="auto">
                                <tr style="padding:0; text-align:center; vertical-align:top"
                                    align="left" valign="top">
                                    <td style="-moz-hyphens:auto; -webkit-hyphens:auto; hyphens:auto; word-wrap:break-word; padding:0; text-align:center; vertical-align:top; color:#111111; font-family:Helvetica, Arial, sans-serif; font-weight:normal; line-height:1.3; margin:0; font-size:16px; border-collapse:collapse"
                                        align="left" valign="top">
                                        <table style="border-collapse:collapse; border-spacing:0; padding:0; text-align:center; vertical-align:top"
                                               align="left" valign="top">
                                            <tr style="padding:0; text-align:center; vertical-align:top"
                                                align="left" valign="top">
                                                <td style="-moz-hyphens:auto; -webkit-hyphens:auto; hyphens:auto; word-wrap:break-word; padding:0; text-align:center; vertical-align:top; color:#fefefe; font-family:Helvetica, Arial, sans-serif; font-weight:normal; line-height:1.3; margin:0; font-size:16px; background:rgba(17, 17, 17, 0.8); border:0 solid #111; border-collapse:collapse"
                                                    align="left" valign="top"><a
                                                            href="<?= Url::to(['auth/activation', 'code' => $user->verification_code], true) ?>"
                                                            style="color:#fefefe; font-family:Helvetica, Arial, sans-serif; font-weight:bold; line-height:1.3; margin:0; padding:8px 16px 8px 16px; text-align:center; text-decoration:none; border:0 solid #111; border-radius:3px; display:inline-block; font-size:16px"
                                                            align="left">
                                                        Verify your account
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </center>
                        <center data-parsed="" style="min-width:532px; width:100%"
                                width="100%">
                            <table style="border-collapse:collapse; border-spacing:0; padding:0; text-align:center; vertical-align:top; width: 100%;"
                                   align="left" valign="top">
                                <tr style="padding:0; text-align:center; vertical-align:top;width: 100%;"
                                    align="left" valign="top">
                                    <td style="-moz-hyphens:auto; -webkit-hyphens:auto; hyphens:auto; word-wrap:break-word; padding:0; width: 100%; text-align:center; vertical-align:top; color:#111111; font-family:Helvetica, Arial, sans-serif; font-weight:normal; line-height:1.3; margin:0; font-size:16px; border-collapse:collapse"
                                        align="left" valign="top">
                                        <table style="border-collapse:collapse; border-spacing:0; padding:0; text-align:center; vertical-align:top; width: 100%;"
                                               align="left" valign="top">
                                            <tr style="padding:0; text-align:center; vertical-align:top"
                                                align="left" valign="top">
                                                <td style="-moz-hyphens:auto; -webkit-hyphens:auto; hyphens:auto; word-wrap:break-word; padding:0; text-align:center; vertical-align:top; color:#111111; font-family:Helvetica, Arial, sans-serif; font-weight:normal; line-height:1.3; margin:0; font-size:16px; border-collapse:collapse"
                                                    align="left" valign="top">
                                                    <p class="text-center"
                                                       style="margin:0; color:#777; font-family:Helvetica, Arial, sans-serif; font-weight:normal; line-height:1.3; padding:0; text-align:center; font-size:11px; margin-bottom:10px"
                                                       align="center">
                                                        Or verify using
                                                        this link:</p>
                                                    <p class="text-center"
                                                       style="margin:0; color:#111111; font-family:Helvetica, Arial, sans-serif; font-weight:normal; line-height:1.3; padding:0; text-align:center; font-size:16px; margin-bottom:10px"
                                                       align="center">
                                                        <a href="<?= Url::to(['auth/activation', 'code' => $user->verification_code], true) ?>"
                                                           style="color:#2199e8; font-family:Helvetica, Arial, sans-serif; font-weight:normal; line-height:1.3; margin:0; padding:0; text-align:center; text-decoration:none"
                                                           align="left">
                                                            <?= Url::to(['auth/activation', 'code' => $user->verification_code], true) ?>
                                                        </a>
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </center>

                    </th>
                    <th class="expander"
                        style="color:#111111; font-family:Helvetica, Arial, sans-serif; font-weight:normal; line-height:1.3; margin:0; padding:0; text-align:center; font-size:16px; visibility:hidden; width:0"
                        align="left" width="0"></th>
                </tr>
            </table>
        </th>
    </tr>
    </tbody>
</table>
