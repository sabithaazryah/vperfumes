<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Fregrance */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Fregrances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>


            </div>
            <div class="panel-body">

                <div class="panel-body"><div class="fregrance-view">
                        <p>
                            <?=  Html::a('<i class="fa fa-list"></i><span> Manage Fregrance</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                            ],
                            ]) ?>
                        </p>

                        <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                                    'id',
            'name',
            'name_ar',
            'CB',
            'UB',
            'DOC',
            'DOU',
            'status',
                        ],
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


