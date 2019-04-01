<?php

namespace frontend\controllers;

use yii;
use common\models\OrderMaster;
use common\models\UserAddress;
use common\models\OrderDetails;
use common\models\Product;
use common\models\Settings;
use common\models\Cart;
use common\models\OrderPromotions;
use yii\helpers\ArrayHelper;
use common\models\CreateYourOwn;
use Start;
use Start_Charge;

class CheckoutController extends \yii\web\Controller {

    public function init() {
        date_default_timezone_set('Asia/Kolkata');
    }

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionPromotion() {
        $this->redirect(array('checkout/checkout'));
    }

    public function actionCheckout() {

        if (isset(Yii::$app->user->identity->id)) {
            if (Yii::$app->session['orderid'] && count(Cart::orderdetails()) > 0) {
                $address = UserAddress::find()->where(['user_id' => Yii::$app->user->identity->id])->all();
                $default_address = UserAddress::find()->where(['user_id' => Yii::$app->user->identity->id, 'status' => 1])->one();
                $country_codes = ArrayHelper::map(\common\models\CountryCode::find()->where(['status' => 1])->orderBy(['id' => SORT_ASC])->all(), 'id', 'country_code');
                $flag = 0;
                $model = new UserAddress();
                if ($model->load(Yii::$app->request->post())) {
                    if (isset(Yii::$app->request->post()['UserAddress']['billing']) && Yii::$app->request->post()['UserAddress']['billing'] != '') {
                        $bill_address = Yii::$app->request->post()['UserAddress']['billing'];
                        $user_addr = UserAddress::findOne($bill_address);
                        $user_addr->save();
                        Yii::$app->CartFunctionality->orderbilling($bill_address);
                        Yii::$app->CartFunctionality->orderaddress($bill_address);
                        $this->redirect(array('payment'));
                    }
                }
                return $this->render('billing', ['model' => $model, 'addresses' => $address, 'country_codes' => $country_codes, 'default_address' => $default_address, 'flag' => $flag]);
            } else {
                $this->redirect(array('cart/mycart'));
            }
        } else {
            $this->redirect(array('site'));
        }
    }

    public function actionPayment() {
        $selected_billing_address = '';
        $model = OrderMaster::find()->where(['order_id' => Yii::$app->session['orderid']])->one();
        if (isset($model->bill_address_id) && $model->bill_address_id != '') {
            $selected_billing_address = UserAddress::findOne($model->bill_address_id);
        }
        if (\Yii::$app->request->post()) {
            if (isset(Yii::$app->user->identity->id)) {
                if (Yii::$app->session['orderid']) {
                    $model = OrderMaster::find()->where(['order_id' => Yii::$app->session['orderid']])->one();
                    $model->payment_mode = Yii::$app->request->post()['payment_type'];
                    ;
                    if ($model->save()) {
                        Yii::$app->CartFunctionality->CodeUsedSingle($model->id);
                        if ($model->payment_mode == 1) {
                            $this->redirect(array('cash-on-delivery', 'id' => $model->order_id)); /* for cash on delivery */
                        } elseif ($model->payment_mode == 2) {
                            $this->redirect(array('paypal', 'id' => $model->order_id)); /* for paytab payment gateway */
                        }
                    }
                } else {
                    $this->redirect(array('cart/mycart'));
                }
            } else {
                $this->redirect(array('site/login'));
            }
        }
        return $this->render('payment', ['model' => $model, 'selected_billing_address' => $selected_billing_address]);
    }

    public function actionCashOnDelivery($id) {
        $order_master = OrderMaster::find()->where(['order_id' => $id])->one();
        $order_master->status = 4; /* order confirmed for 4 */
        $order_master->payment_status = 3; /* payment success for 1 and 0 for fail  3 for cas on delivery */

        if ($order_master->save()) {
            $payment_status = 'Cash on Delivery';
            $cart = Cart::find()->where(['user_id' => Yii::$app->user->identity->id])->all();
            $message = $this->renderPartial('mail', ['orderid' => Yii::$app->session['orderid'], 'payment_status' => $payment_status]);

//            Yii::$app->CartFunctionality->purchasemail(Yii::$app->session['orderid'], $message);
            $this->stock_clear($order_master);
            Yii::$app->CartFunctionality->clearcart($cart);
            Yii::$app->session['orderid'] = '';
        }
        return $this->redirect('cash-delivery-success');
    }

