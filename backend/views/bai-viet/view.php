<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\BaiViet */

$this->title = $model->TenBaiViet;
$this->params['breadcrumbs'][] = ['label' => 'Danh sách bài viết', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile("js/LightBox/simple-lightbox.css?v2.2.1");
$this->registerJsFile("js/LightBox/simple-lightbox.js?v2.2.1");
$this->registerJsFile("js/mys.js?");
\yii\web\YiiAsset::register($this);
$anhlienquan=\common\models\AnhLienQuan::findAll(['BaiViet_id'=>$model->id]);
?>
<div class="bai-viet-view">

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
            'TenBaiViet',
            'TomTat:ntext',
            [
                'attribute'=>'NoiDung',
                'format'=>'raw'
            ],
            [
                'attribute'=>'NguoiDang_id',
                'value'=>function($data){
                    /* @var $data common\models\BaiViet */
                    $time=date_create($data->ThoiGianDang);
                    return \common\models\User::findOne($data->NguoiDang_id)->TenNguoiDung.' đăng bài lúc '.date_format($time,"H:i:s").' ngày '.date_format($time,"d").' tháng '.date_format($time,"m").' năm '.date_format($time,"Y");
                },
                'format'=>'raw'
            ],
            [
                'attribute'=>'NguoiSua_id',
                'value'=>function($data){
                    /* @var $data common\models\BaiViet */
                    $time=date_create($data->ThoiGianChinhSua);
                    return \common\models\User::findOne($data->NguoiSua_id)->TenNguoiDung.' chỉnh sửa lúc '.date_format($time,"H:i:s").' ngày '.date_format($time,"d").' tháng '.date_format($time,"m").' năm '.date_format($time,"Y");
                },
                'format'=>'raw'
            ],
            [
                'attribute'=>'XuatBan',
                'value'=>function($data){
                    /* @var $data common\models\BaiViet */
                    return $data->XuatBan==1?"Đã cho xuất bản":"Chưa xuất bản";
                },
                'format'=>'raw'
            ],
            [
                'attribute'=>'NoiBat',
                'value'=>function($data){
                    /* @var $data common\models\BaiViet */
                    return $data->XuatBan==1?"Đã dánh dấu là nổi bật":"Chưa đánh dấu là nổi bật";
                },
                'format'=>'raw'
            ],
            [
                'attribute'=>'NhanVatLichSu_id',
                'value'=>function($data){
                    /* @var $data common\models\BaiViet */
                    return $data->NhanVatLichSu_id!=null?$data->nhanVatLichSu->TenNhanVatLichSu:"<label style='color: #c55'>Chưa chọn nhân vật lịch sử nào</label>";
                },
                'format'=>'raw'
            ],
            [
                'attribute'=>'LangNghe_id',
                'value'=>function($data){
                    /* @var $data common\models\BaiViet */
                    return $data->LangNghe_id!=null?$data->langNghe->TenLangNghe:"<label style='color: #c55'>Chưa chọn làng nghề nào</label>";
                },
                'format'=>'raw'
            ],
            [
                'attribute'=>'LeHoi_id',
                'value'=>function($data){
                    /* @var $data common\models\BaiViet */
                    return $data->LeHoi_id!=null?$data->leHoi->TenLeHoi:"<label style='color: #c55'>Chưa chọn lễ hội nào</label>";
                },
                'format'=>'raw'
            ],
            [
                'attribute'=>'DiaDanh_id',
                'value'=>function($data){
                    /* @var $data common\models\BaiViet */
                    return $data->diaDanh!=null?$data->diaDanh->TenDiaDanh:"<label style='color: #c55'>Chưa chọn địa danh nào</label>";
                },
                'format'=>'raw'
            ],
            'Like',
            [
                'attribute'=>'bai_viet_tu_khoas',
                'format'=>'raw'
            ],
            [
                'attribute'=>'bai_viet_danh_mucs',
                'format'=>'raw'
            ],
        ],
        'template' => '<tr><th>{label}</th><td style="width:85%;">{value}</td></tr>',
    ]) ?>
    <div class="baiviet_view_anhdaidien">
        <div class="baiviet_view_anhdaidien_title">
            <label for="">Ảnh đại diện</label>
        </div>
        <div>
            <?php if($model->AnhDaiDien!=''):?>
                <div  class="gallery"><a href="<?='../images/anhdaidien/'.$model->AnhDaiDien?>"><img style="width: 30%" src="<?='../images/anhdaidien/'.$model->AnhDaiDien?>" alt="<?=$model->Alt?>" title="<?=$model->Title?>"/></a></div>
            <?php endif;?>
            <?php if($model->AnhDaiDien==''):?>
                Chưa có ảnh nào
            <?php endif;?>
        </div>
    </div>

    <div class="baiviet_view_anhlienquan">
        <div class="baiviet_view_anhlienquan">
            <label for="">Ảnh liên quan</label>
        </div>
        <?php if(count($anhlienquan)>0):?>
            <div class="row">
                <?php foreach ($anhlienquan as $key => $item):?>
                    <div class="column col-lg-2 col-md-4 col-sm-6 col-4 col-xs-3">
                        <div class="gallery"><a href="<?='../images/anhlienquan/'.$item->File?>"><img style="width: 100%" src="<?='../images/anhlienquan/'.$item->File?>" alt="<?=$item->Alt?>" title="<?=$item->Title?>"/></a></div>
                    </div>
                <?php endforeach;?>
            </div>
        <?php endif;?>
        <?php if(count($anhlienquan)==0):?>
            Chưa có ảnh nào
        <?php endif;?>
    </div>
</div>
