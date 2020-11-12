<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\QuanHuyenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model \common\models\QuanHuyen */

$this->title = 'Danh sách quận huyện';
$this->params['breadcrumbs'][] = $this->title;
?>
<script>
    function click(){
  //      document.getElementById("quanhuyenname").focus();
    }
</script>
<div class="quan-huyen-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#exampleModal">
            <i class="glyphicon glyphicon-plus"></i> Thêm quận huyện
        </button>
    </p>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_quanhuyen_title">Thêm quận huyện</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php $form = \yii\widgets\ActiveForm::begin(); ?>
                <div class="modal-body">
                    <?= $form->field($model, 'TenQuanHuyen')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <?= Html::submitButton('Lưu lại', ['class' => 'btn btn-success']) ?>
                </div>
                <?php \yii\widgets\ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            [
                'attribute'=>'TenQuanHuyen',
                'label'=>"Tên quận huyện",
                'value'=>function($data)
                {
                    return Html::a($data->TenQuanHuyen,\yii\helpers\Url::toRoute(['quan-huyen/view','id'=>$data->id]));
                },
                'headerOptions'=>['class'=>'text-center'],
                'contentOptions'=>['class'=>'text-left'],
                'format'=>'raw'
            ],
            //'Code',
            [
                'header'=>'Xem chi tiết',
                'headerOptions'=>['class'=>'text-center text-primary','style'=>['width'=>'5%']],
                'value'=>function($data)
                {
                    return Html::a('<span title="Xem chi tiết"><i class="glyphicon glyphicon-eye-open"></i></span>', \yii\helpers\Url::toRoute(['quan-huyen/view','id'=>$data->id]));
                },
                'contentOptions'=>['class'=>'text-center'],
                'format'=>'raw'
            ],
            [
                'header'=>'Xóa',
                'headerOptions'=>['class'=>'text-center text-primary','style'=>['width'=>'5%']],
                'value'=>function($data)
                {
                    return Html::a('<span style="color: red" title="Xóa"><i class="glyphicon glyphicon-trash"></i></span>', \yii\helpers\Url::toRoute(['quan-huyen/delete','id'=>$data->id]),
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
