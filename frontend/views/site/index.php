<?php
$this->title = 'Vperfumes';

use common\components\ProductLinksWidget;

$special_offers = \common\models\ProductListing::findOne(1);
$new_arrivals = \common\models\ProductListing::findOne(2);
$niche_perfumes = \common\models\ProductListing::findOne(3);
$gift_sets = \common\models\ProductListing::findOne(4);
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
<?php
if (!empty($special_offers)) {
    if ($special_offers->product_id != '') {
        $special_products = explode(',', $special_offers->product_id);
        if (!empty($special_products)) {
            ?>
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
                            <?php foreach ($special_products as $special_product) { ?>
                                <div class="one-slide mx-auto">
                                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                                        <?php
                                        $spe_product = common\models\Product::findOne($special_product);
                                        
                                            ?>
                                            <?= \common\components\ProductLinksWidget::widget(['id' => $spe_product->id]) ?>
                                            <?php
                                        
                                        ?>
                                    </div>
                                </div> 
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            </section>
            <?php
        }
    }
}
?>

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
<?php
if (!empty($new_arrivals)) {
    if ($new_arrivals->product_id != '') {
        $new_arrival_products = explode(',', $new_arrivals->product_id);
        if (!empty($new_arrival_products)) {
            ?>
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
                            <?php foreach ($new_arrival_products as $new_arrival_product) { ?>
                                <div class="one-slide mx-auto">
                                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                                        <?php
                                        $new_arrive_product = common\models\Product::findOne($new_arrival_product);
                                     
                                            ?>
                                            <?= \common\components\ProductLinksWidget::widget(['id' => $new_arrive_product->id]) ?>
                                           
                                    </div>
                                </div> 
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }
    }
}
?>

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
                    <?php
                    if (!empty($niche_perfumes)) {
                        if ($niche_perfumes->product_id != '') {
                            $niche_products = explode(',', $niche_perfumes->product_id);
                            if (!empty($niche_products)) {
                                $j = 0;
                                foreach ($niche_products as $niche_product) {
                                    ?>
                                    <div class="col-sm-6 pad0">
                                        <?php
                                        $niche_product_list = common\models\Product::findOne($niche_product);
                                       
                                            $j++;
                                            ?>
                                            <?= \common\components\ProductLinksWidget::widget(['id' => $niche_product_list->id, 'count' => $j]) ?>
                                            <?php
                                            if ($j == 4) {
                                                break;
                                            }
                                        
                                        ?>
                                    </div> 
                                    <?php
                                }
                                ?>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
if (!empty($gift_sets)) {
    if ($gift_sets->product_id != '') {
        $gift_sets_products = explode(',', $gift_sets->product_id);
        if (!empty($gift_sets_products)) {
            ?>
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
                            <?php foreach ($gift_sets_products as $gift_sets_product) { ?>
                                <div class="one-slide mx-auto">
                                    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
                                        <?php
                                        $gift_product = common\models\Product::findOne($gift_sets_product);
                                       
                                            ?>
                                            <?= \common\components\ProductLinksWidget::widget(['id' => $gift_product->id]) ?>
                                          
                                    </div>
                                </div> 
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }
    }
}
?>
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