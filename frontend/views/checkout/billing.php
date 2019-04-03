<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\CartSummaryWidget;
use common\models\Emirates;
use yii\helpers\ArrayHelper;
use common\models\UserAddress;

$this->title = 'Checkout';
?>
<div id="cart-page" class="inner-page checkout-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 order1">
                <div class="checkout-step">
                    <div class="step-header">
                        <div class="title">Select delivery address</div>
                        <div class="info">You have a saved address in this location</div>
                    </div>

                    <?php $form = ActiveForm::begin(['id' => 'address-form']); ?>
                    <div class="box-rack">
                        <input type="hidden" name="UserAddress[billing]" id='selected-address'>
                        <?php foreach ($addresses as $address) { ?>    
                            <div class="box">
                                <div class="box-inner">
                                    <div class="icon-div">
                                        <span class="icon-location"></span>
                                    </div>
                                    <div class="address">
                                        <div class="title">Address</div>
                                        <p>
                                            <?= $address->name . ',' ?><br>
                                            <?= $address->address . ',' ?><br>
                                            <?= $address->landmark . ',' ?><br>
                                            <?= $address->location . ',' ?><br>
                                            <?php $emirate = Emirates::findOne($address->emirate) ?>
                                            <?= $emirate->name . ',' ?><br>
                                        </p>
                                        <a href="" class="btn-slct delivery-address" id="<?= $address->id ?>">Deliver Here</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>


                        <div class="box add-new">
                            <div class="box-inner">
                                <div class="icon-div">
                                    <span class="icon-location"></span>
                                </div>
                                <div class="address">
                                    <div class="title">Add New Address</div>
<!--                                    <p>
                                        Office#4, 1st Floor, Al Rouhani Building,We appreciate your
                                        business
                                        Diera, Dubai - UAE
                                    </p>-->

                                    <a href="#!" class="btn-slct" data-toggle="modal" data-target="#exampleModal">Add
                                        New</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>

                    <div class="modal left fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="form-header">
                                        <a class="close" data-dismiss="modal">
                                            <img width="12" src="<?= Yii::$app->homeUrl ?>images/icons/cancel.png" />
                                        </a>
                                        <h6 class="title">Save delivery address</h6>
                                    </div>
                                    <?php $form1 = ActiveForm::begin(['id' => 'add-address']); ?>
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" placeholder="" class="form-control"
                                                       name="UserAddress[name]" required="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" placeholder="" class="form-control"
                                                       name="UserAddress[address]" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Landmark</label>
                                                <input type="text" placeholder="" class="form-control"
                                                       name="UserAddress[landmark]" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" placeholder="" class="form-control"
                                                       name="UserAddress[location]" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Emirate</label>
                                                <?=
                                                Html::activeDropDownList($model, 'emirate', ArrayHelper::map(Emirates::find()->all(), 'id', 'name'), [
                                                    'class' => 'form-control', 'prompt' => 'select','required'=>''
                                                ])
                                                ?>
                                            </div>
                                        </div>  
                                        <div class="col-md-12 ">
                                            <div class="form-group">
                                                <label>Mobile Number</label>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select id="useraddress-country_code" name="UserAddress[country_code]" class="form-control country-code" required="">
                                                            <?php foreach ($country_codes as $country_code) { ?>
                                                                <option value="<?= $country_code ?>" ><?= $country_code ?></option>
                                                            <?php }
                                                            ?>
                                                        </select>

                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="UserAddress[mobile_number]" required="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <button type="submit" class="orng-btn">Save address & proceed</button>
                                        </div>
                                    </div>
                                    <?php ActiveForm::end(); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="track-line line-ash"></div>
                    <div class="step-icon">
                        <span class="step-count">01</span>
                    </div>
                </div>
                <div class="checkout-step _fade">
                    <div class="step-header">
                        <div class="title">Payment</div>
                        <div class="info">Select a Payment Method</div>
                    </div>
                    <!-- <div class="track-line line-ash"></div> -->
                    <div class="step-icon">
                        <span class="step-count">02</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 order0">

                <?= CartSummaryWidget::widget(); ?>

            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function () {
        $('.delivery-address').click(function (e) {
            e.preventDefault();
            var address = $(this).attr('id');
            $('#selected-address').val(address);
            $('#address-form').submit();
        });

        $(document).on('submit', '#add-address', function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                type: "POST",
                url: homeUrl + 'checkout/add-address',
                data: data,
                success: function (data) {
                 var obj=JSON.parse(data);
                 $('#selected-address').val(obj.address);
                 $('#address-form').submit();
                }
            });
        });
    })
</script>