<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\OrderMasterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-master-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['order-report'],
                'method' => 'post',
    ]);
//        $model->createdFrom = $from;
//        $model->createdTo = $to;
    ?>

    <div class="col-md-3">
        <?php
        if (isset($order_date_from) && $order_date_from != '') {
            $model->order_date_from = $order_date_from;
        }
        ?>

        <?=
        $form->field($model, 'order_date_from')->widget(DatePicker::classname(), [
            'type' => DatePicker::TYPE_INPUT,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-mm-yyyy',
                'todayHighlight' => true,
                'placeholder' => 'Date'
            ]
        ])->label('Order Date From');
        ?>

    </div>
    <div class="col-md-3">

        <?php
        if (isset($order_date_to) && $order_date_to != '') {
            $model->order_date_to = $order_date_to;
        }
        ?>
        <?=
        $form->field($model, 'order_date_to')->widget(DatePicker::classname(), [
            'type' => DatePicker::TYPE_INPUT,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-mm-yyyy',
                'todayHighlight' => true,
                'placeholder' => 'Date'
            ]
        ])->label('Order Date From');
        ?>
        
    </div>

    <div class="col-md-3">
        <?php
        if (isset($order_search) && $order_search != '') {

            $model->order_search = $order_search;
        }
        ?>
        <?=
        $form->field($model, 'order_search')->textInput()->label('Order ID')
        ?>
    </div>

    <div class="col-md-3">
        <?php
        if (isset($order_status) && $order_status != '') {
            $model->order_status = $order_status;
        }
        ?>
        <?=
        $form->field($model, 'order_status')->dropDownList(['' => 'All', '0' => 'Pending', '1' => 'Order Placed', '2' => 'Order Packed', '3' => 'Order Dispatched', '4' => 'Delivered', '5' => 'Cancelled'])->label('Status')
        ?>
    </div>

    <div class="col-md-3">
        <?php
        if (isset($amount_from) && $amount_from != '') {

            $model->amount_from = $amount_from;
        }
        ?>
        <?=
        $form->field($model, 'amount_from')->textInput()
        ?>
    </div>
    <div class="col-md-3">
        <?php
        if (isset($amount_to) && $amount_to != '') {

            $model->amount_to = $amount_to;
        }
        ?>
        <?=
        $form->field($model, 'amount_to')->textInput()
        ?>
    </div>

    <div class="col-md-3" style="margin-top: 23px;">
        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-success']) ?>

            <?php // Html::resetButton('Reset', ['class' => 'btn btn-default', 'style' => 'background-color: #e6e6e6;'])   ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<script type="text/javascript">
    jQuery(document).ready(function ($)
    {
        $("#ordermastersearch-user_search").select2({
            placeholder: 'Select',
            allowClear: true
        }).on('select2-open', function ()
        {
            $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
        });

    });
</script>