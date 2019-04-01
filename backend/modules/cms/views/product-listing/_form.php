<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\Brand;

/* @var $this yii\web\View */
/* @var $model common\models\ProductListing */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-listing-form form-inline">
    <?= \common\components\AlertMessageWidget::widget() ?>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'title')->textInput(['readonly' => true]) ?>
        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?php
            $brands = ArrayHelper::map(Brand::find()->all(), 'id', 'brand');
            echo $form->field($model, 'search_by_brand')->widget(Select2::classname(), [
                'data' => $brands,
                'language' => 'en',
                'options' => ['placeholder' => '--Select--'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]);
            ?>
        </div>
        <div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
            <?php
            $products = [];
            if (!$model->isNewRecord) {
                if (isset($model->product_id)) {
                    $model->product_id = explode(',', $model->product_id);
                    $products = ArrayHelper::map(common\models\Product::find()->where(['id' => $model->product_id])->orderBy(['product_name' => SORT_ASC])->all(), 'id', 'product_name');
                }
            }
            echo $form->field($model, 'product_id')->widget(Select2::classname(), [
                'data' => $products,
                'language' => 'en',
                'options' => ['placeholder' => '--Select--'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'multiple' => true
                ],
            ]);
            ?>
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
