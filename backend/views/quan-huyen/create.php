<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\QuanHuyen */

$this->title = 'Thêm quận - huyện';
$this->params['breadcrumbs'][] = ['label' => 'Danh sách quận huyện', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quan-huyen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
