<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LoaiDiTich */

$this->title = 'Thêm loại di tích';
$this->params['breadcrumbs'][] = ['label' => 'Danh sách loại di tích', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loai-di-tich-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
