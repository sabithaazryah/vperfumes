<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form form-inline">

    <?php $form = ActiveForm::begin(); ?>
    <?= \common\widgets\Alert::widget() ?>
    <div class="row">
        <div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
            <?php 
            $main_category = ArrayHelper::map(common\models\MainCategory::find()->where(['status' => 1])->orderBy(['sort_order' => SORT_ASC])->all(), 'id', 'main_category');
            echo $form->field($model, 'main_category')->widget(Select2::classname(), [
                'data' => $main_category,
                'language' => 'en',
                'options' => ['placeholder' => '--Select--'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]);
            ?>
        </div>
        <div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
            <?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
            <?= $form->field($model, 'category_ar')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
            <?= $form->field($model, 'category_code')->textInput(['maxlength' => true, 'readonly' => true]) ?>
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
