<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Category;
use common\models\SubCategory;
use common\models\Unit;
use common\models\Currency;
use common\models\MasterSearchTag;
use common\models\Product;
use common\models\Brand;
use common\models\Fregrance;
use dosamigos\ckeditor\CKEditor;
use common\models\Tax;
use kartik\select2\Select2;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form form-inline">

    <?php $form = ActiveForm::begin(); ?>
   
    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?php
            $main_category = ArrayHelper::map(common\models\MainCategory::find()->orderBy(['sort_order' => SORT_ASC])->all(), 'id', 'main_category');
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

        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?php
            if (!$model->isNewRecord) {
                $categorys = ArrayHelper::map(Category::find()->where(['main_category' => $model->main_category, 'status' => '1'])->orderBy(['category' => SORT_ASC])->all(), 'id', 'category');
            } else {
                $categorys = ArrayHelper::map(Category::find()->where(['main_category' => '1'])->orderBy(['category' => SORT_ASC])->all(), 'id', 'category');
            }

            echo $form->field($model, 'category')->widget(Select2::classname(), [
                'data' => $categorys,
                'language' => 'en',
                'options' => ['placeholder' => '--Select--'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]);
            ?>
            <label onclick="jQuery('#modal-1').modal('show', {backdrop: 'fade'});" class="product-fields-add add_category"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Category</label>
        </div>

        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>
        </div>

        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'product_name_ar')->textInput(['maxlength' => true]) ?>
        </div>

        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'canonical_name')->textInput(['maxlength' => true, 'readonly' => true]) ?>
        </div>


    </div>
    <div class="row">

        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'canonical_name_ar')->textInput(['maxlength' => true, 'readonly' => true]) ?>
        </div>

        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?php
            if ($model->isNewRecord) {
                $serial_no = \common\models\Settings::findOne(3)->value;
                $prefix = \common\models\Settings::findOne(3)->prefix;
                $model->item_ean = $this->context->generateProductEan($serial_no);
            }
            ?>
            <?= $form->field($model, 'item_ean')->textInput(['maxlength' => true, 'readOnly' => true]) ?>
        </div>

        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?php
            $brands = ArrayHelper::map(Brand::find()->all(), 'id', 'brand');
            echo $form->field($model, 'brand')->widget(Select2::classname(), [
                'data' => $brands,
                'language' => 'en',
                'options' => ['placeholder' => '--Select--'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]);
            ?>
            <label onclick="jQuery('#modal-5').modal('show', {backdrop: 'fade'});" class="product-fields-add add_brand"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Brand</label>
        </div>

    </div>
    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'gender_type')->dropDownList(['' => '--Select--', '0' => 'Men', '1' => 'Women', '2' => 'Unisex', '3' => 'Oriental']) ?>
        </div>

        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'ean_value')->textInput(['maxlength' => true]) ?>
        </div>

        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'barcode')->textInput(['maxlength' => true]) ?>
        </div>

    </div>
    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'barcode_price')->textInput(['type' => 'number', 'min' => '0', 'autocomplete' => 'off', 'step' => 'any']) ?>
        </div>

        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'price')->textInput(['type' => 'number', 'min' => '0', 'autocomplete' => 'off', 'step' => 'any']) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'offer_price')->textInput(['type' => 'number', 'min' => '0', 'autocomplete' => 'off', 'step' => 'any']) ?>
        </div>


    </div>
    <div class="row">



        <!--        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
        <?php
        $currency = ArrayHelper::map(Currency::find()->all(), 'id', 'currency_name');
        echo $form->field($model, 'currency')->widget(Select2::classname(), [
            'data' => $currency,
            'language' => 'en',
            'options' => ['placeholder' => '--Select--'],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]);
        ?>
        
                </div>-->



        <!--        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
        <?php
        $units = ArrayHelper::map(Unit::find()->all(), 'id', 'unit_name');
        echo $form->field($model, 'stock_unit')->widget(Select2::classname(), [
            'data' => $units,
            'language' => 'en',
            'options' => ['placeholder' => '--Select--'],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]);
        ?>
                </div>-->

    </div>
    <div class="row">

        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?php
            if (!$model->isNewRecord) {
                if (isset($model->offer_price_expiry_date) && $model->offer_price_expiry_date != '')
                    $model->offer_price_expiry_date = date('d-m-Y', strtotime($model->offer_price_expiry_date));
            }
            ?>
            <?=
            $form->field($model, 'offer_price_expiry_date')->widget(DatePicker::classname(), [
                'type' => DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy',
                    'todayHighlight' => true,
                ]
            ]);
            ?>
        </div>

        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'stock')->textInput() ?>
        </div>

        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'stock_availability')->dropDownList(['1' => 'Available', '0' => 'Not Available']) ?>
        </div>

        <!--        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
        <?php
        $tax = ArrayHelper::map(Tax::find()->all(), 'id', 'name');
        echo $form->field($model, 'tax')->widget(Select2::classname(), [
            'data' => $tax,
            'language' => 'en',
            'options' => ['placeholder' => '--Select--'],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]);
        ?>
                </div>-->


    </div>
    <div class="row">

        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'free_shipping')->dropDownList(['1' => 'Yes', '0' => 'No'], ['prompt' => 'Select']) ?>
        </div>

        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?php
            $fragrance = ArrayHelper::map(Fregrance::find()->all(), 'id', 'name');
            echo $form->field($model, 'product_type')->widget(Select2::classname(), [
                'data' => $fragrance,
                'language' => 'en',
                'options' => ['placeholder' => '--Select--'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]);
            ?>
        </div>

        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'size')->textInput() ?>
        </div>


    </div>
    <div class="row">

        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?php
            $size_unit = ArrayHelper::map(Unit::find()->all(), 'id', 'unit_name');
            echo $form->field($model, 'size_unit')->widget(Select2::classname(), [
                'data' => $size_unit,
                'language' => 'en',
                'options' => ['placeholder' => '--Select--'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]);
            ?>
        </div>

        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?php
            if (!$model->isNewRecord) {
                if (isset($model->search_tag)) {
                    $model->search_tag = explode(',', $model->search_tag);
                }
            }

            $search_tag = ArrayHelper::map(MasterSearchTag::find()->all(), 'id', 'tag_name');
            echo $form->field($model, 'search_tag')->widget(Select2::classname(), [
                'data' => $search_tag,
                'language' => 'en',
                'options' => ['placeholder' => '--Select--'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'multiple' => true
                ],
            ]);
            ?>
            <label onclick="jQuery('#modal-4').modal('show', {backdrop: 'fade'});" class="product-fields-add add_tag"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Tag</label>
        </div>

        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'vmiles')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">

        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'status')->dropDownList(['1' => 'Enable', '0' => 'Disable']) ?>
        </div>
    </div>
    <div class="row">
        <div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
            <?=
            $form->field($model, 'product_detail')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'custom'
            ])
            ?>
        </div>
    </div>

    <div class="row">
        <div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
            <?=
            $form->field($model, 'product_detail_ar')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'custom'
            ])
            ?>
        </div>
    </div>
    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-8 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'meta_description')->textarea(['rows' => 6]) ?>
        </div>
        <div class='col-md-12 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'meta_keywords')->textarea(['rows' => 6]) ?>
        </div>
    </div>

    <div class="row product-gallery">
        <?php
        if (!$model->isNewRecord) {
            ?>
            <div class="col-md-2 img-box" >
                <div class="gallery-img">
                    <img src="<?= Yii::$app->homeUrl . '../uploads/product/' . $model->id . '/profile/' . $model->canonical_name . '_thumb.' . $model->profile ?>"  width="100">
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>

            <?= $form->field($model, 'profile')->fileInput()->label('Profile Picture<i> (1080*1080)</i>') ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'profile_alt')->textInput(['maxlength' => true]) ?>
        </div>
    </div>


    <div class="row product-gallery">
        <?php
        $path = Yii::getAlias('@paths') . '/product/' . $model->id . '/gallery';
        if (count(glob("{$path}/*")) > 0) {

            $k = 0;
            foreach (glob("{$path}/*") as $file) {
                $k++;
                $arry = explode('/', $file);
                $img_nmee = end($arry);
                $img_nmees = explode('.', $img_nmee);
                if ($img_nmees['1'] != '') {
                    ?>

                    <div class = "col-md-2 img-box" id="<?= $k; ?>">
                        <div class="gallery-img">
                            <img class="img-responsive" src="<?= Yii::$app->homeUrl . '../uploads/product/' . $model->id . '/gallery/' . end($arry) ?>" width="100">
                            <?= Html::a('<i class="fa fa-remove"></i>', ['#', 'file' => end($arry), 'id' => $model->id], ['class' => 'img-remove product_image', 'id' => $model->id . '@' . $img_nmee . '@' . $k]) ?>
                        </div>
                    </div>


                    <?php
                }
            }
        }
        ?>
    </div>

    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'other_image[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])->label('Gallery Images<i> (1080*1080)</i>') ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'gallery_alt')->textInput(['maxlength' => true]) ?>
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

