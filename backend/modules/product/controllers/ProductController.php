<?php

namespace backend\modules\product\controllers;

use Yii;
use common\models\Product;
use common\models\ProductSearch;
use common\models\SubCategory;
use common\models\Category;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\base\UserException;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller {

    public function beforeAction($action) {
        if (!parent::beforeAction($action)) {
            return false;
        }
        if (Yii::$app->user->isGuest) {
            $this->redirect(['/site/index']);
            return false;
        }
        return true;
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->orderBy(['id' => SORT_DESC]);
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Product();
        $model->setScenario('create');
        if ($model->load(Yii::$app->request->post())) {
            $file11 = UploadedFile::getInstances($model, 'profile');
            $file12 = UploadedFile::getInstances($model, 'other_image');
            if (isset($model->type) && $model->type != '') {
                $model->type = implode(',', $model->type);
            }
            if (isset($model->related_product) && $model->related_product != '') {
                $model->related_product = implode(',', $model->related_product);
            }
            if (!empty($file11))
                $model->profile = $file11[0]->extension;
            if ($model->validate()) {
                if (isset($model->search_tag) && $model->search_tag != '') {
                    $model->search_tag = implode(',', $model->search_tag);
                }
                if (isset($model->offer_price_expiry_date) && $model->offer_price_expiry_date != '')
                    $model->offer_price_expiry_date = date('Y-m-d', strtotime($model->offer_price_expiry_date));
                if ($model->offer_price > 0 && $model->offer_price != '') {
                    $percentage = round(100 - (($model->offer_price / $model->price) * 100));
                    $model->discount = $percentage;
                }
                $model->other_image = '';
                if ($model->save()) {
                    if ($file11) {
                        $this->image_clear($model);
                        if ($this->upload($model, $file11[0])) {
                            $model->upload($file11[0], $model);
                        }
                    }
                    for ($i = 0; $i < sizeof($file12); $i++) {
                        if ($model->uploadMultiple($file12[$i], $model->id, $model->canonical_name, $i)) {
                            
                        } else {
                            echo 'Image Upload Failed:';
                        }
                    }
                    $this->UpdateProductEan($model->item_ean);
                    Yii::$app->getSession()->setFlash('success', "Created Successfully");
                    return $this->redirect(['index']);
                }
            }
        } return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $profile = $model->profile;
        $canonical_name = $model->canonical_name;
        if ($model->load(Yii::$app->request->post())) {
            $ai = '';
            if (isset($model->type) && $model->type != '') {
                $model->type = implode(',', $model->type);
            }
            if (isset($model->related_product) && $model->related_product != '') {
                $model->related_product = implode(',', $model->related_product);
            }
            $file11 = UploadedFile::getInstances($model, 'profile');
            $file12 = UploadedFile::getInstances($model, 'other_image');
            if ($file11) {
                $model->profile = $file11[0]->extension;
            } else {
                $model->profile = $profile;
            }
            if ($canonical_name != $model->canonical_name) {
                $this->rename($model->id, $model->canonical_name, 'profile');
                $this->rename($model->id, $model->canonical_name, 'gallery');
                $this->rename($model->id, $model->canonical_name, 'gallery_thumb');
            }
            if (isset($model->search_tag) && $model->search_tag != '') {
                $model->search_tag = implode(',', $model->search_tag);
            }
            if (isset($model->offer_price_expiry_date) && $model->offer_price_expiry_date != '')
                $model->offer_price_expiry_date = date('Y-m-d', strtotime($model->offer_price_expiry_date));
            $model->other_image = '';
            if ($model->offer_price > 0 && $model->offer_price != '') {
                $percentage = round(100 - (($model->offer_price / $model->price) * 100));
                $model->discount = $percentage;
            }
            if ($model->save()) {
                if ($file11) {
                    $this->profile_clear($model);
                    if ($this->upload($model, $file11[0])) {
                        $model->upload($file11[0], $model);
                    }
                }
                for ($i = 0; $i < sizeof($file12); $i++) {
                    if ($model->uploadMultiple($file12[$i], $model->id, $model->canonical_name, $i)) {
                        
                    } else {
                        echo 'Image Upload Failed:';
                    }
                }
                Yii::$app->getSession()->setFlash('success', "Updated Successfully");
                return $this->redirect(['update', 'id' => $model->id]);
            }
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    function profile_clear($model) {
        $files = glob(yii::$app->basepath . '/../uploads/product/' . $model->id . '/profile/*'); // get all file names
        foreach ($files as $file) { // iterate files
            if (is_file($file))
                unlink($file); // delete file
        }
    }

    function image_clear($model) {
        $files = glob(yii::$app->basepath . '/../uploads/product/' . $model->id . '/profile/*'); // get all file names
        foreach ($files as $file) { // iterate files
            if (is_file($file))
                unlink($file); // delete file
        }
        $files = glob(yii::$app->basepath . '/../uploads/product/' . $model->id . '/gallery/*'); // get all file names
        foreach ($files as $file) { // iterate files
            if (is_file($file))
                unlink($file); // delete file
        }
        $files = glob(yii::$app->basepath . '/../uploads/product/' . $model->id . '/gallery_thumb/*'); // get all file names
        foreach ($files as $file) { // iterate files
            if (is_file($file))
                unlink($file); // delete file
        }
        $files = glob(yii::$app->basepath . '/../uploads/product/' . $model->id . '/gallery_profile/*'); // get all file names
        foreach ($files as $file) { // iterate files
            if (is_file($file))
                unlink($file); // delete file
        }
    }

    public function Upload($model, $file) {
        if (!is_dir(\Yii::$app->basePath . '/../uploads/product/' . $model->id)) {
            mkdir(\Yii::$app->basePath . '/../uploads/product/' . $model->id);
            chmod(\Yii::$app->basePath . '/../uploads/product/' . $model->id, 0777);
        }
        if (!is_dir(\Yii::$app->basePath . '/../uploads/product/' . $model->id . '/profile/')) {
            mkdir(\Yii::$app->basePath . '/../uploads/product/' . $model->id . '/profile/');
            chmod(\Yii::$app->basePath . '/../uploads/product/' . $model->id . '/profile/', 0777);
        }
        $file->saveAs(Yii::$app->basePath . '/../uploads/product/' . $model->id . '/profile/' . $model->canonical_name . '_big.' . $file->extension);
        return TRUE;
    }

    /*
     * This function copy product detail
     */

    public function actionCopy($id) {
        $model = new Product();
        $model1 = $this->findModel($id);
        $model->setAttributes($model1->attributes);
        $ean = Product::find()->max('id');
        $model->product_name = '';
        $model->product_name_ar = '';
        $model->canonical_name = '';
        $model->canonical_name_ar = '';
        $model->price = '';
        $model->offer_price = '';
        $model->stock = '';
        $serial_no = \common\models\Settings::findOne(3)->value;
        $prefix = \common\models\Settings::findOne(3)->prefix;
        $model->item_ean = $this->generateProductEan($serial_no);
        $profile = $model1->profile;
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $ean = Product::find()->max('id');
                $file11 = UploadedFile::getInstances($model, 'profile');
                $file12 = UploadedFile::getInstances($model, 'other_image');
                if ($file11) {
                    $model->profile = $file11[0]->extension;
                } else {
                    $model->profile = $profile;
                }

                $tag = Yii::$app->request->post()['Product']['search_tag'];
                if ($tag) {
                    $model->search_tag = implode(',', $tag);
                }
                if (isset($model->offer_price_expiry_date) && $model->offer_price_expiry_date != '')
                    $model->offer_price_expiry_date = date('Y-m-d', strtotime($model->offer_price_expiry_date));
                $model->other_image = '';
                if ($model->save()) {
                    $this->UpdateProductEan($model->item_ean);
                    if ($file11) {
                        $this->image_clear($model);
                        if ($this->upload($model, $file11[0])) {
                            $model->upload($file11[0], $model);
                        }
                    } else {
                        if (is_dir(Yii::$app->basePath . '/../uploads/product/' . $id . '/profile')) {
                            $this->makedir($model->id);
                            $files = scandir(Yii::$app->basePath . '/../uploads/product/' . $id . '/profile');
                            $source = Yii::$app->basePath . '/../uploads/product/' . $id . "/profile/";
                            $destination = Yii::$app->basePath . '/../uploads/product/' . $model->id . '/profile/';
                            foreach ($files as $file) {
                                if (in_array($file, array(".", "..")))
                                    continue;
                                if (copy($source . $file, $destination . $file)) {
                                    $delete[] = $source . $file;
                                }
                            }
                            $this->rename($model->id, $model->canonical_name, 'profile');
                        }
                    }
                    if ($file12) {
                        for ($i = 0; $i < sizeof($file12); $i++) {
                            if ($model->uploadMultiple($file12[$i], $model->id, $model->canonical_name, $i)) {
                                
                            } else {
                                echo 'Image Upload Failed:';
                            }
                        }
                    } else {
                        $this->makegallerydir($model->id);
                        $this->copygallery($id, $model->id, 'gallery');
                        $this->copygallery($id, $model->id, 'gallery_thumb');
                        $this->copygallery($id, $model->id, 'gallery_profile');
                        $this->rename($model->id, $model->canonical_name, 'gallery');
                        $this->rename($model->id, $model->canonical_name, 'gallery_thumb');
                        $this->rename($model->id, $model->canonical_name, 'gallery_profile');
                    }
                    return $this->redirect(['index']);
                }
            } else {
                return $this->render('copy', [
                            'model' => $model,
                ]);
            }
        } else {
            return $this->render('copy', [
                        'model' => $model,
            ]);
        }
    }

    public function rename($id, $canonical_name, $name) {
        $path = Yii::getAlias('@paths') . '/product/' . $id . '/' . $name;
        if (count(glob("{$path}/*")) > 0) {
            $k = 0;
            foreach (glob("{$path}/*") as $file) {
                $k++;
                $arry = explode('/', $file);
                $img_nmee = end($arry);
                if (strpos($img_nmee, '_') !== false) {
                    $test = explode('_', $img_nmee);
                    rename($path . '/' . $img_nmee, $path . '/' . $canonical_name . '_' . $test['1']);
                } else {
                    $test = explode('.', $img_nmee);
                    rename($path . '/' . $img_nmee, $path . '/' . $canonical_name . '.' . $test['1']);
                }
            }
        }
    }

    public function makedir($id) {
        if (!is_dir(\Yii::$app->basePath . '/../uploads/product/' . $id . '/profile/')) {
            mkdir(\Yii::$app->basePath . '/../uploads/product/' . $id . '/profile/', 0777, true);
//            mkdir(\Yii::$app->basePath . '/../uploads/product/' . $id . '/profile/', 0644, true);
        }
        return TRUE;
    }

    public function makegallerydir($id) {
        if (!is_dir(\Yii::$app->basePath . '/../uploads/product/' . $id . '/gallery/')) {
            mkdir(\Yii::$app->basePath . '/../uploads/product/' . $id . '/gallery/', 0777, true);
//            mkdir(\Yii::$app->basePath . '/../uploads/product/' . $id . '/gallery/', 0644, true);
        }
        if (!is_dir(\Yii::$app->basePath . '/../uploads/product/' . $id . '/gallery_thumb/')) {
            mkdir(\Yii::$app->basePath . '/../uploads/product/' . $id . '/gallery_thumb/', 0777, true);
//            mkdir(\Yii::$app->basePath . '/../uploads/product/' . $id . '/gallery_thumb/', 0644, true);
        }
        return TRUE;
    }

    public function copygallery($id, $model_id, $name) {
        $dir_path = Yii::$app->basePath . '/../uploads/product/' . $id . '/' . $name;
        if (is_dir($dir_path)) {
            $files = scandir(Yii::$app->basePath . '/../uploads/product/' . $id . '/' . $name);
// Identify directories
            $source = Yii::$app->basePath . '/../uploads/product/' . $id . "/" . $name . '/';
            $destination = Yii::$app->basePath . '/../uploads/product/' . $model_id . '/' . $name . '/';
// Cycle through all source files
            foreach ($files as $file) {
                if (in_array($file, array(".", "..")))
                    continue;
// If we copied this successfully, mark it for deletion
                if (copy($source . $file, $destination . $file)) {
                    $delete[] = $source . $file;
                }
            }
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionAjax_imgdelete() {
        if (yii::$app->request->isAjax) {
            $image = Yii::$app->request->post()['image'];
//        echo yii::$app->homeUrl;exit;
            if ($image) {
                $img = explode('@', $image);
                unlink(yii::$app->basepath . '/../uploads/product/' . $img['0'] . '/gallery/' . $img['1']);
// unlink(yii::$app->basepath . '/../uploads/product/' . $img['0'] . '/gallery_thumb/' . $img['1']);
                echo json_encode(array('msg' => 'success', 'id' => $img['2']));
            } else {
                echo json_encode(array('msg' => 'error', 'title' => 'Image Not Found'));
            }
        }
    }

    public function actionAjaxchange_product() {
        if (yii::$app->request->isAjax) {
            $price = Yii::$app->request->post()['price'];
            $offerprice = Yii::$app->request->post()['offerprice'];
            $stock = Yii::$app->request->post()['stock'];
            $availablity = Yii::$app->request->post()['availablity'];
            $id = Yii::$app->request->post()['id'];
            $featured = Yii::$app->request->post()['featured'];
            $sort = Yii::$app->request->post()['sort'];
//        echo yii::$app->homeUrl;exit;
            if ($id) {
                $model = $this->findModel($id);
                $model->price = $price;
                $model->offer_price = $offerprice;
                $model->stock = $stock;
                $model->stock_availability = $availablity;
                $model->featured_product = $featured;
                $model->sort = $sort;
                if ($model->save()) {
                    echo json_encode(array('msg' => 'success', 'title' => 'Updated Successfully'));
                } else {
                    echo json_encode(array('msg' => 'error', 'title' => 'Internal error '));
                }
            } else {
                echo json_encode(array('msg' => 'error', 'title' => 'Product cannot be find'));
            }
        }
    }

    public function actionCategory() {
        if (yii::$app->request->isAjax) {
            $main_cat = Yii::$app->request->post()['main_cat'];
            if (isset($main_cat)) {
                $subcat = Category::find()->where(['main_category' => $main_cat])->orderBy(['category' => SORT_ASC])->all();
                $val = "";
                if ($subcat) {
                    for ($i = 0; $i < sizeof($subcat); $i++) {
                        $val .= "<option value='" . $subcat[$i]->id . "'>" . $subcat[$i]->category . "</option>";
                    }
                    echo $val;
                    exit;
                } else {
                    echo $val; //No return
                    exit;
                }
            } else {
                echo 1; //Value Not Setted
                exit;
            }
        }
    }

    public function actionSubcategory() {
        if (yii::$app->request->isAjax) {
            $category = Yii::$app->request->post()['category'];
            if (isset($category)) {
                $subcat = SubCategory::find()->where(['category_id' => $category])->all();

                $val = "<option value=''>Select</option>";
                if ($subcat) {
                    for ($i = 0; $i < sizeof($subcat); $i++) {
                        $val .= "<option value='" . $subcat[$i]->id . "'>" . $subcat[$i]->sub_category . "</option>";
                    }
                    echo $val;
                    exit;
                } else {
                    echo $val; //No return
                    exit;
                }
            } else {
                echo 1; //Value Not Setted
                exit;
            }
        }
    }

    public function actionGetRelatedProducts() {
        if (yii::$app->request->isAjax) {
            $brand = Yii::$app->request->post()['brand'];
            if (isset(Yii::$app->request->post()['related_product'])) {
                $related_product = Yii::$app->request->post()['related_product'];
            } else {
                $related_product = '';
            }
            $products = '';
            if (isset($brand) && $brand != '') {
                if ($related_product != '') {
                    if (!empty($related_product)) {
                        echo '1c';
                        $products = Product::find()->where(['brand' => $brand])->orWhere(['id' => $related_product])->all();
                    }
                } else {
                    $products = Product::find()->where(['brand' => $brand])->all();
                }
            } else {
                if ($related_product != '') {
                    if (!empty($related_product)) {
                        $products = Product::find()->where(['id' => $related_product])->all();
                    }
                }
            }
            $val = "<option value=''>Select</option>";
            if (!empty($products)) {
                foreach ($products as $product) {
                    $val .= "<option value='" . $product->id . "'>" . $product->product_name . "</option>";
                }
            }
            return $val;
        }
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * generate product EAN from settings
     * return Product Ean
     */
    public function generateProductEan() {
        $last_product = Product::find()->orderBy(['id' => SORT_DESC])->one();
        if (empty($last_product))
            $ean = 'PD' . sprintf('%05d', 1);
        else {
            $ean = 'PD' . sprintf('%04d', ++$last_product->id);
        }
        return $ean;
    }

    /**
     * Update product EAN in settings
     * @param Product EAN
     */
    public function UpdateProductEan($id) {
        $productean = \common\models\Settings::findOne(3);
        $productean->value = $id;
        $productean->save();
        return;
    }

    public function actionStockNotification() {

        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['<', 'stock', 3]);
        return $this->render('stock-notification', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAddCategory() {
        $model = new \common\models\Category();
        return $this->renderAjax('add-category', [
                    'model' => $model
        ]);
    }

    public function actionSaveCategory() {
        $model = new \common\models\Category();
        $tag_new = '';
        if (Yii::$app->request->ajax) {
            if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {

                $model->status = 1;
                $model->save();
                $tag_new .= '<option value="' . $model->id . '">' . $model->category . '</option>';
                return json_encode(array('tag' => $tag_new, 'val' => $model->id));
            }
        }
    }

}
