<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

$datas = Yii::$app->session['datas'];
$amount = $datas['amount'] / 100;
$this->title = 'Payment success';
?>

<div id="cart-page" class="inner-page checkout-page payment-page">
    <div class="container">
        <div class="row">
            <div class="icon-tick"></div>
            <h3 class="haed">You order with 'Cash on Delivery' has Been<br> Completed successfully</h3>
            <h4 class="sub-haed">Your order has been processed....</h4>
            <?= Html::a('Continue shopping', ['/site/index'], ['class' => 'link']) ?>
        </div>
    </div>
</div>
