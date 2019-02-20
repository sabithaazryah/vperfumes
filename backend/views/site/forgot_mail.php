<?php

use yii\helpers\Html;
?>


<div class="content-detail" style="padding: 0px 10%;">
    <h2>Reset Your Password</h2>
    <p>Hi <?= $model->name ?>,</p>
    <p>You are requested to reset your password for your CVS Database Admin Panel Login. Click the below button to reset it.</p>
    <p style="margin: 30px 0px;"><a href="<?= Yii::$app->getRequest()->serverName ?>site/new-password?token=<?= $val ?>" style="background: #2881c0;padding: 10px 20px;text-decoration: none;color: white;">Reset Password</a></p>
</div>
