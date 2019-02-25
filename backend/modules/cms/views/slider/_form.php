<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Slider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-form form-inline">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'slider_link')->textInput(['maxlength' => true]) ?>
        </div>
        
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'alt_tag_content')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'status')->dropDownList(['1' => 'Enable', '0' => 'Disable']) ?>
        </div>
    </div>
    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?php if (!$model->isNewRecord && $model->img != '') { ?>
            <img src="<?= Yii::$app->homeUrl ?>../uploads/cms/sliders/<?=$model->id?>/en/small.<?=$model->img?>" width="100">
            <?php } ?>
            <?= $form->field($model, 'img')->fileInput()->label('Image<i> (1920*850)</i>') ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
             <?php if (!$model->isNewRecord && $model->img_ar != '') { ?>
                <img src="<?= Yii::$app->homeUrl ?>../uploads/cms/sliders/<?=$model->id?>/ar/small.<?=$model->img_ar?>" width="100">
            <?php } ?>
            <?= $form->field($model, 'img_ar')->fileInput() ?>
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