    public function stock_clear($orders) {
        $order_details = OrderDetails::find()->where(['order_id' => $orders['order_id']])->all();
        foreach ($order_details as $order) {
            $product = Product::findOne($order->product_id);
            $stock = $product->stock - $order->quantity;
            $product->stock = $stock > 0 ? $stock : 0;
            if ($product->stock == 0) {
                $this->stockOutMail($product);
            }
            $product->save();
        }
    }

    public function stockOutMail($model) {
        $message = Yii::$app->mailer->compose('stockout-mail', ['model' => $model]) // a view rendering result becomes the message body here
                ->setFrom('no-replay@perfumedunia.com')
                ->setTo(Yii::$app->params['adminEmail'])
                ->setSubject('Stock Out');
        $message->send();

        return TRUE;
    }

    public function actionPaypal($id) {/* action for creating pay page */

        $discount = 0;
        $model = OrderMaster::find()->where(['order_id' => $id])->one();
        $bill_address = UserAddress::findOne($model->bill_address_id);
        $promotion = OrderPromotions::find()->where(['order_master_id' => $model->id])->all();

        foreach ($promotion as $promo) {
            $discount += $promo->promotion_discount;
        }
        $user_details = \common\models\User::findOne(['id' => $model->user_id]);
        $order_details = OrderDetails::find()->where(['order_id' => $id])->all();
        $limit = Settings::findOne(1)->value; /* for minimum purchase for free delivery */
        $extra = Settings::findOne(2)->value; /* shows exytra shipping charge */
        $tax_amount = 0;
        foreach ($order_details as $order) {
            $tax = 0;
            $product = \common\models\Product::findOne($order->product_id);
            if ($product->offer_price == NULL && empty($product->offer_price)) {
                $price = $product->price;
            } else {
                $price = $product->offer_price;
            }
            if (isset($product->tax) && $product->tax != '') {
                $tax_detail = \common\models\Tax::findOne($product->tax);
                if (isset($tax_detail)) {
                    if ($tax_detail->type == 1) {
                        $tax = $price * $tax_detail->value / 100;
                    } else if ($tax_detail->type == 2) {
                        $tax = $price + $tax_detail->value;
                    }
                }
            }
            $tax_amount += $tax;
        }



        return $this->render('paypal', [
                    'model' => $model,
                    'user_details' => $user_details,
                    'order_details' => $order_details,
                    'limit' => $limit,
                    'extra' => $extra,
                    'discount' => $discount,
//			    'ship_address' => $ship_address,
                    'bill_address' => $bill_address,
        ]); /* here paypage is created */
    }

    public function actionPaypalForm($url, $p_id, $order_id) {/* after creating paypage we get the url and action is used to redirect to the url */

        $model = OrderMaster::find()->where(['id' => $order_id])->one(); /* order mastre model */

        $model->payment_ref_number = $p_id; /* reference id got after creating the pay page */

        if ($model->update() && Yii::$app->session['ref_id'] = $p_id) {
            /* save the ref id in order master table for comparing payment respose result */
            Yii::$app->session['payment-order-id'] = $order_id;

            return $this->redirect($url);
        } else {

            return $this->redirect(['site/error']);
        }
    }

    public function actionPaymentResponse($ref_id) {/* after submitting the card details it will redirect to payment-response.php outer the frontend application from there it will redirect to current action */

        if (Yii::$app->session['ref_id'] == $ref_id) {/* comparing the refernce id with the saved one */
            $response = $ref_id;
            return $this->render('payment-result', ['p_ref' => $response]);
        } else {
            $order = OrderMaster::findOne(Yii::$app->session['payment-order-id']);
            if (!empty($order)) {
                $order->payment_status = 2;
                $order->save();
            } return $this->render('payment-failed');
        }
    }

    public function actionPaymentResult($result) {/* save the payment response */
        \Yii::$app->response->format = 'json';
        $result_data = \yii\helpers\Json::decode($result);
        $order_master = OrderMaster::find()->where(['payment_ref_number' => $result_data['pt_invoice_id']])->one();

        if ($result_data['response_code'] == 100) {/* 100 indicates transaction success */
            if (Yii::$app->session['payment-order-id'] == $order_master->id) {
                $order_master->status = 4; /* order confirmed for 4 */
                $order_master->payment_status = 1; /* payment success for 1 and 0 for fail */
                $order_master->payment_sucess_data = $result;
                if ($order_master->save()) {
                    $cart = Cart::find()->where(['user_id' => Yii::$app->user->identity->id])->all();
                    $payment_status = 'Credit/Debit card payment';
                    $message = $this->renderPartial('mail', ['orderid' => Yii::$app->session['orderid'], 'payment_status' => $payment_status]);
                    Cart::purchasemail(Yii::$app->session['orderid'], $message);
                    Cart::stock_clear($order_master);
                    Cart::clearcart($cart);
                    Yii::$app->session['orderid'] = '';
                    Yii::$app->session['ref_id'] = '';
                    Yii::$app->getSession()->setFlash('success_', 'Successfully Ordered');
                }

                return $this->redirect('cash-payment-success');
            }
        } else {

            Yii::$app->session['ref_id'] = '';
            $order_master->payment_status = 2;
            $order_master->payment_sucess_data = $result;

            $order_master->status = 4; /* order confirmed for 4 */
            $order_master->save();
            return $this->redirect('payment-failed');
        }
    }

