<?php

use common\models\ViewSelectDanhMuc;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DiaDanh */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile(Yii::$app->request->baseUrl.'/ckeditor/ckeditor.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/myjs.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl."/js/showbutton_slider.js?",['depends' => [\yii\web\JqueryAsset::className()]]);
//query=" select * from danhmuc where (DanhMucCha_id is null and id not in (select DISTINCT  DanhMucCha_id from danhmuc where DanhMucCha_id is not null)) or id not in (select DISTINCT  DanhMucCha_id from danhmuc where DanhMucCha_id is not null)"
?>

<div class="dia-danh-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TenDiaDanh')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'TomTat')->textarea(['rows' => 4]) ?>

    <?= $form->field($model, 'MoTaChiTiet')->textarea(['rows' => 10,'id'=>'content']) ?>

    <div class="row">
        <div class="col-md-6 col-sm-12"><?=$form->field($model, 'QuanHuyen_id')->widget(\kartik\select2\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(
                    \common\models\QuanHuyen::find()->OrderBy(['TenQuanHuyen'=>4])->all(),
                    'id',
                    'TenQuanHuyen'
                ),
                'language' => 'de',
                'options' => ['placeholder' => 'Chọn quận, huyện'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'required'=>'required'
                ],
            ])?></div>
        <div class="col-md-6 col-sm-12"><?= $form->field($model, 'ToaDo')->textInput(['maxlength' => true]) ?></div>
    </div>

    <div class="row">
        <div class="col-md-3 col-sm-12"><?=$form->field($model, 'CapCongNhan_id')->widget(\kartik\select2\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(
                    \common\models\CapCongNhan::find()->all(),
                    'id',
                    'TenCapCongNhan'
                ),
                'language' => 'de',
                'options' => ['placeholder' => 'Chọn cấp công nhận'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ])?>
        </div>
        <div class="col-md-3 col-sm-12"><?=$form->field($model, 'NhanVatLichSu_id')->widget(\kartik\select2\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(
                    \common\models\NhanVatLichSu::find()->all(),
                    'id',
                    'TenNhanVatLichSu'
                ),
                'language' => 'de',
                'options' => ['placeholder' => 'Chọn nhân vật lịch sử'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ])?>
        </div>
        <div class="col-md-3 col-sm-12"><?=$form->field($model, 'LoaiDiTich_id')->widget(\kartik\select2\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(
                    \common\models\LoaiDiTich::find()->all(),
                    'id',
                    'TenLoaiDiTich'
                ),
                'language' => 'de',
                'options' => ['placeholder' => 'Chọn loại di tích'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ])?></div>
        <div class="col-md-3 col-sm-12"><?=$form->field($model, 'DanhMuc_id')->widget(\kartik\select2\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(
                    \common\models\ViewSelectDanhMuc::find()->all(),
                    'id',
                    'TenDanhMuc'
                ),
                'language' => 'de',
                'options' => ['placeholder' => 'Chọn danh mục'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ])?></div>
    </div>


    <?= $form->field($model, 'anh_dai_dien')->fileInput(["accept" => "image/png,image/jpg,image/jpeg",'id'=>'content_anhdaidien_file']) ?>

    <div class="row range_anh_dai_dien">
        <div class="col-md-6">
            <?= $form->field($model, 'Title')->textInput(['maxlength' => true,'id'=>'anhdaidien_title']) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'Alt')->textInput(['maxlength' => true,'id'=>'anhdaidien_alt']) ?>
        </div>
    </div>
    <?php if(!$model->isNewRecord && trim($model->AnhDaiDien)!=''):?>
        <div class="images_anhdaidien">
            <img src="../images/anhdaidien/<?=$model->AnhDaiDien?>" style="width: 300px" alt="<?=$model->Alt?>" title="<?=$model->Title?>">
            <?= Html::a('<i style="color:  #ff0000; font-size: 20px;" class="glyphicon glyphicon-trash"></i> Xóa', ['delete-anh-dai-dien', 'id'=>$model->id],
                [
                    'data' => [
                        'confirm' => 'Bạn có chắc chắn muốn xóa ảnh này không?',
                        'method' => 'post',],
                    'class'=>'btn_xoa_anhdaidien',
                    'tooltip'=>'Xóa'
                ]) ?>
        </div>
    <?php  endif;?>

    <div class="form-group">
        <?= Html::submitButton('Lưu lại', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
