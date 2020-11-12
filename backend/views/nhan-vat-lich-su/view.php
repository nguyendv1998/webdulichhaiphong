<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\NhanVatLichSu */

$this->title = $model->TenNhanVatLichSu;
$this->params['breadcrumbs'][] = ['label' => 'Danh sách nhân vật lịch sử', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nhan-vat-lich-su-view">

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
//            'id',
            [
                'attribute'=>'TenNhanVatLichSu',
                'format'=>'raw'
            ],
 //           'Code',
            [
                'attribute'=>'MoTa',
                'format'=>'raw'
            ],
            [
                'attribute'=>'AnhDaiDien',
                'value'=>function($data){
                    if(trim($data->AnhDaiDien)=="") return "Không có ảnh nào";
                    return Html::img('../images/anhdaidien/'.$data->AnhDaiDien,['class'=>'img img-responsive','title'=>$data->Title,'alt'=>$data->Alt,'style'=>['width'=>'200px']]);
                },
                'format'=>'raw'
            ],
/*            'Title',
            'Alt',*/
        ],
        'template' => '<tr><th>{label}</th><td style="width:90%;">{value}</td></tr>',
    ]) ?>

</div>
