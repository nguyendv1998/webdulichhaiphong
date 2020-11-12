<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Faq */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile(Yii::$app->request->baseUrl.'/ckeditor/ckeditor.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/myjs.js',['depends' => [\yii\web\JqueryAsset::className()]]);
?>

<div class="faq-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TenCauHoi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NoiDungTraLoi')->textarea(['rows' => 10,'id'=>'content']) ?>

    <?= $form->field($model, 'Uutien')->textInput(['type'=>'number','step'=>0.1]) ?>

    <div class="form-group">
        <?= Html::submitButton('Lưu lại', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
