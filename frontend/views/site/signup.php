<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use common\models\CountryCode;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="signin-page" class="inner-page">
    <div class="container">
        <div class="form-div">
            <div class="form-head"><div class="logo">Fill the below details</div></div>
            <div class="content-box">
                <!--<form action="" method="post" class="login-form">-->
                <?php
                $form = ActiveForm::begin(['options' => [
                                'class' => 'login-form'
                ]]);
                ?>
                <div class="row">
                    <div class="col-md-6 left-box">
                        <div class="q">Login Data </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Full name</label>
                                    <?= $form->field($model, 'first_name')->textInput(['placeholder' => '', 'class' => 'form-control'])->label(FALSE) ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email id</label>
                                    <?= $form->field($model, 'email')->textInput(['placeholder' => '', 'class' => 'form-control'])->label(FALSE) ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control'])->label(FALSE) ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <?= $form->field($model, 'confirm_password')->passwordInput(['class' => 'form-control'])->label(FALSE) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 right-box">
                        <div class="q">Personal Information </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <?php
                                    $model->dob = date('d-M-Y');
                                    ?>
                                    <?=
                                    $form->field($model, 'dob')->widget(DatePicker::classname(), [
                                        'type' => DatePicker::TYPE_INPUT,
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'format' => 'dd-M-yyyy',
                                        ]
                                    ])->label(FALSE);
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nationality</label>
                                     <?= $form->field($model, 'country_code')->dropDownList(ArrayHelper::map(CountryCode::findAll(['status' => 1]), 'id', 'country_name'))->label(FALSE) ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" placeholder="" class="form-control" name="address" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <?= $form->field($model, 'contact_no')->textInput(['placeholder' => '', 'class' => 'form-control'])->label(FALSE) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 form-footer">
                        <div class="form-group checkbox">
                            <label class="input-style-box">
                                <input type="checkbox" class="form-control" name="Remember">
                                <span class="checkmark"></span>
                                By clicking the 'Sign Up' button, you confirm that you accept our Terms of use and Privacy Policy .
                            </label>
                        </div>
                        <button type="submit" class="orng-btn">Register Now</button>
                        <div class="hav-ac">Have an account? <a href="<?= Yii::$app->homeUrl ?>site/login">Log in</a></div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
                <!--</form>-->
            </div>
        </div>
    </div>
</div>