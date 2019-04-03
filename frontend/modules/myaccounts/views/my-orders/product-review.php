<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Vperfumes Product Review';
?>
<div id="product-review-page" class="inner-page">
    <section class="breadcrumb">
        <div class="self_container container">
            <ul>
                <li><?= Html::a(Home, ['/site/index']) ?></li>
                <li class="current"><a><?= $product_details->product_name ?></a></li>
            </ul>
        </div>
    </section>

    <section class="product-review">
        <div class="self_container container">
            <div class="row">
                <div class="col-md-4">
                    <div class="review-left">
                        <div class="review-left-head">
                            <h5>What makes a good review</h5>
                        </div>
                        <div class="review-left-body">
                            <div class="content-box">
                                <h6>Have you used this product?</h6>
                                <p>Your review should be about your experience with the product.</p>
                            </div>
                            <div class="content-box">
                                <h6>Why review a product?</h6>
                                <p>Your valuable feedback will help fellow shoppers decide!</p>
                            </div>
                            <div class="">
                                <h6>How to review a product?</h6>
                                <p>Your review should include facts. An honest opinion is always appreciated. If you have an issue with the product or service please contact us from the help centre.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="review-right">
                        <div class="review-right-head">
                            <?php
                            $product_image = Yii::$app->basePath . '/../uploads/product/' . $product_details->id . '/profile/' . $product_details->canonical_name . '.' . $product_details->profile;
                            if (file_exists($product_image)) {
                                $image = Yii::$app->homeUrl . 'uploads/product/' . $product_details->id . '/profile/' . $product_details->canonical_name . '.' . $product_details->profile;
                            } else {
                                $image = Yii::$app->homeUrl . 'uploads/product/profile_thumb.png';
                            }
                            ?>
                            <div class="row content">
                                <div class="col-2">
                                    <div class="img-box">
                                        <img src="<?= $image ?>" alt="<?= $product_details->canonical_name ?>"/>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="pro-box">
                                        <?= Html::a(ucwords($product_details->product_name), ['/product/product-detail', 'product' => $product_details->canonical_name], ['title' => $product_details->product_name, 'class' => 'title']) ?>
                                        <div class="rate-summary">
                                            <span class="rate-num"><?= Yii::$app->SetValues->Rating($product_details->id) ?><span class="icon">★</span></span><span class="rate-count"><?= Yii::$app->SetValues->RatingCount($product_details->id) ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="review-right-body">
                            <?php $form = ActiveForm::begin(); ?>
                            <h6>Rate & Review this product</h6>
                            <?= \common\components\AlertMessageWidget::widget() ?>
                            <?php
                            if (!empty($review)) {
                                if ($review->tittle != '') {
                                    $model->tittle = $review->tittle;
                                }
                                if ($review->description != '') {
                                    $model->description = $review->description;
                                }
                                $rating_point = '';
                                if ($review->rating_point != '') {
                                    $rating_point = $review->rating_point;
                                }
                            }
                            ?>
                            <div class="rating">
                                <label>
                                    <input type="radio" name="CustomerReviews[rating_point]" value="1" <?= $rating_point == '' || $rating_point == 1 ? 'checked' : '' ?>/>
                                    <span class="icon" title="Very Bad">★</span>
                                </label>
                                <label>
                                    <input type="radio" name="CustomerReviews[rating_point]" value="2" <?= $rating_point == 2 ? 'checked' : '' ?>/>
                                    <span class="icon">★</span>
                                    <span class="icon" title="Bad">★</span>
                                </label>
                                <label>
                                    <input type="radio" name="CustomerReviews[rating_point]" value="3" <?= $rating_point == 3 ? 'checked' : '' ?>/>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon" title="Good">★</span>   
                                </label>
                                <label>
                                    <input type="radio" name="CustomerReviews[rating_point]" value="4" <?= $rating_point == 4 ? 'checked' : '' ?>/>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon" title="Very Good">★</span>
                                </label>
                                <label>
                                    <input type="radio" name="CustomerReviews[rating_point]" value="5" <?= $rating_point == 5 ? 'checked' : '' ?>/>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon" title="Excellent">★</span>
                                </label>
                            </div>
                            <?= $form->field($model, 'tittle')->textInput(['placeholder' => 'Title (Optional)'])->label(FALSE) ?>
                            <?= $form->field($model, 'description')->textarea(['rows' => 6])->label(FALSE) ?>
                            <input type="hidden" name="CustomerReviews[product_id]" value="<?= $product_details->id ?>" />
                            <div class="form-group">
                                <?= Html::submitButton('Submit', ['class' => 'orng-btn']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
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

