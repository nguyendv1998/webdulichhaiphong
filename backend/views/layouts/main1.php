<?php

/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;

$bundle = yiister\gentelella\assets\Asset::register($this);
if (class_exists('yii\debug\Module')) {
    $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
}
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <link rel="shortcut icon" href="../images/app.png" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?=Yii::$app->request->baseUrl?>/js/html5shiv.min.js"></script>
    <script src="<?=Yii::$app->request->baseUrl?>/js/respond.min.js"></script>

    <![endif]-->
    <?php
    $this->registerJsFile(Yii::$app->request->baseUrl."/js/select2.min.js",['depends' => [\yii\web\JqueryAsset::className()]]);
    $this->registerCssFile(Yii::$app->request->baseUrl."/css/select2.min.css");
    $this->registerCssFile(Yii::$app->request->baseUrl."/css/mybackend.css");
    $this->registerJsFile(Yii::$app->request->baseUrl."/js/showbutton_slider.js?",['depends' => [\yii\web\JqueryAsset::className()]]);
    $this->registerJsFile(Yii::$app->request->baseUrl."/js/select2_custom.js?",['depends' => [\yii\web\JqueryAsset::className()]]);
    ?>
</head>
<body class="nav-<?= !empty($_COOKIE['menuIsCollapsed']) && $_COOKIE['menuIsCollapsed'] == 'true' ? 'sm' : 'md' ?>" >
<?php $this->beginBody(); ?>
<?php
    $items=[];
    if(!yii::$app->user->isGuest){
        if(\common\models\API_H17::isReporter()){
            $items=[["label" => "Trang chủ", "url" => ['site/index'], "icon" => "home"],
                ["label" => "Bài viết", "url" => ["bai-viet/index"], "icon" => "newspaper-o"],
                ["label" => "Sliders", "url" => ["sliders/index"], "icon" => "picture-o"],
                ["label" => "FAQ", "url" => ["faq/index"], "icon" => "question-circle"],
                ["label" => "Nhân vật lịch sử", "url" => ["nhan-vat-lich-su/index"], "icon" => "user-circle-o"],
                ["label" => "Làng nghề", "url" => ["lang-nghe/index"], "icon" => "map"],
                ["label" => "Lễ hội", "url" => ["le-hoi/index"], "icon" => "map-pin"],
                ["label" => "Địa danh", "url" => ["dia-danh/index"], "icon" => "location-arrow"]];
        }
        if(\common\models\API_H17::isAdmin()){
            $items[]=[
                "label" => "Cấu hình",
                "icon" => "th",
                "url" => "#",
                "items" => [
                    ["label" => "Quận huyện", "url" => ["quan-huyen/index"], "icon" => "globe"],
                    ["label" => "Danh mục", "url" => ["danh-muc/index"], "icon" => "clone"],
                    ["label" => "Loại di tích", "url" => ["loai-di-tich/index"], "icon" => "close"],
                    ["label" => "Cấp công nhận", "url" => ["cap-cong-nhan/index"], "icon" => "bars"],
                    ["label" => "Người dùng", "url" => ["user/index"], "icon" => "user"],
                ],
            ];
        }
    }
?>
<div class="container body">

    <div class="main_container">

        <div class="col-md-3 left_col navbar-fixed-top sticky-top">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href="<?=\yii\helpers\Url::toRoute(['site/index'])?>" class="site_title"><i class="fa fa-paw"></i> <span>Du lịch hải phòng!</span></a>
                </div>
                <div class="clearfix"></div>

                <!-- menu prile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="../images/app.png" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <?php if(!yii::$app->user->getIsGuest()):?>
                            <span>Chào mừng,</span>
                            <h2><?=\common\models\User::findOne(yii::$app->user->identity->getId())->TenNguoiDung ?></h2>
                        <?php endif;?>
                    </div>
                </div>
                <!-- /menu prile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <hr>
                        <h3>Quản lý</h3>
                        <?=
                        \yiister\gentelella\widgets\Menu::widget(
                            [
                                "items" => $items
                            ]
                        )
                        ?>
                    </div>

                </div>
                <!-- /sidebar menu -->

