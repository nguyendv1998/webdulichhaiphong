<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LangNghe */

$this->title = $model->TenLangNghe;
$this->params['breadcrumbs'][] = ['label' => 'Danh sách làng nghề', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lang-nghe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Chỉnh sửa', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->id, 'CapCongNhan_id' => $model->CapCongNhan_id], [
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
            'TenLangNghe',
            'TomTat:ntext',
            [
                'attribute'=>'MoTaChiTiet',
                'format'=>'raw'
            ],
            [
                'attribute'=>'QuanHuyen_id',
                'format'=>'raw',
                'value'=>function($data){
                    /** @var $data \common\models\LangNghe */
                    return $data->quanHuyen->TenQuanHuyen;
                }
            ],
            [
                'attribute'=>'CapCongNhan_id',
                'format'=>'raw',
                'value'=>function($data){
                    /** @var $data \common\models\LangNghe */
                    return $data->capCongNhan->TenCapCongNhan;
                }
            ],
            'ToaDo',
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
