<?php

namespace backend\controllers;

use common\models\API_H17;
use Yii;
use common\models\LangNghe;
use common\models\search\LangNgheSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LangNgheController implements the CRUD actions for LangNghe model.
 */
class LangNgheController extends Controller
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
                        'actions'=>['index','view','delete','update','delete','create','delete-anh-dai-dien'],
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
     * Lists all LangNghe models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LangNgheSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->orderBy(['id'=>3])->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LangNghe model.
     * @param integer $id
     * @param integer $CapCongNhan_id
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
     * Creates a new LangNghe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LangNghe();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing LangNghe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $CapCongNhan_id
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
     * Deletes an existing LangNghe model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $CapCongNhan_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $CapCongNhan_id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the LangNghe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $CapCongNhan_id
     * @return LangNghe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LangNghe::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionDeleteAnhDaiDien($id){
        $model = LangNghe::findOne($id);
        $path=dirname(dirname(__DIR__)) . '/images/anhdaidien/' . $model->AnhDaiDien;
        if(is_file($path)) unlink($path);
        $model->AnhDaiDien='';
        $model->Save();
        return $this->redirect(['update', 'id' => $model->id]);
    }
}
