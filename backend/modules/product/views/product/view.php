<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


            </div>
            <div class="panel-body">

                <div class="panel-body"><div class="product-view">
                        <p>
                            <?= Html::a('<i class="fa fa-list"></i><span> Manage Product</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

                        </p>

                        <?=
                        DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'main_category',
                                'category',
                                'product_name',
                                'canonical_name',
                                'meta_title',
                                'meta_description:ntext',
                                'meta_keywords:ntext',
                                'search_tag',
                                'item_ean',
                                'brand',
                                'ean_type',
                                'ean_value',
                                'gender_type',
                                'price',
                                'offer_price',
                                'discount',
                                'currency',
                                'stock',
                                'stock_unit',
                                'stock_availability',
                                'tax',
                                'free_shipping',
                                'product_type',
                                'size',
                                'size_unit',
                                'main_description:ntext',
                                'product_detail:ntext',
                                'condition',
                                'CB',
                                'UB',
                                'DOC',
                                'DOU',
                                'status',
                                'profile',
                                'profile_alt',
                                'gallery_alt',
                                'other_image',
                                'related_product',
                                'featured_product',
                                'sort',
                            ],
                        ])
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


