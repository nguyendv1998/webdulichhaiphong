<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\QuanHuyen */
/* @var $list_xaphuong common\models\XaPhuong[] */
/* @var $model_xaphuong common\models\XaPhuong */

$this->title = $model->TenQuanHuyen;
$this->params['breadcrumbs'][] = ['label' => 'Danh sách quận huyện', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile(Yii::$app->request->baseUrl."/js/showbutton_slider.js?",['depends' => [\yii\web\JqueryAsset::className()]]);
\yii\web\YiiAsset::register($this);
?>
<div class="quan-huyen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Chỉnh sửa',"#", ['class' => 'btn btn-primary','data-toggle'=>"modal", 'data-target'=>"#exampleModal"]) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có chắc chắn muốn xóa?',
                'method' => 'post',
            ],
        ]) ?>
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
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'TenQuanHuyen',
        ],
    ]) ?>
    <p>
        <?= Html::a('Thêm xã, phường', '#', ['class' => 'btn btn-success','data-toggle'=>"modal", 'data-target'=>"#exampleModal1",'id'=>'btn_reset_xa_phuong']) ?>
    </p>
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_quanhuyen_title">Thêm xã phường</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php $form = \yii\widgets\ActiveForm::begin(); ?>
                <div class="modal-body">
                    <?= $form->field($model_xaphuong, 'TenXaPhuong')->textInput(['maxlength' => true]) ?>
                    <input type="number" hidden id="xaphuong_id" name="xaphuong_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <?= Html::submitButton('Lưu lại', ['class' => 'btn btn-success']) ?>
                </div>
                <?php \yii\widgets\ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <div>
        <h4>Danh sách xã, phường thuộc <?=$model->TenQuanHuyen?></h4>
    </div>
    <table class="table table-bordered table-striped" style="margin-bottom: 35px !important;">
        <thead>
            <tr>
                <th style="width: 5%">STT</th>
                <th>Tên xã, phường</th>
                <th style="width: 5%" class="text-center">Chỉnh sửa</th>
                <th style="width: 5%" class="text-center">Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php if($list_xaphuong!=null && count($list_xaphuong)>0): ?>
            <?php $index=0?>
                <?php foreach ($list_xaphuong as $item):?>
                    <tr>
                        <td><?=++$index?></td>
                        <td><?=$item->TenXaPhuong?></td>
                        <td class="text-center"><?=Html::a('<i class="glyphicon-pencil glyphicon "></i>','#', [
                                'class'=>'text-center edit_xaphuong',
                                'data-id'=>$item->id,
                                'data-tenxaphuong'=>$item->TenXaPhuong,
                                'data-toggle'=>"modal", 'data-target'=>"#exampleModal1"
                            ])?></td>
                        <td class="text-center"><?=Html::a('<span style="color: red" title="Xóa"><i class="glyphicon glyphicon-trash"></i></span>', \yii\helpers\Url::toRoute(['quan-huyen/delete-xa-phuong','id'=>$item->id]),
                                [
                                    'data' => ['confirm' => 'Bạn có chắc chắn muốn xóa không?', 'method' => 'post']
                                ]);?></td>
                    </tr>
                <?php endforeach;?>
            <?php endif;?>
        </tbody>
    </table>
</div>
<div class="bottom">
    <p></p>
</div>
