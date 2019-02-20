<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Fregrance */

$this->title = 'Update Fregrance: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Fregrances', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


            </div>
            <div class="panel-body">
                <?=  Html::a('<i class="fa fa-list"></i><span> Manage Fregrance</span>', ['index'], ['class' => 'btn btn-block btn-info btn-sm']) ?>
                <div class="fregrance-create">
                    <?= $this->render('_form', [
                    'model' => $model,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
