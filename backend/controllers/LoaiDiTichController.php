<?php

namespace backend\controllers;

use common\models\API_H17;
use Yii;
use common\models\LoaiDiTich;
use common\models\search\LoaiDiTichSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LoaiDiTichController implements the CRUD actions for LoaiDiTich model.
 */
class LoaiDiTichController extends Controller
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
                        'actions'=>['index','view','delete','update','delete','create'],
                        'allow'=>true,
                        'matchCallback'=>function($rule,$action)
                        {
                            return API_H17::isAccess(['admin']);
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
     * Lists all LoaiDiTich models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LoaiDiTichSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->orderBy(['id'=>SORT_DESC])->all();
        $model=new LoaiDiTich();
        if ($model->load(Yii::$app->request->post())) {
            $id=$_POST['loaiditich_id'];
            if($id!=null && $id>0)
            {
                $LoaiDiTich_old=LoaiDiTich::findOne($id);
                $LoaiDiTich_old->TenLoaiDiTich=$model->TenLoaiDiTich;
                $LoaiDiTich_old->MoTa=$model->MoTa;
                $LoaiDiTich_old->save();
            }
            else $model->save();
            $this->refresh();
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single LoaiDiTich model.
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
     * Creates a new LoaiDiTich model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LoaiDiTich();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing LoaiDiTich model.
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
     * Deletes an existing LoaiDiTich model.
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
     * Finds the LoaiDiTich model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LoaiDiTich the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LoaiDiTich::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
