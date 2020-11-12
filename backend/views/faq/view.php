<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Faq */

$this->title = $model->TenCauHoi;
$this->params['breadcrumbs'][] = ['label' => 'Danh sách FAQ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="faq-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> Chỉnh sửa', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-trash"></i> Xóa', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có chắc chắn muốn xóa câu hỏi FAQ này không?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'TenCauHoi:ntext',
            [
                'attribute'=>'NoiDungTraLoi',
                'format'=>'raw',
            ],
            'Uutien',
        ],

        'template' => '<tr><th>{label}</th><td style="width:85%;">{value}</td></tr>',
    ]) ?>
</div>
