<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_details".
 *
 * @property int $id
 * @property int $master_id
 * @property string $order_id
 * @property int $product_id
 * @property int $quantity
 * @property string $amount
 * @property string $tax
 * @property string $delivered_date
 * @property string $rate
 * @property int $item_type
 * @property string $doc
 * @property int $status
 */
class OrderDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['master_id', 'order_id', 'product_id', 'quantity', 'amount', 'rate'], 'required'],
            [['master_id', 'product_id', 'quantity', 'item_type', 'status'], 'integer'],
            [['amount', 'tax', 'rate'], 'number'],
            [['delivered_date', 'doc'], 'safe'],
            [['order_id'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'master_id' => 'Master ID',
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'quantity' => 'Quantity',
            'amount' => 'Amount',
            'tax' => 'Tax',
            'delivered_date' => 'Delivered Date',
            'rate' => 'Rate',
            'item_type' => 'Item Type',
            'doc' => 'Doc',
            'status' => 'Status',
        ];
    }
}
