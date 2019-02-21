<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OrderDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-details-form form-inline">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'master_id')->textInput() ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'order_id')->textInput(['maxlength' => true]) ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'product_id')->textInput() ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'quantity')->textInput() ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'tax')->textInput(['maxlength' => true]) ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'delivered_date')->textInput() ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'rate')->textInput(['maxlength' => true]) ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'item_type')->textInput() ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'doc')->textInput() ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'status')->textInput() ?>
</div>
    </div>
    <div class="row">
        <div class='col-md-12 col-sm-12 col-xs-12'>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-block btn-success btn-sm', 'style' => 'float:right;']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
