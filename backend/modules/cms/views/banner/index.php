<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BannerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-index">

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
                                'attribute' => 'banner',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    if (!empty($data->banner))
                                        $img = '<img src="' . Yii::$app->homeUrl . '../uploads/cms/banner/' . $data->id . '/en/small.' . $data->banner . '" width="100"/>';
                                    else
                                        $img = '<img src="' . Yii::$app->homeUrl . '../uploads/product/profile_thumb.png"/>';
                                    return $img;
                                },
                            ],
                            [
                                'attribute' => 'banner_ar',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    if (!empty($data->banner_ar))
                                        $img = '<img src="' . Yii::$app->homeUrl . '../uploads/cms/banner/' . $data->id . '/en/small.' . $data->banner_ar . '" width="100"/>';
                                    else
                                        $img = '<img src="' . Yii::$app->homeUrl . '../uploads/product/profile_thumb.png"/>';
                                    return $img;
                                },
                            ],
                            'banner_link',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{update}'
                            ],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


