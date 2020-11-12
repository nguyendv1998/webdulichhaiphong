<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Đăng nhập';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login align-items-center" style="text-align: center">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Vui lòng điền các thông tin sau để đăng nhập:</p>

    <div class="row align-items-center h-100">
        <div class="col-lg-5 center-margin">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>'Nhập tên tài khoản vào đây','style'=>['max-width'=>'400px','margin'=>'0 auto']]) ?>

                <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Nhập mật khẩu vào đây','style'=>['max-width'=>'400px','margin'=>'0 auto']]) ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div class="form-group">
                    <?= Html::submitButton('Đăng nhập', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
