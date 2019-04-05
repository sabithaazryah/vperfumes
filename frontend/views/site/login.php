<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="login-page" class="inner-page">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mauto">
                <div class="logon-box">
                    <div class="box-head">
                        <ul>
                            <li><a href="#!">Login</a></li>
                            <li><?= Html::a('create an account',['site/signup'])?></li>
                        </ul>
                    </div>
                        <?php $form = ActiveForm::begin(['action' => ['site/login'], 'options' => ['method' => 'post', 'class' => 'login-form']]) ?>
                        <div class="row">
                            <div class="col-md-12">
                                <?= $form->field($model, 'email')->textInput(['class' => 'form-control','placeholder'=>'Username or Email','type'=>'email'], ['autofocus' => true])->label(FALSE) ?>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?= $form->field($model, 'password')->textInput(['class' => 'form-control','placeholder'=>'Password','type'=>'password'], ['autofocus' => true])->label(FALSE) ?>
                                </div>
                            </div>
                            <div class="col-md-12">


                                <div class="form-group checkbox">
                                  <label class="input-style-box">
                                    <input type="checkbox" class="form-control" id="Remember" name="Remember" >
                                    <span class="checkmark"></span> Remember Me
                                    </label>
                                </div>
                                  <a href="#!" class="forgot">Forgotten password?</a>
                            </div>
                        </div>
                        <!--<button type="submit" class="btn orng-btn">Sign in</button>-->
                        <?= Html::submitButton('Sign in', ['class' => 'btn orng-btn']) ?>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>