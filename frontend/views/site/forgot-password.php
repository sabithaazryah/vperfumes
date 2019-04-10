<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

if (isset($meta_title) && $meta_title != '')
    $this->title = $meta_title;
else
    $this->title = 'Vperfumes';
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
                            <p>
                                Enter the e-mail address associated with your account. Click submit to have your reset password link.
                            </p>
                        </div>

                        <div class="col-md-12">
                            <?= \common\components\AlertMessageWidget::widget() ?>
                        </div>

                        <div class="col-md-12">
                            <?= $form->field($model, 'email')->textInput(['class' => 'form-control', 'placeholder' => 'Username or Email', 'type' => 'email'], ['autofocus' => true])->label(FALSE) ?>
                        </div>
                    </div>
                    <?= Html::submitButton('Submit', ['class' => 'btn orng-btn']) ?>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

