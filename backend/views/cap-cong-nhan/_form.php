<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CapCongNhan */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile(Yii::$app->request->baseUrl.'/ckeditor/ckeditor.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/myjs.js',['depends' => [\yii\web\JqueryAsset::className()]]);
?>

<div class="cap-cong-nhan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TenCapCongNhan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MoTa')->textarea(['rows' => 6,'id'=>'content']) ?>

    <div class="form-group">
        <?= Html::submitButton('Lưu lại', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
