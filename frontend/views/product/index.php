<?php
$this->title = 'Vperfumes';

use common\components\ProductLinksWidget;
use yii\widgets\ListView;

?>


<div id="product-page" class="inner-page">
    <section class="breadcrumb">
        <div class="self_container container">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li class="current"><a href="#!">Men</a></li>
            </ul>
        </div>
    </section>

    <section class="product-list">
        <div class="self_container container">
            <div class="row">
                <aside  class="desk-xl-2 col-lg-3">
                    <div class="product-left-categories-mobile-view">
                        <div class="filter-head">
                            <h2 class="head-filter">Product Filter</h2>
                            <ul class="filter-list">
                                <li class="list-li">
                                    <div class="head-text-button" data-toggle="modal" data-target="#exampleModalLong"><i class="icon"></i>Filter</div>
                                </li>
                            </ul>
                        </div>
                        <!-- Modal -->
                        <div class="modal" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="button-header">
                                        <button type="button" class="close-button" data-dismiss="modal" aria-label="Close"></button>
                                        <a href="#" class="filter-apply-button">apply</a>
                                        <a href="#" class="filter-apply-button clear-filter">Clear</a>

                                    </div>
                                    <div class="modal-body">
                                        <div class="filter-mobile-box"><!--filter-mobile-box-->
                                            <div id="accordion">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="left-b card-link collapsed" data-toggle="collapse" href="#collapse1">Brand</a>
                                                    </div>
                                                    <div id="collapse1" class="collapse " data-parent="#accordion">
                                                        <div class="sizing">
                                                            <div class="in-product-left-categories" ><!--in-left-Categories-->

                                                                <div class="other-range-box brands">
                                                                    <div class="search-box">
                                                                        <form >
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control"  placeholder="Search by Brand"  value="">
                                                                                <div class="input-group-addon">
                                                                                    <input  type="submit" class="send" >
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="content pad0">
                                                                        <div class="demo">
                                                                            <div class="scroll">
                                                                                <div class="list-type">
                                                                                    <ul>
                                                                                        <li>
                                                                                            <label class="input-style-box">
                                                                                                <input name="" type="checkbox" value="">
                                                                                                <span class="checkmark"></span> <a> Dubai </a> <count>(11,438)</count>
                                                                                            </label>
                                                                                        </li>
                                                                                        <li>
                                                                                            <label class="input-style-box">
                                                                                                <input name="" type="checkbox" value="">
                                                                                                <span class="checkmark"></span> <a> Dubai </a> <count>(11,438)</count>
                                                                                            </label>
                                                                                        </li>
                                                                                        <li>
                                                                                            <label class="input-style-box">
                                                                                                <input name="" type="checkbox" value="">
                                                                                                <span class="checkmark"></span> <a> Dubai </a> <count>(11,438)</count>
                                                                                            </label>
                                                                                        </li>
                                                                                        <li>
                                                                                            <label class="input-style-box">
                                                                                                <input name="" type="checkbox" value="">
                                                                                                <span class="checkmark"></span> <a> Dubai </a> <count>(11,438)</count>
                                                                                            </label>
                                                                                        </li>
                                                                                        <li>
                                                                                            <label class="input-style-box">
                                                                                                <input name="" type="checkbox" value="">
                                                                                                <span class="checkmark"></span> <a> Dubai </a> <count>(11,438)</count>
                                                                                            </label>
                                                                                        </li>
                                                                                        <li>
                                                                                            <label class="input-style-box">
                                                                                                <input name="" type="checkbox" value="">
                                                                                                <span class="checkmark"></span> <a> Dubai </a> <count>(11,438)</count>
                                                                                            </label>
                                                                                        </li>
                                                                                        <li>
                                                                                            <label class="input-style-box">
                                                                                                <input name="" type="checkbox" value="">
                                                                                                <span class="checkmark"></span> <a> Dubai </a> <count>(11,438)</count>
                                                                                            </label>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="left-b card-link collapsed" data-toggle="collapse" href="#collapse2">Targeted Group</a>
                                                    </div>
                                                    <div id="collapse2" class="collapse" data-parent="#accordion">
                                                        <div class="sizing">
                                                            <div class="in-product-left-categories" ><!--in-left-Categories-->

                                                                <div class="other-range-box">
                                                                    <div class="list-type">
                                                                        <ul>
                                                                            <li>
                                                                                <label class="input-style-box">
                                                                                    <input name="" type="checkbox" value="">
                                                                                    <span class="checkmark"></span> Dubai <count>(11,438)</count></label>
                                                                            </li>
                                                                            <li>
                                                                                <label class="input-style-box">
                                                                                    <input name="" type="checkbox" value="">
                                                                                    <span class="checkmark"></span> Dubai <count>(11,438)</count></label>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--filter-mobile-box-->



                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-left-categories-destop-view">
                        <div class="in-product-left-categories" ><!--in-left-Categories-->

                            <h2 class="head-text">Price</h2>
                            <div class="other-range-box">
                                <div class="list-type">
                                    <div id="slider-container"></div>
                                    <p class="slider-values">
                                      <!--<input type="text" id="amount" />-->

                                        <input readonly="" class="min_value value-left" id="min"/>
                                        <input readonly="" class="max_value value-right" id="max"/>
                                    </p>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <h2 class="head-text">Brand</h2>
                            <div class="other-range-box brands">
                                <div class="search-box">
                                    <form >
                                        <div class="input-group">
                                            <input type="text" class="form-control m0"  placeholder="Search by Brand"  value="">
                                            <div class="input-group-addon">
                                                <input  type="submit" class="send m0" >
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="container">
                                    <div class="content pad0">
                                        <div class="demo">
                                            <div class="scrollbar-inner scroll-content scroll-scrolly_visible">
                                                <div class="list-type">
                                                    <ul>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> <a>Dubai</a> <count>(11,438)</count></label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> <a>Dubai</a> <count>(11,438)</count></label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> <a>Dubai</a> <count>(11,438)</count></label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> <a>Dubai</a> <count>(11,438)</count></label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> <a>Dubai</a> <count>(11,438)</count></label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> <a>Dubai</a> <count>(11,438)</count></label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> <a>Dubai</a> <count>(11,438)</count></label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> <a>Dubai</a> <count>(11,438)</count></label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> <a>Dubai</a> <count>(11,438)</count></label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> <a>Dubai</a> <count>(11,438)</count></label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> <a>Dubai</a> <count>(11,438)</count></label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> <a>Dubai</a> <count>(11,438)</count></label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> <a>Dubai</a> <count>(11,438)</count></label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> <a>Dubai</a> <count>(11,438)</count></label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> <a>Dubai</a> <count>(11,438)</count></label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> <a>Dubai</a> <count>(11,438)</count></label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> <a>Dubai</a> <count>(11,438)</count></label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> <a>Dubai</a> <count>(11,438)</count></label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> <a>Dubai</a> <count>(11,438)</count></label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> <a>Dubai</a> <count>(11,438)</count></label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> <a>Dubai</a> <count>(11,438)</count></label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="left-b card-link head-text" data-toggle="collapse" href="#collapse1">Targeted Group</a>
                                    </div>
                                    <div id="collapse1" class="collapse show" data-parent="#accordion">
                                        <div class="sizing">
                                            <div class="other-range-box">
                                                <div class="list-type">
                                                    <ul>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> <a>Men</a></label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> <a>Women</a></label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> <a>Unisex</a></label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> <a>Oriental</a></label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <a class="left-b card-link head-text" data-toggle="collapse" href="#collapse2">Perfume Size</a>
                                    </div>
                                    <div id="collapse2" class="collapse show" data-parent="#accordion">
                                        <div class="sizing">
                                            <div class="other-range-box">
                                                <div class="list-size-data">
                                                    <div class="size-data-filter">
                                                        <label class="input-size-data">
                                                            <input name="" type="checkbox" value="">
                                                            <span class="checkmark-size-data">25</span></label>
                                                    </div>
                                                    <div class="size-data-filter">
                                                        <label class="input-size-data">
                                                            <input name="" type="checkbox" value="">
                                                            <span class="checkmark-size-data">40</span></label>
                                                    </div>
                                                    <div class="size-data-filter">
                                                        <label class="input-size-data">
                                                            <input name="" type="checkbox" value="">
                                                            <span class="checkmark-size-data">50</span></label>
                                                    </div>
                                                    <div class="size-data-filter">
                                                        <label class="input-size-data">
                                                            <input name="" type="checkbox" value="">
                                                            <span class="checkmark-size-data">60</span></label>
                                                    </div>
                                                    <div class="size-data-filter">
                                                        <label class="input-size-data">
                                                            <input name="" type="checkbox" value="">
                                                            <span class="checkmark-size-data">65</span></label>
                                                    </div>
                                                    <div class="size-data-filter">
                                                        <label class="input-size-data">
                                                            <input name="" type="checkbox" value="">
                                                            <span class="checkmark-size-data">75</span></label>
                                                    </div>
                                                    <div class="size-data-filter">
                                                        <label class="input-size-data">
                                                            <input name="" type="checkbox" value="">
                                                            <span class="checkmark-size-data">80</span></label>
                                                    </div>
                                                    <div class="size-data-filter">
                                                        <label class="input-size-data">
                                                            <input name="" type="checkbox" value="">
                                                            <span class="checkmark-size-data">85</span></label>
                                                    </div>
                                                    <div class="size-data-filter">
                                                        <label class="input-size-data">
                                                            <input name="" type="checkbox" value="">
                                                            <span class="checkmark-size-data">90</span></label>
                                                    </div>
                                                    <div class="size-data-filter">
                                                        <label class="input-size-data">
                                                            <input name="" type="checkbox" value="">
                                                            <span class="checkmark-size-data">100</span></label>
                                                    </div>
                                                    <div class="size-data-filter">
                                                        <label class="input-size-data">
                                                            <input name="" type="checkbox" value="">
                                                            <span class="checkmark-size-data">110</span></label>
                                                    </div>
                                                    <div class="size-data-filter">
                                                        <label class="input-size-data">
                                                            <input name="" type="checkbox" value="">
                                                            <span class="checkmark-size-data">120</span></label>
                                                    </div>
                                                    <div class="size-data-filter">
                                                        <label class="input-size-data">
                                                            <input name="" type="checkbox" value="">
                                                            <span class="checkmark-size-data">125</span></label>
                                                    </div>
                                                    <div class="size-data-filter">
                                                        <label class="input-size-data">
                                                            <input name="" type="checkbox" value="">
                                                            <span class="checkmark-size-data">150</span></label>
                                                    </div>
                                                    <div class="size-data-filter">
                                                        <label class="input-size-data">
                                                            <input name="" type="checkbox" value="">
                                                            <span class="checkmark-size-data">250</span></label>
                                                    </div>
                                                    <div class="clear"></div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <a class="left-b card-link head-text" data-toggle="collapse" href="#collapse3">Discount %</a>
                                    </div>
                                    <div id="collapse3" class="collapse show" data-parent="#accordion">
                                        <div class="sizing">
                                            <div class="other-range-box">
                                                <div class="list-type">
                                                    <ul>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> 0 - 10 <count>( 476)</count> </label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> 10 - 20 <count>( 476)</count> </label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> 20 - 30 <count>( 476)</count> </label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> 30 - 40 <count>( 476)</count> </label>
                                                        </li>
                                                        <li>
                                                            <label class="input-style-box">
                                                                <input name="" type="checkbox" value="">
                                                                <span class="checkmark"></span> 40 - 50 <count>( 476)</count> </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a id="clear_filter">Clear search</a>

                </aside>

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

