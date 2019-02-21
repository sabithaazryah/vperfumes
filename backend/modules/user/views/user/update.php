<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Update User: ' . $model->first_name;
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
                <?= Html::a('<i class="fa fa-list"></i><span> Manage User</span>', ['index'], ['class' => 'btn btn-block btn-info btn-sm']) ?>

                <div class="col-md-12 user-profile-tabs">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Profile Details</a></li>
                            <li><a href="#tab_2" data-toggle="tab">Addresses</a></li>
                            <li><a href="#tab_3" data-toggle="tab">WishList</a></li>
                            <li><a href="#tab_4" data-toggle="tab">Orders</a></li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="user-create">
                                    <?=
                                    $this->render('_form', [
                                        'model' => $model,
                                    ])
                                    ?>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane user-address" id="tab_2">

                                <?=
                                $this->render('user-address', [
                                    'model' => $model,
                                    'user_address' => $user_address,
                                ])
                                ?>



                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                                <?=
                                $this->render('wishlist', [
                                    'model' => $model,
                                    'searchModel' => $searchModel,
                                    'dataProvider' => $dataProvider,
                                ])
                                ?>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="tab_4">
                                <?=
                                $this->render('orders', [
                                    'model' => $model,
                                    'searchModelOrder' => $searchModelOrder,
                                    'dataProviderOrder' => $dataProviderOrder,
                                ])
                                ?>
                            </div>
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- nav-tabs-custom -->
                </div>


            </div>
        </div>
    </div>
</div>
