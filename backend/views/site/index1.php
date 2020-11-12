<?php

/* @var $this yii\web\View */

$this->title = 'Du lịch hải phòng -  trang chủ';
?>
<div class="site-index">

    <?php if(Yii::$app->user->isGuest||yii::$app->user->identity->LoaiTaiKhoan=='khach'): ?>
        <div class="alert alert-danger alert-dismissible show" role="alert">
            <strong>Xin chào!</strong> Có vẻ như bạn không có quyền xem hoặc thực hiện các nội dung này. Hãy liên hệ với quản trị viên hệ thống nếu bạn nghĩ đây là lỗi hệ thống. Xin cảm ơn!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif;?>
    <?php if(yii::$app->user->identity->LoaiTaiKhoan=='admin'||yii::$app->user->identity->LoaiTaiKhoan=='bientapvien'):?>
        Google Map
        <div>
            <iframe src="https://maps.google.com/maps?q=haiphong-vietnam&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    width="100%" height="800px" frameborder="0" style="border:0;" allowfullscreen aria-hidden="false" tabindex="0"></iframe>
        </div>
    <?php endif;?>
</div>
