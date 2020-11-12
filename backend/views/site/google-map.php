<?php

/* @var $this yii\web\View */
/* @var $List_diadanh array*/
$this->registerJsFile(Yii::$app->request->baseUrl."/js/customgooglemap.js?",['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile(Yii::$app->request->baseUrl."/css/googlemapstyle.css");
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
        <div class="row justify-content-between" style="margin-bottom: 5px">
            <div class="col-sm-2">
                <label for="diem_batdau">Chọn nơi bắt đầu</label>
                <?= \kartik\select2\Select2::widget([
                    'name' => 'diem_batdau',
                    'id'=>'diem_batdau',
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
            <div class="col-sm-2">
                <label for="diem_den">Chọn điểm đến</label>
                <?= \kartik\select2\Select2::widget([
                    'name' => 'diem_den',
                    'id'=>'diem_den',
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
                <label for="khoang_cach">Khoảng cách tối đa</label>
                <select class="form-control" id="khoang_cach">
                    <option value="-1">Không giới hạn</option>
                    <option value="2000">2 km</option>
                    <option value="5000">5 km</option>
                    <option value="10000">10 km</option>
                    <option value="15000">15 km</option>
                    <option value="20000">20 km</option>
                    <option value="30000">30 km</option>
                    <option value="40000">40 km</option>
                    <option value="50000">50 km</option>
                    <option value="70000">70 km</option>
                    <option value="100000">100 km</option>
                </select>
            </div>
            <div class="col-sm-2" style="float: right">
                <label for="phuong_tien">Chọn phương tiện</label>
                <select class="form-control" id="phuong_tien">
                    <option value="driving-traffic">Ô tô</option>
                    <option value="driving">Xe máy</option>
                    <option value="cycling">Xe đạp</option>
                    <option value="walking">Đi bộ</option>
                </select>
            </div>
        </div>
        <div style="height: 85%; width: 86%; position: absolute; top 2%;">
            <div id="map" style="height: 100%"></div>
        </div>
    <?php endif;?>
</div>