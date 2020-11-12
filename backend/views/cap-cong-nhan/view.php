<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CapCongNhan */

$this->title = $model->TenCapCongNhan;
$this->params['breadcrumbs'][] = ['label' => 'Danh sách cấp công nhận', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cap-cong-nhan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Chỉnh sửa', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có chắc chắn muốn xóa cấp công nhận này không?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute'=>'TenCapCongNhan',
                'format'=>'raw',
            ],
            [
                'attribute'=>'MoTa',
                'format'=>'raw',
            ],
        ],
    ]) ?>

</div>
