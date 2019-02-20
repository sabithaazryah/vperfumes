<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'main_category') ?>

    <?= $form->field($model, 'category') ?>

    <?= $form->field($model, 'subcategory') ?>

    <?= $form->field($model, 'product_name') ?>

    <?php // echo $form->field($model, 'canonical_name') ?>

    <?php // echo $form->field($model, 'meta_title') ?>

    <?php // echo $form->field($model, 'meta_description') ?>

    <?php // echo $form->field($model, 'meta_keywords') ?>

    <?php // echo $form->field($model, 'search_tag') ?>

    <?php // echo $form->field($model, 'item_ean') ?>

    <?php // echo $form->field($model, 'brand') ?>

    <?php // echo $form->field($model, 'ean_type') ?>

    <?php // echo $form->field($model, 'ean_value') ?>

    <?php // echo $form->field($model, 'gender_type') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'offer_price') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'currency') ?>

    <?php // echo $form->field($model, 'stock') ?>

    <?php // echo $form->field($model, 'stock_unit') ?>

    <?php // echo $form->field($model, 'stock_availability') ?>

    <?php // echo $form->field($model, 'tax') ?>

    <?php // echo $form->field($model, 'free_shipping') ?>

    <?php // echo $form->field($model, 'product_type') ?>

    <?php // echo $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'size_unit') ?>

    <?php // echo $form->field($model, 'main_description') ?>

    <?php // echo $form->field($model, 'product_detail') ?>

    <?php // echo $form->field($model, 'condition') ?>

    <?php // echo $form->field($model, 'CB') ?>

    <?php // echo $form->field($model, 'UB') ?>

    <?php // echo $form->field($model, 'DOC') ?>

    <?php // echo $form->field($model, 'DOU') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'profile') ?>

    <?php // echo $form->field($model, 'profile_alt') ?>

    <?php // echo $form->field($model, 'gallery_alt') ?>

    <?php // echo $form->field($model, 'other_image') ?>

    <?php // echo $form->field($model, 'related_product') ?>

    <?php // echo $form->field($model, 'featured_product') ?>

    <?php // echo $form->field($model, 'sort') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
