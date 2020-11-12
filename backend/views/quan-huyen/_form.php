<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\QuanHuyen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quan-huyen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TenQuanHuyen')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton('Lưu lại', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
