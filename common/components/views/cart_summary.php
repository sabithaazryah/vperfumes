<?php

use yii\helpers\Html;
use common\models\Product;
use common\models\Fregrance;
use common\models\OrderMaster;
use common\models\Settings;
use common\models\Tax;
?>


<div class="cart-main-info">

    <?php
    $tax_amount = 0;
    $sub_total = 0;
    foreach ($cart_items as $cart) {
        $product = Product::findOne($cart->product_id);
        if ($cart->quantity > 0) {
            $product_image = Yii::$app->basePath . '/../uploads/product/' . $product->id . '/profile/' . $product->canonical_name . '.' . $product->profile;
            if (file_exists($product_image)) {
                $image = Yii::$app->homeUrl . 'uploads/product/' . $product->id . '/profile/' . $product->canonical_name . '.' . $product->profile;
            } else {
                $image = Yii::$app->homeUrl . 'uploads/product/profile_thumb.png';
            }
            if ($product->offer_price == '0' || $product->offer_price == '') {
                $price = $product->price;
            } else {
                $price = $product->offer_price;
            }
            $total = $price * $cart->quantity;
            if ($cart->tax != '') {
                $tax = $cart->tax;
            }
            $tax_amount += $tax;
            $sub_total += $total;
            ?>


            <div class="item-box">
                <div class="cart-list">
                    <a class="thumbnail pull-left" href="#!">
                        <img src="<?= $image ?>" class="img-fluid" alt="<?= $product->product_name ?>" width="150">
                    </a>
                    <div class="list-dtl">
                        <a href="#!" class="title"><?= $product->product_name ?></a>
                        <ul>
                            <li class="price">Price: <span>AED <?= sprintf("%0.2f", $total) ?></span></li>
                            <li class="qty">Quantity: <span><?= $cart->quantity ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <?php
        }
    }
    ?>
    <div class="cart-promotion">
        <div class="coupon">
            <div class="apply-promotion-code">
                <div class="coupon-info">Unlock Offers or Apply promotion</div>
                <div class="code-form">
                    <input type="text" name="coupon_code" class="input-text " id="coupon_code" value="" placeholder="Coupon code"> 
                </div>
                <input type="submit" class="apply-coupen " name="apply_coupon" value="Apply">
                <p id="coupon-code-error" style="text-align:left;margin-top:5px;"></p>
                <input type="hidden" id="promotion-codes" name="promotion_codes" value="">
                <input type="hidden" id="promotion-code-amount" name="promotion-code-amount" value="">
            </div>
        </div>
      
    </div>
    <div class="clearfix"></div>

    <div class="total-price-section">
        <div class="fright">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="price-head">Subtotal:<span class="cart_subtotal">AED <?= sprintf("%0.2f", $sub_total) ?></span>
                    </h4>
                    <h4 class="price-head ">SHIPPING:<span class="amount shipping-cost">AED <?= sprintf("%0.2f", $shipping) ?></span></h4>
                    <?php
                    $gift_wrap = 0;
                    if ($master->gift_wrap == 1) {
                        $gift_wrap = $master->gift_wrap_value;
                        ?>
                        <h4 class="price-head">GIFT WRAP:<span>AED <?= sprintf("%0.2f", $gift_wrap) ?></span></h4>
                    <?php } ?>
                    <h4 class="price-head">Tax:<span>AED <?= sprintf("%0.2f", $tax_amount) ?></span></h4>
                </div>
            </div>
            <div class="total-price">
                <h4 class="price-head ">TOTAL:<span class="grand_total">AED <?= sprintf("%0.2f", $master->net_amount) ?></span></h4>
            </div>
            <div class="payment-optns">
                <p>Ways you can pay</p>
                <ul>
                    <li><img src="<?= Yii::$app->homeUrl ?>images/icons/payment-optns1.png" class="img-fluid"></li>
                </ul>
            </div>
        </div>
    </div>
</div>