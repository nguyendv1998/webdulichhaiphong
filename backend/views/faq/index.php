<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\FaqSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách FAQ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Thêm câu hỏi FAQ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'TenCauHoi',
                'label'=>"Tên câu hỏi",
                'value'=>function($data)
                {
                    /** @var  \common\models\Faq $data*/
                    return Html::a($data->TenCauHoi, \yii\helpers\Url::toRoute(['faq/view','id'=>$data->id]));

                },
                'headerOptions'=>['class'=>'text-center text-primary','style'=>['width'=>'23%']],
                'contentOptions'=>['class'=>'text-left'],
                'format'=>'raw'
            ],
            [
                'attribute'=>'NoiDungTraLoi',
                'label'=>"Nội dung trả lời",
                'value'=>function($data)
                {
                    /** @var  \common\models\Faq $data*/
                    return $data->NoiDungTraLoi;
                },
                'headerOptions'=>['class'=>'text-center text-primary','style'=>['width'=>'65%']],
                'contentOptions'=>['class'=>'text-left'],
                'format'=>'raw'
            ],
            [
                'attribute'=>'Uutien',
                'label'=>"Độ ưu tiên",
                'value'=>function($data)
                {
                    /** @var  \common\models\Faq $data*/
                    return $data->Uutien;
                },
                'headerOptions'=>['class'=>'text-center text-primary','style'=>['width'=>'5%']],
                'contentOptions'=>['class'=>'text-right'],
                'filter'=>false
            ],
            [
                'header'=>'Chỉnh sửa',
                'headerOptions'=>['class'=>'text-center text-primary','style'=>['width'=>'5%']],
                'value'=>function($data)
                {
                    return Html::a('<i class="glyphicon glyphicon-pencil"></i>', \yii\helpers\Url::toRoute(['faq/update','id'=>$data->id]));
                },
                'format'=>'raw',
                'contentOptions'=>['class'=>'text-center']
            ],
            [
                'header'=>'Xóa',
                'headerOptions'=>['class'=>'text-center text-primary','style'=>['width'=>'3%']],
                'value'=>function($data)
                {
                    return Html::a('<span style="color: red" title="Xóa"><i class="glyphicon glyphicon-trash"></i></span>', \yii\helpers\Url::toRoute(['faq/delete','id'=>$data->id]),
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
