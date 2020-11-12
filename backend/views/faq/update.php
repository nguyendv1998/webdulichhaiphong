<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Faq */

$this->title = 'Chỉnh sủa FAQ: ' . $model->TenCauHoi;
$this->params['breadcrumbs'][] = ['label' => 'Danh sách FAQ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TenCauHoi, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="faq-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
