<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use common\models\User;
use common\models\Product;

/* @var $this yii\web\View */
/* @var $model common\models\CustomerReviews */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Customer Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


            </div>
            <div class="panel-body">

                <div class="panel-body"><div class="customer-reviews-view">
						 <?=  Html::a('<i class="fa fa-list"></i><span> Manage Customer Reviews</span>', ['index'], ['class' => 'btn btn-block btn-info btn-sm']) ?>
						

						<?=
						DetailView::widget([
						    'model' => $model,
						    'attributes' => [
							    [
							    'attribute' => 'user_id',
							    'value' => function($data) {
								    return User::findOne($data->user_id)->first_name;
							    },
							    'filter' => ArrayHelper::map(User::find()->asArray()->all(), 'id', 'first_name'),
							],
							    [
							    'attribute' => 'product_id',
							    'value' => function($data) {
								    return Product::findOne($data->product_id)->product_name;
							    },
							    'filter' => ArrayHelper::map(Product::find()->orderBy(['product_name' => SORT_ASC])->asArray()->all(), 'id', 'product_name'),
							],
							'tittle',
							'description:ntext',
							'review_date',
							    [
							    'attribute' => 'status',
							    'filter' => ['1' => 'Approved', '0' => 'Not Approved'],
							    'value' => function($data) {
								    return $data->status == 1 ? 'Approved' : 'Not Approved';
							    }
							],
						    ],
						])
						?>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>


