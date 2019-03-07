<?php
$this->title = 'Vperfumes';
//echo Yii::$app->session['language'];exit;
?>


<section id="main-slider">
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000">
        <ol class="carousel-indicators">
            <?php
            $s = 0;
            foreach ($sliders as $slider) {
                $s++;
                ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?= $s ?>" class="<?= $s == 1 ? 'active' : '' ?>"></li>
            <?php } ?> 
        </ol>

        <?php if (!empty($sliders)) { ?>
            <div class="carousel-inner">
                <?php
                $s = 0;
                foreach ($sliders as $slider) {
                    $s++;
                    $field = 'img';
                    if (Yii::$app->session['language'] == 'ar')
                        $field = 'img_ar';
                    ?>
                    <div class="carousel-item <?= $s == 1 ? 'active' : '' ?>">
                        <img class="d-block w-100" src="<?= Yii::$app->homeUrl ?>uploads/cms/sliders/<?= $slider->id ?>/<?= Yii::$app->session['language'] ?>/image.<?= $slider->$field ?>?rand();" alt="<?= $slider->alt_tag_content ?>">
                    </div>
                <?php } ?> 
            </div>
        <?php } ?>

    </div>
</section>

<section id="special-offer">
    <div class="self_container container">
        <div class="main_head">
            <div class="head">Special offer</div>
            <div class="sub-head">Vperfumes</div>
        </div>
        <div class="carousel-controls specialoff-carousel-controls">
            <div class="direction">
                <div class="control d-flex align-items-center justify-content-center prev mt-3 slick-arrow" style=""></div>
                <div class="control d-flex align-items-center justify-content-center next mt-3 slick-arrow" style=""></div>
            </div>
            <div class="specialoff-carousel">
                <div class="one-slide mx-auto">
                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                        <div class="product-box">
                            <div class="off-tag">71% OFF</div>
                            <a href="#!" class="img-box">
                                <img src="images/products/pro1.jpg" alt="pro1" class="img-fluid pic-1"/>
                                <img src="images/products/pro2.jpg" alt="pro1" class="img-fluid pic-2"/>
                            </a>
                            <ul class="social">
                                <li><a href="" data-tip="Quick View"><img src="images/icons/eye-icon.png"/></a></li>
                                <li><a href="" data-tip="Add to Wishlist"><img src="images/icons/heart-icon.png"/></a></li>
                                <li><a href="" data-tip="Similar Products"><img src="images/icons/similar.png"/></a></li>
                            </ul>
                            <div class="content">
                                <div class="points"><span>40</span> points</div>
                                <a href="#!" class="title">Coral 2pcs+Mark Alfred Free</a>
                                <div class="off-price">AED 89.00</div>
                                <div class="og-price">AED 305.00</div>
                            </div>
                            <div class="box-foot">
                                <a class="check-out cart-button" href="#!"><i class="bag-icon"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="one-slide mx-auto">
                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                        <div class="product-box">
                            <div class="off-tag">71% OFF</div>
                            <a href="#!" class="img-box">
                                <img src="images/products/pro2.jpg" alt="pro1" class="img-fluid pic-1"/>
                                <img src="images/products/pro2.jpg" alt="pro1" class="img-fluid pic-2"/>
                            </a>
                            <ul class="social">
                                <li><a href="" data-tip="Quick View"><img src="images/icons/eye-icon.png"/></a></li>
                                <li><a href="" data-tip="Add to Wishlist"><img src="images/icons/heart-icon.png"/></a></li>
                                <li><a href="" data-tip="Similar Products"><img src="images/icons/similar.png"/></a></li>
                            </ul>
                            <div class="content">
                                <div class="points"><span>40</span> points</div>
                                <a href="#!" class="title">Coral 2pcs+Mark Alfred Free</a>
                                <div class="off-price">AED 89.00</div>
                                <div class="og-price">AED 305.00</div>
                            </div>
                            <div class="box-foot">
                                <a class="check-out cart-button" href="#!"><i class="bag-icon"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="one-slide mx-auto">
                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                        <div class="product-box">
                            <div class="off-tag">71% OFF</div>
                            <a href="#!" class="img-box">
                                <img src="images/products/pro3.jpg" alt="pro1" class="img-fluid pic-1"/>
                                <img src="images/products/pro2.jpg" alt="pro1" class="img-fluid pic-2"/>
                            </a>
                            <ul class="social">
                                <li><a href="" data-tip="Quick View"><img src="images/icons/eye-icon.png"/></a></li>
                                <li><a href="" data-tip="Add to Wishlist"><img src="images/icons/heart-icon.png"/></a></li>
                                <li><a href="" data-tip="Similar Products"><img src="images/icons/similar.png"/></a></li>
                            </ul>
                            <div class="content">
                                <div class="points"><span>40</span> points</div>
                                <a href="#!" class="title">Coral 2pcs+Mark Alfred Free</a>
                                <div class="off-price">AED 89.00</div>
                                <div class="og-price">AED 305.00</div>
                            </div>
                            <div class="box-foot">
                                <a class="check-out cart-button" href="#!"><i class="bag-icon"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="one-slide mx-auto">
                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                        <div class="product-box">
                            <div class="off-tag">71% OFF</div>
                            <a href="#!" class="img-box">
                                <img src="images/products/pro4.jpg" alt="pro1" class="img-fluid pic-1"/>
                                <img src="images/products/pro2.jpg" alt="pro1" class="img-fluid pic-2"/>
                            </a>
                            <ul class="social">
                                <li><a href="" data-tip="Quick View"><img src="images/icons/eye-icon.png"/></a></li>
                                <li><a href="" data-tip="Add to Wishlist"><img src="images/icons/heart-icon.png"/></a></li>
                                <li><a href="" data-tip="Similar Products"><img src="images/icons/similar.png"/></a></li>
                            </ul>
                            <div class="content">
                                <div class="points"><span>40</span> points</div>
                                <a href="#!" class="title">Coral 2pcs+Mark Alfred Free</a>
                                <div class="off-price">AED 89.00</div>
                                <div class="og-price">AED 305.00</div>
                            </div>
                            <div class="box-foot">
                                <a class="check-out cart-button" href="#!"><i class="bag-icon"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="one-slide mx-auto">
                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                        <div class="product-box">
                            <div class="off-tag">71% OFF</div>
                            <a href="#!" class="img-box">
                                <img src="images/products/pro5.jpg" alt="pro1" class="img-fluid pic-1"/>
                                <img src="images/products/pro2.jpg" alt="pro1" class="img-fluid pic-2"/>
                            </a>
                            <ul class="social">
                                <li><a href="" data-tip="Quick View"><img src="images/icons/eye-icon.png"/></a></li>
                                <li><a href="" data-tip="Add to Wishlist"><img src="images/icons/heart-icon.png"/></a></li>
                                <li><a href="" data-tip="Similar Products"><img src="images/icons/similar.png"/></a></li>
                            </ul>
                            <div class="content">
                                <div class="points"><span>40</span> points</div>
                                <a href="#!" class="title">Coral 2pcs+Mark Alfred Free</a>
                                <div class="off-price">AED 89.00</div>
                                <div class="og-price">AED 305.00</div>
                            </div>
                            <div class="box-foot">
                                <a class="check-out cart-button" href="#!"><i class="bag-icon"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="one-slide mx-auto">
                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                        <div class="product-box">
                            <div class="off-tag">71% OFF</div>
                            <a href="#!" class="img-box">
                                <img src="images/products/pro3.jpg" alt="pro1" class="img-fluid pic-1"/>
                                <img src="images/products/pro2.jpg" alt="pro1" class="img-fluid pic-2"/>
                            </a>
                            <ul class="social">
                                <li><a href="" data-tip="Quick View"><img src="images/icons/eye-icon.png"/></a></li>
                                <li><a href="" data-tip="Add to Wishlist"><img src="images/icons/heart-icon.png"/></a></li>
                                <li><a href="" data-tip="Similar Products"><img src="images/icons/similar.png"/></a></li>
                            </ul>
                            <div class="content">
                                <div class="points"><span>40</span> points</div>
                                <a href="#!" class="title">Coral 2pcs+Mark Alfred Free</a>
                                <div class="off-price">AED 89.00</div>
                                <div class="og-price">AED 305.00</div>
                            </div>
                            <div class="box-foot">
                                <a class="check-out cart-button" href="#!"><i class="bag-icon"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<section id="our-category">
    <div class="self_container pad0">
        <div class="row">
            <?php
            $banner_field = 'banner';
            if (Yii::$app->session['language'] == 'ar')
                $banner_field = 'banner_ar';
            ?>
            <div class="col-md-8 pad0">
                <a class="link" href="#!"><img src="<?= Yii::$app->homeUrl ?>uploads/cms/banner/<?= $banner1->id ?>/<?= Yii::$app->session['language'] ?>/image.<?= $banner1->$banner_field ?>" class="img-fluid" alt="our category img"/></a>
            </div>
            <div class="col-md-4 pad0">
                <a class="link" href="#!"><img src="<?= Yii::$app->homeUrl ?>uploads/cms/banner/<?= $banner2->id ?>/<?= Yii::$app->session['language'] ?>/image.<?= $banner2->$banner_field ?>" class="img-fluid" alt="our category img"/></a>
            </div>
            <div class="col-md-4 pad0">
                <div class="off-sale">
                    <div class="ad">Sale 50% Off</div>
                    <div class="span">Special offer</div>
                    <a href="#!" class="shopnow">Shop Now</a>
                </div>
            </div>
            <div class="col-md-8 pad0">
                <a class="link" href="#!"><img src="<?= Yii::$app->homeUrl ?>uploads/cms/banner/<?= $banner3->id ?>/<?= Yii::$app->session['language'] ?>/image.<?= $banner3->$banner_field ?>" class="img-fluid" alt="our category img"/></a>
            </div>
        </div>
    </div>
