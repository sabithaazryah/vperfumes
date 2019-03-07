<?php

use yii\helpers\Html;

$product = \common\models\Product::findOne($model->product);
?>
<div class="wish-list-product">
    <div class="remove-button"><a href="#" class="link"></a></div>
    <div class="row">
        <div class="col-sm-3">
            <div class="product-img"><img src="<?= Yii::$app->homeUrl ?>images/products/pro1-thumb.png" width="130" ></div>
        </div>
        <div class="col-sm-9">
            <div class="cont"> <a href="#" class="head">Victoria's Secret Temptation fragrance mist 250 ML</a>
                <ul>
                    <li><span>AED 501.00</span></li>
                    <li class="price">AED 501.00</li>
                    <li><a href="#" class="add-to-cart">Add to cart</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<style>
    .summary{
        display: none;
    }
</style>