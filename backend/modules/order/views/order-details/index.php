<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-details-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body">
                                                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    
                    <?=  Html::a('<i class="fa fa-list"></i><span> Create Order Details</span>', ['create'], ['class' => 'btn btn-block btn-info btn-sm']) ?>
                                                                            <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
        'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                                    'id',
            'master_id',
            'order_id',
            'product_id',
            'quantity',
            // 'amount',
            // 'tax',
            // 'delivered_date',
            // 'rate',
            // 'item_type',
            // 'doc',
            // 'status',

                        ['class' => 'yii\grid\ActionColumn'],
                        ],
                        ]); ?>
                                                        </div>
            </div>
        </div>
    </div>
</div>


