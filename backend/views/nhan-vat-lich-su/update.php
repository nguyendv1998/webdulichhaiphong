<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NhanVatLichSu */

$this->title = 'Chỉnh sửa nhân vật lịch sử: ' . $model->TenNhanVatLichSu;
$this->params['breadcrumbs'][] = ['label' => 'Danh sách nhân vật lịch sử', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TenNhanVatLichSu, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="nhan-vat-lich-su-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