    public function actionCashDeliverySuccess() {
        return $this->render('cash-delivery-success');
    }

    public function actionCashPaymentSuccess() {
        return $this->render('cash-payment-success');
    }

    public function actionPaymentFailed() {
        return $this->render('payment-failed');
    }

    public function actionGetadress() {
        if (yii::$app->request->isAjax) {
            $id = Yii::$app->request->post()['id'];
            if (isset($id)) {
                $address = UserAddress::find()->where(['user_id' => Yii::$app->user->identity->id, 'id' => $id])->one();
                if ($address) {
                    echo json_encode(['rslt' => 'success', 'name' => $address->name, 'address' => $address->address, 'landmark' => $address->landmark, 'location' => $address->location, 'emirate' => $address->emirate, 'post_code' => $address->post_code, 'mobile_number' => $address->mobile_number, 'country_code' => $address->country_code]);
                } else {
                    echo json_encode(['rslt' => 'error', 'msg' => 'No details Found']);
                }
            } else {
                echo json_encode(['rslt' => 'error', 'msg' => 'address cannot be set']);
            }
        }
    }

    public function actionContinue($id) {
        Yii::$app->session['orderid'] = $id;
        $cart_items = OrderDetails::find()->where(['order_id' => Yii::$app->session['orderid']])->all();
        $subtotal = Cart::total($cart_items);
        $shippinng_limit = Settings::findOne(1)->value;
        $ship_charge = Settings::findOne(2)->value;
        $shipping = $shippinng_limit > $subtotal ? $ship_charge : '0';
        $grand_total = $shipping + $subtotal;
        return $this->render('continue', ['cart_items' => $cart_items, 'subtotal' => $subtotal, 'shipping' => $shipping, 'grand_total' => $grand_total, 'ship_charge' => $ship_charge]);
    }

    public function actionRemoveOrder() {
        if (yii::$app->request->isAjax) {
            $id = Yii::$app->request->post()['id'];
            $cart = OrderDetails::findone(yii::$app->EncryptDecrypt->Encrypt('decrypt', $id));
            $order_id = $cart->order_id;
            $cart_items = OrderDetails::find()->where(['order_id' => $order_id])->all();
            if ($cart->delete()) {
                $contents = OrderDetails::find()->where(['order_id' => $order_id])->all();
                if (!empty($contents)) {
                    if (count($cart_items) != Yii::$app->request->post()['count']) {
                        echo json_encode(array('msg' => 'failed', 'content' => 'orderhistory', 'order_id' => $order_id));
                        exit;
                    } else {
                        $subtotal = Cart::total($contents);
                        Cart::updatemaster($order_id, $subtotal);
                        $shippinng_limit = Settings::findOne(2)->value;
                        $ship_charge = Settings::findOne(3)->value;
                        $shipping = $shippinng_limit > $subtotal ? $ship_charge : 0;
                        $grandtotal = $shipping + $subtotal;
                        echo json_encode(array('msg' => 'success', 'subtotal' => sprintf('%0.2f', $subtotal), 'grandtotal' => sprintf('%0.2f', $grandtotal), 'shipping' => sprintf('%0.2f', $shipping)));
                        exit;
                    }
                } else {
                    echo json_encode(array('msg' => 'failed', 'content' => 'orderhistory', 'order_id' => $order_id));
                    exit;
                }
            } else {
                echo json_encode(array('msg' => 'failed', 'content' => 'orderhistory', 'order_id' => $order_id));
                exit;
            }
        }
    }

