<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DiaDanh */

$this->title = 'Thêm địa danh';
$this->params['breadcrumbs'][] = ['label' => 'Danh sách địa danh', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dia-danh-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
