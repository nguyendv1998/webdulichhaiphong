<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LeHoi */

$this->title = 'Chỉnh sửa lễ hôi: ' . $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Danh sách lễ hội', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="le-hoi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
