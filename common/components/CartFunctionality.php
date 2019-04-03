<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SetValues
 *
 * @author user
 */

namespace common\components;

use Yii;
use yii\base\Component;
use common\models\Cart;
use common\models\WishList;
use common\models\Product;
use common\models\OrderMaster;
use common\models\Settings;
use common\models\Tax;
use common\models\OrderDetails;
use common\models\OrderAddress;
use common\models\UserAddress;
use common\models\OrderPromotions;

class CartFunctionality extends Component {
    /*
     * This function check if the user is guest
     * if guest return session_id otherwise return user_id
     */

    public function UserCheck() {
        if (isset(Yii::$app->user->identity->id)) {
            $user_id = Yii::$app->user->identity->id;
            $condition = ['user_id' => $user_id];
        } else {
            if (!isset(Yii::$app->session['temp_user'])) {
                $milliseconds = round(microtime(true) * 1000);
                Yii::$app->session['temp_user'] = $milliseconds;
            }
            $sessonid = Yii::$app->session['temp_user'];
            $condition = ['session_id' => $sessonid];
        }
        return $condition;
    }

    /*
     * This function add product to cart
     * parameeter @product_id,@user_id,@session_id and @qty
     */

    public function AddToCart($user_id, $temp_session, $product_id, $qty) {
        $model = new Cart();
        $model->user_id = $user_id;
        $model->session_id = $temp_session;
        $model->product_id = $product_id;
        $model->quantity = $qty;
        $model->date = date('Y-m-d H:i:s');
        if ($model->save()) {
            return TRUE;
        }
    }

    /*
     * This function add product to wishlist
     * parameeter @product_id
     * Only add to tha wishlist when the user loged in
     */

    public function AddToWishlist($product_id) {
        $flag = 0;
        if (isset(Yii::$app->user->identity->id)) {
            $model = WishList::find()->where(['product' => $product_id, 'user_id' => Yii::$app->user->identity->id])->one();
            if (empty($model)) {
                $model = new WishList();
                $model->user_id = Yii::$app->user->identity->id;
                $model->product = $product_id;
                $model->date = date('Y-m-d');
            } else {
                $model->date = date('Y-m-d');
            }
            if ($model->save()) {
                $flag = 1;
            } else {
                $flag = 3;
            }
        } else {
            $flag = 2;
        }
        return $flag;
    }

    public static function changecart($tempuser) {
        if (isset($tempuser)) {
            $models = Cart::find()->where(['session_id' => Yii::$app->session['temp_user']])->all();
            foreach ($models as $msd) {
                $product_allready = Cart::find()->where(['user_id' => Yii::$app->user->identity->id, 'product_id' => $msd->product_id])->one();
                if ($product_allready) {
                    $product_allready->quantity = $msd->quantity;
                    $product_allready->save();
                    $msd->delete();
                    unset($product_allready);
                } else {
                    $msd->user_id = Yii::$app->user->identity->id;
                    $msd->save();
                }
            }
            unset(Yii::$app->session['temp_user']);
        }
    }

    /*
     * This function count the cart elements
     */

    public static function Count() {
        $date = Yii::$app->CartFunctionality->date();
        Cart::deleteAll('date <= :date', ['date' => $date]);
        if (isset(Yii::$app->user->identity->id)) {
            if (isset(Yii::$app->session['temp_user'])) {
                Yii::$app->CartFunctionality->changecart(Yii::$app->session['temp_user']);
            }
        }
        $condition = Yii::$app->CartFunctionality->usercheck();
        $cart_items = Cart::find()->where($condition)->all();
        if (!empty($cart_items)) {
            $cart_items = Cart::find()->where($condition)->all();
            return count($cart_items);
        } else {
            return '0';
        }
    }

