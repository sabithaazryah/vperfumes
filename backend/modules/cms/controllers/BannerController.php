<?php

namespace backend\modules\cms\controllers;

use Yii;
use common\models\Banner;
use common\models\BannerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BannerController implements the CRUD actions for Banner model.
 */
class BannerController extends Controller {

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
     * Lists all Banner models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new BannerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Banner model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Banner model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Banner();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Banner model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $banner_ = $model->banner;
        $banner_ar_ = $model->banner_ar;
        if ($id == 1) {
            $width = 867;
            $height = 369;
        } else if ($id == 2) {
            $width = 518;
            $height = 369;
        } else if ($id == 3) {
            $width = 873;
            $height = 264;
        } else if ($id == 4) {
            $width = 1374;
            $height = 266;
        }

        if ($model->load(Yii::$app->request->post())) {
            $banner = UploadedFile::getInstance($model, 'banner');
            if (!empty($banner))
                $model->banner = $banner->extension;
            else
                $model->banner = $banner_;

            $banner_ar = UploadedFile::getInstance($model, 'banner_ar');
            if (!empty($banner_ar))
                $model->banner_ar = $banner_ar->extension;
            else
                $model->banner_ar = $banner_ar_;

            if ($model->save()) {
                if (!empty($banner)) {
                    $path = Yii::$app->basePath . '/../uploads/cms/banner/' . $model->id . '/en/';
                    $size = [
                        ['width' => 100, 'height' => 100, 'name' => 'small'],
                        ['width' => $width, 'height' => $height, 'name' => 'image'],
                    ];
                    Yii::$app->UploadFile->UploadFile($model, $banner, $path, $size);
                }
                if (!empty($banner_ar)) {
                    $path1 = Yii::$app->basePath . '/../uploads/cms/banner/' . $model->id . '/ar/';
                    $size = [
                        ['width' => 100, 'height' => 100, 'name' => 'small'],
                        ['width' => $width, 'height' => $height, 'name' => 'image'],
                    ];
                    Yii::$app->UploadFile->UploadFile($model, $banner_ar, $path1, $size);
                }
                Yii::$app->session->setFlash('success', "Updated Successfully");
                return $this->redirect(['index']);
            }
        }
        return $this->render('update', [
                    'model' => $model,
                    'width' => $width,
                    'height' => $height
        ]);
    }

    /**
     * Deletes an existing Banner model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Banner model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Banner the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Banner::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
