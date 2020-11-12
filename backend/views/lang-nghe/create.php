<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LangNghe */

$this->title = 'Tạo mới làng nghề';
$this->params['breadcrumbs'][] = ['label' => 'Danh sách làng nghề', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Tạo mới';
?>
<div class="lang-nghe-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
