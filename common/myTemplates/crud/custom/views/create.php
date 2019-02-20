<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = <?= $generator->generateString('Create ' . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= "<?= " ?>Html::encode($this->title) ?></h3>

            </div>
            <div class="panel-body">
                <?= "<?= " ?> Html::a('<i class="fa fa-list"></i><span> Manage <?= Inflector::camel2words(StringHelper::basename($generator->modelClass)); ?></span>', ['index'], ['class' => 'btn btn-block btn-info btn-sm']) ?>
                <div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-create">
                    <?= "<?= " ?>$this->render('_form', [
                    'model' => $model,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

