<?php

//use Yii;

namespace frontend\controllers;

use yii;
use common\models\Product;
use common\models\ProductSearch;
use common\models\Category;
use common\models\RecentlyViewed;
use common\models\WishList;
use common\models\Settings;
use yii\db\Expression;
use common\models\CmsMetaTags;
use common\models\CustomerReviews;
use common\models\Brand;

class ProductController extends \yii\web\Controller {

    public function actionIndex() {
//        $min_value = 0;
//        $max_value = 1000;
//        $searchModel = new ProductSearch();
//        $model_filter = new \common\models\Filter();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//        $brand_list = Brand::find()->where(['status' => 1])->orderBy(['brand' => SORT_ASC])->all();
//        $size_list = Product::find()->select('size')->where(['status' => 1])->groupBy(['size'])->all();
//        $meta_tags = CmsMetaTags::find()->where(['id' => 3])->one();
//        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
//        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
//        if (isset($_GET['keyword']) && $_GET['keyword'] != '') {
//            $this->Search($_GET['keyword'], $dataProvider);
//            $model_filter->keyword = $_GET['keyword'];
//        }
//        if ($model_filter->load(Yii::$app->request->get())) {
//            if (isset($model_filter->keyword) && $model_filter->keyword != '') {
//                $this->Search($model_filter->keyword, $dataProvider);
//            }
//            if ($model_filter->brand != '') {
//                $filter_brand = $this->getFilterBrand($model_filter);
//                $dataProvider->query->andWhere(['id' => $filter_brand]);
//            }
//            if ($model_filter->gender != '') {
//                $filter_gender = $this->getFilterGender($model_filter);
//                $dataProvider->query->andWhere(['id' => $filter_gender]);
//            }
//            if ($model_filter->size != '') {
//                $filter_size = $this->getFilterSize($model_filter);
//                $dataProvider->query->andWhere(['id' => $filter_size]);
//            }
//            if ($model_filter->discount != '') {
//                $filter_discount = $this->getFilterDiscount($model_filter);
//                $dataProvider->query->andWhere(['id' => $filter_discount]);
//            }
//            if ($model_filter->min_price != '' && $model_filter->max_price != '') {
//                $min_value = $model_filter->min_price;
//                $max_value = $model_filter->max_price;
//                $dataProvider->query->andWhere(['between', 'price', $model_filter->min_price, $model_filter->max_price]);
//            }
//        }
        return $this->render('index', [
//                    'searchModel' => $searchModel,
//                    'dataProvider' => $dataProvider,
//                    'meta_title' => $meta_tags->meta_title,
//                    'brand_list' => $brand_list,
//                    'model_filter' => $model_filter,
//                    'size_list' => $size_list,
//                    'min_value' => $min_value,
//                    'max_value' => $max_value,
        ]);
    }

    public function getFilterBrand($data) {
        $brand_data = [];
        $filter_data = [];
        foreach ($data->brand as $value) {
            $result = Brand::find()->where(['brand' => $value])->one();
            if (!empty($result)) {
                $brand_data[] = $result->id;
            }
        }
        if (!empty($brand_data)) {
            $products = Product::find()->where(['brand' => $brand_data])->all();
            if (!empty($products)) {
                foreach ($products as $product) {
                    $filter_data[] = $product->id;
                }
            }
        }
        return $filter_data;
    }

    public function getFilterGender($data) {
        $filter_data = [];
        foreach ($data->gender as $value) {
            $products = Product::find()->where(['gender_type' => $value])->all();
            if (!empty($products)) {
                foreach ($products as $product) {
                    $filter_data[] = $product->id;
                }
            }
        }
        return $filter_data;
    }

    public function getFilterSize($data) {
        $filter_data = [];
        foreach ($data->size as $value) {
            $products = Product::find()->where(['size' => $value])->all();
            if (!empty($products)) {
                foreach ($products as $product) {
                    $filter_data[] = $product->id;
                }
            }
        }
        return $filter_data;
    }

    public function getFilterDiscount($data) {
        $filter_data = [];
        foreach ($data->discount as $value) {
            $products = Product::find()->where(['>=', 'discount', $value])->all();
            if (!empty($products)) {
                foreach ($products as $product) {
                    $filter_data[] = $product->id;
                }
            }
        }
        return array_unique($filter_data);
    }

    public function actionBrands() {
        $brands = \common\models\Brand::find()->where(['status' => 1])->orderBy(['brand' => SORT_ASC])->all();

        $meta_tags = CmsMetaTags::find()->where(['id' => 6])->one();
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        return $this->render('brands', ['brands' => $brands, 'meta_title' => $meta_tags->meta_title,]);
    }

    public function Search($keyword, $dataProvider) {
        $dataProvider->query->andWhere(['like', 'product_name', $keyword])->orWhere(['like', 'canonical_name', $keyword]);
        /*
         * search category
         */
        $categorys = Category::find()->where(['status' => 1])->andWhere(['like', 'category', $keyword])->all();
        $category_products = array();
        if (!empty($categorys)) {
            foreach ($categorys as $value) {
                $cat_products = Product::find()->where(['status' => 1, 'category' => $value->id])->all();
                foreach ($cat_products as $cat_products) {
                    $category_products[] = $cat_products->id;
                }
            }
            $dataProvider->query->orWhere(['IN', 'id', $category_products]);
        }
        /*
         * search search tags
         */
        $search_tags = \common\models\MasterSearchTag::find()->where(['status' => 1])->andWhere((['like', 'tag_name', $keyword]))->all();
        $keyword_products = array();
        if (!empty($search_tags)) {
            foreach ($search_tags as $value) {
                $search_products = Product::find()->where(['status' => 1])->andWhere(new Expression('FIND_IN_SET(:search_tag, search_tag)'))->addParams([':search_tag' => $value->id])->all();
                foreach ($search_products as $search_productss) {
                    if (!in_array($search_productss->id, $keyword_products))
                        $keyword_products[] = $search_productss->id;
                }
            }
            $dataProvider->query->orWhere(['IN', 'id', $keyword_products]);
        }
        return $dataProvider;
    }

