<?php

use yii\helpers\Html;
use common\models\Product;
use yii\widgets\Pjax;

if (isset($meta_title) && $meta_title != '')
    $this->title = $meta_title;
else
    $this->title = 'Shopping Cart';
?>

<div id="cart-page" class="inner-page">
    <?php Pjax::begin(['id' => 'shopping_cart_id']) ?>
    <section id="cart-list">
        <div class="container">
            <div class="cart-box">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-7 cart-item-list">
                            <div class="list-header">
                                Shopping Cart items
                            </div>
                            <input type="hidden" id="cart_count" value="<?= count($cart_items); ?>">
                            <?php
                            foreach ($cart_items as $cart_item) {
                                if ($cart_item->quantity > 0) {
                                    $cart_item_count++;
                                }
                                $prod_details = Product::find()->where(['id' => $cart_item->product_id, 'status' => '1'])->one();
                                if ($prod_details->offer_price == '0' || $prod_details->offer_price == '') {
                                    $price = $prod_details->price;
                                } else {
                                    $price = $prod_details->offer_price;
                                }
                                $product_image = Yii::$app->basePath . '/../uploads/product/' . $prod_details->id . '/profile/' . $prod_details->canonical_name . '_thumb.' . $prod_details->profile;
                                if (file_exists($product_image)) {
                                    $image = '<img src="' . Yii::$app->homeUrl . 'uploads/product/' . $prod_details->id . '/profile/' . $prod_details->canonical_name . '_thumb.' . $prod_details->profile . '" alt="' . $prod_details->canonical_name . '" class="img-fluid" width="150"/>';
                                } else {
                                    $image = '<img src="' . Yii::$app->homeUrl . 'uploads/product/dummy_perfume.png" alt="' . $prod_details->canonical_name . '" class="img-fluid" width="150"/>';
                                }
                                ?>
                                <div class="cart-list tr_<?= yii::$app->EncryptDecrypt->Encrypt('encrypt', $cart_item->id); ?> <?= $cart_item->quantity == 0 ? 'stock-out-row' : '' ?>">
                                    <a href="" class="remove_cart remove-cart" data-product_id="<?= yii::$app->EncryptDecrypt->Encrypt('encrypt', $cart_item->id); ?>" ><img src="<?= Yii::$app->homeUrl ?>images/icons/remove.png" class="img-fluid" /></a>
                                    <?= Html::a($image, ['product/product-detail', 'product' => $prod_details->canonical_name], ['title' => $prod_details->product_name, 'class' => 'thumbnail pull-left']) ?>
                                    <div class="list-dtl">
                                        <?= Html::a($prod_details->product_name, ['product/product-detail', 'product' => $prod_details->canonical_name], ['title' => $prod_details->product_name, 'class' => 'title']) ?>
                                        <ul>
                                            <?php if ($cart_item->quantity == 0) { ?>
                                                <li class="out_of_stock_label">Out of stock</li>
                                            <?php } else { ?>
                                                <li class="price">Price: <span>AED <?= sprintf("%0.2f", $price) ?></span></li>
                                            <?php }
                                            ?>
                                            <li class="qty">QTY:
                                                <span>
                                                    <div class="form-group quantity">
                                                        <select class="form-control cart_quantity" id="quantity_<?= yii::$app->EncryptDecrypt->Encrypt('encrypt', $cart_item->id); ?>" name="Quantity">
                                                            <?php if ($cart_item->quantity == 0) { ?>
                                                                <option <?= $cart_item->quantity == 0 ? 'selected' : '' ?> value="0">0</option>
                                                            <?php }
                                                            ?>
                                                            <?php
                                                            for ($i = 1; $i <= $prod_details->stock; $i++) {
                                                                ?>
                                                                <option <?= $cart_item->quantity == $i ? 'selected' : '' ?> value="<?= $i ?>"><?= $i ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>   
                                                    </div>
                                                </span>
                                            </li>
                                        </ul>
                                        <div class="list-footer">
                                            <?php $total = $price * $cart_item->quantity; ?>
                                            <div class="total-price">Total: <span id="total_<?= yii::$app->EncryptDecrypt->Encrypt('encrypt', $cart_item->id) ?>">AED <?= sprintf("%0.2f", $total) ?></span></div>
                                        </div>
                                    </div>
                                </div>  
                            <?php } ?>
                        </div>
                        <div class="col-lg-5 cart-main-info">
                            <div class="clearfix"></div>

                            <div class="total-price-section">
                                <div class="fright">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4 class="price-head">Subtotal:<span class="cart_subtotal">AED <?= sprintf("%0.2f", $subtotal) ?></span></h4>
                                            <?php $shipping_minimum = common\models\Settings::findOne(1)->value; ?>
                                            <span class="min_ship_amount" style="display:none"><?= $shipping_minimum ?></span>
                                            <?php
                                            $balance = '';
                                            if ($shipping_minimum > $subtotal) {
                                                $balance = $shipping_minimum - $subtotal;
                                                $shipping = common\models\Settings::findOne(2)->value;
                                                $class = '';
                                            } else {
                                                $class = 'hide';
                                                $shipping='0.00';
                                            }
                                            ?>
                                            <h4 class="price-head ">SHIPPING:<span class="amount shipping-cost">AED <?= sprintf("%0.2f", $shipping) ?></span></h4>
                                            <h4 class="price-head">GIFT WRAP:<span><input type="checkbox" name="gift-wrap" id="gift-wrap" class="gift-wrap"></span></h4>
                                        </div>
                                    </div>
                                    <div class="total-price">
                                        <h4 class="price-head ">TOTAL:<span class="grand_total">AED <?= sprintf("%0.2f", $grand_total) ?></span></h4>
                                        <input type="hidden" class="grand_total_value" value="<?= $grand_total ?>">
                                        <input type="hidden" name="subb_total" id="subb_total" value="<?= $subtotal ?>">
                                    </div>
                                    <div class="payment-optns">
                                        <p>Ways you can pay</p>
                                        <ul>
                                            <li><img src="<?= Yii::$app->homeUrl ?>images/icons/payment-optns1.png" class="img-fluid"></li>
                                        </ul>
                                    </div>
                                    <div class="button-section ">
                                        <?php if (empty(Yii::$app->user->identity)) { ?>
                                            <?= Html::a('Login to Checkout', ['/site/login', 'go' => Yii::$app->request->hostInfo . Yii::$app->request->url], ['class' => 'check-out']) ?>
                                            <?php
                                        } else {
                                            if ($cart_item_count > 0) {
                                                ?>
                                                <?= Html::a('Checkout', ['/cart/proceed'], ['class' => 'check-out']) ?>     
                                            <?php } else { ?>
                                                <?= Html::a('continue shopping', ['/site/index'], ['class' => 'check-out']) ?>
                                                <?php
                                            }
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php Pjax::end() ?>
    <?php $giftwrap = \common\models\Settings::findOne(5)->value; ?>
    <span class="giftwrap_value" style="display:none"><?= $giftwrap ?></span>
</div>



<script>
    $(document).ready(function () {
        $('.gift-wrap').change(function () {
            var id = $(this).attr('id');
            var giftwrap = $('.giftwrap_value').html();
            var ship_charge_gift = $('.min_ship_amount').html();
            var grand = $('.grand_total_value').val();
            if ($("#" + id).prop('checked') == true) {
                $('.gift-wrap').prop('checked', true);
                var value = 1;
            } else {
                $('.gift-wrap').prop('checked', false);
                var value = 0;
            }

            var subtotal = $('#subb_total').val();
            jQuery.ajax({
                url: homeUrl + 'cart/set-gift-wrap',
                type: "post",
                data: {value: value},
                success: function (data) {
                    if (data === '1') {
                        var result = parseFloat(subtotal) + parseFloat(giftwrap);
                        var grand_total = parseFloat(grand) + parseFloat(giftwrap);
                        $('.gift_wrapp').val(1);
                        $('#subb_total').val(result);
                        $('.grand_total').html('AED ' + grand_total.toFixed(2));
                        $('.grand_total_value').val(grand_total);

                    } else {
                        var result = subtotal - parseFloat(giftwrap);
                        var grand_total = parseFloat(grand) - parseFloat(giftwrap);
                        $('.gift_wrapp').val(0);
                        $('#subb_total').val(result);
                        $('.grand_total').html('AED ' + grand_total.toFixed(2));
                        $('.grand_total_value').val(grand_total);
                    }

                }, error: function () {
                }
            });
        });
    });

</script>