<!-------------------------------------------------------Category Popup------------------------------------------------>
<div class="modal fade" id="modal-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"  field_id="product-category">Add Category</h4>
            </div>

            <div class="modal-body">
                <?php $form = ActiveForm::begin(['id' => 'add_category']); ?>
                <div class='col-md-12 col-sm-6 col-xs-12 left_padd'>
                    <div class="form-group field-category-category required">
                        <label class="control-label" for="category-category" style="margin-bottom:10px">Category</label>
                        <input type="text" id="category-category" class="form-control" name="Category[category]" maxlength="255" aria-required="true" required="">
                    </div>
                </div>

                <div class='col-md-12 col-sm-6 col-xs-12 left_padd'>
                    <div class="form-group field-category-category_ar required">
                        <label class="control-label" for="category-category_ar" style="margin-bottom:10px">Category (Arabic)</label>
                        <input type="text" id="category-category_ar" class="form-control" name="Category[category_ar]" maxlength="255" aria-required="true" aria-invalid="true" required="">
                    </div>
                </div>

                <div class='col-md-12 col-sm-6 col-xs-12 left_padd'>
                    <div class="form-group field-category-category_code required ">
                        <label class="control-label" for="category-category_code" style="margin-bottom:10px">Category Code</label>
                        <input type="text" id="category-category_code" class="form-control" name="Category[category_code]" readonly="" maxlength="100" aria-required="true" aria-invalid="true" required="">
                    </div>
                </div>  

                <div class='col-md-12 col-sm-6 col-xs-12 left_padd'>
                    <div class="form-group" style="float: right;">
                        <?= Html::submitButton('Create', ['class' => 'btn btn-success', 'style' => 'margin-top: 18px; height: 36px; width:100px;']) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>

            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-------------------------------------------------------------------------------------------------------------------->

