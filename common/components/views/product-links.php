<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>

<?php
if ($product_details->offer_price != "0" && isset($product_details->offer_price)) {
    $percentage = round(100 - (($product_details->offer_price / $product_details->price) * 100));
    $main_price = $product_details->offer_price;
    $price = 'AED ' . $product_details->price;
} else {
    $main_price = $product_details->price;
    $price = '.';
}
$product_image = Yii::$app->basePath . '/../uploads/product/' . $product_details->id . '/profile/' . $product_details->canonical_name . '_big.' . $product_details->profile;
if (file_exists($product_image)) {
    $image_src = Yii::$app->homeUrl . 'uploads/product/' . $product_details->id . '/profile/' . $product_details->canonical_name . '_big.' . $product_details->profile;
} else {
    $image_src = Yii::$app->homeUrl . 'uploads/product/gallery_dummy.png';
}
$gallery_image = $image_src;
$path = Yii::getAlias('@paths') . '/product/' . $product_details->id . '/gallery_thumb';
if (count(glob("{$path}/*")) > 0) {
    $k = 0;
    foreach (glob("{$path}/*") as $file) {
        if ($k <= '1') {
            $k++;
            $arry = explode('/', $file);
            $img_nmee = end($arry);
            $img_nmees = explode('.', $img_nmee);
            if ($img_nmees['1'] != '') {
                $gallery_image_path = Yii::$app->homeUrl . 'uploads/product/' . $product_details->id . '/gallery_thumb/' . end($arry);
                $gallery_image = Yii::$app->basePath . '/../uploads/product/' . $product_details->id . '/gallery_thumb/' . end($arry);
            }
        }
    }
}
if (file_exists($gallery_image)) {
    $gallery_image = $gallery_image_path;
} else {
    $gallery_image = $image_src;
}
?>

<div class="one-slide mx-auto">
    <div class="m010 d-flex flex-direction-column justify-content-center flex-wrap align-items-center">
        <div class="product-box">
            <div class="off-tag"><?= $percentage ?>% OFF</div>
            <a href="#!" class="img-box">
                <img src="<?= $image_src ?>" alt="<?= $product_details->profile_alt ?>" class="img-fluid pic-1"/>
                <img src="<?= $gallery_image ?>" alt="<?= $product_details->profile_alt ?>" class="img-fluid pic-2"/>
            </a>
            <ul class="social">
                <li><a href="" data-tip="Quick View"><img src="<?= Yii::$app->homeUrl ?>images/icons/eye-icon.png"/></a></li>
                <li><a href="" data-tip="Add to Wishlist"><img src="<?= Yii::$app->homeUrl ?>images/icons/heart-icon.png"/></a></li>
                <li><a href="" data-tip="Similar Products"><img src="<?= Yii::$app->homeUrl ?>images/icons/similar.png"/></a></li>
            </ul>
            <div class="content">
                <div class="points"><span>40</span> points</div>
                <?php
                if (strlen($product_details->product_name) > 35) {
                    $pname = substr(strtolower($product_details->product_name), 0, 30) . "..";
                } else {
                    $pname = strtolower($product_details->product_name);
                }
                ?>
                <?= Html::a(ucwords($pname), ['product/product-detail', 'product' => $product_details->canonical_name], ['title' => $product_details->product_name, 'class' => 'title']) ?>
                <div class="off-price">AED <?= $main_price; ?></div>
                <div class="og-price">AED <?= $product_details->price; ?></div>
            </div>
            <div class="box-foot">
                <a class="check-out cart-button" href="#!"><i class="bag-icon"></i> Add to cart</a>
            </div>
        </div>
    </div>
</div>