<?php

namespace backend\modules\cms\controllers;

use Yii;
use common\models\Slider;
use common\models\SliderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SliderController implements the CRUD actions for Slider model.
 */
class SliderController extends Controller {

    /**
     * @inheritdoc
     */
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
     * Lists all Slider models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new SliderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Slider model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Slider model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Slider();
        $model->scenario = 'create';
        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'img');
            $image_arabic = UploadedFile::getInstance($model, 'img_ar');
            $model->img = $image->extension;
            $model->img_ar = $image_arabic->extension;
            if ($model->validate() && $model->save()) {
                if (!empty($image)) {
                    $path = Yii::$app->basePath . '/../uploads/cms/sliders/' . $model->id . '/en/';
                    $size = [
                        ['width' => 100, 'height' => 100, 'name' => 'small'],
                        ['width' => 1920, 'height' => 850, 'name' => 'image'],
                    ];
                    Yii::$app->UploadFile->UploadFile($model, $image, $path, $size);
                }
                if (!empty($image_arabic)) {
                    $path1 = Yii::$app->basePath . '/../uploads/cms/sliders/' . $model->id . '/ar/';
                    $size = [
                        ['width' => 100, 'height' => 100, 'name' => 'small'],
                        ['width' => 1920, 'height' => 850, 'name' => 'image'],
                    ];
                    Yii::$app->UploadFile->UploadFile($model, $image_arabic, $path1, $size);
                }
                 Yii::$app->session->setFlash('success', "Created Successfully");
            } 
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Slider model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $image_ = $model->img;
        $image_ar_ = $model->img_ar;
        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'img');
            if (!empty($image))
                $model->img = $image->extension;
            else
                $model->img = $image_;

            $image_ar = UploadedFile::getInstance($model, 'img_ar');
            if (!empty($image_ar))
                $model->img_ar = $image_ar->extension;
            else
                $model->img_ar = $image_ar_;
            if ($model->save()) {
                
                if (!empty($image)) {
                    $path = Yii::$app->basePath . '/../uploads/cms/sliders/' . $model->id . '/en/';
                    $size = [
                        ['width' => 100, 'height' => 100, 'name' => 'small'],
                        ['width' => 1920, 'height' => 850, 'name' => 'image'],
                    ];
                    Yii::$app->UploadFile->UploadFile($model, $image, $path, $size);
                }
                if (!empty($image_ar)) {
                    $path1 = Yii::$app->basePath . '/../uploads/cms/sliders/' . $model->id . '/ar/';
                    $size = [
                        ['width' => 100, 'height' => 100, 'name' => 'small'],
                        ['width' => 1920, 'height' => 850, 'name' => 'image'],
                    ];
                    Yii::$app->UploadFile->UploadFile($model, $image_ar, $path1, $size);
                }
                 Yii::$app->session->setFlash('success', "Updated Successfully");
                return $this->redirect(['index']);
            } 
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Slider model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Slider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slider the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Slider::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
