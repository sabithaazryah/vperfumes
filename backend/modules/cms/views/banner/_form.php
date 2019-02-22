<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Banner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banner-form form-inline">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?php if (!$model->isNewRecord && $model->banner != '') { ?>
                <img src="<?= Yii::$app->homeUrl ?>../uploads/cms/banner/<?= $model->id ?>/en/small.<?= $model->banner ?>" width="100">
            <?php } ?>
            <?= $form->field($model, 'banner')->fileInput()->label('Banner ('.$width.'*'.$height.')') ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
             <?php if (!$model->isNewRecord && $model->banner_ar != '') { ?>
                <img src="<?= Yii::$app->homeUrl ?>../uploads/cms/banner/<?= $model->id ?>/ar/small.<?= $model->banner_ar ?>" width="100">
            <?php } ?>
            <?= $form->field($model, 'banner_ar')->fileInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'alt_tag')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'banner_link')->textInput(['maxlength' => true]) ?>
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