</section>

<section id="free-delivery-info">
    <div class="container">
        <div class="info">
            <?= Yii::$app->session['words']['free_shipping'] ?>: <?= Yii::$app->session['words']['on_all_orders'] ?> |  <?= Yii::$app->session['words']['free_return'] ?>: <?= Yii::$app->session['words']['free_return_policy'] ?>
        </div>
    </div>
</section>

<section id="new-arrivel">
    <div class="self_container container">
        <div class="main_head">
            <div class="head">New Arrivals</div>
            <div class="sub-head">Vperfumes</div>
        </div>
        <div class="carousel-controls new-arrivals-carousel-controls">
            <div class="direction">
                <div class="control d-flex align-items-center justify-content-center prev mt-3 slick-arrow" style=""></div>
                <div class="control d-flex align-items-center justify-content-center next mt-3 slick-arrow" style=""></div>
            </div>
            <div class="new-arrivals-carousel">
                <div class="one-slide mx-auto">
                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                        <div class="product-box">
                            <div class="off-tag">71% OFF</div>
                            <a href="#!" class="img-box">
                                <img src="images/products/pro1.jpg" alt="pro1" class="img-fluid pic-1"/>
                                <img src="images/products/pro2.jpg" alt="pro1" class="img-fluid pic-2"/>
                            </a>
                            <ul class="social">
                                <li><a href="" data-tip="Quick View"><img src="images/icons/eye-icon.png"/></a></li>
                                <li><a href="" data-tip="Add to Wishlist"><img src="images/icons/heart-icon.png"/></a></li>
                                <li><a href="" data-tip="Similar Products"><img src="images/icons/similar.png"/></a></li>
                            </ul>
                            <div class="content">
                                <div class="points"><span>40</span> points</div>
                                <a href="#!" class="title">Coral 2pcs+Mark Alfred Free</a>
                                <div class="off-price">AED 89.00</div>
                                <div class="og-price">AED 305.00</div>
                            </div>
                            <div class="box-foot">
                                <a class="check-out cart-button" href="#!"><i class="bag-icon"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="one-slide mx-auto">
                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                        <div class="product-box">
                            <div class="off-tag">71% OFF</div>
                            <a href="#!" class="img-box">
                                <img src="images/products/pro2.jpg" alt="pro1" class="img-fluid pic-1"/>
                                <img src="images/products/pro2.jpg" alt="pro1" class="img-fluid pic-2"/>
                            </a>
                            <ul class="social">
                                <li><a href="" data-tip="Quick View"><img src="images/icons/eye-icon.png"/></a></li>
                                <li><a href="" data-tip="Add to Wishlist"><img src="images/icons/heart-icon.png"/></a></li>
                                <li><a href="" data-tip="Similar Products"><img src="images/icons/similar.png"/></a></li>
                            </ul>
                            <div class="content">
                                <div class="points"><span>40</span> points</div>
                                <a href="#!" class="title">Coral 2pcs+Mark Alfred Free</a>
                                <div class="off-price">AED 89.00</div>
                                <div class="og-price">AED 305.00</div>
                            </div>
                            <div class="box-foot">
                                <a class="check-out cart-button" href="#!"><i class="bag-icon"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="one-slide mx-auto">
                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                        <div class="product-box">
                            <div class="off-tag">71% OFF</div>
                            <a href="#!" class="img-box">
                                <img src="images/products/pro3.jpg" alt="pro1" class="img-fluid pic-1"/>
                                <img src="images/products/pro2.jpg" alt="pro1" class="img-fluid pic-2"/>
                            </a>
                            <ul class="social">
                                <li><a href="" data-tip="Quick View"><img src="images/icons/eye-icon.png"/></a></li>
                                <li><a href="" data-tip="Add to Wishlist"><img src="images/icons/heart-icon.png"/></a></li>
                                <li><a href="" data-tip="Similar Products"><img src="images/icons/similar.png"/></a></li>
                            </ul>
                            <div class="content">
                                <div class="points"><span>40</span> points</div>
                                <a href="#!" class="title">Coral 2pcs+Mark Alfred Free</a>
                                <div class="off-price">AED 89.00</div>
                                <div class="og-price">AED 305.00</div>
                            </div>
                            <div class="box-foot">
                                <a class="check-out cart-button" href="#!"><i class="bag-icon"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="one-slide mx-auto">
                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                        <div class="product-box">
                            <div class="off-tag">71% OFF</div>
                            <a href="#!" class="img-box">
                                <img src="images/products/pro4.jpg" alt="pro1" class="img-fluid pic-1"/>
                                <img src="images/products/pro2.jpg" alt="pro1" class="img-fluid pic-2"/>
                            </a>
                            <ul class="social">
                                <li><a href="" data-tip="Quick View"><img src="images/icons/eye-icon.png"/></a></li>
                                <li><a href="" data-tip="Add to Wishlist"><img src="images/icons/heart-icon.png"/></a></li>
                                <li><a href="" data-tip="Similar Products"><img src="images/icons/similar.png"/></a></li>
                            </ul>
                            <div class="content">
                                <div class="points"><span>40</span> points</div>
                                <a href="#!" class="title">Coral 2pcs+Mark Alfred Free</a>
                                <div class="off-price">AED 89.00</div>
                                <div class="og-price">AED 305.00</div>
                            </div>
                            <div class="box-foot">
                                <a class="check-out cart-button" href="#!"><i class="bag-icon"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="one-slide mx-auto">
                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                        <div class="product-box">
                            <div class="off-tag">71% OFF</div>
                            <a href="#!" class="img-box">
                                <img src="images/products/pro5.jpg" alt="pro1" class="img-fluid pic-1"/>
                                <img src="images/products/pro2.jpg" alt="pro1" class="img-fluid pic-2"/>
                            </a>
                            <ul class="social">
                                <li><a href="" data-tip="Quick View"><img src="images/icons/eye-icon.png"/></a></li>
                                <li><a href="" data-tip="Add to Wishlist"><img src="images/icons/heart-icon.png"/></a></li>
                                <li><a href="" data-tip="Similar Products"><img src="images/icons/similar.png"/></a></li>
                            </ul>
                            <div class="content">
                                <div class="points"><span>40</span> points</div>
                                <a href="#!" class="title">Coral 2pcs+Mark Alfred Free</a>
                                <div class="off-price">AED 89.00</div>
                                <div class="og-price">AED 305.00</div>
                            </div>
                            <div class="box-foot">
                                <a class="check-out cart-button" href="#!"><i class="bag-icon"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="one-slide mx-auto">
                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                        <div class="product-box">
                            <div class="off-tag">71% OFF</div>
                            <a href="#!" class="img-box">
                                <img src="images/products/pro3.jpg" alt="pro1" class="img-fluid pic-1"/>
                                <img src="images/products/pro2.jpg" alt="pro1" class="img-fluid pic-2"/>
                            </a>
                            <ul class="social">
                                <li><a href="" data-tip="Quick View"><img src="images/icons/eye-icon.png"/></a></li>
                                <li><a href="" data-tip="Add to Wishlist"><img src="images/icons/heart-icon.png"/></a></li>
                                <li><a href="" data-tip="Similar Products"><img src="images/icons/similar.png"/></a></li>
                            </ul>
                            <div class="content">
                                <div class="points"><span>40</span> points</div>
                                <a href="#!" class="title">Coral 2pcs+Mark Alfred Free</a>
                                <div class="off-price">AED 89.00</div>
                                <div class="og-price">AED 305.00</div>
                            </div>
                            <div class="box-foot">
                                <a class="check-out cart-button" href="#!"><i class="bag-icon"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section id="discount-ad">
    <div class="self-container">
        <img src="<?= Yii::$app->homeUrl ?>uploads/cms/banner/<?= $banner4->id ?>/<?= Yii::$app->session['language'] ?>/image.<?= $banner4->$banner_field ?>" alt="" class="img-fluid"/>
    </div>
