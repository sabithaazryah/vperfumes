<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\User;
use common\models\Product;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel common\models\CustomerReviewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer Reviews';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-reviews-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?=
						GridView::widget([
						    'dataProvider' => $dataProvider,
						    'filterModel' => $searchModel,
						    'columns' => [
							    ['class' => 'yii\grid\SerialColumn'],
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
							    [
							    'attribute' => 'description',
							    'value' => function($data) {
								    $str = substr($data->description, 0, strpos(wordwrap($data->description, 100), "\n"));
								    if (strlen($data->description) > 100) {
									    $dot = ' ....';
								    } else {
									    $dot = '';
								    }
								    return $str . $dot;
							    },
							],
							'review_date',
							[
							    'class' => 'yii\grid\ActionColumn',
							    'contentOptions' => [],
							    'header' => 'Actions',
							    'template' => '{view}{delete}{approve}{disable}',
							    'buttons' => [
								'view' => function ($url, $model) {
									return Html::a('<span class="fa fa-eye" style="padding-top: 0px;"></span>', $url, [
										    'title' => Yii::t('app', 'View'),
										    'class' => 'actions',
									]);
								},
								'delete' => function ($url, $model) {
									return Html::a('<i class="fa fa-trash" aria-hidden="true"></i>', $url, [
										    'title' => Yii::t('app', 'Delete'),
										    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
										    'class' => 'actions',
									]);
								},
								'approve' => function ($url, $model) {
									if ($model->status == 0) {
										return Html::a('<i class="fa fa-check" aria-hidden="true"></i>', $url, [
											    'title' => Yii::t('app', 'Approve'),
											    'class' => 'actions',
										]);
									}
								},
								'disable' => function ($url, $model) {
									if ($model->status == 1) {
										return Html::a('<i class="fa fa-ban" aria-hidden="true"></i>', $url, [
											    'title' => Yii::t('app', 'Disable'),
											    'class' => 'actions',
										]);
									}
								},
							    ],
							    'urlCreator' => function ($action, $model) {
								    if ($action === 'view') {
									    $url = Url::to(['view', 'id' => $model->id]);
									    return $url;
								    }
								    if ($action === 'delete') {
									    $url = Url::to(['delete', 'id' => $model->id]);
									    return $url;
								    }
								    if ($action === 'approve') {
									    $url = Url::to(['approve', 'id' => $model->id]);
									    return $url;
								    }
								    if ($action === 'disable') {
									    $url = Url::to(['disable', 'id' => $model->id]);
									    return $url;
								    }
							    }
							],
						    ],
						]);
						?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
	.fa-check{
		color: green;
	}
	.fa-ban{
		color:red;
	}
        table td a{
            padding: 4px;
        }
</style>
