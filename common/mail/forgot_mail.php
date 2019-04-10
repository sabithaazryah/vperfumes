<?php

use yii\helpers\Html;
?>

<tr>
    <td valign="top" class="x_902363135m_-4486764198706722540top-content" style="font-family: Arial, Helvetica, sans-serif; font-weight: normal; border-collapse: collapse; font-size: 12px; vertical-align: top; padding: 0; margin: 0; background: rgb(255, 255, 255)">
        <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; border-collapse: collapse; font-size: 12px; padding: 0; margin: 0">
            <tbody>
                <tr>
                    <td class="x_902363135m_-4486764198706722540action-content" style="font-family: Arial, Helvetica, sans-serif; font-weight: normal; border-collapse: collapse; font-size: 12px; vertical-align: top; padding: 40px 20px 40px 20px; margin: 0; line-height: 18px">
                        <h2 style="text-align: center;margin-bottom: 0px">FORGOT</h2>
                        <h3 style="text-align: center;margin-top: 0px;">YOUR PASSWORD ?</h3>
                        <p style="text-align: center;padding-bottom: 20px;">Not to worry, we got you! Let's get you a new password.</p>
                        <p style="text-align: center;"><a href="http://<?= Yii::$app->request->serverName ?><?= Yii::$app->homeUrl; ?>site/new-password?token=<?= $val ?>" style="display: inline-block;cursor: pointer;padding: 6px 12px;font-size: 13px;line-height: 1.42857143;text-decoration: none;color: #fff;border-color: #80b636;background-color: #e8c376;border: 1px solid transparent;">Reset Password</a></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>