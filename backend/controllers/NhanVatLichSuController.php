<?php

namespace backend\controllers;

use common\models\API_H17;
use Yii;
use common\models\NhanVatLichSu;
use common\models\search\NhanVatLichSuSearch;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NhanVatLichSuController implements the CRUD actions for NhanVatLichSu model.
 */
class NhanVatLichSuController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                // KO CÓ ROLER: tất cả mọi người
                // ?: những người là khách
                // @: những người đã đăng nhập
                'rules' => [
                    [
                        'actions' => [ 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions'=>['index','view','delete','update','delete','create','delete-anh-dai-dien',],
                        'allow'=>true,
                        'matchCallback'=>function($rule,$action)
                        {
                            return API_H17::isAccess(['bientapvien']);
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all NhanVatLichSu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NhanVatLichSuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->orderBy(['id'=>3]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NhanVatLichSu model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new NhanVatLichSu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NhanVatLichSu();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing NhanVatLichSu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing NhanVatLichSu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the NhanVatLichSu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NhanVatLichSu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NhanVatLichSu::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionDeleteAnhDaiDien($id){
        $model = NhanVatLichSu::findOne($id);
        $path=dirname(dirname(__DIR__)) . '/images/anhdaidien/' . $model->AnhDaiDien;
        if(is_file($path)) unlink($path);
        $model->AnhDaiDien='';
        $model->Save();
        return $this->redirect(['update', 'id' => $model->id]);
    }
}
