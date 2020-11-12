<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DiaDanh */

$this->title = 'Chỉnh sửa địa danh: ' . $model->TenDiaDanh;
$this->params['breadcrumbs'][] = ['label' => 'Danh sách địa danh', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TenDiaDanh, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="dia-danh-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
