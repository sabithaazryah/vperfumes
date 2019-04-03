<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

$datas = Yii::$app->session['datas'];
$amount = $datas['amount'] / 100;
$this->title = 'Payment success';
?>


<section id="order-successfully-page">
    <div class="in-order-successfully-page">
        <div class="container">
            <div class="icon-tick"></div>
            <h3 class="haed">You order with 'Cash on Delivery' has Been<br> Completed successfully</h3>
            <h4 class="sub-haed">Your order has been processed....</h4>
            <?= Html::a('Continue shopping', ['/site/index'], ['class' => 'link']) ?>
        </div>
    </div>
</section>

<style>
    #order-successfully-page{
        background: #fff;  
    }
    #order-successfully-page .in-order-successfully-page{
        padding: 50px 0 0px;
        min-height: 475px;
        text-align: center;
    }
    #order-successfully-page .haed{
        font-size: 30px;
        margin-bottom: 10px;
        line-height: 40px;
        color: #6bb337;
    }
    #order-successfully-page .sub-haed{
        font-size: 13px;
        margin-bottom: 30px;
        color: #afaaaa;
    }
    #order-successfully-page .link{
        border: 1px solid #000;
        padding: 10px 20px;
        display: inline-block;
        color: #afaaaa;
        text-transform: capitalize;
        font-size: 14px;
        font-weight: 400;
    }
</style>