<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Sliders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sliders-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-5">
            <?= $form->field($model, 'File')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'isActive')->textInput() ?>
        </div>
    </div>

    <?= $form->field($model, 'Title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Alt')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
