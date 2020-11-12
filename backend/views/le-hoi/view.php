<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LeHoi */

$this->title = $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Danh sách lễ hội', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="le-hoi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Chỉnh sửa', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có chắc chắn muốn xóa không?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'TenLeHoi',
            //'Code',
            'TomTat:ntext',
            [
                'attribute'=>'NoiDungChiTiet',
                'format'=>'raw'
            ],
            [
                'attribute'=>'NgayBatDau',
                'value'=>function($data){
                    $date= new DateTime($data->NgayBatDau);
                    return date_format($date, 'd-m-yy');
                },
                'format'=>'raw'
            ],
            [
                'attribute'=>'NgayKetThuc',
                'value'=>function($data){
                    $date= new DateTime($data->NgayKetThuc);
                    return date_format($date, 'd-m-yy');
                },
                'format'=>'raw'
            ],
            [
                'attribute'=>'CapCongNhan_id',
                'format'=>'raw',
                'value'=>function($data){
                    /** @var $data \common\models\LeHoi */
                    return $data->capCongNhan->TenCapCongNhan;
                }
            ],
            [
                'attribute'=>'QuanHuyen_id',
                'format'=>'raw',
                'value'=>function($data){
                    /** @var $data \common\models\LeHoi */
                    return $data->quanHuyen->TenQuanHuyen;
                }
            ],
            [
                'attribute'=>'AnhDaiDien',
                'value'=>function($data){
                    if(trim($data->AnhDaiDien)=="") return "Không có ảnh nào";
                    return Html::img('../images/anhdaidien/'.$data->AnhDaiDien,['class'=>'img img-responsive','title'=>$data->Title,'alt'=>$data->Alt,'style'=>['width'=>'250px']]);
                },
                'format'=>'raw'
            ],
        ],
        'template' => '<tr><th>{label}</th><td style="width:90%;">{value}</td></tr>',
    ]) ?>

</div>
