<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CapCongNhan */

$this->title = 'Chỉnh sửa cấp công nhận: ' . $model->TenCapCongNhan;
$this->params['breadcrumbs'][] = ['label' => 'Danh sách cấp công nhận', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TenCapCongNhan, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="cap-cong-nhan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
