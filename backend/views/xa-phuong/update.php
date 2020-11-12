<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\XaPhuong */

$this->title = 'Update Xa Phuong: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Xa Phuongs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="xa-phuong-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
