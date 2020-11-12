<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BaiViet */

$this->title = 'Thêm bài viết';
$this->params['breadcrumbs'][] = ['label' => 'Danh sách bài viết', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bai-viet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
