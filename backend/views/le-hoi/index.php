<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\LeHoiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách lễ hội';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile(Yii::$app->request->baseUrl."/js/select2.min.js",['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile(Yii::$app->request->baseUrl."/css/select2.min.css");
$this->registerJsFile(Yii::$app->request->baseUrl."/js/showbutton_slider.js?",['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl."/js/select2_custom.js?",['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<div class="le-hoi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Thêm lễ hội', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'Code',
            [
                'attribute'=>'TenLeHoi',
                'headerOptions'=>['class'=>'text-primary ','style'=>['width'=>'15%']],
                'value'=>function($data)
                {
                    return Html::a($data->TenLeHoi,\yii\helpers\Url::toRoute(['le-hoi/view','id'=>$data->id]));
                },
                'contentOptions'=>['class'=>''],
                'format'=>'raw'
            ],
            [
                'attribute'=>'TomTat',
                'headerOptions'=>['class'=>' text-primary','style'=>['width'=>'30%']],
                'value'=>function($data){
                    /* @var $data \common\models\LeHoi */
                    return $data->TomTat;
                },
                'format'=>'raw',
            ],
            //'NoiDungChiTiet:ntext',
            //'NgayBatDau',
            //'NgayKetThuc',
            //'AnhDaiDien',
            //'CapCongNhan_id',
            //'Title',
            //'Alt',
            [
                'attribute'=>'CapCongNhan_id',
                'headerOptions'=>['class'=>' text-primary','style'=>['width'=>'12%']],
                'value'=>function($data){
                    /* @var $data \common\models\LeHoi */
                    return $data->capCongNhan->TenCapCongNhan;
                },
                'format'=>'raw',
                'filter'=>Html::activeDropDownList($searchModel,'CapCongNhan_id',\yii\helpers\ArrayHelper::map(
                    \common\models\CapCongNhan::find()->all(),
                    'id','TenCapCongNhan'
                ),['class'=>'form-control','prompt'=>'Tất cả','id'=>'select2_content2'])
            ],
            [
                'attribute'=>'QuanHuyen_id',
                'headerOptions'=>['class'=>' text-primary','style'=>['width'=>'12%']],
                'value'=>function($data){
                    /* @var $data \common\models\LeHoi */
                    return $data->quanHuyen->TenQuanHuyen;
                },
                'format'=>'raw',
                'filter'=>Html::activeDropDownList($searchModel,'QuanHuyen_id',\yii\helpers\ArrayHelper::map(
                    \common\models\QuanHuyen::find()->orderBy(['TenQuanHuyen'=>SORT_ASC])->all(),
                    'id','TenQuanHuyen'
                ),['class'=>'form-control','prompt'=>'Tất cả','id'=>'select2_content1'])
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
            [
                'header'=>'Chỉnh sửa',
                'headerOptions'=>['class'=>'text-primary text-center','style'=>['width'=>'5%']],
                'value'=>function($data)
                {
                    return Html::a('<i class="glyphicon glyphicon-pencil"></i>',
                        \yii\helpers\Url::toRoute(['le-hoi/update','id'=>$data->id]));
                },
                'contentOptions'=>['class'=>'text-center'],
                'format'=>'raw'
            ],
            [
                'header'=>'Xóa',
                'headerOptions'=>['class'=>'text-center text-primary','style'=>['width'=>'5%']],
                'value'=>function($data)
                {
                    return Html::a('<span style="color: red" title="Xóa"><i class="glyphicon glyphicon-trash"></i></span>', \yii\helpers\Url::toRoute(['le-hoi/delete','id'=>$data->id]),
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
