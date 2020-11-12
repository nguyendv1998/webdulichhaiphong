<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
    <div class="user-form">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-3 col-sm-12"><?= $form->field($model, 'TenNguoiDung')->textInput(['maxlength' => true]) ?></div>
            <div class="col-md-3 col-sm-12"><?= $form->field($model, 'SoDienThoai')->textInput(['maxlength' => true,'type'=>'tel']) ?></div>
            <div class="col-md-3 col-sm-12"><?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?></div>
            <div class="col-md-3 col-sm-12"><?= $form->field($model, 'password_hash')->textInput(['maxlength' => true,'type'=>'password']) ?></div>
        </div>
        <div class="row">
            <div class="col-md-6"><?= $form->field($model, 'Email')->textInput(['maxlength' => true,'type'=>'email']) ?></div>
            <div class="col-md-3"><?= $form->field($model, 'LoaiTaiKhoan')->dropDownList([ 'admin' => 'Admin', 'khach' => 'Khách', 'bientapvien' => 'Biên tập viên', ], ['prompt' => '--Chọn']) ?></div>
            <div class="col-md-3"><?= $form->field($model, 'status')->dropDownList([ '10' => 'Hoạt động', '0' => 'Không hoạt động', ], ['prompt' => '--Chọn']) ?></div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Lưu lại', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
