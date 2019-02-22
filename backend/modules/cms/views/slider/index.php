<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sliders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-index">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


                </div>
                <div class="panel-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= Html::a('<i class="fa fa-list"></i><span> Create Slider</span>', ['create'], ['class' => 'btn btn-block btn-info btn-sm']) ?>
                    <?= common\widgets\Alert::widget() ?>
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute' => 'img',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    if (!empty($data->img))
                                        $img = '<img src="' . Yii::$app->homeUrl . '../uploads/cms/sliders/' . $data->id . '/en/small.' . $data->img . '" width="100"/>';
                                    else
                                        $img = '<img src="' . Yii::$app->homeUrl . '../uploads/product/profile_thumb.png"/>';
                                    return $img;
                                },
                            ],
                            [
                                'attribute' => 'img_ar',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    if (!empty($data->img))
                                        $img = '<img src="' . Yii::$app->homeUrl . '../uploads/cms/sliders/' . $data->id . '/ar/small.' . $data->img_ar . '" width="100"/>';
                                    else
                                        $img = '<img src="' . Yii::$app->homeUrl . '../uploads/product/profile_thumb.png"/>';
                                    return $img;
                                },
                            ],
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


