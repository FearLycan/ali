<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<style>
    body,
    html,
    .body {
        background: #f3f3f3 !important;
    }

    .container.header {
        background: #f3f3f3;
    }

    .body-drip {
        border-top: 8px solid #0A0A0A;
    }
</style>

<table class="body">
    <tr>
        <td class="float-center" align="center" valign="top">
            <center data-parsed="">
                <table class="spacer float-center">
                    <tbody>
                    <tr>
                        <td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td>
                    </tr>
                    </tbody>
                </table>
                <table align="center" class="container body-drip float-center">
                    <tbody>
                    <tr>
                        <td>
                            <table class="spacer">
                                <tbody>
                                <tr>
                                    <td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td>
                                </tr>
                                </tbody>
                            </table>
                            <center data-parsed=""><img src="https://aligonewild.com/favicon/apple-icon-120x120.png"
                                                        alt="" align="center" class="float-center"></center>
                            <table class="spacer">
                                <tbody>
                                <tr>
                                    <td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="row">
                                <tbody>
                                <tr>
                                    <th class="small-12 large-12 columns first last">
                                        <table>
                                            <tr>
                                                <th>
                                                    <h4 class="text-center">Welcome to <strong>AliGoneWild</strong>
                                                    </h4>
                                                    <p class="text-center">The biggest customer pics collection from
                                                        Aliexpress feedback.</p>
                                                </th>
                                                <th class="expander"></th>
                                            </tr>
                                        </table>
                                    </th>
                                </tr>
                                </tbody>
                            </table>
                            <hr>
                            <table class="row">
                                <tbody>
                                <tr>
                                    <th class="small-12 large-12 columns first last">
                                        <table>
                                            <tr>
                                                <th>
                                                    <p class="text-center">
                                                        Hi, <strong><?= Html::encode($user->name) ?></strong>.
                                                        Before you go out and play on <strong>AliGoneWild</strong>,
                                                        please verify your
                                                        email address.
                                                    </p>

                                                    <p class="text-center">
                                                        To finish signing up, you just need to confirm that we got your
                                                        email right.
                                                    </p>

                                                    <p class="text-center">
                                                        If you did not create a <strong>AliGoneWild</strong> account
                                                        using this address,
                                                        please contact us at
                                                        <a href="mailto:mail@aligonewild.com">
                                                            mail@aligonewild.com
                                                        </a>
                                                    </p>
                                                    <center data-parsed="">
                                                        <table class="button success float-center">
                                                            <tr>
                                                                <td>
                                                                    <table>
                                                                        <tr>
                                                                            <td><a href="<?= Url::to('#') ?>">Verify
                                                                                    your account</a>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <table>
                                                                        <tr>
                                                                            <td>
                                                                                <p class="text-center"
                                                                                   style="color: #777; font-size: 11px;">
                                                                                    Or verify usign
                                                                                    this link:</p>
                                                                                <p class="text-center"><a
                                                                                            href="#">LINK</a></p>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </center>

                                                </th>
                                                <th class="expander"></th>
                                            </tr>
                                        </table>
                                    </th>
                                </tr>
                                </tbody>
                            </table>
                            <?= $this->render('partials/_footer', ['optional' => false]) ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </center>
        </td>
    </tr>
</table>