<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Forgot-password';
?>


<div id="login-page" class="inner-page">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mauto">
                <div class="logon-box">
                    <div class="box-head">
                        <ul>
                            <li><a>FORGOT YOUR PASSWORD?</a></li>
                            <li><?= Html::a('Sign in', ['site/login']) ?></li>
                        </ul>
                    </div>

                    <?php $form = ActiveForm::begin(['options' => ['method' => 'post', 'class' => 'login-form']]) ?>
                    <div class="row">

                        <div class="col-md-12">
                            <?= \common\components\AlertMessageWidget::widget() ?>
                        </div>

                        <div class="col-md-12">
                            <label>New Password</label>
                            <?= $form->field($model_form, 'new_password')->passwordInput(['class' => 'form-control'])->label(FALSE) ?>
                        </div>

                        <div class="col-md-12">
                            <label>Confirm Password</label>
                            <?= $form->field($model_form, 'confirm_password')->passwordInput(['class' => 'form-control'])->label(FALSE) ?>
                        </div>

                    </div>
                    <?= Html::submitButton('Submit', ['class' => 'btn orng-btn']) ?>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $('#confirm-password').on('keyup', function () {
        CheckConfirmPasswordMatch();
    });
    function CheckConfirmPasswordMatch() {
        if (($("#confirm-password").val()) !== ($("#new-password").val())) {
            $(".confirm_password").addClass('has-error');
            if ($(".confirm_password p").text() === "") {
                $(".confirm_password p").prepend("Password Mismatch");
            }


        } else {
            $(".confirm_password").removeClass('has-error');
            $(".confirm_password p").text("");
            $(".confirm_password").addClass('has-success');
        }
    }
</script>

