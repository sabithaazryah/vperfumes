<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Employee */

$this->title = 'Change Password';
?>
<h3 class="box-title"><?= Html::encode($this->title) ?></h3>
<div class="box ">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <?= Html::a('<span> Manage Users</span>', ['index'], ['class' => 'btn btn-block btn-info btn-sm']) ?>
            </div>
        </div>
        <div class="admin-users-change-password change-password-box">
            <div class="change-password-form form-inline">
                <?= \common\components\AlertMessageWidget::widget() ?>
                <?php $form = ActiveForm::begin(); ?>
                <div class="row">
                    <div class='col-md-12 col-sm-6 col-xs-12'>
                        <?=
                        $form->field($model, 'new_password', ['inputOptions' => [
                                'autocomplete' => 'new-password', 'class' => 'form-control']])->passwordInput()->label('New Password *')
                        ?>
                        <a onclick="show()" class="show-pass"><img src="<?= yii::$app->homeUrl; ?>img/Oyk1g.png" id="EYE"></a>
                    </div>
                </div>
                <div class="row">
                    <div class='col-md-12 col-sm-6 col-xs-12'>
                        <?=
                        $form->field($model, 'confirm_password', ['inputOptions' => [
                                'autocomplete' => 'new-password', 'class' => 'form-control']])->passwordInput()->label('Confirm Password *')
                        ?>
                        <a onclick="show1()" class="show-pass"><img src="<?= yii::$app->homeUrl; ?>img/Oyk1g.png" id="EYE1"></a>
                    </div>
                </div>
                <div class="form-group action-btn-right">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-success create-btn']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>

        </div>
    </div>
    <!-- /.box-body -->
</div>
<script>
    function show() {
        var a = document.getElementById("changepassworduser-new_password");
        var b = document.getElementById("EYE");
        if (a.type == "password") {
            a.type = "text";
            b.src = "<?= Yii::$app->homeUrl; ?>img/waw4z.png";
        } else {
            a.type = "password";
            b.src = "<?= Yii::$app->homeUrl; ?>img/Oyk1g.png";
        }
    }
    function show1() {
        var a = document.getElementById("changepassworduser-confirm_password");
        var b = document.getElementById("EYE1");
        if (a.type == "password") {
            a.type = "text";
            b.src = "<?= Yii::$app->homeUrl; ?>img/waw4z.png";
        } else {
            a.type = "password";
            b.src = "<?= Yii::$app->homeUrl; ?>img/Oyk1g.png";
        }
    }
</script>

<style>
    .change-password-box{
        margin: 0 auto;
        width: 50%;
        border: 1px solid #eee;
        padding: 15px;
    }
</style>