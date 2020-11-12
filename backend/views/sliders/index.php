<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\SlidersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model \common\models\Sliders */
/* @var $Sliders \common\models\Sliders[] */
$this->title = 'Danh sách ảnh sliders';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile("js/LightBox/simple-lightbox.css?v2.2.1");
$this->registerJsFile("js/LightBox/simple-lightbox.js?v2.2.1");
$this->registerJsFile("js/mys.js?");
$this->registerJsFile(Yii::$app->request->baseUrl."/js/showbutton_slider.js?",['depends' => [\yii\web\JqueryAsset::className()]]);
if(yii::$app->session->hasFlash('update_slider_success'))
{
    \common\models\API_H17::Alert(yii::$app->session->getFlash('update_slider_success'));
    echo yii::$app->session->getFlash('update_slider_success');
    yii::$app->session->removeFlash('update_slider_success');
}
else if(yii::$app->session->hasFlash('update_slider_fail'))
{
    \common\models\API_H17::Alert(yii::$app->session->getFlash('update_slider_fail'));
    yii::$app->session->removeFlash('update_slider_fail');
}
?>
<div class="sliders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Thêm ảnh slider
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm ảnh slider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php $form = \yii\widgets\ActiveForm::begin(); ?>
                <div class="modal-body">
                    <div class="sliders-form">



                        <?= $form->field($model, 'anhslider')->fileInput(["accept" => "image/png,image/jpg,image/jpeg",]) ?>

                        <?= $form->field($model, 'isActive')->checkbox() ?>

                        <?= $form->field($model, 'Title')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'Alt')->textInput(['maxlength' => true]) ?>

                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-success">Lưu lại</button>
                </div>
                <?php \yii\widgets\ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <form action="<?=\yii\helpers\Url::toRoute('sliders/edit-sliders')?>" method="post">
        <div class="row">
            <?php foreach ($Sliders as $key => $item):?>
                <div class="column col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 col-xs-12">
                    <div class="gallery"><a href="<?='../images/sliders/'.$item->File?>"><img style="width: 100%" src="<?='../images/sliders/'.$item->File?>" alt="<?=$item->Alt?>" title="<?=$item->Title?>"/></a></div>
                    <div>
                        <label>
                            <input type="checkbox" name="<?=$item->id?>" <?=($item->isActive==1)?"checked":""?> onchange="showButton()">
                            Hoạt động
                        </label>
                        <a href="#" class="slider_click" data-toggle="modal" data-target="#modal_edit_slider" data-id="<?=$item->id?>" data-slidertitle="<?=$item->Title?>" data-slideralt="<?=$item->Alt?>">
                            <i class="glyphicon glyphicon-pencil" ></i>
                            Chỉnh sửa
                        </a>
                        <?= Html::a('<i style="color: #ff0000" class="glyphicon glyphicon-trash"></i> Xóa', ['delete', 'id' => $item->id], [
                            'data' => [
                                'confirm' => 'Bạn có chắc chắn muốn xóa ảnh này không?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
        <div>
            <button type="submit" id="submit_btn" style="visibility: hidden" class="btn btn-primary">Lưu lại</button>
        </div>
    </form>
    <div class="modal fade" id="modal_edit_slider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa tiêu đề và thuộc tính thay thế của ảnh</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?=\yii\helpers\Url::toRoute(['sliders/chinh-sua'])?>" method="post">
                    <div class="modal-body">
                        <div class="form-group field-sliders-alt required">
                            <label class="control-label" for="sliders_update_alt">Alt của ảnh</label>
                            <input type="text" id="sliders_update_alt" class="form-control" name="sliders_update_alt" maxlength="200" aria-required="true">
                        </div>
                        <div class="form-group field-sliders-title required">
                            <label class="control-label" for="sliders_update_title">Tiêu đề của ảnh</label>
                            <input type="text" id="sliders_update_title" class="form-control" name="sliders_update_title" maxlength="200" aria-required="true">
                        </div>
                        <input type="number" hidden name="slider_id" id="slider_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Lưu lại</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
