
<?php

use yii\helpers\Html;

$this->title = 'Vperfumes';

use common\components\ProductLinksWidget;

$field_ext = '';
if (isset(Yii::$app->session['language']) && Yii::$app->session['language'] != '') {
    if (Yii::$app->session['language'] == 'ar')
        $field_ext = '_' . Yii::$app->session['language'];
}

$pr_name = 'product_name' . $field_ext;
if (isset($product_details->$pr_name) && $product_details->$pr_name != '') {
    $product_name = $product_details->$pr_name;
} else {
    $product_name = $product_details->product_name;
}

$pr_desc = 'product_detail' . $field_ext;
if (isset($product_details->$pr_desc) && $product_details->$pr_desc != '') {
    $product_description = $product_details->$pr_desc;
} else {
    $product_description = $product_details->product_detail;
}
?>

<div id="product-page" class="product-detail-page inner-page">
    <section class="breadcrumb">
        <div class="self_container container">
            <ul>
                <li><?= Html::a('Home', ['/site/index']) ?></li>
                <li><a href="">Products</a></li>
                <li class="current"><a href=""><?= $product_name ?></a></li>
            </ul>
        </div>
    </section>


    <section  id="product-gallery" class="product-view">
        <div class="self_container container">
            <div class="row">
                <div class="col-md-12 hidden-xl hidden-lg">
                    <div class="head">
                        <h2 class="heading"><?= $product_name ?></h2>
                        <ul>
                            <?php
                            $rating = Yii::$app->SetValues->Rating($product_details->id);
                            ?>
                            <li>
                                <div class="rating">
                                    <span class="fas fa-star <?= ($rating > 0) && $rating >= 1 ? 'checked' : '' ?>"></span>
                                    <span class="fas fa-star <?= ($rating > 0) && $rating >= 2 ? 'checked' : '' ?>"></span>
                                    <span class="fas fa-star <?= ($rating > 0) && $rating >= 3 ? 'checked' : '' ?>"></span>
                                    <span class="fas fa-star <?= ($rating > 0) && $rating >= 4 ? 'checked' : '' ?>"></span>
                                    <span class="fas fa-star <?= ($rating > 0) && $rating >= 5 ? 'checked' : '' ?>"></span>
                                </div>
                            </li>
                            <li>(<?= Yii::$app->SetValues->RatingCount($product_details->id) ?>)  <?= Yii::$app->session['words']['reviews'] ?></li>

                            <li>
                                <?php if (isset(Yii::$app->user->identity->id)) { ?>
                                    <a class="add-review" id="add-review" href="" val="<?= $product_details->id ?>"><?= Yii::$app->session['words']['Write_a_review'] ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   </a>
                                <?php } else { ?>
                                    <?= Html::a('Write a review', ['/site/login-signup']) ?>
                                <?php } ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 pro-gallery-grid">
                    <div class="pro-image-zoom" data-columns="4">
                        <figure class="product-gallery__wrapper">
                            <?php
                            $product_image = Yii::$app->basePath . '/../uploads/product/' . $product_details->id . '/profile/' . $product_details->canonical_name . '.' . $product_details->profile;
                            if (file_exists($product_image)) {
                                ?>
                                <div data-thumb="<?= Yii::$app->homeUrl . 'uploads/product/' . $product_details->id . '/profile/' . $product_details->canonical_name . '_big.' . $product_details->profile ?>" class="product-gallery__image">
                                    <a class="wpb-wiz-main-images">
                                        <div class="zoomWrapper"><img src="<?= Yii::$app->homeUrl . 'uploads/product/' . $product_details->id . '/profile/' . $product_details->canonical_name . '_big.' . $product_details->profile ?>" class="wpb-wiz-main-image wp-post-image img-fluid" alt="" title="" data-zoom-image="<?= Yii::$app->homeUrl . 'uploads/product/' . $product_details->id . '/profile/' . $product_details->canonical_name . '_big.' . $product_details->profile ?>" ></div>
                                    </a>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div data-thumb="<?= Yii::$app->homeUrl . 'uploads/product/gallery_dummy.png' ?>" class="product-gallery__image">
                                    <a class="wpb-wiz-main-images">
                                        <div class="zoomWrapper"><img src="<?= Yii::$app->homeUrl . 'uploads/product/gallery_dummy.png' ?>" class="wpb-wiz-main-image wp-post-image img-fluid" alt="" title="" data-zoom-image="<?= Yii::$app->homeUrl . 'uploads/product/gallery_dummy.png' ?>" ></div>
                                    </a>
                                </div>
                            <?php }
                            ?>
                            <div id="wpb_wiz_gallery" class="thumbnails wpb_wiz_gallery_slider owl-theme owl-carousel" style="display: block;">
                                <div class="owl-wrapper-outer">
                                    <div class="owl-wrapper" style="display: block;">
                                        <?php
                                        if (file_exists($product_image)) {
                                            ?>
                                            <div class="owl-item">
                                                <div class="wpb-woocommerce-product-gallery__image">
                                                    <a href="#!" data-image="<?= Yii::$app->homeUrl . 'uploads/product/' . $product_details->id . '/profile/' . $product_details->canonical_name . '_big.' . $product_details->profile ?>" data-zoom-image="<?= Yii::$app->homeUrl . 'uploads/product/' . $product_details->id . '/profile/' . $product_details->canonical_name . '_big.' . $product_details->profile ?>"><img width="250" height="250" src="<?= Yii::$app->homeUrl . 'uploads/product/' . $product_details->id . '/profile/' . $product_details->canonical_name . '_big.' . $product_details->profile ?>" class="attachment-shop_single size-shop_single img-fluid" alt="" title=""></a>
                                                </div>
                                            </div>
                                        <?php }
                                        ?>
                                        <?php
                                        $path = Yii::getAlias('@paths') . '/product/' . $product_details->id . '/gallery_thumb';
                                        if (file_exists($product_image)) {
                                            if (count(glob("{$path}/*")) > 0) {

                                                $k = 0;
                                                foreach (glob("{$path}/*") as $file) {
                                                    if ($k <= '2') {
                                                        $k++;
                                                        $arry = explode('/', $file);
                                                        $img_nmee = end($arry);
                                                        $img_nmees = explode('.', $img_nmee);
                                                        if ($img_nmees['1'] != '') {
                                                            ?>
                                                            <div class="owl-item">
                                                                <div class="wpb-woocommerce-product-gallery__image">
                                                                    <a href="#!" data-image="<?= Yii::$app->homeUrl . 'uploads/product/' . $product_details->id . '/gallery/' . end($arry) ?>" data-zoom-image="<?= Yii::$app->homeUrl . 'uploads/product/' . $product_details->id . '/gallery/' . end($arry) ?>"><img width="250" height="250" src="<?= Yii::$app->homeUrl . 'uploads/product/' . $product_details->id . '/gallery/' . end($arry) ?>" class="attachment-shop_single size-shop_single img-fluid" alt="" title=""></a>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-7 prodtl">
                    <div class="head hidden-md hidden-sm hidden-xs">
                        <h2 class="heading"><?= $product_name ?></h2>
                        <ul>
                            <?php
                            $rating = Yii::$app->SetValues->Rating($product_details->id);
                            ?>
                            <li>
                                <div class="rating">
                                    <span class="fas fa-star <?= ($rating > 0) && $rating >= 1 ? 'checked' : '' ?>"></span>
                                    <span class="fas fa-star <?= ($rating > 0) && $rating >= 2 ? 'checked' : '' ?>"></span>
                                    <span class="fas fa-star <?= ($rating > 0) && $rating >= 3 ? 'checked' : '' ?>"></span>
                                    <span class="fas fa-star <?= ($rating > 0) && $rating >= 4 ? 'checked' : '' ?>"></span>
                                    <span class="fas fa-star <?= ($rating > 0) && $rating >= 5 ? 'checked' : '' ?>"></span>
                                </div>
                            </li>
                            <li><?= Yii::$app->SetValues->RatingCount($product_details->id) ?>  reviews</li>

                            <li>
                                <?php if (isset(Yii::$app->user->identity->id)) { ?>
                                    <a class="add-review" id="add-review" href="" val="<?= $product_details->id ?>"><?= Yii::$app->session['words']['Write_a_review'] ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   </a>
                                <?php } else { ?>
                                    <?= Html::a('Write a review', ['/site/login']) ?>
                                <?php } ?>
                            </li>
                        </ul>
                    </div>
                    <div class="product-details">
                        <div class="row">
                            <?php
                            if ($product_details->offer_price != "0" && isset($product_details->offer_price)) {
                                $percentage = round(100 - (($product_details->offer_price / $product_details->price) * 100));
                                $main_price = $product_details->offer_price;
                                $price = 'AED ' . $product_details->price;
                                ?>
                                <?php
                            } else {
                                $main_price = $product_details->price;
                                $price = '';
                            }
                            ?>
                            <div class="col-md-6 lft-box">
                                <div class="price-details">
                                    <p class="current-price"><span>AED <?= $main_price ?></span></p>
                                    <?php if ($product_details->offer_price != "0" && isset($product_details->offer_price)) { ?>
                                        <p class="actual-price">was <span><?= $price ?></span> <span class="off-price"><?= $percentage ?>% OFF</span></p>
                                    <?php } ?>
                                    <p class="cash-delivery-tag"><?= Yii::$app->session['words']['inclusive_of_VAT'] ?></p>
                                </div>
                                <div class="item-detail">
                                    <?php
                                    if (isset($product_details->brand)) {
                                        $brand = common\models\Brand::findOne($product_details->brand);
                                        ?>
                                    <?php }
                                    ?>
                                    <p><?= Yii::$app->session['words']['brand'] ?>:<a class="brand-link"><?= $brand->brand ?>.</a></p>
                                    <?php $fregrance = \common\models\Fregrance::findOne($product_details->product_type); ?>
                                    <p><?= Yii::$app->session['words']['fragrance'] ?>: <span><?= isset($fregrance->name) && $fregrance->name != '' ? $fregrance->name : '' ?></span></p>
                                    <?php
                                    $unit = \common\models\Unit::findOne($product_details->size_unit);
                                    $unit_name = '';
                                    if (isset($unit->unit_name) && $unit->unit_name != '') {
                                        $unit_name = $unit->unit_name;
                                    }
                                    ?>
                                    <p><?= Yii::$app->session['words']['sizes'] ?>: <span><?= $product_details->size . $unit_name ?></span></p>
                                    <p><?= Yii::$app->session['words']['product_code'] ?>: <span><?= $product_details->ean_value ?></span></p>
                                </div>
                            </div>
                            <div class="col-md-6 rit-box">
                                <div class="action-details">
                                    <div class="cartlist-popup-dtl alert-success alert_<?= $product_details->canonical_name ?> hide">
                                        <i class="fa fa-check" aria-hidden="true"></i>Successfully added to cart.
                                    </div>
                                    <div class="wishlist-popup-dtl alert-success wishalert_<?= $product_details->canonical_name ?> hide">
                                    </div>
                                    <div class="cartlist-popup-dtl-error alert-success alert_error_<?= $product_details->canonical_name ?> hide">
                                        Out of stock.
                                    </div>
                                    <?php if ($product_details->stock > 0) { ?>
                                        <p class="stock-detail"><?= Yii::$app->session['words']['in_stock'] ?></p>
                                    <?php } else { ?>
                                        <p class="stock-detail"><?= Yii::$app->session['words']['out_of_stock'] ?></p>
                                    <?php } ?>
                                    <div class="form-group quantity">
                                        <label><?= Yii::$app->session['words']['quantity'] ?></label>
                                        <select class="form-control  quantity" id="quantity" name="Quantity">
                                            <?php
                                            for ($i = 1; $i <= $product_details->stock; $i++) {
                                                ?>
                                                <option value="<?= $i ?>"><?= $i ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <a href="javascript:void(0)" class="wish-list-btn add_to_wish_list" pro_id="<?= $product_details->canonical_name ?>"><i class="fas fa-heart"></i><?= Yii::$app->session['words']['wishlist'] ?></a>
                                    <div class="clear"></div>
                                    <!--                                    <div class="spcl-delivery">
                                                                            Enjoy Next Business Day Delivery Order Before <span class="time">2: 00 PM</span>
                                                                        </div>-->
                                    <div class="payment-optns">
                                        <p><?= Yii::$app->session['words']['ways_can_pay'] ?></p>
                                        <ul>
                                            <li><img src="<?= Yii::$app->homeUrl ?>images/icons/visa-pay.png" class="img-fluid"></li>
                                            <li><img src="<?= Yii::$app->homeUrl ?>images/icons/master-pay.png" class="img-fluid"></li>
                                            <li><img src="<?= Yii::$app->homeUrl ?>images/icons/cod-pay.png" class="img-fluid"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="button-box">
                            <li><a href="javascript:void(0)" class="add-2-bag add-cart added-msg" pro_id="<?= $product_details->canonical_name ?>"><icon><img class="img-fluid" src="<?= yii::$app->homeUrl; ?>images/icons/cart.png"/></icon><?= Yii::$app->session['words']['add_to_bag'] ?></a></li>
                            <li><a href="javascript:void(0)" class="buy-now" pro_id="<?= $product_details->canonical_name ?>"><?= Yii::$app->session['words']['buy_now'] ?></a></li>
                        </ul>
                    </div>
                    <div class="special-details">
                        <ul>
                            <li><icon><img src="<?= Yii::$app->homeUrl ?>images/icons/cod.png" class="img-fluid" width="46" height="46"></icon><?= Yii::$app->session['words']['cash_on_delivery'] ?> <span><?= Yii::$app->session['words']['cash_on_delivery_msg'] ?></span></li>
                            <li><icon><img src="<?= Yii::$app->homeUrl ?>images/icons/freeshipping.png" class="img-fluid" width="46" height="46"></icon><?= Yii::$app->session['words']['free_shippping'] ?> <span><?= Yii::$app->session['words']['free_shipping_msg'] ?></span></li>
                            <li><icon><img src="<?= Yii::$app->homeUrl ?>images/icons/authentic.png" class="img-fluid" width="46" height="46"></icon><?= Yii::$app->session['words']['authentic'] ?> <span><?= Yii::$app->session['words']['authentic_msg'] ?></span></li>
                            <li><icon><img src="<?= Yii::$app->homeUrl ?>images/icons/secure.png" class="img-fluid" width="46" height="46"></icon><?= Yii::$app->session['words']['secure_shopping'] ?> <span><?= Yii::$app->session['words']['secure_shopping_msg'] ?></span></li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </section>



    <section id="product-info">
        <div class="container">
            <div class="head"><?= Yii::$app->session['words']['product_information'] ?></div>
            <div class="row">
                <div class="col-12">
                    <div class="product-spec">
                        <div class="spec-box">
                            <div class="spec-title"><?= Yii::$app->session['words']['specifications'] ?></div>
                            <?php
                            if (isset($product_details->gender_type)) {
                                if ($product_details->gender_type == 1) {
                                    $targeted = 'Men';
                                } else if ($product_details->gender_type == 2) {
                                    $targeted = 'Women';
                                } else if ($product_details->gender_type == 3) {
                                    $targeted = 'Unisex';
                                } else if ($product_details->gender_type == 4) {
                                    $targeted = 'Oriental';
                                } else if ($product_details->gender_type == 5) {
                                    $targeted = 'Kids';
                                }
                            }
                            ?>
                            <ul>
                                <li><?= Yii::$app->session['words']['brand'] ?>: <span><?= $brand->brand ?>.</span></li>
                                <li><?= Yii::$app->session['words']['fragrance'] ?>: <span><?= isset($fregrance->name) && $fregrance->name != '' ? $fregrance->name : '' ?>.</span></li>
                                <li><?= Yii::$app->session['words']['sizes'] ?>: <span><?= $product_details->size . $unit_name ?></span></li>
                                <li><?= Yii::$app->session['words']['product_code'] ?>: <span><?= $product_details->ean_value ?></span></li>
                                <li><?= Yii::$app->session['words']['targeted_group'] ?>: <span><?= $targeted ?></span></li>
                            </ul>
                        </div>
                        <div class="spec-box lastbox">
                            <div class="spec-title"><?= Yii::$app->session['words']['description'] ?></div>
                            <?= $product_description ?>
                        </div>
                        <div class="customer-reviews">
                            <div class="spec-title"><?= Yii::$app->session['words']['customer_reviews'] ?></div>
                            <div class="row">
                                <div class="col-lg-4 box">
                                    <div class="total-rating">
                                        <div class="count"><span><?= Yii::$app->SetValues->Rating($product_details->id) ?></span></div>
                                        <input id="input-3" name="input-3" class="rating rating-loading" data-min="0" data-max="5" data-step="0.5" value="<?= Yii::$app->SetValues->Rating($product_details->id) ?>">
                                    </div>
                                </div>
                                <div class="col-lg-5 box box-2">
                                    <ul class="scorecard">
                                        <li>
                                            <div class="side">
                                                <div>5 stars</div>
                                            </div>
                                            <div class="middle">
                                                <div class="bar-container">
                                                    <div style="width: <?= Yii::$app->SetValues->RatingPercentage($product_details->id, 5) ?>%;" class="bar"></div>
                                                </div>
                                            </div>
                                            <div class="side right">
                                                <div>( <?= Yii::$app->SetValues->RatePerCount($product_details->id, 5) ?> )</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="side">
                                                <div>4 stars</div>
                                            </div>
                                            <div class="middle">
                                                <div class="bar-container">
                                                    <div style="width: <?= Yii::$app->SetValues->RatingPercentage($product_details->id, 4) ?>%;" class="bar"></div>
                                                </div>
                                            </div>
                                            <div class="side right">
                                                <div>( <?= Yii::$app->SetValues->RatePerCount($product_details->id, 4) ?> )</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="side">
                                                <div>3 stars</div>
                                            </div>
                                            <div class="middle">
                                                <div class="bar-container">
                                                    <div style="width: <?= Yii::$app->SetValues->RatingPercentage($product_details->id, 3) ?>%;" class="bar"></div>
                                                </div>
                                            </div>
                                            <div class="side right">
                                                <div>( <?= Yii::$app->SetValues->RatePerCount($product_details->id, 3) ?> )</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="side">
                                                <div>2 stars</div>
                                            </div>
                                            <div class="middle">
                                                <div class="bar-container">
                                                    <div style="width: <?= Yii::$app->SetValues->RatingPercentage($product_details->id, 2) ?>%;" class="bar"></div>
                                                </div>
                                            </div>
                                            <div class="side right">
                                                <div>( <?= Yii::$app->SetValues->RatePerCount($product_details->id, 2) ?> )</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="side">
                                                <div>1 stars</div>
                                            </div>
                                            <div class="middle">
                                                <div class="bar-container">
                                                    <div style="width: <?= Yii::$app->SetValues->RatingPercentage($product_details->id, 1) ?>%;" class="bar"></div>
                                                </div>
                                            </div>
                                            <div class="side right">
                                                <div>( <?= Yii::$app->SetValues->RatePerCount($product_details->id, 1) ?> )</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-3 box box-3">
                                    <div class="title">Rate this product:</div>
                                    <input id="input-3" name="input-3" class="rating rating-loading" data-min="0" data-max="5" data-step="0.5" value="4.5">
                                    <div class="greetings">Thank you for rating! </div>
                                    <a class="add-review" href="#!">Write a full review</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    if ($product_details->related_product != '') {
        $related_products = explode(',', $product_details->related_product);
        ?>
        <section id="related-products">
            <div class="self_container container">
                <div class="main_head">
                    <div class="head">RELATED PRODUCTS</div>
                    <div class="sub-head">Best Quality Products</div>
                </div>
                <div class="carousel-controls product-carousel-controls">
                    <div class="product-carousel">
                        <?php
                        if (!empty($related_products)) {
                            foreach ($related_products as $related_product) {
                                ?>
                                <div class="one-slide mx-auto">
                                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                                        <?php
                                        $product = common\models\Product::findOne($related_product);
                                        if ($product->stock > 0) {
                                            ?>
                                            <?= \common\components\ProductLinksWidget::widget(['id' => $product->id]) ?>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div> 
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
    ?>
</div>
<section id="site-speciality">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="speciality">
                    <div class="icon"><i class="fas fa-truck"></i></div>
                    <div class="content">
                        <div class="title"><?= Yii::$app->session['words']['free_shipping'] ?></div>
                        <div class="info"><?= Yii::$app->session['words']['free_shipping_msg'] ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="speciality">
                    <div class="icon"><i class="fas fa-hand-holding-usd"></i></div>
                    <div class="content">
                        <div class="title"><?= Yii::$app->session['words']['money_back_guarantee'] ?></div>
                        <div class="info"><?= Yii::$app->session['words']['money_back_guarantee_msg'] ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="speciality">
                    <div class="icon"><i class="fas fa-user-clock"></i></div>
                    <div class="content">
                        <div class="title"><?= Yii::$app->session['words']['24_support'] ?></div>
                        <div class="info"><?= Yii::$app->session['words']['24_support_msg'] ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>