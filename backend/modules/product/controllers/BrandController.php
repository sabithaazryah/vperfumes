<?php

namespace backend\modules\product\controllers;

use Yii;
use common\models\Brand;
use common\models\BrandSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BrandController implements the CRUD actions for Brand model.
 */
class BrandController extends Controller
{
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
    public function behaviors()
    {
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
     * Lists all Brand models.
     * @return mixed
     */
    public function actionIndex1()
    {
        $searchModel = new BrandSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionIndex($id = NULL) {
        if (!empty($id)) {
            $model = $this->findModel($id);
        } else {
            $model = new Brand();
        }
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model) && $model->validate() &&$this->SetExtension($model, $model->id)  && $model->save() && $this->SaveUpload($model)) {
            if (!empty($id)) {
                Yii::$app->getSession()->setFlash('success', 'Updated Successfully');
            } else {
                Yii::$app->getSession()->setFlash('success', 'Created Successfully');
            }
            return $this->redirect(['index']);
        }
        $searchModel = new BrandSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->orderBy(['id' => SORT_DESC]);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model' => $model,
        ]);
    }
    
    public function SetExtension($model, $id) {
                $image = UploadedFile::getInstance($model, 'image');
                if (!empty($id)) {
                        $update = Brand::findOne($id);
                        if (!empty($image)) {
                                $model->image = $image->extension;
                        } else {
                                $model->image = $update->image;
                        }
                } else {
                        $model->image = $image->extension;
                }

                return TRUE;
        }

        public function SaveUpload($model) {
                $image = UploadedFile::getInstance($model, 'image');
                $path = Yii::$app->basePath . '/../uploads/cms/brands';
                $size = [
                        ['width' => 300, 'height' => 75, 'name' => 'small'],
                ];

                if (!empty($image)) {
                        Yii::$app->UploadFile->UploadFile($model, $image, $path . '/' . $model->id, $size);
                }
                return TRUE;
        }

    /**
     * Displays a single Brand model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Brand model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Brand();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Brand model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Brand model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Brand model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Brand the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Brand::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionAjaxaddbrand() {
        if (yii::$app->request->isAjax) {
            $brand = Yii::$app->request->post()['brand'];
            $model = new Brand();
            $model->brand = $brand;
            $model->brand_ar = Yii::$app->request->post()['brand_ar'];;
            $model->status = '1';
            if (Yii::$app->SetValues->Attributes($model)) {
                if ($model->save()) {
                    $image_arr = [
                        ['width' => 150, 'height' => 75, 'name' => 'small'],
                    ];
                    echo json_encode(array("con" => "1", 'id' => $model->id, 'brand' => $brand)); //Success
                    exit;
                } else {
                    var_dump($model->getErrors());exit;
                    echo json_encode(array("con" => "0", 'error' => 'Cannot added')); //Error
                    exit;
                }
            }
        }
    }
}
