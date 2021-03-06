<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Update User: ' . $model->full_name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
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
                <?= Html::a('<i class="fa fa-list"></i><span> Manage User</span>', ['index'], ['class' => 'btn btn-block btn-info btn-sm', 'style' => 'float:left']) ?>
                <?= Html::a('<i class="fa fa-edit"></i><span> Change Password</span>', ['change-password', 'id' => Yii::$app->EncryptDecrypt->Encrypt('encrypt', $model->id)], ['class' => 'btn btn-block btn-info btn-sm', 'style' => 'float:left;margin-left:10px;margin-top: 0px;']) ?>
                
                <div class="clearfix"></div>
                
                <div class="user-create">
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
