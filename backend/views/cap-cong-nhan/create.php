<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CapCongNhan */

$this->title = 'Thêm mới cấp công nhận';
$this->params['breadcrumbs'][] = ['label' => 'Danh sách cấp công nhận', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cap-cong-nhan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
