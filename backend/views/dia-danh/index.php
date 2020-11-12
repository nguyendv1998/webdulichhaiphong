<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\DiaDanhSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách địa danh';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dia-danh-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Thêm địa danh', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'TenDiaDanh',
                'headerOptions'=>['class'=>'text-primary','style'=>['width'=>'15%']],
                'value'=>function($data){
                    /* @var $data \common\models\DiaDanh */

                    return Html::a($data->TenDiaDanh,['view','id'=>$data->id]);
                },
                'format'=>'raw'
            ],
            [
                'attribute'=>'ToaDo',
                'headerOptions'=>['class'=>'text-primary','style'=>['width'=>'10%']],
                'format'=>'raw'
            ],
            'TomTat:ntext',
            [
                'attribute'=>'QuanHuyen_id',
                'value'=>function($data){
                    /* @var $data \common\models\DiaDanh */

                    return $data->quanHuyen->TenQuanHuyen;
                },
                'format'=>'raw',
                'filter'=>Html::activeDropDownList($searchModel,'QuanHuyen_id',\yii\helpers\ArrayHelper::map(
                    \common\models\QuanHuyen::find()->orderBy(['TenQuanHuyen'=>4])->all(),
                    'id','TenQuanHuyen'
                ),['class'=>'form-control','prompt'=>'Tất cả','id'=>'select2_content2'])
            ],
            [
                'attribute'=>'LoaiDiTich_id',
                'value'=>function($data){
                    /* @var $data \common\models\DiaDanh */

                    return $data->loaiDiTich->TenLoaiDiTich;
                },
                'format'=>'raw',
                'filter'=>Html::activeDropDownList($searchModel,'LoaiDiTich_id',\yii\helpers\ArrayHelper::map(
                    \common\models\LoaiDiTich::find()->all(),
                    'id','TenLoaiDiTich'
                ),['class'=>'form-control','prompt'=>'Tất cả','id'=>'select2_content2'])
            ],
            [
                'attribute'=>'CapCongNhan_id',
                'value'=>function($data){
                    /* @var $data \common\models\DiaDanh */

                    return $data->capCongNhan->TenCapCongNhan;
                },
                'format'=>'raw',
                'filter'=>Html::activeDropDownList($searchModel,'CapCongNhan_id',\yii\helpers\ArrayHelper::map(
                    \common\models\CapCongNhan::find()->all(),
                    'id','TenCapCongNhan'
                ),['class'=>'form-control','prompt'=>'Tất cả','id'=>'select2_content2'])
            ],
            [
                'attribute'=>'AnhDaiDien',
                'value'=>function($data){
                    if(trim($data->AnhDaiDien)=="") return "Không có ảnh nào";
                    return Html::img('../images/anhdaidien/'.$data->AnhDaiDien,['class'=>'img img-responsive','title'=>$data->Title,'alt'=>$data->Alt,'style'=>['width'=>'200px']]);
                },
                'format'=>'raw',
                'filter'=>false
            ],
            //'Code',
            //'CapCongNhan_id',
            //'QuanHuyen_id',
            //'DanhMuc_id',
            //'NhanVatLichSu_id',
            //'LoaiDiTich_id',
            //'Title',
            //'Alt',

            [
                'header'=>'Chỉnh sửa',
                'headerOptions'=>['class'=>'text-primary text-center','style'=>['width'=>'5%']],
                'value'=>function($data)
                {
                    return Html::a('<i class="glyphicon glyphicon-pencil"></i>',
                        \yii\helpers\Url::toRoute(['update','id'=>$data->id]));
                },
                'contentOptions'=>['class'=>'text-center'],
                'format'=>'raw'
            ],
            [
                'header'=>'Xóa',
                'headerOptions'=>['class'=>'text-center text-primary','style'=>['width'=>'5%']],
                'value'=>function($data)
                {
                    return Html::a('<span style="color: red" title="Xóa"><i class="glyphicon glyphicon-trash"></i></span>', \yii\helpers\Url::toRoute(['delete','id'=>$data->id]),
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
