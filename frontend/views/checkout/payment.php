<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\CartSummaryWidget;
use common\models\Emirates;
use yii\helpers\ArrayHelper;
use common\models\UserAddress;

$this->title = 'Checkout';
?>

<div id="cart-page" class="inner-page checkout-page payment-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 order1">
                <div class="checkout-step">
                    <div class="step-header correct">
                        <div class="title">Delivery address</div>
                        <div class="info">You have a saved address in this location</div>
                    </div>
                    <div class="box-rack">
                        <div class="box">
                            <?= Html::a('Change', ['checkout'], ['class' => 'change']) ?>
                            <div class="box-inner">
                                <div class="icon-div">
                                    <span class="icon-location"></span>
                                </div>
                                <div class="address">
                                    <div class="title">Address</div>
                                    <p>
                                        <?php if (isset($selected_billing_address) && $selected_billing_address != '') { ?>
                                            <?= $selected_billing_address->address . ',' ?><br>
                                            <?= $selected_billing_address->landmark . ',' ?><br>
                                            <?= $selected_billing_address->location . ',' ?><br>
                                            <?php $emirate = Emirates::findOne($selected_billing_address->emirate) ?>
                                            <?= $emirate->name . ',' ?><br>
                                        <?php }
                                        ?>

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="track-line line-ash"></div>
                    <div class="step-icon">
                        <span class="step-count">01</span>
                    </div>
                </div>
                <?php $form = ActiveForm::begin(); ?>
                <div class="checkout-step">
                    <div class="step-header">
                        <div class="title">Payment</div>
                        <div class="info">Select a Payment Method</div>
                    </div>
                    <div class="payment-method">
                        <div class="options">
                            <label class="input-style-box">
                                <input name="payment_type" checked="" type="radio" value="1">
                                <span class="checkmark"></span> 
                                <img src="<?= Yii::$app->homeUrl ?>images/icons/cod-pay.png" class="img-fluid">
                            </label>
                            <div class="cod">
                                <div class="title">Cash On Delivery</div>
                                <div class="info">Lorem Ipsum is simply dummy text of the printing</div>
                            </div>
                        </div>

                        <div class="options">
                            <label class="input-style-box">
                                <input name="payment_type" type="radio" value="2">
                                <span class="checkmark"></span> 
                                <img src="<?= Yii::$app->homeUrl ?>images/icons/master-pay.png" class="img-fluid"> 
                                <img src="<?= Yii::$app->homeUrl ?>images/icons/visa-pay.png" class="img-fluid">
                            </label>
                            <div class="cod">
                                <div class="title">Payment Gateway</div>
                                <div class="info">Lorem Ipsum is simply dummy text of the printing</div>
                            </div>
                        </div>

                        <div class="terms-warning">By continuing to checkout you agree to our <a href="#!">Terms and
                                Conditions</a></div>
                        <?= Html::submitButton('Confirm Order', ['class' => 'confirm-order', 'style' => 'border:none']) ?>
                    </div>
                    <!-- <div class="track-line line-ash"></div> -->
                    <div class="step-icon">
                        <span class="step-count">02</span>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="col-lg-5 order0">
                <div class="cart-main-info">
                    <div class="item-box">
                        <div class="cart-list">
                            <a class="thumbnail pull-left" href="#!">
                                <img src="<?= Yii::$app->homeUrl ?>images/products/pro1-thumb.png" class="img-fluid"
                                     alt="Ck Euphoria Men Edt 100Ml" width="150">
                            </a>
                            <div class="list-dtl">
                                <a href="#!" class="title">Ck Euphoria Men Edt 100Ml</a>
                                <ul>
                                    <li class="price">Price: <span>AED 380</span></li>
                                    <li class="qty">Quantity: <span>1</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="cart-promotion">
                        <div class="coupon">
                            <div class="apply-promotion-code">
                                <div class="coupon-info">Unlock Offers or Apply promotion</div>
                                <div class="code-form"><input type="text" name="coupon_code" class="input-text"
                                                              id="coupon_code" value="" placeholder="Coupon code"> </div>
                                <input type="submit" class="apply-coupen" name="apply_coupon" value="Apply">
                            </div>
                        </div>
                    </div>
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
                                    <h4 class="price-head">GIFT WRAP:<span>AED1.00</span></h4>
                                    <h4 class="price-head">Tax:<span>AED15.00</span></h4>
                                </div>
                            </div>
                            <div class="total-price">
                                <h4 class="price-head ">TOTAL:<span class="grand_total">AED 371.00</span></h4>
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
            </div>
        </div>
    </div>
</div>