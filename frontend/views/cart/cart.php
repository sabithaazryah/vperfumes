<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Product;
use common\models\User;

if (isset($meta_title) && $meta_title != '')
    $this->title = $meta_title;
else
    $this->title = 'Shopping Cart';
?>

<div id="cart-page" class="inner-page">

    <section id="cart-list">
        <div class="container">
            <div class="cart-box">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-7 cart-item-list">
                            <div class="list-header">
                                Shopping Cart items
                            </div>
                            <div class="cart-list">
                                <a href="" class="remove_cart remove-cart"><img src="<?= Yii::$app->homeUrl?>images/icons/remove.png"
                                        class="img-fluid" /></a>
                                <a class="thumbnail pull-left" href="#!">
                                    <img src="<?= Yii::$app->homeUrl?>images/products/pro1-thumb.png" class="img-fluid"
                                        alt="Ck Euphoria Men Edt 100Ml" width="150">
                                </a>
                                <div class="list-dtl">
                                    <a href="#!" class="title">Ck Euphoria Men Edt 100Ml</a>
                                    <ul>
                                        <li class="price">Price: <span>AED 380</span></li>
                                        <li class="qty">QTY:
                                            <span>
                                                <div class="form-group quantity">
                                                    <select class="form-control " id="" name="Quantity">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                </div>
                                            </span>
                                        </li>
                                    </ul>
                                    <div class="list-footer">
                                        <div class="total-price">Total: <span>AED 380</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-list">
                                <a href="" class="remove_cart remove-cart"><img src="<?= Yii::$app->homeUrl?>images/icons/remove.png"
                                        class="img-fluid" /></a>
                                <a class="thumbnail pull-left" href="#!">
                                    <img src="<?= Yii::$app->homeUrl?>images/products/pro1-thumb.png" class="img-fluid"
                                        alt="Ck Euphoria Men Edt 100Ml" width="150">
                                </a>
                                <div class="list-dtl">
                                    <a href="#!" class="title">Ck Euphoria Men Edt 100Ml</a>
                                    <ul>
                                        <li class="price">Price: <span>AED 380</span></li>
                                        <li class="qty">QTY:
                                            <span>
                                                <div class="form-group quantity">
                                                    <select class="form-control " id="" name="Quantity">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                </div>
                                            </span>
                                        </li>
                                    </ul>
                                    <div class="list-footer">
                                        <div class="total-price">Total: <span>AED 380</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 cart-main-info">
                            <!-- <div class="cart-promotion">
                                <div class="coupon">
                                    <div class="apply-promotion-code">
                                        <div class="coupon-info">Unlock Offers or Apply promotion</div>
                                        <div class="code-form"><input type="text" name="coupon_code" class="input-text"
                                                id="coupon_code" value="" placeholder="Coupon code"> </div>
                                        <input type="submit" class="apply-coupen" name="apply_coupon" value="Apply">
                                    </div>
                                </div>
                            </div> -->
                            <div class="clearfix"></div>

                            <div class="total-price-section">
                                <div class="fright">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4 class="price-head">Subtotal:<span class="cart_subtotal">AED
                                                    371.00</span>
                                            </h4>
                                            <h4 class="price-head ">SHIPPING:<span class="amount shipping-cost">AED
                                                    0.00</span></h4>
                                            <h4 class="price-head">GIFT WRAP:<span><input type="checkbox"
                                                        name="gift-wrap" id="gift-wrap" class="gift-wrap"></span></h4>
                                        </div>
                                    </div>
                                    <div class="total-price">
                                        <h4 class="price-head ">TOTAL:<span class="grand_total">AED 371.00</span></h4>
                                    </div>
                                    <div class="payment-optns">
                                        <p>Ways you can pay</p>
                                        <ul>
                                            <li><img src="<?= Yii::$app->homeUrl?>images/icons/payment-optns1.png" class="img-fluid"></li>
                                        </ul>
                                    </div>
                                    <div class="button-section ">
                                        <a class="check-out" href="checkout.php">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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