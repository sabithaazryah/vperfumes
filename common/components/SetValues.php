<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SetValues
 *
 * @author user
 */

namespace common\components;

use Yii;
use yii\base\Component;

class SetValues extends Component {

    public function Attributes($model) {
        if (isset($model) && !Yii::$app->user->isGuest) {
            if ($model->isNewRecord) {
                $model->CB = Yii::$app->user->identity->id;
                $model->DOC = date('Y-m-d');
            } else {
                $model->UB = Yii::$app->user->identity->id;
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function Rating($product) {
        $rating1 = \common\models\CustomerReviews::find()->where(['product_id' => $product, 'rating_point' => 1])->count();
        $rating2 = \common\models\CustomerReviews::find()->where(['product_id' => $product, 'rating_point' => 2])->count();
        $rating3 = \common\models\CustomerReviews::find()->where(['product_id' => $product, 'rating_point' => 3])->count();
        $rating4 = \common\models\CustomerReviews::find()->where(['product_id' => $product, 'rating_point' => 4])->count();
        $rating5 = \common\models\CustomerReviews::find()->where(['product_id' => $product, 'rating_point' => 5])->count();
        $ratings = [
            1 => $rating1,
            2 => $rating2,
            3 => $rating3,
            4 => $rating4,
            5 => $rating5
        ];
        $rating_point = 0;
        $totalStars = 0;
        $voters = 0;
        if (!empty($ratings)) {
            $voters = array_sum($ratings);
            foreach ($ratings as $stars => $votes) {//This is the trick, get the number of starts in total, then
                $totalStars += $stars * $votes;
            }
            if ($totalStars > 0 && $voters > 0) {
                $rating_point = $totalStars / $voters;
            }
        }
        return round($rating_point);
    }

    public function RatingCount($product) {
        $voters = \common\models\CustomerReviews::find()->where(['product_id' => $product])->andWhere(['>', 'rating_point', 0])->count();
        if ($voters > 0) {
            return '( ' . $voters . ' )';
        } else {
            return '';
        }
    }

}
