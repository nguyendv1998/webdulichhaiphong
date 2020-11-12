<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NhanVatLichSu */

$this->title = 'Thêm nhân vật lịch sử';
$this->params['breadcrumbs'][] = ['label' => 'Danh sách nhân vật lịch sử', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nhan-vat-lich-su-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
