<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Fregrance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fregrance-form form-inline">

    <?php $form = ActiveForm::begin(); ?>
    <?= \common\widgets\Alert::widget() ?>
    <div class="row">
        <div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
            <?= $form->field($model, 'name_ar')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
            <?= $form->field($model, 'status')->dropDownList(['1' => 'Enable', '0' => 'Disable']) ?>
        </div>
    </div>
    <div class="row">
        <div class='col-md-12 col-sm-12 col-xs-12'>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-block btn-success btn-sm', 'style' => 'float:right;']) ?>
                <?= Html::a('Reset', ['index'], ['class' => 'btn btn-default grid-button-reset']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
