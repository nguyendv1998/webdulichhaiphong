<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DanhMuc */

$this->title = 'Update Danh Muc: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Danh Mucs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="danh-muc-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
