<?php

use yii\helpers\Html;

$action = Yii::$app->controller->id . '/' . Yii::$app->controller->action->id;
?>
<div class="my-account-category">
    <div class="account-top-details">
        <div class="img-box"><img src="<?= Yii::$app->homeUrl ?>images/icons/account-img.png" width="66" height="66"></div>
        <h2 class="account-name">Rency Daniel</h2>
        <h3 class="account-mail">ajrency@gmail.com</h3>
    </div>
    <div class="category-list">
        <ul>
            <li class=" <?= $action == 'my-orders/index' ? 'active' : '' ?>"><?= Html::a('My Orders', ['/myaccounts/my-orders/index']) ?></li>
            <li class=" <?= $action == 'user/user-address' ? 'active' : '' ?>"><?= Html::a('Shipping Addresses', ['/myaccounts/user/user-address']) ?></li>
            <li class=" <?= $action == 'user/wish-list' ? 'active' : '' ?>"><?= Html::a('Wish Lists', ['/myaccounts/user/wish-list']) ?></li>
            <li class=" <?= $action == 'user/personal-info' ? 'active' : '' ?>"><?= Html::a('Account Settings', ['/myaccounts/user/personal-info']) ?></li>
        </ul>
    </div>
</div>