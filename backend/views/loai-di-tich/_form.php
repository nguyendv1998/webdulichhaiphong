<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LoaiDiTich */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loai-di-tich-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TenLoaiDiTich')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MoTa')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Lưu lại', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
