
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\Category;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Promotions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
                </div>
                <div class="panel-body product-listing">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= Html::a('<i class="fa fa-list"></i><span> Create Promotions</span>', ['create'], ['class' => 'btn btn-block btn-info btn-sm']) ?>
                   <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute' => 'promotion_type',
                                'value' => function($model) {
                                    if ($model->promotion_type == '1') {
                                        return 'Unique Product Code';
                                    } else if ($model->promotion_type == '2') {
                                        return 'User Specified Code';
                                    } else if ($model->promotion_type == '3') {
                                        return 'Common Code';
                                    }
                                },
                                'filter' => [1 => 'Unique Product Code', 2 => 'User Specified Code', 3 => 'Common Code'],
                            ],
                            'promotion_code',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{update}{delete}'
                            ],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


