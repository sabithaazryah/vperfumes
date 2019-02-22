<?php
session_start();
$language = 'en';
if (isset($_SESSION['lang'])) {
    $language = $_SESSION['lang'];
}
?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?= $language ?>" xml:lang="<?= $language ?>">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta name="robots" content="noindex,nofollow">
                    <title>Vperfume</title>
                    <link rel="shortcut icon" href="images/favicon.png"/>
                    <!-- Bootstrap -->
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css"/>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" type="text/css"/>
                    <!-- AWESOME and ICOMOON fonts -->
                    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"/>
                    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Playfair+Display:400,700,900" rel="stylesheet"/>
                    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800" rel="stylesheet"/>

                    <!-- Product Zoom-->
                    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.6/jquery.fancybox.min.css' type='text/css' />
                    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.2/owl.carousel.min.css' type='text/css' />
                    <!-- Properties Says -->
                    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css' type='text/css' />
                    <link rel='stylesheet' href='css/pricefilter.css' type='text/css' />
                    <link rel='stylesheet' href='css/pricefilterbar.css' type='text/css' />
                    <link href="css/style.css" rel="stylesheet"/>
                    <link href="css/responsive.css" rel="stylesheet"/>
                    <link href="css/arabic.css" rel="stylesheet"/>
                    <link href="css/responsive_arabic.css" rel="stylesheet"/>
                    </head>

                    <body>
                        <header id="myHeader" class="header main_header"><!--header-->
                            <section class="navbar-custom" role="navigation"><!--fixed-top header-->
                                <div class="topbar">
                                    <div class="self_container container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="top-left">
                                                    <ul>
                                                        <li>Free Shipping: <span>on all orders above AED 100</span></li>
                                                        <li>FREE RETURN: <span>free 7 days return policy</span></li>
                                                        <li><a href="tel:+971 873738637"><img src="images/cont.png" alt="contact" class="img-fluid"/></a></li>
                                                    </ul>
                                                </div>
                                                <div class="top-right">
                                                    <ul class="os">
                                                        <li><a href="#!"><img src="images/icons/playstore.png"/></a></li>
                                                        <li><a href="#!"><img src="images/icons/ios.png"/></a></li>
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
                                                        if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar') {
                                                            ?>
                                                            <a class="language" href="" lang="en" hreflang="en" val="en"><img src="images/icons/english.png" class="img-fluid"/></a>
                                                        <?php } else { ?>
                                                            <a class="language" href="" lang="ar" hreflang="ar" val="ar"><img src="images/icons/arabic.png" class="img-fluid"/></a>
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
                                                        <h1 class="logo"><a href="index.php"><img src="images/logo.png" alt="Vperfumes" title="Vperfumes" class="img-fluid"></a></h1>
                                                    </div>
                                                    <div class="main-action">

                                                        <div class="mobile-header-Search-section">
                                                            <a href="#" class="Search-box" data-toggle="collapse" data-target="#demo1"></a>
                                                        </div>

                                                        <form class="search" method="post">
                                                            <div class="input-group">
                                                                <input type="search" id="search" name="email" class="form-control" placeholder="Search Products..." aria-label="Search Products..." aria-describedby="basic-addon2" required="">
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
                                                                                    <a href="#!" title="MARVELS (SILVER)"><img class="product-image img-responsive" src="images/product1.jpg" alt="" title="" width="100" height="100"></a>
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
                                                                                    <a href="#!" title="MARVELS (SILVER)"><img class="product-image img-responsive" src="images/product1.jpg" alt="" title="" width="100" height="100"></a>
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
                                                            <a class="mob-log" href="#!"><span>login</span></a>
                                                            <ul class="hide-mob">
                                                                <li><a href="#!">Register</a></li>
                                                                <li><a href="#!">Sign in</a></li>
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
                                                        <li class="nav-list <?= basename($_SERVER["SCRIPT_FILENAME"], '.php') == 'index' ? 'active' : '' ?>"> <a class="link" href="index.php">Fragrances</a></li>
                                                        <li class="nav-list <?= basename($_SERVER["SCRIPT_FILENAME"], '.php') == '#' ? 'active' : '' ?>"> <a class="link" href="#!">Special Offers</a></li>
                                                        <li class="nav-list <?= basename($_SERVER["SCRIPT_FILENAME"], '.php') == '#' ? 'active' : '' ?>"> <a class="link" href="#!">Brands</a></li>
                                                        <li class="nav-list <?= basename($_SERVER["SCRIPT_FILENAME"], '.php') == '#' ? 'active' : '' ?>"> <a class="link" href="#!">Exclusive Brands</a></li>
                                                        <li class="nav-list <?= basename($_SERVER["SCRIPT_FILENAME"], '.php') == '#' ? 'active' : '' ?>"> <a class="link" href="#!">Arabic Perfumes</a></li>
                                                        <li class="nav-list <?= basename($_SERVER["SCRIPT_FILENAME"], '.php') == '#' ? 'active' : '' ?>"> <a class="link" href="#!">New Arrivals</a></li>
                                                        <li class="nav-list <?= basename($_SERVER["SCRIPT_FILENAME"], '.php') == '#' ? 'active' : '' ?>"> <a class="link" href="#!">gift set</a></li>
                                                        <li class="nav-list <?= basename($_SERVER["SCRIPT_FILENAME"], '.php') == '#' ? 'active' : '' ?>"> <a class="link" href="#!">one day sale</a></li>
                                                        <li class="nav-list <?= basename($_SERVER["SCRIPT_FILENAME"], '.php') == '#' ? 'active' : '' ?>"> <a class="link" href="#!">Others</a></li>
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
