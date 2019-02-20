<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= Html::a('<i class="fa fa-list"></i><span> Create User</span>', ['create'], ['class' => 'btn btn-block btn-info btn-sm']) ?>
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'full_name',
                            'email:email',
                            [
                                'attribute' => 'dob',
                                'value' => function($model) {
                                    return date('d-m-Y',strtotime($model->dob));
                                }
                            ],
                            'nationality',
                            // 'address:ntext',
                            'contact_number',
                            // 'agree_terms',
                            // 'status',
                            // 'created_at',
                            // 'updated_at',
                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


