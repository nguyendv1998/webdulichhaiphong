<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CapCongNhanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách các cấp công nhận';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cap-cong-nhan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Thêm cấp công nhận', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'TenCapCongNhan',
                'format'=>'raw',
                'value'=>function($data){
                    return Html::a($data->TenCapCongNhan,\yii\helpers\Url::toRoute(['cap-cong-nhan/view','id'=>$data->id]));
                }
            ],
            [
                'attribute'=>'MoTa',
                'format'=>'raw',
            ],
            [
                'header'=>'Chỉnh sửa',
                'headerOptions'=>['class'=>'text-center text-primary','style'=>['width'=>'5%']],
                'value'=>function($data)
                {
                    return Html::a('<i class="glyphicon glyphicon-pencil"></i>', \yii\helpers\Url::toRoute(['cap-cong-nhan/update','id'=>$data->id]));
                },
                'format'=>'raw',
                'contentOptions'=>['class'=>'text-center']
            ],
            [
                'header'=>'Xóa',
                'headerOptions'=>['class'=>'text-center text-primary','style'=>['width'=>'5%']],
                'value'=>function($data)
                {
                    return Html::a('<span style="color: red" title="Xóa"><i class="glyphicon glyphicon-trash"></i></span>', \yii\helpers\Url::toRoute(['cap-cong-nhan/delete','id'=>$data->id]),
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
