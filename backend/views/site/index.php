<?php
/* @var $this yii\web\View */

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = 'ADIR';
?>





<script>
    $('.notification-closed').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('id');
        $.ajax({
                type: 'POST',
                url: '<?= Yii::$app->homeUrl ?>notifications/notifications/notification-status',
                data: {id: id},
                success: function (data) {
                    	$.pjax.reload({container: '#notification-list', timeout: false});
                }
            });
    });
</script>