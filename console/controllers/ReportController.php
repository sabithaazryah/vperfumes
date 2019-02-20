<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\db\Expression;
use common\models\SetEmail;

class ReportController extends Controller {

    public function actionIndex() {
        $email = SetEmail::findOne(1);
        $message = '';
        $message .= "<html lang='en'>
            <style>
            span.preheader {
                display: none !important;
            }
            .banner img {
                width: 100% !important
            }
            .list-box {
                padding: 30px 20px;
            }
            .list-box ul {
                margin: 0px;
                padding: 0px;
                list-style: none;
            }
            .list-box .link {
                padding: 12px 25px;
                background: #192e61;
                text-transform: uppercase;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 14px;
                color: #FFF;
                text-decoration: none;
                display: inline-block;
            }
            @media (max-width: 991px) {
                .body {
                    width: 100% !important;
                }
                .top-head {
                    font-size: 40px !important;
                }
                .top-head2 {
                    font-size: 18px !important;
                }
                .list-box .link {
                    font-size: 13px;
                    padding: 12px 20px;
                }
            }
        </style>
                       <body style='width:800px;margin:0px auto;' class='body'>
                          <div style='padding:36px 20px;text-align:center'><img src='http://adirfire.com/app/img/logo1.jpg' ></div>
                          <div class='list-box'>";
        $message_count = 0;
        for ($i = 1; $i <= 7; $i++) {
            $categorys = \common\models\Settings::find()->where(['category' => $i])->all();
            foreach ($categorys as $category) {
                $count = $category->days;
                $search_date = date('Y-m-d', strtotime(date('Y-m-d') . ' + ' . $count . ' days'));
                $search_notifications = \common\models\Notifications::find()->where(['category' => $category->id, 'status' => 0])->andWhere(['>=', 'date', date('Y-m-d')])->andWhere(['<=', 'date', $search_date])->all();
                if (count($search_notifications) > 0) {
                    $message_count++;
                    $message .= '<h3 style="margin:0px;padding:0px 0px 20px 0px;color:#192e61;font-family:Arial, Helvetica, sans-serif;font-size:16px;">' . $category->title . '</h3><ul>';
                    $k = 0;
                    foreach ($search_notifications as $notifications) {
                        $k++;
                        $message .= '<li style="background:url(http://adirfire.com/app/img/list-icon.png) 0px 6px no-repeat ;padding:0px 0px 15px 20px ;line-height:22px ;font-family:Arial, Helvetica, sans-serif ;color:#2f2f2f ;font-size:14px;list-style:none; ">' . $notifications->message . '</li>';
                    }
                    $message .= '</ul>';
                }
            }
        }

        $message .= "   </div>
                      </body>
                    </html>";

        $to = $email->email;
        if ($to == '')
            $to = 'sabitha393@gmail.com';
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n" .
                "From: info@adirfire.com";
        if ($message_count > 0)        
        mail($to, 'Alert from dms', $message, $headers);
        mail('sabitha393@gmail.com', 'Alert from dms', $message, $headers);
    }

}