    public static function date() {
        $date = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' - 8 days'));
        return $date;
    }

    /*
     * This function checks the product exists or not
     */

    public static function check_product() {
        $condition = Yii::$app->CartFunctionality->UserCheck();
        $cart_items = Cart::find()->where($condition)->all();
        foreach ($cart_items as $cart) {
            $check_product = Product::find()->where(['id' => $cart->product_id])->one();
            if (empty($check_product)) {
                $cart->delete();
            }
        }
    }

    public static function check_cart($condition) {
        $cart_items = Cart::find()->where($condition)->all();
        foreach ($cart_items as $cart) {
            $check_product = Product::find()->where(['id' => $cart->product_id, 'status' => '1'])->one();
            if (empty($check_product)) {
                Yii::$app->response->redirect(['cart/mycart'])->send();
                return;
            }
        }
    }

    /*
     * This function returns the total amount of cart items
     */

    public static function total($cart) {
        $subtotal = '0';
        foreach ($cart as $cart_item) {
            if ($cart_item->quantity > 0) {
                $product = Product::find()->where(['id' => $cart_item->product_id, 'status' => '1'])->one();
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

    public static function cart_count() {
        $condition = Yii::$app->CartFunctionality->UserCheck();
        $cart_items = Cart::find()->where($condition)->all();
        if (!empty($cart_items)) {
            return count($cart_items);
        } else {
            return '0';
        }
    }

    public static function Checkout() {
        Yii::$app->CartFunctionality->check_product();
        $cart = Cart::find()->where(['user_id' => Yii::$app->user->identity->id])->all();
        if ($cart) {
            $orders = Yii::$app->CartFunctionality->addOrder($cart);
            if (Yii::$app->CartFunctionality->orderProducts($orders, $cart)) {
                Yii::$app->CartFunctionality->Addpromotions($orders['master_id']);

                return $orders['order_id'];
            } else {
                Yii::$app->response->redirect(['cart/mycart'])->send();
                return false;
            }
        } else {
            Yii::$app->response->redirect(['cart/mycart'])->send();
            return false;
        }
    }

    public static function addOrder($cart) {
        $order_exist = OrderMaster::find()->where(['user_id' => Yii::$app->user->identity->id, 'payment_status' => 0])->orderBy(['id' => SORT_DESC])->one();
        if (empty($order_exist)) {
            $model = new OrderMaster;
            $serial_no = Settings::findOne(4)->value;
            $prefix = Settings::findOne(4)->prefix;
            $model->order_id = Yii::$app->CartFunctionality->generateProductEan($prefix, $serial_no);
            $model->user_id = Yii::$app->user->identity->id;
        } else {
            $model = OrderMaster::find()->where(['user_id' => Yii::$app->user->identity->id, 'payment_status' => 0])->orderBy(['id' => SORT_DESC])->one();
        }
        $gift_wrap_value = Settings::findOne(5)->value;
        $total_amt = Yii::$app->CartFunctionality->total($cart);

        if (Yii::$app->session['gift_wrap'] == 1) {
            $model->gift_wrap = 1;
            $model->gift_wrap_value = $gift_wrap_value;
        } else {
            $model->gift_wrap = 0;
            $model->gift_wrap_value = 0;
        }
        $model->total_amount = $total_amt;
        $model->shipping_charge = Yii::$app->CartFunctionality->shippingcharge($total_amt);
        $model->tax = Yii::$app->CartFunctionality->tax($cart);
        $model->net_amount = Yii::$app->CartFunctionality->net_amount($total_amt, $model->gift_wrap, $model->tax);
        $model->order_date = date('Y-m-d H:i:s');
        $model->doc = date('Y-m-d');

        if ($model->save()) {
            return ['master_id' => $model->id, 'order_id' => $model->order_id];
        }
    }

    public static function generateProductEan($prefix, $serial_no) {
        $orderid_exist = OrderMaster::find()->where(['order_id' => $prefix . $serial_no])->one();
        if (!empty($orderid_exist)) {
            return Yii::$app->CartFunctionality->generateProductEan($prefix, $serial_no + 1);
        } else {
            Yii::$app->CartFunctionality->Updateorderid($serial_no);
            return $prefix . $serial_no;
        }
    }

    public static function Updateorderid($id) {
        $orderid = \common\models\Settings::findOne(4);
        $orderid->value = $id;
        $orderid->save();
        return;
    }

    public static function shippingcharge($total_amt) {
        $limit = Settings::findOne(1)->value;
        $ship_amnt = 0;
        if ($limit > $total_amt) {
            $extra = Settings::findOne(2)->value;
            $ship_amnt = $extra;
        }
        return $ship_amnt;
    }

    public static function tax($carts) {
        $subtotal = '0';
        foreach ($carts as $cart) {
            if ($cart->quantity > 0) {
                $product = Product::findOne($cart->product_id);
                $tax = Tax::find()->where(['id' => $product->tax])->one();
                if ($product->offer_price == '0' || $product->offer_price == '') {
                    $price = $product->price;
                } else {
                    $price = $product->offer_price;
                }
                if (!empty($tax)) {
                    if ($tax->type == 1) {
                        $rate = $price * $cart->quantity;
                        $product_price = ($rate * 100) / (100 + $tax->value); /* equation given for tax calculation ie:total*100(100+5) */
                        $subtotal += $product_price * $tax->value / 100;
                    } else {
                        $subtotal += ($tax->value * $cart->quantity);
                    }
                }
            }
        }
        return $subtotal;
    }

    public static function net_amount($total_amt, $gift_wrap, $tax) {
        $limit = Settings::findOne(1)->value;
        $net_amnt = $total_amt;
        if ($tax != '') {
            $net_amnt += $tax;
        }
        if ($limit > $total_amt) {
            $extra = Settings::findOne(2)->value;
            $net_amnt += $extra;
        }
        if ($gift_wrap == 1) {
            $wrap = Settings::findOne(5)->value;
            $net_amnt += $wrap;
        }
        return $net_amnt;
    }

    public static function orderProducts($orders, $carts) {
        foreach ($carts as $cart) {
            if ($cart->quantity > 0) {
                $prod_details = Product::findOne($cart->product_id);
                $order_exist = OrderDetails::find()->where(['master_id' => $orders['master_id'], 'product_id' => $cart->product_id])->one();
                if ($order_exist) {
                    $model_prod = OrderDetails::find()->where(['master_id' => $orders['master_id'], 'product_id' => $cart->product_id])->one();
                } else {
                    $model_prod = new OrderDetails;
                }
                $model_prod->master_id = $orders['master_id'];
                $model_prod->order_id = $orders['order_id'];
                $model_prod->product_id = $cart->product_id;
                $model_prod->quantity = $cart->quantity;
                if ($prod_details->offer_price == '0' || $prod_details->offer_price == '') {
                    $price = $prod_details->price;
                } else {
                    $price = $prod_details->offer_price;
                }
                $model_prod->item_type = $cart->item_type;
                $model_prod->amount = $price;
                $model_prod->tax = Cart::productTax($prod_details, $cart->quantity);
                $model_prod->rate = ($cart->quantity) * ($price);
                $model_prod->status = '0';
                $model_prod->save();
            }
        }
        return TRUE;
    }

    public static function Addpromotions($orderid) {
        $coupons = \common\models\TempSession::find()->where(['user_id' => Yii::$app->user->identity->id, 'type_id' => 3])->all();
        $cart_products = OrderDetails::find()->where(['master_id' => $orderid])->all();
        $order_details = OrderMaster::findOne($orderid);
        $cart_amount = $order_details->total_amount;
        $total_promotion_discount = 0;
        if (!empty($coupons)) {
            foreach ($coupons as $coupons) {
                $add_promption = new \common\models\OrderPromotions();
                $add_promption->order_master_id = $orderid;
                $add_promption->promotion_id = $coupons->value;
                $promotion = \common\models\Promotions::findOne($coupons->value);
                if ($promotion->promotion_type == 1) {
                    $condition = Yii::$app->CartFunctionality->usercheck();
                    $cart_items = Cart::find()->where($condition)->all();
                    $price = Yii::$app->CartFunctionality->Promotionuniqueproduct($code_exists, $code, $cart_products);
                } else {
                    $price = $cart_amount;
                }

                if ($promotion->type == 1) {
                    $promotion_discount = ($price * $promotion->price) / 100;
                } else {
                    $promotion_discount = $promotion->price;
                }
                $total_promotion_discount += $promotion_discount;
                $add_promption->promotion_discount = $promotion_discount;
                $add_promption->save();
            }
            $order_master_detail = OrderMaster::findOne($orderid);
            $order_master_detail->net_amount = $order_master_detail->net_amount - $total_promotion_discount;
            $order_master_detail->update();
        }
    }

    public static function orderbilling($bill_address) {
        $model1 = OrderMaster::find()->where(['order_id' => Yii::$app->session['orderid']])->one();
        $model1->bill_address_id = $bill_address;
        $model1->status = 2;
        $model1->save();
    }

    public static function orderaddress($bill_address) {
        $model = new OrderAddress();
        $user_address = UserAddress::findOne($bill_address);
        $model->order_id = Yii::$app->session['orderid'];
        $model->address = $user_address->address;
        $model->name = $user_address->name;
        $model->landmark = $user_address->landmark;
        $model->location = $user_address->location;
        $model->emirate = $user_address->emirate;
        $model->post_code = $user_address->post_code;
        $model->country_code = $user_address->country_code;
        $model->mobile_number = $user_address->mobile_number;
        $model->save();
         
    }

    public static function CodeUsedSingle($orderid) {
        $promotions = OrderPromotions::find()->where(['order_master_id' => $orderid])->all();
        foreach ($promotions as $promotion) {
            $promotion_code = \common\models\Promotions::findOne($promotion->promotion_id);
            if ($promotion_code->code_usage == 1) {
                Yii::$app->CartFunctionality->AddUsed($promotion_code);
            }
        }
    }

    public static function AddUsed($code_exists) {
        $code_exists->code_used = $code_exists->code_used . ',' . Yii::$app->user->identity->id;
        $code_exists->save();
    }

    public static function clearcart($models) {
        foreach ($models as $model) {
            if ($model->quantity > 0) {
                $model->delete();
            }
        }
    }

    public static function purchasemail($orderid, $messages) {
        $ordermaster = OrderMaster::find()->where(['order_id' => $orderid])->one();
        $user = \common\models\User::findOne($ordermaster->user_id);
        $mail = \common\models\User::findOne(Yii::$app->user->identity->id)->email;
        $to1 = $mail;
        $subject = "New Purchase Order";
        $to = Yii::$app->params['adminEmail'];

        $message = $messages;
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n" .
                "From: info@coralepitome.com";
        mail($to, $subject, $message, $headers);
        mail($to1, $subject, $message, $headers);
    }

    /*
     * Coupon codes
     */

    public static function UsedCode($code) {
        $existss = 0;
        $code_details = \common\models\Promotions::find()->where(['promotion_code' => $code])->one();
        $temp_session = \common\models\TempSession::find()->where(['value' => $code_details->id])->exists();
        if ($temp_session) {
            $existss = 1;
        }
        return $existss;
    }

    /*
     * this function checks the promotion code date
     */

    public static function CheckDate($code_exists) {
        $date_from_user = date('Y-m-d');
        $start_ts = strtotime($code_exists->starting_date);
        $end_ts = strtotime($code_exists->expiry_date);
        $user_ts = strtotime($date_from_user);
        return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
    }

    /*
     * 
     */

    public static function CodeUsed($code_exists) {
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
     * check this code is applicable for this user/product
     */

    public static function PromotionProduct($code_exists, $code) {
        $products = explode(',', $code_exists->product_id);
        $users = explode(',', $code_exists->user_id);
        $oreder_setails = Cart::find()->where(['user_id' => Yii::$app->user->identity->id])->all();
        $exist = 0;
        if ($code_exists->promotion_type == 1 || $code_exists->promotion_type == 3) {
            foreach ($oreder_setails as $value) {
                if (in_array($value->product_id, $products)) {
                    $exist = 1;
                }
            }
        }
        if ($code_exists->promotion_type == 2 || $code_exists->promotion_type == 3) {
            if (in_array(Yii::$app->user->identity->id, $users))
                $exist = 1;
        }
        return $exist;
    }

    /*
     * checks the order amount range
     */

    public static function AmountRange($code_exists, $cart_amount) {
        $amount_range = 0;
        if (isset($code_exists->amount_range) && $code_exists->amount_range != '') {
            if ($cart_amount > $code_exists->amount_range)
                $amount_range = 0;
            else
                $amount_range = 1;
        }
        return $amount_range;
    }

    /*
     * promotion code for unique products
     */

    public static function Promotionuniqueproduct($code_exists, $code, $cart_items) {
        $products = explode(',', $code_exists->product_id);
        foreach ($cart_items as $value) {
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

    /*
     * save added promotion code to temporary table
     */

    public static function SaveTemp($type_id, $value, $promotion_discount) {
        $temp_promotion = new \common\models\TempSession;
        $temp_promotion->user_id = Yii::$app->user->identity->id;
        $temp_promotion->type_id = $type_id;
        $temp_promotion->value = $value;
        $temp_promotion->amount = $promotion_discount;
        $temp_promotion->save();
        return $temp_promotion;
    }

    /*
     * return the product stock
     */

    public static function ProductStock($product_id) {
        $product = Product::find()->where(['id' => $product_id, 'status' => '1'])->one();
        return $product->stock;
    }

    /*
     * this function add products to cart from wishlist list
     */

    public static function add_to_cart($user_id, $temp_session, $product_id, $qty) {
        $model = new cart;
        $model->user_id = $user_id;
        $model->session_id = $temp_session;
        $model->product_id = $product_id;
        $model->quantity = $qty;
        $model->date = date('Y-m-d H:i:s');
        if ($model->save()) {
            return TRUE;
        }
    }

}
