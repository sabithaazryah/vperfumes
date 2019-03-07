<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\ListView;
use common\components\EmptyDataWidget;
?>
<div id="My-account-page" class="inner-page">
    <div class="top-margin"></div>
    <section class="in-account-pages-section"><!--in-account-pages-section-->
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                     <?= \common\components\MyAccountMenuWidget::widget() ?>
                </div>
                <div class="col-lg-9">
                    <div class="in-track-your-orders">
                        <div class="head-main-box">
                            <h3 class="head">Track Your Orders</h3>
                        </div>
                        <div class="orders-main-box">
                            <div class="orders-top-section">
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul>
                                            <li class="list">Order placed on:<b> 23 July 2018</b></li>
                                            <li class="list">Order ID: #1005010011018</li>
                                            <li class="list"> <a href="order-details.php" class="link">Order details</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul>
                                            <li class="list">Recipient: Reeba Varghese</li>
                                            <li class="list">Payment method: Credit or Debit Cards</li>
                                            <li class="list">Total: <b>103.74  AED</b></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="order-shipment">
                                <h2 class="sub-head">SHIPMENT 1 OF 1</h2>
                                <div class="order-tracker-box">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="no-box">01</div>
                                            <h4 class="text-box">Ready for Shipping</h4>
                                        </div>
                                        <div class="col-4">
                                            <div class="no-box">02</div>
                                            <h4 class="text-box">Out for delivery</h4>
                                        </div>
                                        <div class="col-4">
                                            <div class="no-box active">03</div>
                                            <h4 class="text-box">Delivered</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-shipment-product">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="product-img"><img src="<?= Yii::$app->homeUrl?>images/products/pro1-thumb.png"></div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="cont">
                                            <h3 class="head">Victoria's Secret Temptation fragrance mist 250 ML</h3>
                                            <ul>
                                                <li>Shipped by: Wing</li>
                                                <li>Condition: New</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="order-shipment-product">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="product-img"><img src="<?= Yii::$app->homeUrl?>images/products//pro2-thumb.png" width="130" ></div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="cont">
                                            <h3 class="head">Victoria's Secret Temptation fragrance mist 250 ML</h3>
                                            <ul>
                                                <li>Shipped by: Wing</li>
                                                <li>Condition: New</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="more-box-order-button">
                                <ul>
                                    <li><a href="#exampleModal" class="button-box" data-toggle="modal">Leave a feedback</a></li>
                                    <li><a href="#" class="button-box button-box-red">Canceled</a></li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="feedback-popup">
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog modal-md" role="document">
                                        <div class="modal-content ">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Leave a feedback</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <form>
                                                <div class="form-box">
                                                    <input name="" type="text" class="form-control" placeholder="Title">
                                                    <textarea name="" cols="" rows="" class="form-control" placeholder="Your Review"></textarea>
                                                    <input name="" type="submit" value="SEND" class="submit">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="orders-main-box">
                            <div class="orders-top-section">
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul>
                                            <li class="list">Order placed on:<b> 23 July 2018</b></li>
                                            <li class="list">Order ID: #1005010011018</li>
                                            <li class="list"> <a href="#" class="link">Order details</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul>
                                            <li class="list">Recipient: Reeba Varghese</li>
                                            <li class="list">Payment method: Credit or Debit Cards</li>
                                            <li class="list">Total: <b>103.74  AED</b></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="order-shipment">
                                <h2 class="sub-head">SHIPMENT 1 OF 1</h2>
                                <div class="order-tracker-box">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="no-box active-canceled">01</div>
                                            <h4 class="text-box">Ready for Shipping</h4>
                                        </div>
                                        <div class="col-4">
                                            <div class="no-box">02</div>
                                             <h4 class="text-box">Out for delivery</h4>
                                        </div>
                                        <div class="col-4">
                                            <div class="no-box">03</div>
                                              <h4 class="text-box">Delivered</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-shipment-product">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="product-img"><img src="<?= Yii::$app->homeUrl?>images/products//pro1-thumb.png" width="130" ></div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="cont">
                                            <h3 class="head">Victoria's Secret Temptation fragrance mist 250 ML</h3>
                                            <ul>
                                                <li>Shipped by: Wing</li>
                                                <li>Condition: New</li>
                                            </ul>
                                            <h4 class="canceled-text">Canceled</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="orders-main-box">
                            <div class="orders-top-section">
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul>
                                            <li class="list">Order placed on:<b> 23 July 2018</b></li>
                                            <li class="list">Order ID: #1005010011018</li>
                                            <li class="list"> <a href="#" class="link">Order details</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul>
                                            <li class="list">Recipient: Reeba Varghese</li>
                                            <li class="list">Payment method: Credit or Debit Cards</li>
                                            <li class="list">Total: <b>103.74  AED</b></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="order-shipment">
                                <h2 class="sub-head">SHIPMENT 1 OF 1</h2>
                                <div class="order-tracker-box">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="no-box">01</div>
                                            <h4 class="text-box">Ready for Shipping</h4>
                                        </div>
                                        <div class="col-4">
                                            <div class="no-box return-box"></div>
                                            <h4 class="text-box">Return Item</h4>
                                        </div>
                                        <div class="col-4">
                                            <div class="no-box">03</div>
                                            <h4 class="text-box">Delivered</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-shipment-product">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="product-img"><img src="<?= Yii::$app->homeUrl?>images/products//pro1-thumb.png" width="130" ></div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="cont">
                                            <h3 class="head">Victoria's Secret Temptation fragrance mist 250 ML</h3>
                                            <ul>
                                                <li>Shipped by: Wing</li>
                                                <li>Condition: New</li>
                                            </ul>
                                            <h4 class="canceled-text">Return Item</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--in-account-pages-section--> 
</div>
