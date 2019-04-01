<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = 'Update Product: ' . $model->product_name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


            </div>
            <div class="panel-body">
                <?= Html::a('<i class="fa fa-list"></i><span> Manage Product</span>', ['index'], ['class' => 'btn  btn-info btn-sm product-update-btn']) ?>
                <?= Html::a('<i class="fa fa-clipboard"></i><span> Copy</span>', ['product/copy?id=' . $model->id], ['class' => 'btn  btn-info btn-sm product-update-btn']) ?>
                <a target="_blank" href="<?= Yii::$app->homeUrl . '../product/product-detail?product=' . $model->canonical_name ?>" class="btn  btn-info btn-sm product-update-btn"><i class="fa fa-share"></i><span> Preview</span></a>
                <div class="clearfix"></div>
                <div class="product-create">
                    <?=
                    $this->render('_form', [
                        'model' => $model,
                    ])
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
