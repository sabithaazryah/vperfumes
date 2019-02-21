<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Product;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?=

GridView::widget([
    'dataProvider' => $dataProviderOrder,
//    'filterModel' => $searchModelOrder,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'order_id',
        [
            'attribute' => 'order_date',
            'value' => function ($data) {
                return date("d-m-Y", strtotime($data->order_date));
            },
        ],
        [
            'attribute' => 'payment_status',
            'format' => 'raw',
            'filter' => ['0' => 'Pending', '1' => 'Success', '2' => 'Failed', '3' => 'COD'],
            'value' => function ($data) {
                if (isset($data->payment_status)) {
                    if ($data->payment_status == '0')
                        $status = 'Pending';
                    if ($data->payment_status == '1')
                        $status = 'Success';
                    if ($data->payment_status == '2')
                        $status = 'Failed';
                    if ($data->payment_status == '3')
                        $status = 'COD';
//                                            return $data->payment_status;
                    return $status;
                } else {
                    return '';
                }
            },
        ],
        [
            'attribute' => 'admin_status',
            'format' => 'raw',
            'filter' => ['0' => 'Pending', '1' => 'Order Placed', '2' => 'Order Packed', '3' => 'Order Dispatched', '4' => 'Order Delivered', '5' => 'Cancelled'],
            'value' => function ($data) {
                if ($data->admin_status == 0) {
                    return 'Pending';
                } else if ($data->admin_status == 1) {
                    return 'Order Placed';
                } else if ($data->admin_status == 2) {
                    return 'Order Packed';
                } else if ($data->admin_status == 3) {
                    return 'Order Dispatched';
                } else if ($data->admin_status == 4) {
                    return 'Order Delivered';
                } else if ($data->admin_status == 5) {
                    return 'Cancelled';
                }
            },
        ],
        'net_amount',
    ],
]);
?>