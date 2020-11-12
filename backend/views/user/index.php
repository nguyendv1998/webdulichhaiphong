<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách thành viên';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i>Thêm người dùng', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'TenNguoiDung',
                'label'=>"Tên người dùng",
                'value'=>function($data)
                {
                    return Html::a($data->TenNguoiDung, \yii\helpers\Url::toRoute(['user/view','id'=>$data->id]));
                },
                'headerOptions'=>['class'=>'text-center'],
                'contentOptions'=>['class'=>'text-left'],
                'format'=>'raw'
            ],
            [
                'attribute'=>'username',
                'label'=>"Tên đăng nhập",
                'value'=>function($data)
                {
                    return Html::a($data->username, \yii\helpers\Url::toRoute(['user/view','id'=>$data->id]));
                },
                'headerOptions'=>['class'=>'text-center'],
                'contentOptions'=>['class'=>'text-left'],
                'format'=>'raw'
            ],
            [
                'attribute'=>'SoDienThoai',
                'label'=>"Số điện thoại",
                'value'=>function($data)
                {
                    return Html::a($data->SoDienThoai, \yii\helpers\Url::toRoute(['user/view','id'=>$data->id]));
                },
                'headerOptions'=>['class'=>'text-center'],
                'contentOptions'=>['class'=>'text-left'],
                'format'=>'raw'
            ],
            [
                'attribute'=>'LoaiTaiKhoan',
                'label'=>"Loại tài khoản",
                'value'=>function($data)
                {
                    return Html::a($data->LoaiTaiKhoan, \yii\helpers\Url::toRoute(['user/view','id'=>$data->id]));
                },
                'headerOptions'=>['class'=>'text-center'],
                'contentOptions'=>['class'=>'text-left'],
                'format'=>'raw'
            ],
            [
                'attribute'=>'created_at',
                'label'=>"Ngày tạo",
                'value'=>function($data)
                {
                    return date_format(date_create($data->created_at),'d-m-Y H:i:s');
                },
                'headerOptions'=>['class'=>'text-center'],
                'contentOptions'=>['class'=>'text-center']
            ],
            //'auth_key:ntext',
            //'password_reset_token:ntext',
            //'created_at',
            //'updated_at',
            [
                'attribute'=>'status',
                'label'=>"Trạng thái",
                'value'=>function($data)
                {
                    if($data->status==10) return "Hoạt động";
                    return "Không hoạt động";
                },
                'headerOptions'=>['class'=>'text-center'],
                'contentOptions'=>['']
            ],
            //'verification_token:ntext',
            //'password:ntext',
            [
                'header'=>'Sửa',
                'headerOptions'=>['class'=>'text-primary text-center'],
                'value'=>function($data)
                {
                    return Html::a('<i class="glyphicon glyphicon-pencil"></i>',
                        \yii\helpers\Url::toRoute(['user/update','id'=>$data->id]));
                },
                'contentOptions'=>['class'=>'text-center'],
                'format'=>'raw'
            ],
            [
                'header'=>'Xóa',
                'headerOptions'=>['class'=>'text-center text-primary','style'=>['width'=>'5%']],
                'value'=>function($data)
                {
                    return Html::a('<span style="color: red" title="Xóa"><i class="glyphicon glyphicon-trash"></i></span>', \yii\helpers\Url::toRoute(['user/delete','id'=>$data->id]),
                        [
                            'data' => ['confirm' => 'Bạn có chắc chắn muốn xóa không?', 'method' => 'post']
                        ]);
                },
                'contentOptions'=>['class'=>'text-center'],
                'format'=>'raw'
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
