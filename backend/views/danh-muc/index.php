<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\DanhMucSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model \common\models\DanhMuc */
$this->registerJsFile(Yii::$app->request->baseUrl."/js/showbutton_slider.js?",['depends' => [\yii\web\JqueryAsset::className()]]);
$this->title = 'Danh sách danh mục';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="danh-muc-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- Button trigger modal -->
    <p>
        <button type="button" id="btn_reset_danhmuc" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
            Thêm danh mục
        </button>
    </p>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php $form = \yii\widgets\ActiveForm::begin(); ?>
                <div class="modal-body">
                    <?= $form->field($model, 'TenDanhMuc')->textInput(['maxlength' => true]) ?>
                    <?=$form->field($model, 'DanhMucCha_id')->widget(\kartik\select2\Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map(
                            \common\models\DanhMuc::find()->all(),
                            'id',
                            'TenDanhMuc'
                        ),
                        'language' => 'de',
                        'options' => ['placeholder' => 'Chọn danh mục'],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ])?>
                    <input type="number" id="danhmuc_id" name="danhmuc_id" hidden>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Lưu lại</button>
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


            'TenDanhMuc',
            [
                'attribute'=>'DanhMucCha_id',
                'value'=>function($data)
                {
                    /** @var  \common\models\DanhMuc $data*/
                    if($data->danhMucCha!=null) return $data->danhMucCha->TenDanhMuc;
                    else return "Danh mục gốc";
                },
                'headerOptions'=>['class'=>'text-center text-primary','style'=>['width'=>'35%']],
                'contentOptions'=>['class'=>'text-left'],
                'format'=>'raw'
            ],
            [
                'header'=>'Chỉnh sửa',
                'headerOptions'=>['class'=>'text-center text-primary','style'=>['width'=>'5%']],
                'value'=>function($data)
                {
                    $danhmuchaid=-1;
                    if($data->danhMucCha!=null) $danhmuchaid= $data->danhMucCha->id;
                    return Html::a('<i class="glyphicon glyphicon-pencil"></i>',
                        //\yii\helpers\Url::toRoute(['danh-muc/update','id'=>$data->id]),
                        '#',
                        ['data-id'=>$data->id,'data-danhmucchaid'=>$danhmuchaid,'data-tendanhmuc'=>$data->TenDanhMuc,'data-toggle'=>'modal','data-target'=>'#exampleModal','class'=>'edit_danhmuc']);
                },
                'format'=>'raw',
                'contentOptions'=>['class'=>'text-center']
            ],
            [
                'header'=>'Xóa',
                'headerOptions'=>['class'=>'text-center text-primary','style'=>['width'=>'3%']],
                'value'=>function($data)
                {
                    return Html::a('<span style="color: red" title="Xóa"><i class="glyphicon glyphicon-trash"></i></span>', \yii\helpers\Url::toRoute(['danh-muc/delete','id'=>$data->id]),
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
