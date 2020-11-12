<?php

namespace backend\controllers;

use common\models\API_H17;
use common\models\Slider;
use Yii;
use common\models\Sliders;
use common\models\search\SlidersSearch;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SlidersController implements the CRUD actions for Sliders model.
 */
class SlidersController extends Controller
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
                        'actions'=>['index','view','delete','update','delete','create','chinh-sua','edit-sliders'],
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
     * Lists all Sliders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SlidersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->orderBy(['UuTien'=>SORT_DESC]);
        $model= new Sliders();
        $Sliders=\common\models\Sliders::find()->orderBy(['isActive'=>SORT_DESC])->all();
        if($model->load(Yii::$app->request->post())){
            $AnhSlider=UploadedFile::getInstance($model,'anhslider');
            $type=API_H17::GetImageType($AnhSlider->type);
            $filename='AnhSlider'.time().$type;
            $path = dirname(dirname(__DIR__)) . '/images/sliders/' . $filename;
            $AnhSlider->saveAs($path);
            $model->File=$filename;
            $model->anhslider=$filename;
            $model->save();
            try {
                $width=1280;
                $heigth=720;
                if(strtolower($type)=='.jpeg'||strtolower($type)=='.jpg')
                {
                    $image=API_H17::cropImageJPG($path,$width,$heigth);
                    imagejpeg($image, $path);
                }
                else if(strtolower($type)=='.png'){
                    $image=API_H17::cropImagePNG($path,$width,$heigth);
                    imagepng($image, $path);
                }
            }
            catch (\Exception $ex){}
            $this->refresh();
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            'Sliders' => $Sliders,
        ]);
    }

    /**
     * Displays a single Sliders model.
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
     * Creates a new Sliders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sliders();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Sliders model.
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
     * Deletes an existing Sliders model.
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
     * Finds the Sliders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sliders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sliders::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
    public function actionChinhSua(){
        try {
            $slider_id=$_POST['slider_id'];
            $sliders_update_title=$_POST['sliders_update_title'];
            $sliders_update_alt=$_POST['sliders_update_alt'];
            $slider=Sliders::findOne($slider_id);
            $slider->Title=$sliders_update_title;
            $slider->Alt=$sliders_update_alt;
            $slider->anhslider=$slider->File;
            if($slider->save())
                yii::$app->session->setFlash('update_slider_success','Cập nhật thông tin ảnh thành công!');
            else yii::$app->session->setFlash('update_slider_fail','Cập nhật thông tin ảnh thành công!');
        }
        catch (\Exception $ex){
            API_H17::Alert('Lỗi chỉnh sửa thông tin: '.$ex->getMessage());
        }
        return $this->redirect(['index']);
    }
    public function actionEditSliders(){

        if(isset($_POST)){
            $Sliders=Sliders::find()->all();
            /**@var $Sliders Sliders[]*/
            foreach ($Sliders as $slider)
            {
                $pos = false;
                foreach ($_POST as $key=>$i){
                    if($slider->id==$key) {
                        $pos = true;
                        break;
                    }
                }
                if($pos==true) $slider->isActive=1;
                else $slider->isActive=0;
                $slider->anhslider=$slider->File;
                $slider->save();
            }
        }
        $this->redirect(['index']);
    }
}
