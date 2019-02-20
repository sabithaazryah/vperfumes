<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\Category;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body product-listing">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= Html::a('<i class="fa fa-list"></i><span> Create Product</span>', ['create'], ['class' => 'btn btn-block btn-info btn-sm']) ?>
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute' => 'profile',
                                'headerOptions' => ['style' => 'width:14%'],
                                'header' => 'Image',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    if (!empty($data->profile))
                                        $img = '<img src="' . Yii::$app->homeUrl . '../uploads/product/' . $data->id . '/profile/' . $data->canonical_name . '_thumb.' . $data->profile . '" width="100"/>';
                                    else
                                        $img = '<img src="' . Yii::$app->homeUrl . '../uploads/product/profile_thumb.png"/>';
                                    return $img;
                                },
                            ],
                            'product_name',
                            [
                                'attribute' => 'main_category',
                                'filter' => ArrayHelper::map(\common\models\MainCategory::find()->orderBy(['sort_order' => SORT_ASC])->all(), 'id', 'main_category'),
                                'value' => function($data) {
                                    if ($data->main_category != '') {
                                        return \common\models\MainCategory::findOne($data->main_category)->main_category;
                                    } else {
                                        return '';
                                    }
                                }
                            ],
                           [
                                    'attribute' => 'category',
                                    'filter' => ArrayHelper::map(Category::find()->orderBy(['category' => SORT_ASC])->all(), 'id', 'category'),
                                    'value' => function($data) {
                                        if ($data->category != '') {
                                            return Category::findOne($data->category)->category;
                                        } else {
                                            return '';
                                        }
                                    }
                                ],
                                        [
                                    'attribute' => 'price',
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        return \yii\helpers\Html::textInput('price', $data->price, ['class' => 'form-control product_form', 'id' => 'product_price_' . $data->id]);
                                    },
                                ],
                                [
                                    'attribute' => 'offer_price',
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        return \yii\helpers\Html::textInput('offer_price', $data->offer_price, ['class' => 'form-control product_form', 'id' => 'product_offerprice_' . $data->id])
                                                . '<label id="offer_price_' . $data->id . '" style="color:#cc3f44"class="hide">Offer price must be less than price</label>';
                                    },
                                ],
                                [
                                    'attribute' => 'stock',
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        return \yii\helpers\Html::textInput('stock', $data->stock, ['class' => 'form-control product_form', 'id' => 'product_stock_' . $data->id]);
                                    },
                                ],
                            // 'canonical_name',
                            // 'meta_title',
                            // 'meta_description:ntext',
                            // 'meta_keywords:ntext',
                            // 'search_tag',
                            // 'item_ean',
                            // 'brand',
                            // 'ean_type',
                            // 'ean_value',
                            // 'gender_type',
                            // 'price',
                            // 'offer_price',
                            // 'discount',
                            // 'currency',
                            // 'stock',
                            // 'stock_unit',
                            // 'stock_availability',
                            // 'tax',
                            // 'free_shipping',
                            // 'product_type',
                            // 'size',
                            // 'size_unit',
                            // 'main_description:ntext',
                            // 'product_detail:ntext',
                            // 'condition',
                            // 'CB',
                            // 'UB',
                            // 'DOC',
                            // 'DOU',
                            // 'status',
                            // 'profile',
                            // 'profile_alt',
                            // 'gallery_alt',
                            // 'other_image',
                            // 'related_product',
                            // 'featured_product',
                            // 'sort',
                            ['class' => 'yii\grid\ActionColumn',
                                'template'=>'{update}{delete}'],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $(".filters").slideToggle();
        $("#search-option").click(function () {
            $(".filters").slideToggle();
        });
        $('.product_form').on('change', function () {
            var change = $(this).attr('id');
            var res = change.split("_");
            var price = parseInt($('#product_price_' + res['2']).val());
            var offerprice = $('#product_offerprice_' + res['2']).val();
            if (offerprice) {
                offerprice = parseInt(offerprice);
            }
            var stock = $('#product_stock_' + res['2']).val();
            var availablity = $('#product_stockavailable_' + res['2']).val();
            var featured = $('#product_featuredproduct_' + res['2']).val();
            var sort = $('#product_sort_' + res['2']).val();
            var id = res['2'];
            if (price > '0' && offerprice >= '0') {
                if (price > offerprice) {
                    $('#offer_price_' + res['2']).addClass('hide');
                    $.ajax({
                        url: homeUrl + 'product/product/ajaxchange_product',
                        type: "post",
                        data: {price: price, offerprice: offerprice, stock: stock, availablity: availablity, id: id, featured: featured, sort: sort},
                        success: function (data) {
                            var $data = JSON.parse(data);
                            if ($data.msg === "success") {
                                alert($data.title);
                            } else {
                                alert($data.title);
                            }
//
                        }, error: function () {
//
                        }
                    });
                } else {
                    $('#offer_price_' + res['2']).removeClass('hide');
                }
            }
        });
    });
</script>