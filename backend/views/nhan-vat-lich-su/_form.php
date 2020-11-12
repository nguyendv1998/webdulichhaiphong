<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NhanVatLichSu */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile(Yii::$app->request->baseUrl.'/ckeditor/ckeditor.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/myjs.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl."/js/showbutton_slider.js?",['depends' => [\yii\web\JqueryAsset::className()]]);
?>

<div class="nhan-vat-lich-su-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TenNhanVatLichSu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MoTa')->textarea(['rows' => 6,'id'=>'content']) ?>

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
