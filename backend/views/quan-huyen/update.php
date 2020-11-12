<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\QuanHuyen */

$this->title = 'Update Quan Huyen: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Quan Huyens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="quan-huyen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
