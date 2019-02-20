<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Customers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-form form-inline">

    <?php $form = ActiveForm::begin(['id'=>'product-add-category']); ?>
    <div class="row">
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'category', ['options' => ['class' => ''], 'enableAjaxValidation' => true])->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'category_ar')->textInput(['maxlength' => true]) ?>
        </div>

        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'category_code')->textInput(['maxlength' => true,'readonly'=>true]) ?>
        </div>

        
    </div>
    <div class="row">
        <div class='col-md-12 col-sm-12 col-xs-12'>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-block btn-success btn-sm', 'style' => 'float:right;','id'=>'testyy']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
