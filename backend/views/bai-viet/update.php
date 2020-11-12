<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BaiViet */

$this->title = 'Chỉnh sửa bài viết: ' . $model->TenBaiViet;
$this->params['breadcrumbs'][] = ['label' => 'Danh sách bài viết', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TenBaiViet, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="bai-viet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
