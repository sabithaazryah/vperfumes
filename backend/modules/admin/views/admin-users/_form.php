<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\AdminUsers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-users-form form-inline">
    <?= \common\components\AlertMessageWidget::widget() ?>
    <?php $form = ActiveForm::begin(); ?>
    <?php $posts = \common\models\AdminPosts::find()->all(); ?>
    <div class="row">

        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'post_id')->dropDownList(ArrayHelper::map(common\models\AdminPosts::find()->all(), 'id', 'post_name'), ['prompt' => '--Select--']) ?>
        </div>

        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>
        </div>

        <?php if ($model->isNewRecord) { ?>
            <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
                <a onclick="show()" class="show-pass" style="top:40px"><img src="<?= yii::$app->homeUrl; ?>img/Oyk1g.png" id="EYE" ></a>
            </div>
        <?php } ?>


        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>
        </div><div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'status')->dropDownList(['1' => 'Enable', '0' => 'Disable']) ?>

        </div>   


        <div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-block btn-success btn-sm', 'style' => 'float:right;']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>

<script>
    function show() {
        var a = document.getElementById("adminusers-password");
        var b = document.getElementById("EYE");
        if (a.type == "password") {
            a.type = "text";
            b.src = "<?= Yii::$app->homeUrl; ?>img/waw4z.png";
        } else {
            a.type = "password";
            b.src = "<?= Yii::$app->homeUrl; ?>img/Oyk1g.png";
        }
    }

</script>