<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DiaDanh */

$this->title = $model->TenDiaDanh;
$this->params['breadcrumbs'][] = ['label' => 'Danh sách địa danh', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dia-danh-view">

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
            'TenDiaDanh',
            'ToaDo',
            'TomTat:ntext',
            [
                'attribute'=>'MoTaChiTiet',
                'format'=>'raw'
            ],
            [
                'attribute'=>'CapCongNhan_id',
                'format'=>'raw',
                'value'=>function($data){
                    /** @var $data \common\models\DiaDanh */
                    return $data->capCongNhan->TenCapCongNhan;
                }
            ],
            [
                'attribute'=>'QuanHuyen_id',
                'format'=>'raw',
                'value'=>function($data){
                    /** @var $data \common\models\DiaDanh */
                    return $data->quanHuyen->TenQuanHuyen;
                }
            ],
            [
                'attribute'=>'DanhMuc_id',
                'format'=>'raw',
                'value'=>function($data){
                    /** @var $data \common\models\DiaDanh */
                    return $data->danhMuc->TenDanhMuc;
                }
            ],
            [
                'attribute'=>'NhanVatLichSu_id',
                'format'=>'raw',
                'value'=>function($data){
                    /** @var $data \common\models\DiaDanh */
                    return $data->nhanVatLichSu->TenNhanVatLichSu;
                }
            ],
            [
                'attribute'=>'LoaiDiTich_id',
                'format'=>'raw',
                'value'=>function($data){
                    /** @var $data \common\models\DiaDanh */
                    return $data->loaiDiTich->TenLoaiDiTich;
                }
            ],
            [
                'attribute'=>'AnhDaiDien',
                'value'=>function($data){
                    if(trim($data->AnhDaiDien)=="") return "Không có ảnh nào";
                    return Html::img('../images/anhdaidien/'.$data->AnhDaiDien,['class'=>'img img-responsive','title'=>$data->Title,'alt'=>$data->Alt,'style'=>['width'=>'200px']]);
                },
                'format'=>'raw'
            ],
        ],
        'template' => '<tr><th>{label}</th><td style="width:90%;">{value}</td></tr>',
    ]) ?>

</div>
