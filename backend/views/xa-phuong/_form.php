<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\XaPhuong */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="xa-phuong-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TenXaPhuong')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'QuanHuyen_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
