<?php
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
$controler = Yii::$app->controller->id;
$action = Yii::$app->controller->id . '/' . Yii::$app->controller->action->id;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?= Yii::$app->homeUrl; ?>img/favicon.png" rel="icon">
        <?php $this->registerCsrfMetaTags() ?>
        <title>Vperfumes Admin Panel</title>
        <script src="<?= Yii::$app->homeUrl; ?>js/jquery.min.js"></script>
        <script type="text/javascript">
            var homeUrl = '<?= Yii::$app->homeUrl; ?>';
        </script>
        <?php $this->head() ?>
    </head>
    <body class="skin-blue fixed sidebar-mini sidebar-mini-expand-featuree">
        <?php $this->beginBody() ?>

        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="<?= yii::$app->homeUrl; ?>" class="logo">
                    <span class="logo-mini">
                        <img src="<?= Yii::$app->homeUrl; ?>img/favicon.png" itemprop="image">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= Yii::$app->homeUrl; ?>img/logo.png" itemprop="image">
                    </span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <?php
                                echo ''
                                . Html::beginForm(['/site/logout'], 'post', ['style' => '']) . '<a>'
                                . Html::submitButton(
                                        '<i class="fa fa-sign-out" aria-hidden="true"></i> Sign out', ['class' => 'signout-btn', 'style' => '']
                                ) . '</a>'
                                . Html::endForm()
                                . '';
                                ?>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- ================================================== -->

            <!-- Left side column. contains the sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">

                        <li class="treeview <?= $controler == 'admin-posts' || $controler == 'admin-users' || $controler == 'site' ? 'active' : '' ?>">
                            <a href="">
                                <i class="fa fa-dashboard"></i>
                                <span>Administration</span>
                                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <?= Html::a('<i class="fa fa-angle-double-right"></i> Access Powers', ['/admin/admin-posts/index'], ['class' => 'title']) ?>
                                </li>

                                <li>
                                    <?= Html::a('<i class="fa fa-angle-double-right"></i> Admin Users', ['/admin/admin-users/index'], ['class' => 'title']) ?>
                                </li>
                            </ul>
                        </li>

                        <li class="treeview <?= $controler == 'category' || $controler == 'master-search-tag' || $controler == 'brand' || $controler == 'fregrance' || $controler == 'unit' || $controler == 'product' ? 'active' : '' ?>">
                            <a href="#">
                                <i class="fa fa-desktop"></i> <span>Products</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="treeview">
                                    <a href="#"><i class="fa fa-angle-double-right"></i> Masters
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li>
                                            <?= Html::a('<i class="fa fa-circle-o"></i> Category', ['/product/category/index']) ?>
                                        </li>
                                        <li>
                                            <?= Html::a('<i class="fa fa-circle-o"></i> Search Tag', ['/product/master-search-tag/index']) ?>
                                        </li>
                                        <li>
                                            <?= Html::a('<i class="fa fa-circle-o"></i> Brand', ['/product/brand/index']) ?>
                                        </li>
                                        <li>
                                            <?= Html::a('<i class="fa fa-circle-o"></i> Fragrance', ['/product/fregrance/index']) ?>
                                        </li>
                                        <li>
                                            <?= Html::a('<i class="fa fa-circle-o"></i> Unit', ['/product/unit/index']) ?>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <?= Html::a('<i class="fa fa-angle-double-right"></i> Product', ['/product/product/index']) ?>
                                </li>

                            </ul>
                        </li>

                        <li class="treeview <?= $controler == 'currency' || $controler == 'emirates' ? 'active' : '' ?>">
                            <a href="">
                                <i class="fa fa-database"></i>
                                <span>Masters</span>
                                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <?= Html::a('<i class="fa fa-angle-double-right"></i> Currency  ', ['/masters/currency/index'], ['class' => 'title']) ?>
                                </li>

                                <li>
                                    <?= Html::a('<i class="fa fa-angle-double-right"></i> Emirates  ', ['/masters/emirates/index'], ['class' => 'title']) ?>
                                </li>
                            </ul>
                        </li>

                        <li class="treeview <?= $controler == 'user' ? 'active' : '' ?>">
                            <a href="">
                                <i class="fa fa-user"></i>
                                <span>Users</span>
                                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <?= Html::a('<i class="fa fa-angle-double-right"></i> Users  ', ['/user/user/index'], ['class' => 'title']) ?>
                                </li>
                            </ul>
                        </li>

                        <li class="<?= $action == 'order-master/index' ? 'active' : '' ?>">
                            <?= Html::a('<i class="fa fa-shopping-cart"></i> <span>Order Management</span>', ['/order/order-master/index'], ['class' => 'title']) ?>
                        </li>
                        
                        <li class="<?= $action == 'order-master/return' ? 'active' : '' ?>">
                            <?= Html::a('<i class="fa fa-backward"></i> <span>Return Order</span>', ['/order/order-master/return'], ['class' => 'title']) ?>
                        </li>
                        
                        <li>
                                <?= Html::a('<i class="fa fa-cube"></i><span class="title">Promotions</span>', ['/promotions/promotions/index'], ['class' => 'title']) ?>
                            </li>

                        <li class="<?= $controler == 'settings' ? 'active' : '' ?>">
                            <?= Html::a('<i class="fa fa-gears"></i> <span>Settings</span>', ['/settings/index'], ['class' => 'title']) ?>
                        </li>

                        <li class="treeview <?= $action == 'order-master/product-wise-report' || $action == 'order-master/order-report' ? 'active' : '' ?>">
                            <a href="">
                                <i class="fa fa-bars"></i>
                                <span>Reports</span>
                                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <?= Html::a('<i class="fa fa-angle-double-right"></i> Product Wise Report  ', ['/order/order-master/product-wise-report'], ['class' => 'title']) ?>
                                </li>
                                <li>
                                    <?= Html::a('<i class="fa fa-angle-double-right"></i> Order Wise Report  ', ['/order/order-master/order-report'], ['class' => 'title']) ?>
                                </li>
                            </ul>
                        </li>

                        <li class="treeview <?= $action == 'slider/index' || $action == 'banner/index' || $action == 'product-listing/index' ? 'active' : '' ?>">
                            <a href="">
                                <i class="fa fa-pie-chart"></i>
                                <span>CMS</span>
                                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <?= Html::a('<i class="fa fa-angle-double-right"></i> Slider  ', ['/cms/slider/index'], ['class' => 'title']) ?>
                                </li>
                                <li>
                                    <?= Html::a('<i class="fa fa-angle-double-right"></i> Banner  ', ['/cms/banner/index'], ['class' => 'title']) ?>
                                </li>
                                <li>
                                    <?= Html::a('<i class="fa fa-angle-double-right"></i> Product Listing  ', ['/cms/product-listing/index'], ['class' => 'title']) ?>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- =============================================== -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <?= $content ?>
                </section>
            </div>
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.4.0
                </div>
                <strong>Copyright &copy; 2018-2019 .</strong> All rights
                reserved.
            </footer>
            <div class="control-sidebar-bg"></div>
        </div>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
