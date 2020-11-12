<?php

namespace backend\controllers;

use common\models\AnhLienQuan;
use common\models\API_H17;
use common\models\BaiVietDanhMuc;
use common\models\Sliders;
use common\models\TuKhoa;
use common\models\TuKhoaChiTiet;
use Yii;
use common\models\BaiViet;
use common\models\search\BaiVietSearch;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * BaiVietController implements the CRUD actions for BaiViet model.
 */
class BaiVietController extends Controller
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
                        'actions'=>['index','view','delete','update','delete','create','delete-anh-dai-dien','delete-anh-lien-quan','list'],
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
     * Lists all BaiViet models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BaiVietSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->orderBy(['ThoiGianChinhSua'=>SORT_DESC]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BaiViet model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $baiviettukhoas=TuKhoaChiTiet::findAll(['BaiViet_id'=>$id]);
        $tukhoas=[];
        if(count($baiviettukhoas)>0)
        {
            foreach ($baiviettukhoas as $item)
            {
                $tukhoas[]=$item->tuKhoa->TenTuKhoa;
            }
            $model->bai_viet_tu_khoas=implode(' ,',$tukhoas);
        }
        $baivietdanhmucs=BaiVietDanhMuc::findAll(['BaiViet_id'=>$id]);
        $danhmucs=[];
        if(count($baivietdanhmucs)>0)
        {
            foreach ($baivietdanhmucs as $item)
            {
                $danhmucs[]=$item->danhMuc->TenDanhMuc;
            }
            $model->bai_viet_danh_mucs=implode(' ,',$danhmucs);
        }
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new BaiViet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BaiViet();

        if ($model->load(Yii::$app->request->post())) {

            if($model->save()){
                if(isset($_FILES['anh_lien_quan']) && isset($_POST['anhlienquan_title']) && isset($_POST['anhlienquan_alt']))
                {
                    $files = $_FILES['anh_lien_quan'];
                    $names      = $files['name'];
                    $types      = $files['type'];
                    $tmp_names  = $files['tmp_name'];
                    $errors     = $files['error'];
                    $sizes      = $files['size'];
                    for($i=0;$i<count($_FILES['anh_lien_quan']['name']);$i++){
                        if ($errors[$i] == 0)
                        {
                            $file=$tmp_names[$i];
                            $type=API_H17::GetImageType($types[$i]);
                            $file_name=time().$i.'_slider'.$type;
                            $path=dirname(dirname(__DIR__)).'/images/anhlienquan/'.$file_name;
                            $anhlienquan=new AnhLienQuan();
                            $anhlienquan->File=$file_name;
                            $anhlienquan->BaiViet_id=$model->id;
                            try {
                                $anhlienquan->Title=$_POST['anhlienquan_title'][$i];
                            } catch (Exception $ex){$anhlienquan->Title=$model->TenBaiViet;}
                            try {
                                $anhlienquan->Alt=$_POST['anhlienquan_alt'][$i];
                            } catch (Exception $ex){$anhlienquan->Alt=$model->TenBaiViet;}
                            if($anhlienquan->save())
                            {
                                try {
                                    move_uploaded_file($file,$path);
                                }catch (Exception $ex){}
                                try {
                                    if(strtolower($type)=='.jpeg'||strtolower($type)=='.jpg')
                                    {
                                        $image=API_H17::cropImageJPG($path,1000,800);
                                        imagejpeg($image, $path);
                                    }
                                    else if(strtolower($type)=='.png'){
                                        $image=API_H17::cropImagePNG($path,1000,800);
                                        imagepng($image, $path);
                                    }
                                }catch (Exception $ex){}
                            }
                        }
                    }
                }
            }
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BaiViet model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                if(isset($_FILES['anh_lien_quan']) && isset($_POST['anhlienquan_title']) && isset($_POST['anhlienquan_alt']))
                {
                    $files = $_FILES['anh_lien_quan'];
                    $names      = $files['name'];
                    $types      = $files['type'];
                    $tmp_names  = $files['tmp_name'];
                    $errors     = $files['error'];
                    $sizes      = $files['size'];
                    for($i=0;$i<count($_FILES['anh_lien_quan']['name']);$i++){
                        if ($errors[$i] == 0)
                        {
                            $file=$tmp_names[$i];
                            $type=API_H17::GetImageType($types[$i]);
                            $file_name=time().$i.'_slider'.$type;
                            $path=dirname(dirname(__DIR__)).'/images/anhlienquan/'.$file_name;
                            $anhlienquan=new AnhLienQuan();
                            $anhlienquan->File=$file_name;
                            $anhlienquan->BaiViet_id=$model->id;
                            try {
                                $anhlienquan->Title=$_POST['anhlienquan_title'][$i];
                            } catch (Exception $ex){$anhlienquan->Title=$model->TenBaiViet;}
                            try {
                                $anhlienquan->Alt=$_POST['anhlienquan_alt'][$i];
                            } catch (Exception $ex){$anhlienquan->Alt=$model->TenBaiViet;}
                            if($anhlienquan->save())
                            {
                                try {
                                    move_uploaded_file($file,$path);
                                }catch (Exception $ex){}
                                try {
                                    if(strtolower($type)=='.jpeg'||strtolower($type)=='.jpg')
                                    {
                                        $image=API_H17::cropImageJPG($path,1000,800);
                                        imagejpeg($image, $path);
                                    }
                                    else if(strtolower($type)=='.png'){
                                        $image=API_H17::cropImagePNG($path,1000,800);
                                        imagepng($image, $path);
                                    }
                                }catch (Exception $ex){}
                            }
                        }
                    }
                }
            }
            return $this->redirect(['index']);
        }
        $baiviettukhoas=TuKhoaChiTiet::findAll(['BaiViet_id'=>$id]);
        $tukhoas=[];
        if(count($baiviettukhoas)>0)
        {
            foreach ($baiviettukhoas as $item)
            {
                $tukhoas[]=$item->tuKhoa->TenTuKhoa;
            }
            $model->bai_viet_tu_khoas=implode(' ,',$tukhoas);
        }
        $model->bai_viet_danh_mucs=ArrayHelper::map(
            BaiVietDanhMuc::findAll(['BaiViet_id'=>$id]),
            'DanhMuc_id',
            'DanhMuc_id'
        );
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BaiViet model.
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
     * Finds the BaiViet model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BaiViet the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BaiViet::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionDeleteAnhDaiDien($id){
        $model = BaiViet::findOne($id);
        $path=dirname(dirname(__DIR__)) . '/images/anhdaidien/' . $model->AnhDaiDien;
        if(is_file($path)) unlink($path);
        $model->AnhDaiDien='';
        $model->Save();
        return $this->redirect(['update', 'id' => $model->id]);
    }
    public function actionDeleteAnhLienQuan($id){
        $model = AnhLienQuan::findOne($id);
        $path=dirname(dirname(__DIR__)) . '/images/anhlienquan/' . $model->File;
        if(is_file($path)) unlink($path);
        $model->delete();
        return $this->redirect(['update', 'id' => $model->baiViet->id]);
    }
    public function actionList($query)
    {
        $models = TuKhoa::find()->andFilterWhere(['LIKE','TenTuKhoa',$query])->all();
        $items = [];
        /** @var TuKhoa $model */
        foreach ($models as $model) {
            $items[] = ['name' => $model->TenTuKhoa];
        }
        // We know we can use ContentNegotiator filter
        // this way is easier to show you here :)
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $items;
    }
}