<!-------------------------------------------------------Brand Popup-------------------------------------------------->
<div class="modal fade" id="modal-5">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title5"  field_id="product-brand">Add Brand</h4>
            </div>

            <div class="modal-body">
                <?php $form = ActiveForm::begin(['id' => 'add_brand']); ?>
                <div class='col-md-12 col-sm-6 col-xs-12 left_padd'>
                    <div class="form-group field-brand-brand required ">
                        <label class="control-label" for="brand-brand" style="margin-bottom:10px">Brand</label>
                        <input type="text" id="brand-brand" class="form-control" name="Brand[brand]" maxlength="200" aria-required="true" aria-invalid="true" required="">
                    </div>
                </div>

                <div class='col-md-12 col-sm-6 col-xs-12 left_padd'>
                    <div class="form-group field-brand-brand_ar required ">
                        <label class="control-label" for="brand-brand_ar" style="margin-bottom:10px">Brand (Arabic)</label>
                        <input type="text" id="brand-brand_ar" class="form-control" name="Brand[brand_ar]" maxlength="200" aria-required="true" aria-invalid="true" required="">
                    </div>
                </div>
                <div class='col-md-12 col-sm-6 col-xs-12 left_padd'>
                    <div class="form-group" style="float: right;">
                        <?= Html::submitButton('Create', ['class' => 'btn btn-success', 'style' => 'margin-top: 18px; height: 36px; width:100px;']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>

            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-------------------------------------------------------Search Tag Popup-------------------------------------------------->
<div class="modal fade" id="modal-4">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title4"  field_id="product-search_tag">Add Search Tag</h4>
            </div>
            <div class="modal-body">
                <?php $form = ActiveForm::begin(['id' => 'add_searchtag']); ?>
                <div class='col-md-12 col-sm-6 col-xs-12 left_padd'>
                    <div class="form-group field-mastersearchtag-tag_name required">
                        <label class="control-label" for="mastersearchtag-tag_name" style="margin-bottom:10px">Tag Name</label>
                        <input type="text" id="mastersearchtag-tag_name" class="form-control" name="MasterSearchTag[tag_name]" maxlength="255" aria-required="true" aria-invalid="true" required="">
                    </div>
                </div>
                <div class='col-md-12 col-sm-6 col-xs-12 left_padd'>
                    <div class="form-group field-mastersearchtag-tag_name required">
                        <label class="control-label" for="mastersearchtag-tag_name" style="margin-bottom:10px">Tag Name (Arabic)</label>
                        <input type="text" id="mastersearchtag-tag_name_ar" class="form-control" name="MasterSearchTag[tag_name_ar]" maxlength="255" aria-required="true" aria-invalid="true" required="">
                    </div>
                </div>
                <div class="form-group" style="float: right;">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-success', 'style' => 'margin-top: 18px; height: 36px; width:100px;']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
