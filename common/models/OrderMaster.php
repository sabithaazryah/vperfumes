<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_master".
 *
 * @property int $id
 * @property string $order_id
 * @property int $user_id
 * @property string $total_amount
 * @property string $tax
 * @property string $discount_amount
 * @property string $tax_amount
 * @property string $shipping_charge
 * @property string $net_amount Including Delivery charge, gift wrap and tax
 * @property string $order_date
 * @property string $invoice_no
 * @property int $ship_address_id
 * @property int $bill_address_id
 * @property int $currency_id
 * @property string $user_comment
 * @property int $payment_mode
 * @property int $admin_comment
 * @property int $payment_status 0=>pending,1=>success,2=>failed,3=>cod
 * @property string $payment_sucess_data
 * @property string $payment_ref_number
 * @property int $admin_status 0- pending 1- placed 2-packed 3-dispatched 4- delivered 5-cancelled 6- returned
 * @property string $expected_delivery_date
 * @property string $delivered_date
 * @property string $doc
 * @property string $dou
 * @property int $shipping_status 1-orderplaced 2-dispached 3 delivered
 * @property int $status 0->not placed, 1-> checkoutstarted, 2->billingcomplete,3->deliverydetailcoplete, 4->confirmed complete, 5->Cancelled
 * @property string $cancel_reason
 * @property int $promotion_id
 * @property string $promotion_discount
 * @property int $return_status 1- returned by user 2- returned by admin
 * @property string $return_reason
 * @property int $return_approve 1=>approved 2=>disapproved 
 * @property int $gift_wrap
 * @property string $gift_wrap_value
 */
class OrderMaster extends \yii\db\ActiveRecord {

    public $order_date_from;
    public $order_date_to;
    public $amount_from;
    public $amount_to;
    public $order_search;
    public $user_search;
    public $order_status;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'order_master';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['order_id', 'user_id', 'total_amount', 'order_date'], 'required'],
            [['user_id', 'ship_address_id', 'bill_address_id', 'currency_id', 'payment_mode', 'admin_comment', 'payment_status', 'admin_status', 'shipping_status', 'status', 'promotion_id', 'return_status', 'return_approve', 'gift_wrap'], 'integer'],
            [['total_amount', 'tax', 'discount_amount', 'tax_amount', 'shipping_charge', 'net_amount', 'promotion_discount'], 'number'],
            [['order_date', 'expected_delivery_date', 'delivered_date', 'doc', 'dou'], 'safe'],
            [['user_comment', 'payment_sucess_data', 'cancel_reason', 'return_reason'], 'string'],
            [['order_id', 'gift_wrap_value'], 'string', 'max' => 200],
            [['invoice_no'], 'string', 'max' => 250],
            [['payment_ref_number'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'user_id' => 'User ID',
            'total_amount' => 'Total Amount',
            'tax' => 'Tax',
            'discount_amount' => 'Discount Amount',
            'tax_amount' => 'Tax Amount',
            'shipping_charge' => 'Shipping Charge',
            'net_amount' => 'Net Amount',
            'order_date' => 'Order Date',
            'invoice_no' => 'Invoice No',
            'ship_address_id' => 'Ship Address ID',
            'bill_address_id' => 'Bill Address ID',
            'currency_id' => 'Currency ID',
            'user_comment' => 'User Comment',
            'payment_mode' => 'Payment Mode',
            'admin_comment' => 'Admin Comment',
            'payment_status' => 'Payment Status',
            'payment_sucess_data' => 'Payment Sucess Data',
            'payment_ref_number' => 'Payment Ref Number',
            'admin_status' => 'Admin Status',
            'expected_delivery_date' => 'Expected Delivery Date',
            'delivered_date' => 'Delivered Date',
            'doc' => 'Doc',
            'dou' => 'Dou',
            'shipping_status' => 'Shipping Status',
            'status' => 'Status',
            'cancel_reason' => 'Cancel Reason',
            'promotion_id' => 'Promotion ID',
            'promotion_discount' => 'Promotion Discount',
            'return_status' => 'Return Status',
            'return_reason' => 'Return Reason',
            'return_approve' => 'Return Approve',
            'gift_wrap' => 'Gift Wrap',
            'gift_wrap_value' => 'Gift Wrap Value',
        ];
    }

    public static function getOrderTotal() {
        $order = OrderMaster::find()->where(['status' => 4])->orWhere(['status' => 5])->all();
        return count($order);
    }

    public static function getDeliveredTotal() {
        $order = OrderMaster::find()->where(['admin_status' => 4])->andWhere(['!=', 'admin_status', 5])->andWhere(['!=', 'status', 5])->andWhere(['status' => 4])->all();
        return count($order);
    }

    public static function getCanceledTotal() {
        $order = OrderMaster::find()->where(['status' => 5])->andWhere(['admin_status' => 5])->all();
        return count($order);
    }

    public static function getPendingOrderTotal() {
        $order = OrderMaster::find()->where(['admin_status' => 0])->andWhere(['status' => 4])->orWhere(['status' => 5])->all();
        return count($order);
    }

    public static function getAmountTotal($from_date, $to, $field_name) {
        if ($from_date != '' && $to != '') {
            $from_date = $from_date . ' 00:00:00';
            $to = $to . ' 60:60:60';
            return OrderMaster::find()->where(['>=', 'order_date', $from_date])->andWhere(['<=', 'order_date', $to])->sum($field_name);
        } elseif ($from_date != '' || $to != '') {
            return 0;
        } else {
            return OrderMaster::find()->sum($field_name);
        }
    }

    public static function getAmountTotals($model, $field_name) {
        $total_amount = 0;
        foreach ($model as $value) {
            $total_amount += $value->$field_name;
        }
        return $total_amount;
    }

    public static function returnstock($order_id) {
        $ordered_products = OrderDetails::find()->where(['order_id' => $order_id])->all();
        foreach ($ordered_products as $prdct) {
            $product = Product::findOne($prdct->product_id);
            $product->stock = $product->stock + $prdct->quantity;
            $product->save();
        }
        return TRUE;
    }

    public static function returnmail($order_id, $user_id) {
        $message = Yii::$app->mailer->compose('return-order', ['order_id' => $order_id, 'user_id' => $user_id])
                ->setFrom('no-replay@vperfumes.com')
                ->setTo(Yii::$app->params['adminEmail'])
                ->setSubject('Return Order');
        $message->send();
    }

    public static function adminreturnmail($order, $user_id) {
        $mail = User::findOne($user_id)->email;
        $message = Yii::$app->mailer->compose('admin-return-order', ['order' => $order, 'user_id' => $user_id])
                ->setFrom('no-replay@vperfumes.com')
                ->setTo($mail)
                ->setSubject('Return Order');
        $message->send();
    }

}