</section>

<section id="nichie-perfumes">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 left-sec">
                <div class="content-box">
                    <div class="title">niche perfumes</div>
                    <div class="sub-title">Lorem Ipsum is simply dummy text of the printing </div>
                    <div class="content">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                    </div>
                </div>
                <div class="img-box">
                    <img src="images/niche-perfumes.png" alt="" class="img-fluid"/>
                </div>
            </div>
            <div class="col-lg-7 right-sec">
                <div class="row">
                    <div class="col-sm-6 pad0">
                        <div class="product-box box1">
                            <div class="off-tag">20% OFF</div>
                            <a href="#!" class="img-box">
                                <img src="images/products/pro5.jpg" alt="pro1" class="img-fluid pic-1"/>
                                <img src="images/products/pro2.jpg" alt="pro1" class="img-fluid pic-2"/>
                            </a>
                            <ul class="social">
                                <li><a href="" data-tip="Quick View"><img src="images/icons/eye-icon.png"/></a></li>
                                <li><a href="" data-tip="Add to Wishlist"><img src="images/icons/heart-icon.png"/></a></li>
                                <li><a href="" data-tip="Similar Products"><img src="images/icons/similar.png"/></a></li>
                            </ul>
                            <div class="content">
                                <div class="points"><span>40</span> points</div>
                                <a href="#!" class="title">Coral 2pcs+Mark Alfred Free</a>
                                <div class="off-price">AED 89.00</div>
                                <div class="og-price">AED 305.00</div>
                            </div>
                            <div class="box-foot">
                                <a class="check-out cart-button" href="#!"><i class="bag-icon"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 pad0">
                        <div class="product-box box2">
                            <!-- <div class="off-tag">20% OFF</div> -->
                            <a href="#!" class="img-box">
                                <img src="images/products/pro5.jpg" alt="pro1" class="img-fluid pic-1"/>
                                <img src="images/products/pro2.jpg" alt="pro1" class="img-fluid pic-2"/>
                            </a>
                            <ul class="social">
                                <li><a href="" data-tip="Quick View"><img src="images/icons/eye-icon.png"/></a></li>
                                <li><a href="" data-tip="Add to Wishlist"><img src="images/icons/heart-icon.png"/></a></li>
                                <li><a href="" data-tip="Similar Products"><img src="images/icons/similar.png"/></a></li>
                            </ul>
                            <div class="content">
                                <div class="points"><span>40</span> points</div>
                                <a href="#!" class="title">Coral 2pcs+Mark Alfred Free</a>
                                <div class="off-price">AED 89.00</div>
                                <div class="og-price">AED 305.00</div>
                            </div>
                            <div class="box-foot">
                                <a class="check-out cart-button" href="#!"><i class="bag-icon"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 pad0">
                        <div class="product-box box3">
                            <div class="off-tag">20% OFF</div>
                            <a href="#!" class="img-box">
                                <img src="images/products/pro5.jpg" alt="pro1" class="img-fluid pic-1"/>
                                <img src="images/products/pro2.jpg" alt="pro1" class="img-fluid pic-2"/>
                            </a>
                            <ul class="social">
                                <li><a href="" data-tip="Quick View"><img src="images/icons/eye-icon.png"/></a></li>
                                <li><a href="" data-tip="Add to Wishlist"><img src="images/icons/heart-icon.png"/></a></li>
                                <li><a href="" data-tip="Similar Products"><img src="images/icons/similar.png"/></a></li>
                            </ul>
                            <div class="content">
                                <div class="points"><span>40</span> points</div>
                                <a href="#!" class="title">Coral 2pcs+Mark Alfred Free</a>
                                <div class="off-price">AED 89.00</div>
                                <div class="og-price">AED 305.00</div>
                            </div>
                            <div class="box-foot">
                                <a class="check-out cart-button" href="#!"><i class="bag-icon"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 pad0">
                        <div class="product-box box4">
                            <div class="off-tag">20% OFF</div>
                            <a href="#!" class="img-box">
                                <img src="images/products/pro5.jpg" alt="pro1" class="img-fluid pic-1"/>
                                <img src="images/products/pro2.jpg" alt="pro1" class="img-fluid pic-2"/>
                            </a>
                            <ul class="social">
                                <li><a href="" data-tip="Quick View"><img src="images/icons/eye-icon.png"/></a></li>
                                <li><a href="" data-tip="Add to Wishlist"><img src="images/icons/heart-icon.png"/></a></li>
                                <li><a href="" data-tip="Similar Products"><img src="images/icons/similar.png"/></a></li>
                            </ul>
                            <div class="content">
                                <div class="points"><span>40</span> points</div>
                                <a href="#!" class="title">Coral 2pcs+Mark Alfred Free</a>
                                <div class="off-price">AED 89.00</div>
                                <div class="og-price">AED 305.00</div>
                            </div>
                            <div class="box-foot">
                                <a class="check-out cart-button" href="#!"><i class="bag-icon"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="gifts">
    <div class="self_container container">
        <div class="main_head">
            <div class="head">Gift Sets</div>
            <div class="sub-head">Vperfumes</div>
        </div>
        <div class="carousel-controls gift-carousel-controls">
            <div class="direction">
                <div class="control d-flex align-items-center justify-content-center prev mt-3 slick-arrow" style=""></div>
                <div class="control d-flex align-items-center justify-content-center next mt-3 slick-arrow" style=""></div>
            </div>
            <div class="gift-carousel">
                <div class="one-slide mx-auto">
                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                        <div class="product-box">
                            <div class="off-tag">71% OFF</div>
                            <a href="#!" class="img-box">
                                <img src="images/products/pro1.jpg" alt="pro1" class="img-fluid pic-1"/>
                                <img src="images/products/pro2.jpg" alt="pro1" class="img-fluid pic-2"/>
                            </a>
                            <ul class="social">
                                <li><a href="" data-tip="Quick View"><img src="images/icons/eye-icon.png"/></a></li>
                                <li><a href="" data-tip="Add to Wishlist"><img src="images/icons/heart-icon.png"/></a></li>
                                <li><a href="" data-tip="Similar Products"><img src="images/icons/similar.png"/></a></li>
                            </ul>
                            <div class="content">
                                <div class="points"><span>40</span> points</div>
                                <a href="#!" class="title">Coral 2pcs+Mark Alfred Free</a>
                                <div class="off-price">AED 89.00</div>
                                <div class="og-price">AED 305.00</div>
                            </div>
                            <div class="box-foot">
                                <a class="check-out cart-button" href="#!"><i class="bag-icon"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="one-slide mx-auto">
                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                        <div class="product-box">
                            <div class="off-tag">71% OFF</div>
                            <a href="#!" class="img-box">
                                <img src="images/products/pro2.jpg" alt="pro1" class="img-fluid pic-1"/>
                                <img src="images/products/pro2.jpg" alt="pro1" class="img-fluid pic-2"/>
                            </a>
                            <ul class="social">
                                <li><a href="" data-tip="Quick View"><img src="images/icons/eye-icon.png"/></a></li>
                                <li><a href="" data-tip="Add to Wishlist"><img src="images/icons/heart-icon.png"/></a></li>
                                <li><a href="" data-tip="Similar Products"><img src="images/icons/similar.png"/></a></li>
                            </ul>
                            <div class="content">
                                <div class="points"><span>40</span> points</div>
                                <a href="#!" class="title">Coral 2pcs+Mark Alfred Free</a>
                                <div class="off-price">AED 89.00</div>
                                <div class="og-price">AED 305.00</div>
                            </div>
                            <div class="box-foot">
                                <a class="check-out cart-button" href="#!"><i class="bag-icon"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="one-slide mx-auto">
                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                        <div class="product-box">
                            <div class="off-tag stockout">Out of stock</div>
                            <a href="#!" class="img-box">
                                <img src="images/products/pro3.jpg" alt="pro1" class="img-fluid pic-1"/>
                                <img src="images/products/pro2.jpg" alt="pro1" class="img-fluid pic-2"/>
                            </a>
                            <ul class="social">
                                <li><a href="" data-tip="Quick View"><img src="images/icons/eye-icon.png"/></a></li>
                                <li><a href="" data-tip="Add to Wishlist"><img src="images/icons/heart-icon.png"/></a></li>
                                <li><a href="" data-tip="Similar Products"><img src="images/icons/similar.png"/></a></li>
                            </ul>
                            <div class="content">
                                <div class="points"><span>40</span> points</div>
                                <a href="#!" class="title">Coral 2pcs+Mark Alfred Free</a>
                                <div class="off-price">AED 89.00</div>
                                <div class="og-price">AED 305.00</div>
                            </div>
                            <div class="box-foot">
                                <a class="check-out cart-button" href="#!"><i class="bag-icon"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="one-slide mx-auto">
                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                        <div class="product-box">
                            <div class="off-tag">71% OFF</div>
                            <a href="#!" class="img-box">
                                <img src="images/products/pro4.jpg" alt="pro1" class="img-fluid pic-1"/>
                                <img src="images/products/pro2.jpg" alt="pro1" class="img-fluid pic-2"/>
                            </a>
                            <ul class="social">
                                <li><a href="" data-tip="Quick View"><img src="images/icons/eye-icon.png"/></a></li>
                                <li><a href="" data-tip="Add to Wishlist"><img src="images/icons/heart-icon.png"/></a></li>
                                <li><a href="" data-tip="Similar Products"><img src="images/icons/similar.png"/></a></li>
                            </ul>
                            <div class="content">
                                <div class="points"><span>40</span> points</div>
                                <a href="#!" class="title">Coral 2pcs+Mark Alfred Free</a>
                                <div class="off-price">AED 89.00</div>
                                <div class="og-price">AED 305.00</div>
                            </div>
                            <div class="box-foot">
                                <a class="check-out cart-button" href="#!"><i class="bag-icon"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="one-slide mx-auto">
                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                        <div class="product-box">
                            <div class="off-tag">71% OFF</div>
                            <a href="#!" class="img-box">
                                <img src="images/products/pro5.jpg" alt="pro1" class="img-fluid pic-1"/>
                                <img src="images/products/pro2.jpg" alt="pro1" class="img-fluid pic-2"/>
                            </a>
                            <ul class="social">
                                <li><a href="" data-tip="Quick View"><img src="images/icons/eye-icon.png"/></a></li>
                                <li><a href="" data-tip="Add to Wishlist"><img src="images/icons/heart-icon.png"/></a></li>
                                <li><a href="" data-tip="Similar Products"><img src="images/icons/similar.png"/></a></li>
                            </ul>
                            <div class="content">
                                <div class="points"><span>40</span> points</div>
                                <a href="#!" class="title">Coral 2pcs+Mark Alfred Free</a>
                                <div class="off-price">AED 89.00</div>
                                <div class="og-price">AED 305.00</div>
                            </div>
                            <div class="box-foot">
                                <a class="check-out cart-button" href="#!"><i class="bag-icon"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="one-slide mx-auto">
                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                        <div class="product-box">
                            <div class="off-tag">71% OFF</div>
                            <a href="#!" class="img-box">
                                <img src="images/products/pro3.jpg" alt="pro1" class="img-fluid pic-1"/>
                                <img src="images/products/pro2.jpg" alt="pro1" class="img-fluid pic-2"/>
                            </a>
                            <ul class="social">
                                <li><a href="" data-tip="Quick View"><img src="images/icons/eye-icon.png"/></a></li>
                                <li><a href="" data-tip="Add to Wishlist"><img src="images/icons/heart-icon.png"/></a></li>
                                <li><a href="" data-tip="Similar Products"><img src="images/icons/similar.png"/></a></li>
                            </ul>
                            <div class="content">
                                <div class="points"><span>40</span> points</div>
                                <a href="#!" class="title">Coral 2pcs+Mark Alfred Free</a>
                                <div class="off-price">AED 89.00</div>
                                <div class="og-price">AED 305.00</div>
                            </div>
                            <div class="box-foot">
                                <a class="check-out cart-button" href="#!"><i class="bag-icon"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="brands">
    <div class="container">
        <div class="main_head">
            <div class="head">Our Brand</div>
            <div class="sub-head">Vperfumes</div>
        </div>
        <div class="carousel-controls brands-carousel-controls">
            <div class="brands-carousel">
                <div class="one-slide mx-auto">
                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                        <img src="images/clients/1.png" class="img-fluid"/>
                    </div>
                </div>
                <div class="one-slide mx-auto">
                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                        <img src="images/clients/2.png" class="img-fluid"/>
                    </div>
                </div>
                <div class="one-slide mx-auto">
                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                        <img src="images/clients/3.png" class="img-fluid"/>
                    </div>
                </div>
                <div class="one-slide mx-auto">
                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                        <img src="images/clients/4.png" class="img-fluid"/>
                    </div>
                </div>
                <div class="one-slide mx-auto">
                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                        <img src="images/clients/5.png" class="img-fluid"/>
                    </div>
                </div>
                <div class="one-slide mx-auto">
                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                        <img src="images/clients/6.png" class="img-fluid"/>
                    </div>
                </div>
            </div>
        </div>
</section>

<section id="site-speciality">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="speciality">
                    <div class="icon"><i class="fas fa-truck"></i></div>
                    <div class="content">
                        <div class="title"><?= Yii::$app->session['words']['free_shipping'] ?></div>
                        <div class="info"><?= Yii::$app->session['words']['free_shipping_footer'] ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="speciality">
                    <div class="icon"><i class="fas fa-hand-holding-usd"></i></div>
                    <div class="content">
                        <div class="title"><?= Yii::$app->session['words']['money_back_gurantee'] ?></div>
                        <div class="info"><?= Yii::$app->session['words']['money_back_content'] ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="speciality">
                    <div class="icon"><i class="fas fa-user-clock"></i></div>
                    <div class="content">
                        <div class="title"><?= Yii::$app->session['words']['24_support'] ?></div>
                        <div class="info"><?= Yii::$app->session['words']['footer_answer_all_questions'] ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>