<?php
$this->title = 'Vperfumes';

use common\components\ProductLinksWidget;
use yii\widgets\ListView;

$params = \yii::$app->getRequest()->getQueryParams();
?>


<div id="product-page" class="inner-page">
    <section class="breadcrumb">
        <div class="self_container container">
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php
                if ($params['category'] == 'fragrances') {
                    $bread_crumbs = 'Fragrances';
                } else if ($params['category'] == 'special-offers') {
                    $bread_crumbs = 'Special Offers';
                } else if ($params['category'] == 'exclusive-brands') {
                    $bread_crumbs = 'Exclusive Brands';
                } else if ($params['category'] == 'arabic-perfumes') {
                    $bread_crumbs = 'Arabic Perfumes';
                } else if ($params['category'] == 'new-arrivals') {
                    $bread_crumbs = 'New Arrivals';
                } else if ($params['category'] == 'gift-sets') {
                    $bread_crumbs = 'Gift Set';
                } else if ($params['category'] == 'one-day-sale') {
                    $bread_crumbs = 'One Day Sale';
                } else if ($params['category'] == 'otherss') {
                    $bread_crumbs = 'Others';
                }
                ?>
                <li class="current"><?= yii\helpers\Html::a($bread_crumbs, ['product/index', 'category' => $params['category']]) ?></li>
            </ul>
        </div>
    </section>

    <section class="product-list">
        <div class="self_container container">
            <div class="row">
                <?php
                $size_list = common\models\Product::find()->select('size')->where(['status' => 1])->groupBy(['size'])->all();
                $brand_list = common\models\Brand::find()->where(['status' => 1])->groupBy(['brand'])->all();
                $category_model = \common\models\Category::find()->where(['status' => 1, 'category_code' => $category])->one();

                if (!empty($category_model)) {
                    $products = \common\models\Product::find()->select('brand')->where(['category' => $category_model->id])->all();
                    $size_list = \common\models\Product::find()->select('size')->where(['category' => $category_model->id])->groupBy(['size'])->all();
                    if ($products) {
                        foreach ($products as $product) {
                            $product_[] = $product->brand;
                        }
                        $brand_list = common\models\Brand::find()->where(['status' => 1])->andWhere(['IN', 'id', $product_])->groupBy(['brand'])->all();
                    }
                }
                ?>
                <?= common\components\SidemenuWidget::widget(['brand_list' => $brand_list, 'size_list' => $size_list, 'target' => $target, 'minrange' => $minrange, 'maxrange' => $maxrange]) ?>
                <div class="desk-xl-10 col-lg-9">
                    <div id="product_view">
                        <div class="row">
                            <div class="col-12">
                                <div class="search-summery">
                                    <div class="summary-head">We've got 10000+ results for 'perfume'</div>
                                    <div class="summary">Showing 1-4 of 262 items.</div>
                                </div>
                            </div>
                        </div>


                        <?=
                        $dataProvider->totalcount > 0 ? ListView::widget([
                                    'dataProvider' => $dataProvider,
                                    'itemView' => '_view2',
                                    'options' => [
                                        'tag' => 'div',
                                        'class' => 'row'
                                    ],
                                    'itemOptions' => [
                                        'tag' => 'div',
                                        'class' => 'desk-xl-2 col-lg-3 col-md-4 col-6 mob-full'
                                    ],
                                    'pager' => [
                                        'options' => ['class' => 'pagination'],
                                        'prevPageLabel' => '<', // Set the label for the "previous" page button
                                        'nextPageLabel' => '>', // Set the label for the "next" page button
                                        'firstPageLabel' => 'First', // Set the label for the "first" page button
                                        'lastPageLabel' => 'Last', // Set the label for the "last" page button
                                        'nextPageCssClass' => '>', // Set CSS class for the "next" page button
                                        'prevPageCssClass' => '<', // Set CSS class for the "previous" page button
                                        'firstPageCssClass' => '<<', // Set CSS class for the "first" page button
                                        'lastPageCssClass' => '>>', // Set CSS class for the "last" page button
                                        'maxButtonCount' => 5, // Set maximum number of page buttons that can be displayed
                                    ],
                                ]) : $this->render('no_product');
                        ?>




                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<section id="site-speciality">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="speciality">
                    <div class="icon"><i class="fas fa-truck"></i></div>
                    <div class="content">
                        <div class="title">Free shipping</div>
                        <div class="info">Free shipping for local customers</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="speciality">
                    <div class="icon"><i class="fas fa-hand-holding-usd"></i></div>
                    <div class="content">
                        <div class="title">Money Back Guarantee</div>
                        <div class="info">Refund or change item within 24 hours</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="speciality">
                    <div class="icon"><i class="fas fa-user-clock"></i></div>
                    <div class="content">
                        <div class="title">24/7 support</div>
                        <div class="info">Answer all your questions with an hour</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .summary{
        display: none;
    }
</style>

