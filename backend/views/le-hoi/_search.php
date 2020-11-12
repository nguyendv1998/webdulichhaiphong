<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\LeHoiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="le-hoi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'TenLeHoi') ?>

    <?= $form->field($model, 'Code') ?>

    <?= $form->field($model, 'TomTat') ?>

    <?= $form->field($model, 'NoiDungChiTiet') ?>

    <?php // echo $form->field($model, 'NgayBatDau') ?>

    <?php // echo $form->field($model, 'NgayKetThuc') ?>

    <?php // echo $form->field($model, 'AnhDaiDien') ?>

    <?php // echo $form->field($model, 'CapCongNhan_id') ?>

    <?php // echo $form->field($model, 'QuanHuyen_id') ?>

    <?php // echo $form->field($model, 'Title') ?>

    <?php // echo $form->field($model, 'Alt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
