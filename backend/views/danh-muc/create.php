<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DanhMuc */

$this->title = 'Thêm danh mục mới';
$this->params['breadcrumbs'][] = ['label' => 'Danh sách danh mục', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="danh-muc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
