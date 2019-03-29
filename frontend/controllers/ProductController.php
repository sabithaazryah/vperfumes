<?php

//use Yii;

namespace frontend\controllers;

use yii;
use common\models\Product;
use common\models\ProductSearch;
use common\models\Settings;
use common\models\RecentlyViewed;
use yii\db\Expression;

class ProductController extends \yii\web\Controller {

    public function actionIndex($category = null) {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 44;
        $dataProvider->query->orderBy(new Expression('rand()'));
        if ($category == 'fragrances') {
            $dataProvider->query->andWhere(['main_category' => 7]);
        } else if ($category == 'special-offers') {
            $dataProvider->query->andWhere(['type' => 5]);
        } else if ($category == 'exclusive-brands') {
            $dataProvider->query->andWhere(['category' => 2]);
        } else if ($category == 'arabic-perfumes') {
            $dataProvider->query->andWhere(['type' => 1]);
        } else if ($category == 'new-arrivals') {
            $dataProvider->query->andWhere(['type' => 3]);
        } else if ($category == 'gift-sets') {
            $dataProvider->query->andWhere(['type' => 2]);
        } else if ($category == 'one-day-sale') {
            $dataProvider->query->andWhere(['type' => 4]);
        } else if ($category == 'others') {
            $dataProvider->query->andWhere(['type' => 6]);
        }

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a Particular Product.
     * @param prodict_id  $product
     * @return mixed
     */
    public function actionProductDetail($product) {
        if (isset(Yii::$app->user->identity->id)) {
            $user_id = Yii::$app->user->identity->id;
        } else {
            $user_id = '';
        }
        $shipping_limit = Settings::findOne('1')->value;
        $product_details = Product::find()->where(['canonical_name' => $product, 'status' => '1'])->one();
        if (!empty($product_details)) {
            $this->RecentlyViewed($product_details);
            $product_reveiws = \common\models\CustomerReviews::find()->where(['product_id' => $product_details->id, 'status' => '1'])->all();
            \Yii::$app->view->title = $product_details->meta_title;
            \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $product_details->meta_keywords]);
            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $product_details->meta_description]);
            return $this->render('product_detail', [
                        'product_details' => $product_details,
                        'product_reveiws' => $product_reveiws,
                        'user_id' => $user_id,
                        'shipping_limit' => $shipping_limit,
            ]);
        } else {
            return $this->redirect(['site/error']);
        }
    }

    /**
     * Save recently viewed product.
     * @param product array
     * if user logged in set user id otherwise set temporary session id
     */
    public function RecentlyViewed($product) {
        $user_id = '';
        $sessonid = '';
        if (isset(Yii::$app->user->identity->id)) {
            $user_id = Yii::$app->user->identity->id;
            $model = RecentlyViewed::find()->where(['product_id' => $product->id, 'user_id' => $user_id])->one();
        } else {
            if (!isset(Yii::$app->session['temp_user_product']) || Yii::$app->session['temp_user_product'] == '') {
                $milliseconds = round(microtime(true) * 1000);
                Yii::$app->session['temp_user_product'] = $milliseconds;
            }
            $model = RecentlyViewed::find()->where(['product_id' => $product->id, 'session_id' => Yii::$app->session['temp_user_product']])->one();
            $sessonid = Yii::$app->session['temp_user_product'];
        }
        if (empty($model)) {
            $model = new RecentlyViewed();
            $model->user_id = $user_id;
            $model->session_id = $sessonid;
            $model->product_id = $product->id;
            $model->date = date('Y-m-d');
        } else {
            $model->date = date('Y-m-d');
        }
        $model->save();
        return;
    }

}
