<?php

namespace backend\controllers;

use common\models\API_H17;
use common\models\search\XaPhuongSearch;
use common\models\XaPhuong;
use Yii;
use common\models\QuanHuyen;
use common\models\search\QuanHuyenSearch;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * QuanHuyenController implements the CRUD actions for QuanHuyen model.
 */
class QuanHuyenController extends Controller
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
                        'actions'=>['index','view','delete','update','delete','create','delete-xa-phuong',],
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
     * Lists all QuanHuyen models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QuanHuyenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->orderBy(['TenQuanHuyen'=>SORT_ASC]);
        $model = new QuanHuyen();
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            $this->refresh();
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single QuanHuyen model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model=$this->findModel($id);
        $model_xaphuong=new XaPhuong();
        if($model->load(Yii::$app->request->post()) ) {
            $model->save();
            $this->refresh();
        }
        if($model_xaphuong->load(Yii::$app->request->post()) ) {
            $id_xaphuong=$_POST['xaphuong_id'];
            if($id_xaphuong!=null && $id_xaphuong >0){
                $xaphuong_old=XaPhuong::findOne($id_xaphuong);
                $xaphuong_old->TenXaPhuong=$model_xaphuong->TenXaPhuong;
                $xaphuong_old->save();
            }
            else{
                $model_xaphuong->QuanHuyen_id=$id;
                $model_xaphuong->save();
            }
            $this->refresh();
        }
        $list_xaphuong=XaPhuong::find()->where(['QuanHuyen_id'=>$id])->orderBy(['TenXaPhuong'=>SORT_ASC])->all();
        return $this->render('view', [
            'model' => $model,
            'list_xaphuong' => $list_xaphuong,
            'model_xaphuong' => $model_xaphuong,
        ]);
    }

    /**
     * Creates a new QuanHuyen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new QuanHuyen();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing QuanHuyen model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing QuanHuyen model.
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
     * Finds the QuanHuyen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return QuanHuyen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = QuanHuyen::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionDeleteXaPhuong($id){
        $xaphuong=XaPhuong::findOne($id);
        $QuanHuyen_id=$xaphuong->QuanHuyen_id;
        $xaphuong->delete();
        return $this->redirect(['quan-huyen/view','id'=>$QuanHuyen_id]);
    }
}