<!--                 /menu footer buttons -->
<!--                <div class="sidebar-footer hidden-small">-->
<!--                    <a data-toggle="tooltip" data-placement="top" title="Settings">-->
<!--                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>-->
<!--                    </a>-->
<!--                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">-->
<!--                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>-->
<!--                    </a>-->
<!--                    <a data-toggle="tooltip" data-placement="top" title="Lock">-->
<!--                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>-->
<!--                    </a>-->
<!--                    <a data-toggle="tooltip" data-placement="top" title="Logout">-->
<!--                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>-->
<!--                    </a>-->
<!--                </div>-->
<!--                 /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <?php if(!yii::$app->user->getIsGuest()):?>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="../images/app.png" alt=""><?=\common\models\User::findOne(yii::$app->user->identity->getId())->TenNguoiDung ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
<!--                                    <li><a href="javascript:;">  Profile</a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="javascript:;">-->
<!--                                            <span class="badge bg-red pull-right">50%</span>-->
<!--                                            <span>Settings</span>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="javascript:;">Help</a>-->
<!--                                    </li>-->
                                    <li><?= Html::a('<i class="fa fa-sign-out pull-right"></i> Đăng xuất', ['site/logout'], ['data' => ['method' => 'post']]) ?></li>
                                </ul>
                            </li>

<!--                            <li role="presentation" class="dropdown">-->
<!--                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">-->
<!--                                    <i class="fa fa-envelope-o"></i>-->
<!--                                    <span class="badge bg-green">6</span>-->
<!--                                </a>-->
<!--                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">-->
<!--                                    <li>-->
<!--                                        <a>-->
<!--                      <span class="image">-->
<!--                                        <img src="http://placehold.it/128x128" alt="Profile Image" />-->
<!--                                    </span>-->
<!--                                            <span>-->
<!--                                        <span>John Smith</span>-->
<!--                      <span class="time">3 mins ago</span>-->
<!--                      </span>-->
<!--                                            <span class="message">-->
<!--                                        Film festivals used to be do-or-die moments for movie makers. They were where...-->
<!--                                    </span>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a>-->
<!--                      <span class="image">-->
<!--                                        <img src="http://placehold.it/128x128" alt="Profile Image" />-->
<!--                                    </span>-->
<!--                                            <span>-->
<!--                                        <span>John Smith</span>-->
<!--                      <span class="time">3 mins ago</span>-->
<!--                      </span>-->
<!--                                            <span class="message">-->
<!--                                        Film festivals used to be do-or-die moments for movie makers. They were where...-->
<!--                                    </span>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a>-->
<!--                      <span class="image">-->
<!--                                        <img src="http://placehold.it/128x128" alt="Profile Image" />-->
<!--                                    </span>-->
<!--                                            <span>-->
<!--                                        <span>John Smith</span>-->
<!--                      <span class="time">3 mins ago</span>-->
<!--                      </span>-->
<!--                                            <span class="message">-->
<!--                                        Film festivals used to be do-or-die moments for movie makers. They were where...-->
<!--                                    </span>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a>-->
<!--                      <span class="image">-->
<!--                                        <img src="http://placehold.it/128x128" alt="Profile Image" />-->
<!--                                    </span>-->
<!--                                            <span>-->
<!--                                        <span>John Smith</span>-->
<!--                      <span class="time">3 mins ago</span>-->
<!--                      </span>-->
<!--                                            <span class="message">-->
<!--                                        Film festivals used to be do-or-die moments for movie makers. They were where...-->
<!--                                    </span>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <div class="text-center">-->
<!--                                            <a href="/">-->
<!--                                                <strong>See All Alerts</strong>-->
<!--                                                <i class="fa fa-angle-right"></i>-->
<!--                                            </a>-->
<!--                                        </div>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </li>-->

                        </ul>
                    <?php endif;?>

                </nav>
            </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?php if (isset($this->params['h1'])): ?>
                <div class="page-title">
                    <div class="title_left">
                        <h1><?= $this->params['h1'] ?></h1>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="clearfix"></div>
            <?= \yii\widgets\Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= \common\widgets\Alert::widget() ?>
            <div class="my_content"><?= $content ?></div>
            <div style="display: block; min-height: 200px;></div>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer  ">
<!--            <div class="pull-right">-->
<!--                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com" rel="nofollow" target="_blank">Colorlib</a><br />-->
<!--                Extension for Yii framework 2 by <a href="http://yiister.ru" rel="nofollow" target="_blank">Yiister</a>-->
<!--            </div>-->
<!--            <div class="clearfix"></div>-->
        </footer>
        <!-- /footer content -->
    </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<!-- /footer content -->
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
