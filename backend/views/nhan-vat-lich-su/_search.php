<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\NhanVatLichSuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nhan-vat-lich-su-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'TenNhanVatLichSu') ?>

    <?= $form->field($model, 'Code') ?>

    <?= $form->field($model, 'MoTa') ?>

    <?= $form->field($model, 'AnhDaiDien') ?>

    <?php // echo $form->field($model, 'Title') ?>

    <?php // echo $form->field($model, 'Alt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
