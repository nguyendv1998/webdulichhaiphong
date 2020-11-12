<?php

/* @var $this yii\web\View */
/* @var $List_diadanh array*/

$this->title = 'Du lịch hải phòng -  mapbox';
$this->registerJsFile(Yii::$app->request->baseUrl."/js/custommapbox.js?",['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile(Yii::$app->request->baseUrl."/css/mapboxstyle.css");
?>
<div class="container">

    <?php if(Yii::$app->user->isGuest||yii::$app->user->identity->LoaiTaiKhoan=='khach'): ?>
        <div class="alert alert-danger alert-dismissible show" role="alert">
            <strong>Xin chào!</strong> Có vẻ như bạn không có quyền xem hoặc thực hiện các nội dung này. Hãy liên hệ với quản trị viên hệ thống nếu bạn nghĩ đây là lỗi hệ thống. Xin cảm ơn!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif;?>
    <?php if(yii::$app->user->identity->LoaiTaiKhoan=='admin'||yii::$app->user->identity->LoaiTaiKhoan=='bientapvien'):?>
        <div class="row justify-content-between">
            <div class="col-sm-2">
                <label for="dia_danh">Chọn địa danh</label>
                <?= \kartik\select2\Select2::widget([
                    'name' => 'dia_danh',
                    'id'=>'dia_danh',
                    'data' => $List_diadanh,
                    'theme' => \kartik\select2\Select2::THEME_DEFAULT,
                    'options' => ['placeholder' => 'Tìm kiếm',
//                        'multiple' => true,
                        'autocomplete' => 'off'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
            </div>
            <div class="col-sm-2" style="float: right">
                <label for="slct">Chọn phương tiện</label>
                    <select class="form-control" id="phuong_tien">
                        <option value="driving-traffic">Ô tô</option>
                        <option value="driving">Xe máy</option>
                        <option value="cycling">Xe đạp</option>
                        <option value="walking">Đi bộ</option>
                    </select>
            </div>
        </div>
        <div class="row" style="width: 100%;">
            <div id="map"></div>
            <div id="instructions"></div>
            <div id="coordinates" class="coordinates"></div>
        </div>
    <?php endif;?>
</div>

