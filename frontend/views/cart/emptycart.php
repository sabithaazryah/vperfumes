<?php

use yii\helpers\Html;

if (isset($meta_title) && $meta_title != '')
    $this->title = $meta_title;
else
    $this->title = 'Shopping Cart';
?>
<style>
    .empty-link{
        font-size: 18px;
    color: rgb(255, 255, 255);
    text-transform: uppercase;
    line-height: 38px;
    background-color: #f0ae44;
    width: 345px;
    height: 53px;
    display: block;
    text-align: center;
    padding: 8px 0;
    margin-top: 30px;
    }
    
</style>

<div class="top-margin"></div>
<div class="breadcrumb">
    <div class="container">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a class="current" href="javascript:void(0)">Cart</a></li>
        </ul>
    </div>
</div>
<section id="cart-page">
    <div class="container">
        <div class="empty-outer">
         
            <h3 class="head">Your Shopping Cart is Empty !</h3>
            <a href="<?= Yii::$app->homeUrl ?>" class="empty-link">Continue shopping</a>
        </div>
    </div>
</section>
