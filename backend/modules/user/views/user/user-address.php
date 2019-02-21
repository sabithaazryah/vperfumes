<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
if (count($user_address) > 0) {
    foreach ($user_address as $address) {
        $emirate_name = '';
        $emirate = common\models\Emirates::findOne($address->emirate);
        if (!empty($emirate))
            $emirate_name = $emirate->name;
        ?>

        <div class="col-md-4">
            <p><?= $address->name ?> </p>
            <p><?= $address->address ?> </p>
            <p><?= $address->landmark ?> </p>
            <p><?= $address->location ?> </p>
            <p><?= $emirate_name ?> </p>
            <p>Tel:  <?= $address->country_code ?>  <?= $address->mobile_number ?> </p>
        </div>
    <?php } ?>
<?php } ?>