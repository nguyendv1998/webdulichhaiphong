<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\NhanVatLichSuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách nhân vật lịch sử';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nhan-vat-lich-su-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Thêm nhân vật lịch sử', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',

            [
                'attribute'=>'TenNhanVatLichSu',
                'value'=>function($data){
                    return Html::a($data->TenNhanVatLichSu,['view','id'=>$data->id]);
                },
                'format'=>'raw',
            ],
            //'Code',
            //'MoTa:ntext',
            [
                'attribute'=>'AnhDaiDien',
                'value'=>function($data){
                    if(trim($data->AnhDaiDien)=="") return "Không có ảnh nào";
                    return Html::img('../images/anhdaidien/'.$data->AnhDaiDien,['class'=>'img img-responsive','title'=>$data->Title,'alt'=>$data->Alt,'style'=>['width'=>'150px']]);
                },
                'format'=>'raw',
                'filter'=>false
            ],
//            [
//                    'attribute'=>'MoTa',
//                    'format'=>'raw'
//            ],
            //'Alt',
            [
                'header'=>'Xem chi tiết',
                'headerOptions'=>['class'=>'text-primary text-center','style'=>['width'=>'5%']],
                'value'=>function($data)
                {
                    return Html::a('<i class="glyphicon glyphicon-eye-open"></i>',
                        \yii\helpers\Url::toRoute(['nhan-vat-lich-su/view','id'=>$data->id]));
                },
                'contentOptions'=>['class'=>'text-center'],
                'format'=>'raw'
            ],
            [
                'header'=>'Sửa',
                'headerOptions'=>['class'=>'text-primary text-center','style'=>['width'=>'5%']],
                'value'=>function($data)
                {
                    return Html::a('<i class="glyphicon glyphicon-pencil"></i>',
                        \yii\helpers\Url::toRoute(['nhan-vat-lich-su/update','id'=>$data->id]));
                },
                'contentOptions'=>['class'=>'text-center'],
                'format'=>'raw'
            ],
            [
                'header'=>'Xóa',
                'headerOptions'=>['class'=>'text-center text-primary','style'=>['width'=>'5%']],
                'value'=>function($data)
                {
                    return Html::a('<span style="color: red" title="Xóa"><i class="glyphicon glyphicon-trash"></i></span>', \yii\helpers\Url::toRoute(['nhan-vat-lich-su/delete','id'=>$data->id]),
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
