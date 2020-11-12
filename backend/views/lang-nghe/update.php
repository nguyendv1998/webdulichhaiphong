<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LangNghe */

$this->title = 'Chỉnh sửa làng nghề: ' . $model->TenLangNghe;
$this->params['breadcrumbs'][] = ['label' => 'Danh sách làng nghề', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TenLangNghe, 'url' => ['view', 'id' => $model->id, 'CapCongNhan_id' => $model->CapCongNhan_id]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="lang-nghe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
