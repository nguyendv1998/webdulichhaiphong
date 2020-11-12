<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\LangNgheSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách làng nghề';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="lang-nghe-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Thêm làng nghề', ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute'=>'TenLangNghe',
                'headerOptions'=>['class'=>'text-primary','style'=>['width'=>'15%']],
                'value'=>function($data){
                    return Html::a($data->TenLangNghe,['view','id'=>$data->id]);
                },
                'format'=>'raw',
            ],
            'TomTat:ntext',
            //'MoTaChiTiet:ntext',
            //'AnhDaiDien',
            //'QuanHuyen_id',
            //'ToaDo',
            //'Code',
            //'CapCongNhan_id',
            //'Alt',
            //'Title',
            [
                'attribute'=>'CapCongNhan_id',
                'value'=>function($data){
                    /** @var $data \common\models\LangNghe */
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
                    return Html::img('../images/anhdaidien/'.$data->AnhDaiDien,['class'=>'img img-responsive','title'=>$data->Title,'alt'=>$data->Alt,'style'=>['width'=>'250px']]);
                },
                'format'=>'raw',
                'filter'=>false
            ],
//            [
//                'header'=>'Xem chi tiết',
//                'headerOptions'=>['class'=>'text-primary text-center','style'=>['width'=>'5%']],
//                'value'=>function($data)
//                {
//                    return Html::a('<i class="glyphicon glyphicon-eye-open"></i>',
//                        \yii\helpers\Url::toRoute(['lang-nghe/view','id'=>$data->id]));
//                },
//                'contentOptions'=>['class'=>'text-center'],
//                'format'=>'raw'
//            ],
            [
                'header'=>'Chỉnh sửa',
                'headerOptions'=>['class'=>'text-primary text-center','style'=>['width'=>'5%']],
                'value'=>function($data)
                {
                    return Html::a('<i class="glyphicon glyphicon-pencil"></i>',
                        \yii\helpers\Url::toRoute(['lang-nghe/update','id'=>$data->id]));
                },
                'contentOptions'=>['class'=>'text-center'],
                'format'=>'raw'
            ],
            [
                'header'=>'Xóa',
                'headerOptions'=>['class'=>'text-center text-primary','style'=>['width'=>'5%']],
                'value'=>function($data)
                {
                    return Html::a('<span style="color: red" title="Xóa"><i class="glyphicon glyphicon-trash"></i></span>', \yii\helpers\Url::toRoute(['lang-nghe/delete','id'=>$data->id]),
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