    public function actionProceed() {
        $orderdetails = OrderDetails::find()->where(['order_id' => Yii::$app->session['orderid']])->all();
        foreach ($orderdetails as $details) {
            Cart::updatedetails($details);
        }
        $subtotal = Cart::total($orderdetails);
        Cart::updatemaster(Yii::$app->session['orderid'], $subtotal);
        $this->redirect(array('checkout/promotion'));
    }

    public function actionUpdatecart() {
        if (yii::$app->request->isAjax) {
            $cart_id = Yii::$app->request->post()['cartid'];
            $qty = Yii::$app->request->post()['quantity'];
            if (isset($cart_id)) {
                $cart = OrderDetails::findone(yii::$app->EncryptDecrypt->Encrypt('decrypt', $cart_id));
                $product = Product::findOne($cart->product_id);
                if ($qty == 0 || $qty == "") {
                    $qty = 1;
                }
                $cart->quantity = $qty > $product->stock ? $product->stock : $qty;
                $price = cart::productPrice($cart->product_id);
                $total = $price * $cart->quantity;
                $cart->amount = $price;
                $cart->rate = $total;
                if ($cart->save()) {
                    $cart_items = OrderDetails::find()->where(['order_id' => $cart->order_id])->all();
                    if (!empty($cart_items)) {
                        $subtotal = Cart::total($cart_items);
                        $shippinng_limit = Settings::findOne(1)->value;
                        $ship_charge = Settings::findOne(2)->value;
                        $shipping = $shippinng_limit > $subtotal ? $ship_charge : 0;
                        $grandtotal = $shipping + $subtotal;
                    }
                    Cart::updatemaster($cart->order_id, $subtotal);
                    echo json_encode(array('msg' => 'success', 'subtotal' => sprintf('%0.2f', $subtotal), 'grandtotal' => sprintf('%0.2f', $grandtotal), 'shipping' => sprintf('%0.2f', $shipping)));
                } else {
                    echo json_encode(array('msg' => 'error', 'content' => 'Cannot be Changed'));
                }
            } else {
                echo json_encode(array('msg' => 'error', 'content' => 'Id cannot be set'));
            }
        }
    }

    public function actionFindstock() {
        if (yii::$app->request->isAjax) {
            $cart_id = Yii::$app->request->post()['cartid'];
            $qty = Yii::$app->request->post()['quantity'];
            if (isset($cart_id)) {
                $cart = OrderDetails::findOne(yii::$app->EncryptDecrypt->Encrypt('decrypt', $cart_id));
                if ($qty == 0 || $qty == "") {
                    $qty = 1;
                }
                $product = Product::find()->where(['id' => $cart->product_id, 'status' => '1'])->one();
                if (!empty($product)) {
                    $quantity = $qty > $product->stock ? $product->stock : $qty;
                    if ($product->offer_price == '0' || $product->offer_price == '') {
                        $price = $product->price;
                    } else {
                        $price = $product->offer_price;
                    }
                    $total = $price * $quantity;
                    echo json_encode(array('msg' => 'success', 'quantity' => $quantity, 'total' => sprintf('%0.2f', $total)));
                } else {
                    echo json_encode(array('msg' => 'error', 'quantity' => '', 'total' => sprintf('%0.2f', '0')));
                }
            }
        }
    }

    /*     * ****************************************** */



    /*
     * check the promotion code is already used or not
     */

    public function CodeUsed($code_exists) {
        $code_used_list = explode(',', $code_exists->code_used);
        if (($code_exists->code_usage == 1)) {
            if (!in_array(Yii::$app->user->identity->id, $code_used_list)) {
                $permision = 0;
            } else {
                $permision = 1;
            }
        } else {
            $permision = 0;
        }

        return $permision;
    }

    /*
     * check the promotion code validity
     */

    public function CheckDate($code_exists) {
        $date_from_user = date('Y-m-d');
        $start_ts = strtotime($code_exists->starting_date);
        $end_ts = strtotime($code_exists->expiry_date);
        $user_ts = strtotime($date_from_user);
        return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
    }

    /*
     * check the purchased product or user is in this promotion code
     */

    public function PromotionProduct($code_exists, $code) {
        $products = explode(',', $code_exists->product_id);
        $users = explode(',', $code_exists->user_id);
        $order_master = OrderMaster::find()->where(['order_id' => Yii::$app->session['orderid']])->one();
        $oreder_setails = OrderDetails::find()->where(['master_id' => $order_master->id])->all();
        $exist = 0;

        if ($code_exists->promotion_type == 1 || $code_exists->promotion_type == 3) {
            foreach ($oreder_setails as $value) {
                if (in_array($value->product_id, $products)) {
                    $exist = 1;
                }
            }
        }
        if ($code_exists->promotion_type == 2 || $code_exists->promotion_type == 3) {
            if (in_array($order_master->user_id, $users))
                $exist = 1;
        }
        return $exist;
    }

