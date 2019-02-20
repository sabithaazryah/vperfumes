<?php

use yii\helpers\Html;
?>

<html>

    <head>
        <title>Newsletter Subscription Enquiry From eqec.ae</title>
    </head>

    <body>
        <div class="mail-body" style="margin: auto;width: 70%;border: 1px solid #9e9e9e;">
            <div class="content" style="margin: 40px;">
                <?php echo Html::img('http://' . Yii::$app->request->serverName . '/images/logo.png', $options = ['width' => '250px', 'style' => 'display: block;margin-left: auto;margin-right: auto;width: 30%;']) ?>
                <?php echo Html::img(Yii::$app->homeUrl . 'images/logo.png', $options = ['width' => '250px', 'style' => 'display: block;margin-left: auto;margin-right: auto;width: 30%;']) ?>
                <h3 style="color: #545350;">Contact Enquiry From mgvission.com</h3>

                <table style="border-collapse: collapse;width: 100%;text-align: left;margin-bottom: 30px;border: 1px solid #c7c4c4;">
                    <tr>
                        <th style="border: 1px solid #c7c4c4;text-align: left;padding: 5px 10px;">Name</th>
                        <td style="border: 1px solid #c7c4c4;text-align: left;padding: 5px 10px;"><?= $model->name ?></td>
                    </tr>
                    <tr>
                        <th style="border: 1px solid #c7c4c4;text-align: left;padding: 5px 10px;">Email</th>
                        <td style="border: 1px solid #c7c4c4;text-align: left;padding: 5px 10px;"><?= $model->email ?></td>
                    </tr>
                    <tr>
                        <th style="border: 1px solid #c7c4c4;text-align: left;padding: 5px 10px;">Phone</th>
                        <td style="border: 1px solid #c7c4c4;text-align: left;padding: 5px 10px;"><?= $model->phone ?></td>
                    </tr>
                    <tr>
                        <th style="border: 1px solid #c7c4c4;text-align: left;padding: 5px 10px;">Subject</th>
                        <td style="border: 1px solid #c7c4c4;text-align: left;padding: 5px 10px;"><?= $model->subject ?></td>
                    </tr>
                    <tr>
                        <th style="border: 1px solid #c7c4c4;text-align: left;padding: 5px 10px;">Message</th>
                        <td style="border: 1px solid #c7c4c4;text-align: left;padding: 5px 10px;"><?= $model->message ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>