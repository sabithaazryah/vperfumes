<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
$language=Yii::$app->session['language'];

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?= $language ?>" xml:lang="<?= $language ?>">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta name="robots" content="noindex,nofollow">
                    <?= Html::csrfMetaTags() ?>
                    <link rel="shortcut icon" href="images/favicon.png"/>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <script>
                        var homeUrl = '<?= yii::$app->homeUrl; ?>';
                    </script>
                    <title><?= Html::encode($this->title) ?></title>
                    <?php $this->head() ?>
                    </head>
                    <body>
                        <?php $this->beginBody() ?>
                        <header id="myHeader" class="header main_header"><!--header-->
                            <section class="navbar-custom" role="navigation"><!--fixed-top header-->
                                <div class="topbar">
                                    <div class="self_container container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="top-left">
                                                    <ul>
                                                        <li><?= Yii::$app->session['words']['free_shipping'] ?>: <span><?= Yii::$app->session['words']['on_all_orders'] ?></span></li>
                                                        <li><?= Yii::$app->session['words']['free_return'] ?>: <span><?= Yii::$app->session['words']['free_return_policy'] ?></span></li>
                                                        <li><a href="tel:+971 873738637"><img src="<?= Yii::$app->homeUrl?>images/cont.png" alt="contact" class="img-fluid"/></a></li>
                                                    </ul>
                                                </div>
                                                <div class="top-right">
                                                    <ul class="os">
                                                        <li><a href="#!"><img src="<?= Yii::$app->homeUrl?>images/icons/playstore.png"/></a></li>
                                                        <li><a href="#!"><img src="<?= Yii::$app->homeUrl?>images/icons/ios.png"/></a></li>
                                                    </ul>
                                                    <ul class="social-icon">
                                                        <li><a class="fab fa-facebook-f" target="_blank" href="#!"></a></li>
                                                        <li><a class="fab fa-twitter" target="_blank" href="#!"></a></li>
                                                        <li><a class="fab fa-linkedin-in" target="_blank" href="#!"></a></li>
                                                        <li><a class="fab fa-instagram" target="_blank" href="#!"></a></li>
                                                        <li><a class="fab fa-snapchat-ghost" target="_blank" href="#!"></a></li>
                                                    </ul>
                                                    <div class="choose_language">
                                                        <?php
                                                        if (isset($language) && $language == 'ar') {
                                                            ?>
                                                            <a class="language" href="" lang="en" hreflang="en" val="en"><img src="<?= Yii::$app->homeUrl?>images/icons/english.png" class="img-fluid"/></a>
                                                        <?php } else { ?>
                                                            <a class="language" href="" lang="ar" hreflang="ar" val="ar"><img src="<?= Yii::$app->homeUrl?>images/icons/arabic.png" class="img-fluid"/></a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="top-navigation">
                                    <div class="center-sec">
                                        <div class="self_container container">
                                            <div class="row">
                                                <div class="col-lg-12 sm-pad0">
                                                    <div class="menu-icon">
                                                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown2" aria-controls="navbarNavDropdown2" aria-expanded="false" aria-label="Toggle navigation">
                                                            <div class="main-icon-bar"> <i class="fa fa-bars"></i></div>
                                                        </button>
                                                    </div>
                                                    <div class="logo-section">
                                                        <h1 class="logo"><a href="index.php"><img src="<?= Yii::$app->homeUrl?>images/logo-<?=$language?>.png" alt="Vperfumes" title="Vperfumes" class="img-fluid"></a></h1>
                                                    </div>
                                                    <div class="main-action">

                                                        <div class="mobile-header-Search-section">
                                                            <a href="#" class="Search-box" data-toggle="collapse" data-target="#demo1"></a>
                                                        </div>

                                                        <form class="search" method="post">
                                                            <div class="input-group">
                                                                <input type="search" id="search" name="email" class="form-control" placeholder="<?= Yii::$app->session['words']['search_products'] ?>..." aria-label="Search Products..." aria-describedby="basic-addon2" required="">
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-outline-secondary" type="submit"></button>
                                                                    </div>
                                                            </div>
                                                        </form>

                                                        <div class="dropdown cart-dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <ul class="hide-mob">
                                                                    <li><a href="#!" class="cart-link"><span class="cart-count">02</span></a></li>
                                                                </ul>
                                                            </button>
                                                            <ul class="dropdown-menu  animated2 fadeInUp" aria-labelledby="dropdownMenuButton">
                                                                <li>
                                                                    <div class="cart-box">
                                                                        <div class="row">
                                                                            <div class="col-4">
                                                                                <div class="img-box">
                                                                                    <a href="#!" title="MARVELS (SILVER)"><img class="product-image img-responsive" src="<?= Yii::$app->homeUrl?>images/product1.jpg" alt="" title="" width="100" height="100"></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-8">
                                                                                <div class="cont-box">
                                                                                    <h4 class="head">
                                                                                        <a class="" href="#!" title="">DAVID OF COOLWATER</a>                                </h4>
                                                                                    <h5 class="price">$ 55.00</h5>
                                                                                    <h6 class="Quantity">Size: 80 ML</h6>
                                                                                    <h6 class="Quantity">Quantity: 1</h6>
                                                                                    <a class="remove-from-cart remove_cart_product close" rel="nofollow" href="" data-product_id="VkYwWXpHc0ZhcTEyckpHWS92Sk9Jdz09" data-link-action="remove-from-cart" title="Remove from cart">
                                                                                        <i class="far fa-times-circle"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="cart-box">
                                                                        <div class="row">
                                                                            <div class="col-4">
                                                                                <div class="img-box">
                                                                                    <a href="#!" title="MARVELS (SILVER)"><img class="product-image img-responsive" src="<?= Yii::$app->homeUrl?>images/product1.jpg" alt="" title="" width="100" height="100"></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-8">
                                                                                <div class="cont-box">
                                                                                    <h4 class="head">
                                                                                        <a class="" href="#!" title="">DAVID OF COOLWATER</a>                                </h4>
                                                                                    <h5 class="price">$ 55.00</h5>
                                                                                    <h6 class="Quantity">Size: 80 ML</h6>
                                                                                    <h6 class="Quantity">Quantity: 1</h6>
                                                                                    <a class="remove-from-cart remove_cart_product close" rel="nofollow" href="" data-product_id="VkYwWXpHc0ZhcTEyckpHWS92Sk9Jdz09" data-link-action="remove-from-cart" title="Remove from cart">
                                                                                        <i class="far fa-times-circle"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <a class="check-out cart-button" href="cart.php">view cart</a>
                                                                    <a class="check-out" href="checkout.php">check out</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="login-top ">
                                                            <a class="mob-log" href="#!"><span><?= Yii::$app->session['words']['login'] ?></span></a>
                                                            <ul class="hide-mob">
                                                                <li><a href="#!"><?= Yii::$app->session['words']['register'] ?></a></li>
                                                                <li><a href="#!"><?= Yii::$app->session['words']['login'] ?></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="mobile-header-Search-box collapse " id="demo1" aria-expanded="true">
                                                        <div class="top-Search">
                                                            <form>
                                                                <div class="input-group">
                                                                    <div class="input-group">

                                                                        <input type="text" class="form-control search-keyword" placeholder="Search Products" autocomplete="off" name="keyword" required="" value="">
                                                                            <div class="search-keyword-dropdown"></div>
                                                                    </div>

                                                                </div></form>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-nav-section">
                                        <div class="self_container container">
                                            <nav class="navbar navbar-toggleable-lg navbar-light bg-faded navbar-expand-lg">
                                                <div class="collapse navbar-collapse" id="navbarNavDropdown2">
                                                    <ul class="navbar-nav">
                                                        <li class="nav-list <?= basename($_SERVER["SCRIPT_FILENAME"], '.php') == 'index' ? 'active' : '' ?>"> <a class="link" href="index.php"><?= Yii::$app->session['words']['fragrances'] ?></a></li>
                                                        <li class="nav-list <?= basename($_SERVER["SCRIPT_FILENAME"], '.php') == '#' ? 'active' : '' ?>"> <a class="link" href="#!"><?= Yii::$app->session['words']['special_offers'] ?></a></li>
                                                        <li class="nav-list <?= basename($_SERVER["SCRIPT_FILENAME"], '.php') == '#' ? 'active' : '' ?>"> <a class="link" href="#!"><?= Yii::$app->session['words']['brands'] ?></a></li>
                                                        <li class="nav-list <?= basename($_SERVER["SCRIPT_FILENAME"], '.php') == '#' ? 'active' : '' ?>"> <a class="link" href="#!"><?= Yii::$app->session['words']['exclusive_brands'] ?></a></li>
                                                        <li class="nav-list <?= basename($_SERVER["SCRIPT_FILENAME"], '.php') == '#' ? 'active' : '' ?>"> <a class="link" href="#!"><?= Yii::$app->session['words']['arabic_perfumes'] ?></a></li>
                                                        <li class="nav-list <?= basename($_SERVER["SCRIPT_FILENAME"], '.php') == '#' ? 'active' : '' ?>"> <a class="link" href="#!"><?= Yii::$app->session['words']['new_arrivals'] ?></a></li>
                                                        <li class="nav-list <?= basename($_SERVER["SCRIPT_FILENAME"], '.php') == '#' ? 'active' : '' ?>"> <a class="link" href="#!"><?= Yii::$app->session['words']['gift_set'] ?></a></li>
                                                        <li class="nav-list <?= basename($_SERVER["SCRIPT_FILENAME"], '.php') == '#' ? 'active' : '' ?>"> <a class="link" href="#!"><?= Yii::$app->session['words']['one_day_sale'] ?></a></li>
                                                        <li class="nav-list <?= basename($_SERVER["SCRIPT_FILENAME"], '.php') == '#' ? 'active' : '' ?>"> <a class="link" href="#!"><?= Yii::$app->session['words']['others'] ?></a></li>
                                                    </ul>
                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="clearfix"></div>
                        </header>
                        <!--header-->

                        <?= $content ?>
                        
                        <footer>
                            <div class="sec1">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="foot-logo"><img src="<?= Yii::$app->homeUrl?>images/logo-<?=$language?>.png" alt="Vperfumes logo" class="img-fluid"/></div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="hide-mob phone"><a href="tel:+971 565092957" class="social"><img src="<?= Yii::$app->homeUrl?>images/foot-cont.png" class="img-fluid"/></a></div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="hide-mob"><a href="#!" class="social"><img src="<?= Yii::$app->homeUrl?>images/quality.png" width="260" class="img-fluid"/></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sec2">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="newsleter-msg">
                                                <div class="title"><?= Yii::$app->session['words']['sign_up_newsletter'] ?></div>
                                                <div class="info">
                                                    <?= Yii::$app->session['words']['sign_up_newsletter_content'] ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <form class="newsleter" action="" method="post" id="subscribe-mail">
                                                <input type="email" id="subscribe_email" placeholder="<?= Yii::$app->session['words']['enter_email_address'] ?>" required="">
                                                    <input type="submit" value="" class="subscribe-btn">
                                                        </form>
                                                        </div>
                                                        </div>
                                                        </div>
                                                        </div>
                                                        <div class="sec3">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-6 mob-full">
                                                                        <h5 class="head"><?= Yii::$app->session['words']['information'] ?></h5>
                                                                        <ul class="foot-link">
                                                                            <li><a href="#!"><img src="<?= Yii::$app->homeUrl?>images/icons/foot-link.png" width="70" class="img-fluid"/></a></li>
                                                                            <li><a href="#!"><?= Yii::$app->session['words']['about_us'] ?></a></li>
                                                                            <li><a href="#!"><?= Yii::$app->session['words']['store_locator'] ?></a></li>
                                                                            <li><a href="#!"><?= Yii::$app->session['words']['customer_service'] ?></a></li>
                                                                            <li><a href="#!"><?= Yii::$app->session['words']['delivery_info'] ?></a></li>
                                                                            <li><a href="#!"><?= Yii::$app->session['words']['contact'] ?></a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-6 mob-full">
                                                                        <h5 class="head"><?= Yii::$app->session['words']['customer_service'] ?></h5>
                                                                        <ul class="foot-link">
                                                                            <li><a href="#!"><?= Yii::$app->session['words']['request_products'] ?></a></li>
                                                                            <li><a href="#!"><?= Yii::$app->session['words']['feedback'] ?></a></li>
                                                                            <li><a href="#!"><?= Yii::$app->session['words']['report_an_issue'] ?></a></li>
                                                                            <li><a href="#!"><?= Yii::$app->session['words']['branch_login'] ?></a></li>
                                                                            <li><a href="#!"><?= Yii::$app->session['words']['return'] ?></a></li>
                                                                            <li><a href="#!"><?= Yii::$app->session['words']['site_map'] ?></a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-6 mob-full">
                                                                        <h5 class="head"><?= Yii::$app->session['words']['my_account'] ?></h5>
                                                                        <ul class="foot-link">
                                                                            <li><a href="#!"><?= Yii::$app->session['words']['my_orders'] ?></a></li>
                                                                            <li><a href="#!"><?= Yii::$app->session['words']['my_addresses'] ?></a></li>
                                                                            <li><a href="#!"><?= Yii::$app->session['words']['wish_lists'] ?></a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-6 mob-full">
                                                                        <h5 class="head"><?= Yii::$app->session['words']['policies'] ?></h5>
                                                                        <ul class="foot-link">
                                                                            <li><a href="#!"><?= Yii::$app->session['words']['privacy_policy'] ?></a></li>
                                                                            <li><a href="#!"><?= Yii::$app->session['words']['terms_conditions'] ?></a></li>
                                                                            <li><a href="#!"><?= Yii::$app->session['words']['return_policy'] ?></a></li>
                                                                        </ul>
                                                                    </div>

                                                                    <div class="col-12 sec4">
                                                                        <div class="left-sec">
                                                                            <div class="payment-optns">
                                                                                <p>Ways you can pay:</p>
                                                                                <ul>
                                                                                    <li><img src="<?= Yii::$app->homeUrl?>images/icons/payment-optns.png" width="250" class="img-fluid"></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <div class="right-sec">
                                                                            <div class="download-app">
                                                                                <p>Download our apps</p>
                                                                                <ul>
                                                                                    <li><a href="#!"><img src="<?= Yii::$app->homeUrl?>images/icons/android-app-icon.png" class="img-fluid"></a></li>
                                                                                    <li><a href="#!"><img src="<?= Yii::$app->homeUrl?>images/icons/app-store-logo.png" class="img-fluid"></a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="copyright">
                                                            <div class="container">
                                                                <p>Copyright © <?= date('Y') ?> Vperfumes. All Rights Reserved</p>
                                                                <ul class="social-icon">
                                                                    <li><a class="fab fa-facebook-f" target="_blank" href="#!"></a></li>
                                                                    <li><a class="fab fa-twitter" target="_blank" href="#!"></a></li>
                                                                    <li><a class="fab fa-linkedin-in" target="_blank" href="#!"></a></li>
                                                                    <li><a class="fab fa-instagram" target="_blank" href="#!"></a></li>
                                                                    <li><a class="fab fa-snapchat-ghost" target="_blank" href="#!"></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        </footer>


                                                        <!--<div class="page-height"></div>-->
                                                        <!--footer-->
                                                        <a href="#" class="scrollup" >Scroll</a> <!--Scroll-->

                                                        <?php $this->endBody() ?>
                                                        <script>
                                                            $(document).ready(function () {
                                                                
                                                                $('.language').click(function (e) {
                                                                    e.preventDefault();
                                                                    var lang = $(this).attr('val');
                                                                    $.ajax({
                                                                        url: homeUrl+'site/language',
                                                                        type: 'post',
                                                                        data: {lang: lang},
                                                                        success: function (data) {
                                                                            location.reload();
                                                                        }
                                                                    });
                                                                });
                                                            });
                                                        </script>
                                                        </body>
                                                        </html>
                                                        <?php $this->endPage() ?>
                                                            

