<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BaiViet */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile(Yii::$app->request->baseUrl.'/ckeditor/ckeditor.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/myjs.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl."/js/showbutton_slider.js?",['depends' => [\yii\web\JqueryAsset::className()]]);
?>

<div class="bai-viet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TenBaiViet')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TomTat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'NoiDung')->textarea(['rows' => 6,'id'=>'content']) ?>
    <?=$form->field($model,'bai_viet_tu_khoas')->widget(\dosamigos\selectize\SelectizeTextInput::className(),[
        'loadUrl'=>['bai-viet/list'],
        'options'=>['class' =>'form-control'],
        'clientOptions'=>[
            'plugins' => ['remove_button'],
            'valueField' => 'name',
            'labelField' => 'name',
            'searchField' => ['name'],
            'create' => true,
        ]
    ])->hint('Mỗi từ cách nhau bởi 1 dấu phẩy') ?>
    <div class="row">
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
        <div class="col-md-3 col-sm-12"><?=$form->field($model, 'DiaDanh_id')->widget(\kartik\select2\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(
                    \common\models\DiaDanh::find()->all(),
                    'id',
                    'TenDiaDanh'
                ),
                'language' => 'de',
                'options' => ['placeholder' => 'Chọn địa danh'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ])?>
        </div>
        <div class="col-md-3 col-sm-12"><?=$form->field($model, 'LeHoi_id')->widget(\kartik\select2\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(
                    \common\models\LeHoi::find()->all(),
                    'id',
                    'TenLeHoi'
                ),
                'language' => 'de',
                'options' => ['placeholder' => 'Chọn lễ hội'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ])?>
        </div>
        <div class="col-md-3 col-sm-12"><?=$form->field($model, 'LangNghe_id')->widget(\kartik\select2\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(
                    \common\models\LangNghe::find()->all(),
                    'id',
                    'TenLangNghe'
                ),
                'language' => 'de',
                'options' => ['placeholder' => 'Chọn làng nghề'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ])?>
        </div>
    </div>
    <?= $form->field($model,'bai_viet_danh_mucs')->checkboxList(
        \yii\helpers\ArrayHelper::map(\common\models\ViewSelectDanhMuc::find()->all(),
            'id',
            'TenDanhMuc'
        ),
        [
            'id'=>'danhmuc'
        ]
    )?>
    <div><label>Đánh giá</label></div>
    <div class="row">
        <div class="col-md-1"><?= $form->field($model, 'XuatBan')->checkbox() ?></div>

        <div class="col-md-1"><?= $form->field($model, 'NoiBat')->checkbox() ?></div>
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
    <div><label>Ảnh liên quan</label></div>
    <ul class="my-ul_anh_lien_quan">
        <li class="my-ul-li_anh_lien_quan">
            <div class="my_box_anhlienquan">
                <div class="image_anh_lien_quan"><input class="baiviet_anhlienquan" type="file" accept="image/png,image/jpg,image/jpeg" name="anh_lien_quan[]"></div>
                <div class="row range_anh_lienquan" style="">
                <div class="col-md-6">
                    <div class="form-group field-anhlienquan_title">
                        <label class="control-label" for="anhdaidien_title">Title của ảnh liên quan</label>
                        <input type="text" class="form-control" name="anhlienquan_title[]" maxlength="200" aria-invalid="false">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group field-anhlienquan_title">
                        <label class="control-label" for="anhdaidien_alt">Alt của ảnh liên quan</label>
                        <input type="text" class="form-control" name="anhlienquan_alt[]" maxlength="200" aria-invalid="false">
                    </div>
                </div>
            </div>
            </div>
        </li>
    </ul>
    <button type="button" class="add_form_field btn-secondary btn" id="my-button-add-element">Thêm ảnh liên quan &nbsp;
        <span style="font-size:12px;" class="glyphicon glyphicon-plus"> </span>
    </button>

    <?php if(!$model->isNewRecord):?>
        <?php $anhlienquans=\common\models\AnhLienQuan::findAll(['BaiViet_id'=>$model->id])?>
        <?php if(count($anhlienquans)>0):?>
            <div class="images_anhlienquan">
                <div class="row">
                    <?php foreach ($anhlienquans as $item):?>
                       <div class="col-sm-2">
                           <div><img src="../images/anhlienquan/<?=$item->File?>" style="width: 100%" alt="<?=$item->Alt?>" title="<?=$item->Title?>"></div>
                           <?= Html::a('<i style="color:  #ff0000; font-size: 20px;" class="glyphicon glyphicon-trash"></i> Xóa', ['delete-anh-lien-quan', 'id'=>$item->id],
                               [
                                   'data' => [
                                       'confirm' => 'Bạn có chắc chắn muốn xóa ảnh này không?',
                                       'method' => 'post',],
                                   'class'=>'btn_xoa_anhdaidien',
                                   'tooltip'=>'Xóa'
                               ]) ?>
                       </div>
                    <?php endforeach;?>
                </div>
            </div>
        <?php endif;?>
    <?php  endif;?>
    <div style="margin-bottom: 20px"></div>
    <div class="form-group">
        <?= Html::submitButton('Lưu lại', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
