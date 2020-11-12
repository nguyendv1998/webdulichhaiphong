<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\DiaDanhSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dia-danh-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'TenDiaDanh') ?>

    <?= $form->field($model, 'ToaDo') ?>

    <?= $form->field($model, 'TomTat') ?>

    <?= $form->field($model, 'MoTaChiTiet') ?>

    <?php // echo $form->field($model, 'AnhDaiDien') ?>

    <?php // echo $form->field($model, 'Code') ?>

    <?php // echo $form->field($model, 'CapCongNhan_id') ?>

    <?php // echo $form->field($model, 'QuanHuyen_id') ?>

    <?php // echo $form->field($model, 'DanhMuc_id') ?>

    <?php // echo $form->field($model, 'NhanVatLichSu_id') ?>

    <?php // echo $form->field($model, 'LoaiDiTich_id') ?>

    <?php // echo $form->field($model, 'Title') ?>

    <?php // echo $form->field($model, 'Alt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
