<?php

namespace common\models;

use Yii;
use common\models\OrderMaster;
use common\models\OrderAddress;

/**
 * This is the model class for table "cart".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $session_id
 * @property integer $product_id
 * @property integer $quantity
 * @property integer $options
 * @property string $date
 * @property integer $gift_option
 * @property double $rate
 */
class Cart extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'cart';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
//            [['user_id', 'product_id', 'quantity', 'options', 'date', 'gift_option', 'rate'], 'required'],
//            [['user_id', 'product_id', 'quantity', 'options', 'gift_option'], 'integer'],
//            [['date'], 'safe'],
//            [['rate'], 'number'],
//            [['session_id'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'session_id' => 'Session ID',
            'product_id' => 'Product ID',
            'quantity' => 'Quantity',
            'options' => 'Options',
            'date' => 'Date',
            'gift_option' => 'Gift Option',
            'rate' => 'Rate',
            'item_type' => 'Item Type',
        ];
    }

    /*     * *************************** */

  

    

    public static function productTax($product, $quantity) {
        $subtotal = 0;
        $tax = Tax::find()->where(['id' => $product->tax])->one();
        if ($product->offer_price == '0' || $product->offer_price == '') {
            $price = $product->price;
        } else {
            $price = $product->offer_price;
        }
        $tot_price = $quantity * $price;
        if (!empty($tax)) {
            if ($tax->type == 1) {
                $product_price = ($tot_price * 100) / (100 + $tax->value); /* equation given for tax calculation ie:total*100(100+5) */
                $subtotal = $product_price * $tax->value / 100;
            } else {
                $subtotal = ($quantity * $tax->value);
            }
        }
        return $subtotal;
    }

   

    

    

   

    

   

   

    

    

  

   

    

    

    

    

    public static function ordershipping($bill_address) {
        $model1 = OrderMaster::find()->where(['order_id' => Yii::$app->session['orderid']])->one();
        $model1->ship_address_id = $bill_address;
        $model1->status = 3;
        if ($model1->save()) {

            Yii::$app->response->redirect(['checkout/confirm-order'])->send();
        }
    }

   

    public static function stock_clear($orders) {
        $order_details = OrderDetails::find()->where(['order_id' => $orders['order_id']])->all();
        foreach ($order_details as $order) {
            $product = Product::findOne($order->product_id);
//            $old_qty = $product->stock;
            $stock = $product->stock - $order->quantity;
            $product->stock = $stock > 0 ? $stock : 0;
            if ($product->stock == 0) {

                $this->stockOutMail($product);
            }
            $product->save();
//            StockHistory::stockhistory($product->qty, '3', $product->id, '3', $old_qty);
        }
    }

    public function stockOutMail($model) {
        echo 'dggdg';
        exit;

        $message = Yii::$app->mailer->compose('stockout-mail', ['model' => $model]) // a view rendering result becomes the message body here
                ->setFrom('no-replay@perfumedunia.com')
                ->setTo(Yii::$app->params['adminEmail'])
                ->setSubject('Stock Out');
        if ($message->send()) {
            echo 'sdjfkh';
            exit;
        } else {
            echo '40950';
            exit;
        }
        //return TRUE;
    }

    public static function orderdetails() {
        $order_details = OrderDetails::find()->where(['order_id' => Yii::$app->session['orderid']])->all();
        return $order_details;
    }

    public static function addUser_address($model, $data) {
        Yii::$app->SetValues->Attributes($model);
        $model->user_id = Yii::$app->user->identity->id;
        $model->name = $data['UserAddress']['name'];
        $model->address = $data['UserAddress']['address'];
        $model->landmark = $data['UserAddress']['landmark'];
        $model->location = $data['UserAddress']['location'];
        $model->emirate = $data['UserAddress']['emirate'];
        $model->post_code = $data['UserAddress']['post_code'];
        $model->country_code = $data['UserAddress']['country_code'];
        $model->mobile_number = $data['UserAddress']['mobile_number'];
        if ($model->save()) {
            return $model->id;
        }
    }

    /*     * *******Checkout***************** */

    public static function updatedetails($details) {
        $product = Product::findOne($details->product_id);

        if ($product->stock == '0' || $product->stock_availability == '0') {
            $details->delete();
        } elseif ($product->stock > '0' && $product->stock < $details->quantity) {
            $quantity = $product->stock;
        } elseif ($product->stock >= $details->quantity) {
            $quantity = $details->quantity;
        }
        if ($product->offer_price == '0' || $product->offer_price == '') {
            $price = $product->price;
        } else {
            $price = $product->offer_price;
        }
        $details->quantity = $quantity;
        $details->amount = $price;
        $details->rate = ($price * $quantity);
        if ($details->save()) {
            return TRUE;
        }
    }

    public static function updatemaster($order_id, $subtotal) {
        $ordermaster = OrderMaster::find()->where(['order_id' => $order_id])->one();
        $limit = Settings::findOne(1)->value;
        $net_amnt = $subtotal;
        if ($limit > $subtotal) {
            $extra = Settings::findOne(2)->value;
            $net_amnt = $extra + $subtotal;
        }
        $ordermaster->total_amount = $subtotal;
        $ordermaster->net_amount = $net_amnt;
        $ordermaster->save();
    }

    /*     * *********admin mail**************************** */

    

    /*     * ******************* */

    


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

    public static function CheckDate($code_exists) {
        $date_from_user = date('Y-m-d');
        $start_ts = strtotime($code_exists->starting_date);
        $end_ts = strtotime($code_exists->expiry_date);
        $user_ts = strtotime($date_from_user);
        return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
    }

    public static function UsedCode($code) {
        $existss = 0;
        $code_details = \common\models\Promotions::find()->where(['promotion_code' => $code])->one();
        $temp_session = \common\models\TempSession::find()->where(['value' => $code_details->id])->exists();
        if ($temp_session) {
            $existss = 1;
        }
        return $existss;
    }

    public static function SaveTemp($type_id, $value) {

        $temp_promotion = new \common\models\TempSession;
        $temp_promotion->user_id = Yii::$app->user->identity->id;
        $temp_promotion->type_id = $type_id;
        $temp_promotion->value = $value;
        $temp_promotion->save();
        return $temp_promotion;
    }

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

    public static function productPrice($product_id) {
        $product = Product::findOne($product_id);
        if ($product->offer_price == '0' || $product->offer_price == '') {
            $price = $product->price;
        } else {
            $price = $product->offer_price;
        }
        return $price;
    }

}