    public function actionProductDetail1($product) {
        $recently_viewed = '';
        if (isset(Yii::$app->user->identity->id)) {
            $user_id = Yii::$app->user->identity->id;
        } else {
            $user_id = '';
        }
        if (isset(Yii::$app->user->identity->id)) {
            $recently_viewed = RecentlyViewed::find()->where(['user_id' => Yii::$app->user->identity->id])->limit(10)->all();
        } else if (isset(Yii::$app->session['temp_user_product']) || Yii::$app->session['temp_user_product'] != '') {
            $recently_viewed = RecentlyViewed::find()->where(['session_id' => Yii::$app->session['temp_user_product']])->limit(10)->all();
        }
        $shipping_limit = Settings::findOne('1')->value;
        $product_details = Product::find()->where(['canonical_name' => $product, 'status' => '1'])->one();
        $this->RecentlyViewed($product_details);
        $product_reveiws = \common\models\CustomerReviews::find()->where(['product_id' => $product_details->id, 'status' => '1'])->all();
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $product_details->meta_keywords]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $product_details->meta_description]);
        $add_review = new CustomerReviews();
        $related_poduct = Product::find()->where(['brand' => $product_details->brand, 'gender_type' => $product_details->gender_type])->andwhere(['<>', 'id', $product_details->id])->all();
        if ($product_details) {
            return $this->render('product_detail', [
                        'product_details' => $product_details,
                        'product_reveiws' => $product_reveiws,
                        'user_id' => $user_id,
                        'shipping_limit' => $shipping_limit,
                        'recently_viewed' => $recently_viewed,
                        'add_review' => $add_review,
                        'related_poduct' => $related_poduct,
            ]);
        }
    }
    
     public function actionProductDetail(){
      return $this->render('product_detail', [
            ]);   
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

    public function actionSearchKeyword() {
        if (Yii::$app->request->isAjax) {

            $keyword = $_POST['keyword'];
            if ($keyword != '' || !empty($keyword)) {
                $search_tags = \common\models\MasterSearchTag::find()->select('tag_name')->where(['status' => 1])->andWhere((['like', 'tag_name', $keyword]))->all();
                $products = Product::find()->where(['status' => 1])->select('product_name')->andWhere((['like', 'product_name', $keyword]))->all();
                $category = Category::find()->where(['status' => 1])->select('category')->andWhere((['like', 'category', $keyword]))->all();
                $results_temp = array_merge($search_tags, $products);
                $results = array_merge($results_temp, $category);

                $values = $this->renderPartial('_product_search', ['products' => $results, 'keyword' => $keyword]);
                return $values;
            }
        }
    }

    public function actionSpecialOffer() {
        $special_offers = \common\models\HomeManagement::findOne(4)->products;
        $brand_list = Brand::find()->where(['status' => 1])->orderBy(['brand' => SORT_ASC])->all();
        $size_list = Product::find()->select('size')->where(['status' => 1])->groupBy(['size'])->all();
        $brands_filters = '';
        $special = explode(',', $special_offers);
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['status' => 1]);
        $dataProvider->query->andWhere(['IN', 'id', $special]);
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'type' => '',
                    'brand_list' => $brand_list,
                    'size_list' => $size_list,
                    'brands_filters' => $brands_filters,
        ]);
//        return $this->render('special_offer');
    }

    public function actionAddReview() {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(array('site/login-signup'));
        }
        if (Yii::$app->request->isAjax) {
            $product_id = $_POST['product_id'];
            $model_review = new \common\models\CustomerReviews();
            $product_details = Product::findOne($product_id);
            $data = $this->renderPartial('add_reviews', [
                'model_review' => $model_review,
                'product_id' => $product_id,
                'product_details' => $product_details,
            ]);
            echo $data;
        }
    }

    public function actionSubmitReview() {
        if (Yii::$app->request->isAjax) {
            if (!empty($_POST['CustomerReviews']['tittle']) && !empty($_POST['CustomerReviews']['description'])) {
                $model = new CustomerReviews();
                $model->product_id = $_POST['CustomerReviews']['product_id'];
                $model->tittle = $_POST['CustomerReviews']['tittle'];
                $model->description = $_POST['CustomerReviews']['description'];
                $model->user_id = Yii::$app->user->identity->id;
                $model->review_date = date("Y-m-d H:i:s");
                if ($model->validate() && $model->save()) {
                    Yii::$app->getSession()->setFlash('success', 'Review added successfully');
                } else {
                    Yii::$app->getSession()->setFlash('error', 'An error ocuured');
                }
                echo json_encode(array('result' => '1'));
            } else {
                echo json_encode(array('result' => '0'));
            }
        }
    }

    public function actionReview() {
        $product = $_POST['product'];
        $add_review = $this->renderPartial('add_reviews', ['product' => $product]);
        return $add_review;
    }
    
    public function actionTest(){
        echo 'This action is test';
    }

}
