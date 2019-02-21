<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OrderMaster */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-master-form form-inline">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'order_id')->textInput(['maxlength' => true]) ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'user_id')->textInput() ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'total_amount')->textInput(['maxlength' => true]) ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'tax')->textInput(['maxlength' => true]) ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'discount_amount')->textInput(['maxlength' => true]) ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'tax_amount')->textInput(['maxlength' => true]) ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'shipping_charge')->textInput(['maxlength' => true]) ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'net_amount')->textInput(['maxlength' => true]) ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'order_date')->textInput() ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'invoice_no')->textInput(['maxlength' => true]) ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'ship_address_id')->textInput() ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'bill_address_id')->textInput() ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'currency_id')->textInput() ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'user_comment')->textarea(['rows' => 6]) ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'payment_mode')->textInput() ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'admin_comment')->textInput() ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'payment_status')->textInput() ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'payment_sucess_data')->textarea(['rows' => 6]) ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'payment_ref_number')->textInput(['maxlength' => true]) ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'admin_status')->textInput() ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'expected_delivery_date')->textInput() ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'delivered_date')->textInput() ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'doc')->textInput() ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'dou')->textInput() ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'shipping_status')->textInput() ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'status')->textInput() ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'cancel_reason')->textarea(['rows' => 6]) ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'promotion_id')->textInput() ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'promotion_discount')->textInput(['maxlength' => true]) ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'return_status')->textInput() ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'return_reason')->textarea(['rows' => 6]) ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'return_approve')->textInput() ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'gift_wrap')->textInput() ?>
</div>
<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
    <?= $form->field($model, 'gift_wrap_value')->textInput(['maxlength' => true]) ?>
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
