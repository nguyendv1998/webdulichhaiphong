<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LeHoi */

$this->title = 'Thêm lễ hội';
$this->params['breadcrumbs'][] = ['label' => 'Danh sách lễ hội', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="le-hoi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
