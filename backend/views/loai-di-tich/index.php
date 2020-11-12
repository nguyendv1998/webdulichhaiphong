<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\LoaiDiTichSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model \common\models\LoaiDiTich */

$this->title = 'Danh sách loại di tích';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile(Yii::$app->request->baseUrl."/js/showbutton_slider.js?",['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<div class="loai-di-tich-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- Button trigger modal -->

    <p>
        <button type="button" class="btn btn-success" id="btn_reset_loaiditich" data-toggle="modal" data-target="#exampleModal">
            <i class="glyphicon glyphicon-plus"></i> Thêm loại di tích
        </button>
    </p>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_loaiditich_title">Thêm loại di tích</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php $form = \yii\widgets\ActiveForm::begin(); ?>
                <div class="modal-body">
                    <?= $form->field($model, 'TenLoaiDiTich')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'MoTa')->textarea(['maxlength' => true,'rows'=>10]) ?>
                    <input type="number" hidden id="loaiditich_id" name="loaiditich_id">
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


            'TenLoaiDiTich',
            'MoTa:ntext',

            [
                'header'=>'Chỉnh sửa',
                'headerOptions'=>['class'=>'text-center text-primary','style'=>['width'=>'5%']],
                'value'=>function($data)
                {
                    return Html::a('<i class="glyphicon glyphicon-pencil"></i>','#',['data-id'=>$data->id,'data-mota'=>$data->MoTa,'data-tenloaiditich'=>$data->TenLoaiDiTich,'data-target'=>'#exampleModal','data-toggle'=>'modal','class'=>'edit_loai_di_tich']);
                },
                'format'=>'raw',
                'contentOptions'=>['class'=>'text-center']
            ],
            [
                'header'=>'Xóa',
                'headerOptions'=>['class'=>'text-center text-primary','style'=>['width'=>'5%']],
                'value'=>function($data)
                {
                    return Html::a('<span style="color: red" title="Xóa"><i class="glyphicon glyphicon-trash"></i></span>', \yii\helpers\Url::toRoute(['loai-di-tich/delete','id'=>$data->id]),
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
