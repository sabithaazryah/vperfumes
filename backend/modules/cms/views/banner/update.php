<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Banner */

$this->title = 'Update Banner ';
$this->params['breadcrumbs'][] = ['label' => 'Banners', 'url' => ['index']];
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
                <?= Html::a('<i class="fa fa-list"></i><span> Manage Banner</span>', ['index'], ['class' => 'btn btn-block btn-info btn-sm']) ?>
                <div class="banner-create">
                    <?=
                    $this->render('_form', [
                        'model' => $model,
                        'width' => $width,
                        'height' => $height
                    ])
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