    /*
     * add this user used this code
     */

    public function AddUsed($code_exists) {

        $code_exists->code_used = $code_exists->code_used . ',' . Yii::$app->user->identity->id;
        $code_exists->save();
    }

    function stock_change() {
        $order_details = OrderDetails::find()->where(['order_id' => Yii::$app->session['orderid']])->all();
        foreach ($order_details as $detail) {
            if ($detail->item_type == '0') {
                $product = Product::findOne($detail->product_id);
                $product->stock = ($product->stock - $detail->quantity);
                $product->save();
            }
        }
    }

    public function sendMail($orderid) {
        $mail = \common\models\User::findOne(Yii::$app->user->identity->id)->email;
        $message = Yii::$app->mailer->compose('confirm_mail', ['orderid' => $orderid]) // a view rendering result becomes the message body here
                ->setFrom('no-replay@coralperfumes.com')
                ->setTo($mail)
                ->setSubject('Order Confirm');
        $message->send();
        return TRUE;
    }

    public function actionPaymentReturn() {
        $order_details = OrderMaster::findOne(['order_id' => $_POST['identifier']]);
        if (!empty($order_details)) {
            $order_details->payment_status = 0;
            $order_details->status = 4; /* order confirmed for 4 */
            $order_details->save();
            if ($order_details->net_amount == $_POST['order_amount']) {
                $api_keys = array(
                    "secret_key" => "live_sec_k_09bf566f9712ad30edd82",
                    "open_key" => "live_open_k_e6c26da2c5ead17faf2f"
                );
                $token = $_POST["startToken"];
                $email = $_POST["startEmail"];
                $amount_in_cents = $_POST['order_amount'] * 100;
                $currency = "AED";
                $customer_email = "surumi@azryah.com";
                Start::setApiKey($api_keys["secret_key"]);
                try {

                    $charge = Start_Charge::create(array(
                                "amount" => $amount_in_cents,
                                "currency" => $currency,
                                "card" => $token,
                                "email" => $email,
                                "ip" => $_SERVER["REMOTE_ADDR"],
                                "description" => "Charge Description"
                    ));

                    if (!empty($charge)) {
                        \Yii::$app->response->format = 'json';
                        $payment_success = \yii\helpers\Json::encode($charge);
                        $this->sendMail($order_details->order_id);
                        $order_details->status = 4; /* order confirmed for 4 */
                        $order_details->payment_status = 1; /* payment success for 1 and 0 for fail */
                        $order_details->payment_sucess_data = $payment_success;
                        if ($order_details->save()) {
                            $this->stock_change();
                        }
                        Yii::$app->session['orderid'] = '';
                        $model1 = Cart::find()->where(['user_id' => Yii::$app->user->identity->id])->all();
                        $this->clearcart($model1);
                        Yii::$app->session['datas'] = $charge;
                        return $this->redirect('payment-success');
                    } else {
                        $order_details->payment_status = 0;
                        $order_details->status = 4; /* order confirmed for 4 */
                        $order_details->save();
                        return $this->render('payment-failed');
                    }
                } catch (Start_Error $e) {


                    return $this->redirect(['site/error']);
                }
            }
        }
    }

    /*
     * payment success function
     */

    public function actionPaymentSuccess() {
        return $this->render('payment-success');
    }

    function clearcart($models) {
        foreach ($models as $model) {
            $model->delete();
        }
    }

    public function total($cart) {
        $subtotal = '0';
        foreach ($cart as $cart_item) {
            if ($cart_item->item_type == 1) {
                $subtotal += ($cart_item->rate);
            } else {
                $product = Product::findOne($cart_item->product_id);

                if ($product->offer_price == '0' || $product->offer_price == '') {
                    $price = $product->price;
                } else {
                    $price = $product->offer_price;
                }
                $subtotal += ($price * $cart_item->quantity);
            }
        }
        return $subtotal;
    }

