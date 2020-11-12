<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\BaiVietSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách bài viết';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bai-viet-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Thêm bài viết', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'TenBaiViet',
                'headerOptions'=>['class'=>'text-primary','style'=>['width'=>'15%']],
                'value'=>function($data)
                {
                    return Html::a($data->TenBaiViet,['view','id'=>$data->id]);
                },
                'contentOptions'=>['class'=>''],
                'format'=>'raw',
            ],
            'TomTat:ntext',
            //'NoiDung:ntext',
            //'Code',
            //'AnhDaiDien',
            //'ThoiGianDang',
            [
                'attribute'=>'ThoiGianDang',
                'headerOptions'=>['class'=>'text-primary text-center','style'=>['width'=>'10%']],
                'value'=>function($data)
                {
                    $time=date_create($data->ThoiGianDang);
                    return \common\models\User::findOne($data->NguoiDang_id)->TenNguoiDung.' đăng bài lúc '.date_format($time,"H:i:s d-m-Y");
                },
                'contentOptions'=>['class'=>''],
                'format'=>'raw',
                'filter'=>false
            ],
            [
                'attribute'=>'ThoiGianChinhSua',
                'headerOptions'=>['class'=>'text-primary text-center','style'=>['width'=>'8%']],
                'value'=>function($data)
                {
                    $time=date_create($data->ThoiGianChinhSua);
                    return \common\models\User::findOne($data->NguoiSua_id)->TenNguoiDung.' chỉnh sửa lúc '.date_format($time,"H:i:s d-m-Y");
                },
                'contentOptions'=>['class'=>''],
                'format'=>'raw',
                'filter'=>false
            ],
            [
                'attribute'=>'Like',
                'headerOptions'=>['class'=>'text-primary text-center','style'=>['width'=>'7%']],
                'value'=>function($data)
                {

                    return number_format($data->Like,0,'','.');
                },
                'contentOptions'=>['class'=>'text-right'],
                'format'=>'raw',
                'filter'=>false
//                'filter'=>Html::activeTextInput($searchModel,'luot_like_tu',['class'=>'form-control','type'=>'number','min'=>0,'placeholder'=>'Từ']).
//                    Html::activeTextInput($searchModel,'Like',['class'=>'form-control','type'=>'number','placeholder'=>'đến'])
            ],
            [
                'attribute'=>'NoiBat',
                'headerOptions'=>['class'=>'text-primary text-center','style'=>['width'=>'8%']],
                'value'=>function($data)
                {

                    return $data->NoiBat==1?"Nổi bật":"Không nổi bật";
                },
                'contentOptions'=>['class'=>'text-left'],
                'format'=>'raw',
                'filter'=>Html::activeDropDownList($searchModel,'NoiBat',[
                    0=>'Không nổi bật',
                    1=>'Nổi bật',
                ],['prompt'=>'Tất cả','class'=>'form-control'])
            ],
            [
                'attribute'=>'XuatBan',
                'headerOptions'=>['class'=>'text-primary text-center','style'=>['width'=>'8%']],
                'value'=>function($data)
                {

                    return $data->XuatBan==1?"Đã xuất bản":"Chưa xuất bản";
                },
                'contentOptions'=>['class'=>'text-left'],
                'format'=>'raw',
                'filter'=>Html::activeDropDownList($searchModel,'XuatBan',[
                    0=>'Chưa xuất bản',
                    1=>'Đã xuất bản',
                ],['prompt'=>'Tất cả','class'=>'form-control'])
            ],
            //'NguoiDang_id',
            //'NguoiSua_id',
            //'XuatBan',
            //'NoiBat',
            //'NhanVatLichSu_id',
            //'LangNghe_id',
            //'LeHoi_id',
            //'DiaDanh_id',
            //'Title',
            //'Alt',
            //'Like',

            [
                'header'=>'Sửa',
                'headerOptions'=>['class'=>'text-primary text-center','style'=>['width'=>'5%']],
                'value'=>function($data)
                {
                    return Html::a('<i class="glyphicon glyphicon-pencil"></i>',
                        \yii\helpers\Url::toRoute(['bai-viet/update','id'=>$data->id]));
                },
                'contentOptions'=>['class'=>'text-center'],
                'format'=>'raw'
            ],
            [
                'header'=>'Xóa',
                'headerOptions'=>['class'=>'text-center text-primary','style'=>['width'=>'5%']],
                'value'=>function($data)
                {
                    return Html::a('<span style="color: red" title="Xóa"><i class="glyphicon glyphicon-trash"></i></span>', \yii\helpers\Url::toRoute(['bai-viet/delete','id'=>$data->id]),
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
