<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

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

                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'first_name',
                            'last_name',
                            [
                                'attribute' => 'gender',
                                'value' => function ($model) {
                                    if ($model->gender == 1) {
                                        return 'Male';
                                    } else {
                                        return "Female";
                                    }
                                },
                            ],
                            'email:email',
                            'mobile_no',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'contentOptions' => [],
                                'header' => 'Actions',
                               // 'template' => '{approve}{disable}{update}',
                                'template' => '{update}',
                                'buttons' => [
                                    'approve' => function ($url, $model) {
                                        if ($model->status == 0) {
                                            return Html::a('<i class="fa fa-check" aria-hidden="true"></i>', $url, [
                                                        'title' => Yii::t('app', 'Click here to active this user'),
                                                        'class' => 'actions',
                                            ]);
                                        }
                                    },
                                    'disable' => function ($url, $model) {
                                        if ($model->status == 1) {
                                            return Html::a('<i class="fa fa-ban" aria-hidden="true"></i>', $url, [
                                                        'title' => Yii::t('app', 'Click here to disable this user'),
                                                        'class' => 'actions',
                                            ]);
                                        }
                                    },
                                ],
                                'urlCreator' => function ($action, $model) {

                                    if ($action === 'approve') {
                                        $url = Url::to(['approve', 'id' => $model->id]);
                                        return $url;
                                    }
                                    if ($action === 'disable') {
                                        $url = Url::to(['disable', 'id' => $model->id]);
                                        return $url;
                                    }

                                    if ($action === 'update') {
                                        $url = Url::to(['update', 'id' => $model->id]);
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


