<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\OrderMaster;

/**
 * OrderMasterSearch represents the model behind the search form about `common\models\OrderMaster`.
 */
class OrderMasterSearch extends OrderMaster
{
     public $createdFrom;
    public $createdTo;
    public $created_at_range;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'ship_address_id', 'bill_address_id', 'currency_id', 'payment_mode', 'admin_comment', 'payment_status', 'admin_status', 'shipping_status', 'status', 'promotion_id', 'return_status', 'return_approve', 'gift_wrap'], 'integer'],
            [['order_id', 'order_date', 'invoice_no', 'user_comment', 'payment_sucess_data', 'payment_ref_number', 'expected_delivery_date', 'delivered_date', 'doc', 'dou', 'cancel_reason', 'return_reason', 'gift_wrap_value'], 'safe'],
            [['total_amount', 'tax', 'discount_amount', 'tax_amount', 'shipping_charge', 'net_amount', 'promotion_discount'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = OrderMaster::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'total_amount' => $this->total_amount,
            'tax' => $this->tax,
            'discount_amount' => $this->discount_amount,
            'tax_amount' => $this->tax_amount,
            'shipping_charge' => $this->shipping_charge,
            'net_amount' => $this->net_amount,
            'order_date' => $this->order_date,
            'ship_address_id' => $this->ship_address_id,
            'bill_address_id' => $this->bill_address_id,
            'currency_id' => $this->currency_id,
            'payment_mode' => $this->payment_mode,
            'admin_comment' => $this->admin_comment,
            'payment_status' => $this->payment_status,
            'admin_status' => $this->admin_status,
            'expected_delivery_date' => $this->expected_delivery_date,
            'delivered_date' => $this->delivered_date,
            'doc' => $this->doc,
            'dou' => $this->dou,
            'shipping_status' => $this->shipping_status,
            'status' => $this->status,
            'promotion_id' => $this->promotion_id,
            'promotion_discount' => $this->promotion_discount,
            'return_status' => $this->return_status,
            'return_approve' => $this->return_approve,
            'gift_wrap' => $this->gift_wrap,
        ]);

        $query->andFilterWhere(['like', 'order_id', $this->order_id])
            ->andFilterWhere(['like', 'invoice_no', $this->invoice_no])
            ->andFilterWhere(['like', 'user_comment', $this->user_comment])
            ->andFilterWhere(['like', 'payment_sucess_data', $this->payment_sucess_data])
            ->andFilterWhere(['like', 'payment_ref_number', $this->payment_ref_number])
            ->andFilterWhere(['like', 'cancel_reason', $this->cancel_reason])
            ->andFilterWhere(['like', 'return_reason', $this->return_reason])
            ->andFilterWhere(['like', 'gift_wrap_value', $this->gift_wrap_value]);

        return $dataProvider;
    }
    
    public function search1($params) {
        if (!isset($params["OrderMasterSearch"]["createdFrom"])) {
            $params["OrderMasterSearch"]["createdFrom"] = '';
        } else {
            $params["OrderMasterSearch"]["createdFrom"] = $params["OrderMasterSearch"]["createdFrom"] . ' 00:00:00';
        }
        if (!isset($params["OrderMasterSearch"]["createdTo"])) {
            $params["OrderMasterSearch"]["createdTo"] = '';
        } else {
            $params["OrderMasterSearch"]["createdTo"] = $params["OrderMasterSearch"]["createdTo"] . ' 60:60:60';
        }
        $query = OrderMaster::find()->where(['status' => 4])->orWhere(['status'=> 5])->orderBy(['id' => SORT_DESC]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'total_amount' => $this->total_amount,
            'net_amount' => $this->net_amount,
            'ship_address_id' => $this->ship_address_id,
            'bill_address_id' => $this->bill_address_id,
            'currency_id' => $this->currency_id,
            'payment_mode' => $this->payment_mode,
            'admin_comment' => $this->admin_comment,
            'payment_status' => $this->payment_status,
            'admin_status' => $this->admin_status,
            'doc' => $this->doc,
            'shipping_status' => $this->shipping_status,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'order_id', $this->order_id])
                ->andFilterWhere(['like', 'user_comment', $this->user_comment]);
        return $dataProvider;
    }
}