    public function actionPromotionCheck() {
        if (Yii::$app->request->isAjax) {
            $code = $_POST['code'];
            $code_exists = \common\models\Promotions::find()->where(['promotion_code' => $code])->one();

            if (!empty($code_exists)) {

                $date_check = $this->CheckDate($code_exists);
                if ($date_check == 1) {
                    $used = $this->CodeUsed($code_exists);
                    if ($used == 0) {
                        $exist = $this->PromotionProduct($code_exists, $code);
                        if ($exist == 1) {
                            $order_master = OrderMaster::find()->where(['order_id' => Yii::$app->session['orderid']])->one();
                            $prev_promotion = OrderPromotions::find()->where(['order_master_id' => $order_master->id, 'promotion_id' => $code_exists->id])->exists();
                            if (!$prev_promotion) {
                                $amount_range = $this->AmountRange($code_exists, $order_master);
                                if ($amount_range == 0) {
                                    if ($code_exists->promotion_type == 1) {
                                        $price = $this->Promotionuniqueproduct($code_exists, $code);
                                    } else {
                                        $price = $order_master->total_amount;
                                    }
                                    if ($code_exists->type == 1) {
                                        $promotion_discount = ($order_master->total_amount * $price) / 100;
                                    } else {
                                        $promotion_discount = $code_exists->price;
                                    }

                                    $order_master->net_amount = $order_master->net_amount - $promotion_discount;
                                    $order_master->update();
                                    if ($code_exists->code_usage == 1) {
                                        $this->AddUsed($code_exists, $order_master);
                                    }
                                    $added_promotion = new OrderPromotions;
                                    $added_promotion->order_master_id = $order_master->id;
                                    $added_promotion->promotion_id = $code_exists->id;
                                    $added_promotion->promotion_discount = $promotion_discount;
                                    $added_promotion->save();
                                    $promotion_amount = OrderPromotions::find()->where(['order_master_id' => $order_master->id])->sum('promotion_discount');
                                    $arr_variable = array('con' => '1', 'code' => $code, 'total_amount' => $promotion_amount, 'amount' => $promotion_discount, 'discount_id' => $added_promotion->id);
                                    $data['result'] = $arr_variable;
                                    echo json_encode($data);
                                } else {
                                    $arr_variable = array('con' => '2', 'amount' => $code_exists->amount_range);
                                    $data['result'] = $arr_variable;
                                    echo json_encode($data);
                                }
                            } else {
                                echo '5';
                            }
                        } else {
                            echo '4';
                        }
                    } else {
                        echo '3';
                    }
                } else {
                    echo '2';
                }
            } else {
                echo '1';
            }
        }
    }

    public function AmountRange($code_exists, $order_master) {
        $amount_range = 0;
        if (isset($code_exists->amount_range) && $code_exists->amount_range != '') {
            if ($order_master->total_amount > $code_exists->amount_range)
                $amount_range = 0;
            else
                $amount_range = 1;
        }
        return $amount_range;
    }

    public function actionPromotionRemove() {
        if (Yii::$app->request->isAjax) {
            $promo_id = $_POST['id'];
            $order_promotion = OrderPromotions::findOne($promo_id);
            $promotion = \common\models\Promotions::findOne($order_promotion->promotion_id);
            $order_master = OrderMaster::findOne($order_promotion->order_master_id);
            $promotion_users = explode(',', $promotion->code_used);

            if (($key = array_search(Yii::$app->user->identity->id, $promotion_users)) !== false) {
                unset($promotion_users[$key]);
            }
            $promotion_users = implode(',', $promotion_users);
            $promotion->code_used = $promotion_users;
            $promotion->save();
            $order_master->net_amount = $order_master->net_amount + $order_promotion->promotion_discount;
            $order_master->save();
            $order_promotion->delete();
        }
    }

    public function Promotionuniqueproduct($code_exists, $code) {
        $products = explode(',', $code_exists->product_id);
        $order_master = OrderMaster::find()->where(['order_id' => Yii::$app->session['orderid']])->one();
        $oreder_setails = OrderDetails::find()->where(['master_id' => $order_master->id])->all();


        foreach ($oreder_setails as $value) {
            if (in_array($value->product_id, $products)) {
                $product = \common\models\Product::findOne($value->product_id);
                if ($product->offer_price != "0" && isset($product->offer_price)) {
                    $price = $product->offer_price;
                } else {
                    $price = $product->price;
                }
                $tot_price = $price * $value->quantity;
            }
        }

        return $tot_price;
    }

    public function actionAddAddress() {
        if (\Yii::$app->request->isAjax) {
            $model=new \common\models\UserAddress();
            if ($model->load(Yii::$app->request->post())) {
                $model->user_id= \Yii::$app->user->identity->id;
                $model->save(FALSE);
                echo json_encode(array('address' => $model->id));
            }
        }
    }

}
