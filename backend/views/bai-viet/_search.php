<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\BaiVietSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bai-viet-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'TenBaiViet') ?>

    <?= $form->field($model, 'TomTat') ?>

    <?= $form->field($model, 'NoiDung') ?>

    <?= $form->field($model, 'Code') ?>

    <?php // echo $form->field($model, 'AnhDaiDien') ?>

    <?php // echo $form->field($model, 'ThoiGianDang') ?>

    <?php // echo $form->field($model, 'ThoiGianChinhSua') ?>

    <?php // echo $form->field($model, 'NguoiDang_id') ?>

    <?php // echo $form->field($model, 'NguoiSua_id') ?>

    <?php // echo $form->field($model, 'XuatBan') ?>

    <?php // echo $form->field($model, 'NoiBat') ?>

    <?php // echo $form->field($model, 'NhanVatLichSu_id') ?>

    <?php // echo $form->field($model, 'LangNghe_id') ?>

    <?php // echo $form->field($model, 'LeHoi_id') ?>

    <?php // echo $form->field($model, 'DiaDanh_id') ?>

    <?php // echo $form->field($model, 'Title') ?>

    <?php // echo $form->field($model, 'Alt') ?>

    <?php // echo $form->field($model, 'Like') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
