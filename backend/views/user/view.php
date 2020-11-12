<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->TenNguoiDung;
$this->params['breadcrumbs'][] = ['label' => 'Thành viên', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container">
    <div class="user-view">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Chỉnh sửa', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Xóa', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Bạn có chắc chắn muốn xóa người dùng này không?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'username',
                'TenNguoiDung',
                'Email:Email',
                'SoDienThoai',
                'LoaiTaiKhoan',
                'created_at',
                'updated_at',
                [
                    'attribute'=>'status',
                    'label'=>"Trạng thái",
                    'value'=>function($data)
                    {
                        if($data->status==10) return "Hoạt động";
                        return "Không hoạt động";
                    },
                ],
            ],
        ]) ?>

    </div>
</div>
