<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Forgot Password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-layout">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
        <div id="login" class="animate form">
            <section class="login_content">
                <div class="login-logo">
                    <h1><span>AFG</span>Shipping</h1>
                </div>
                <div class="forgot-title">
                    <h4>Forgot Your Password ?</h4>
                    <p>Let us help you</p>
                    <p>Type your New Password here:</p>
                </div>
                <?= \common\widgets\Alert::widget() ?>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <div class="form-group has-feedback field-adminusers-password required">
                    <label class="control-label" for="new-password">New Password</label>
                    <input type="password" id="new-password" class="form-control" name="new-password" aria-required="true"><span class="glyphicon glyphicon-lock form-control-feedback"></span>

                    <p class="help-block help-block-error"></p>
                </div>
                <div class="form-group has-feedback field-adminusers-password required">
                    <label class="control-label" for="confirm-password">Confirm Passwordd</label>
                    <input type="password" id="confirm-password" class="form-control" name="confirm-password" aria-required="true"><span class="glyphicon glyphicon-lock form-control-feedback"></span>

                    <p class="help-block help-block-error"></p>
                </div>
                <div>
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-default submit', 'name' => 'login-button']) ?>
                </div>
                <div class="clearfix"  style="margin-bottom: 20px;"></div>
                <div class="separator">

                    <p class="change_link">
                        <a href="<?= Yii::$app->homeUrl; ?>site/index" class="to_register">Login to your account?</a>
                    </p>
                    <div class="clearfix"></div>
                    <br />

                </div>
                <?php ActiveForm::end(); ?>
                <!-- form -->
            </section>
            <!-- content -->
        </div>
    </div>
    <div style="clear:both"></div>
</div>