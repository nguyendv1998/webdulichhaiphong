<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="shortcut icon" href="images/app.png" />
</head>
<body class="fixed-sn homepage-v3">
<?php $this->beginBody() ?>

<!-- Navigation -->
<header>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar stylish-color-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="images/app.png" alt="" width="60px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                <ul class="navbar-nav mr-auto">
                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" id="navbarDropdownMenuLink0" href="<?=\yii\helpers\Url::toRoute(['site/index'])?>" aria-expanded="false">Trang chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tổng quan</a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?=\yii\helpers\Url::toRoute(['site/danh-muc','path'=>'lich-su-phat-trien'])?>">Lịch sử phát triển</a>
                            <a class="dropdown-item" href="<?=\yii\helpers\Url::toRoute(['site/danh-muc','path'=>'danh-nhan-van-hoa'])?>">Danh nhân</a>
                            <a class="dropdown-item" href="<?=\yii\helpers\Url::toRoute(['site/danh-muc','path'=>'lang-nghe'])?>">Làng nghề</a>
                            <a class="dropdown-item" href="<?=\yii\helpers\Url::toRoute(['site/danh-muc','path'=>'le-hoi'])?>">Lễ hội</a>
                        </div>
                    </li>

                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Điểm đến</a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?=\yii\helpers\Url::toRoute(['site/danh-muc','path'=>'dinh-den-chua'])?>">Đình - Đền - Chùa</a>
                            <a class="dropdown-item" href="<?=\yii\helpers\Url::toRoute(['site/danh-muc','path'=>'di-tich'])?>">Di tích</a>
                            <a class="dropdown-item" href="<?=\yii\helpers\Url::toRoute(['site/danh-muc','path'=>'vinh-dao-hang-dong'])?>">Vịnh - Đảo - Hang động</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bản đồ du lịch</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=\yii\helpers\Url::toRoute(['site/faq'])?>"  aria-expanded="false">Hỏi đáp</a>
                    </li>
                </ul>
                <div style="display: block; margin: 20px"></div>
                <!-- Search form -->
                <form class="form-inline">
                    <div class="md-form my-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Tìm kiếm   " aria-label="Search">
                    </div>
                </form>
                <div class="dropdown">
                    <i class="fa fa-user" style="color: #cccccc" type="button" data-toggle="dropdown"></i>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <?php if(Yii::$app->user->isGuest){?>
                            <li class="nav-item"><a class="nav-link" href="<?=\yii\helpers\Url::toRoute(['site/login'])?>">Đăng nhập</a></li>
                        <?php }  else { ?>
                            <li class="nav-item"><?= Html::a('<i class="fa fa-sign-out"></i> Đăng xuất', ['site/logout'], ['data' => ['method' => 'post']]) ?></li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

</header>
<!--/ Navigation -->

<?= $content ?>



<footer class="page-footer stylish-color-dark mt-4 pt-4">

    <!--Footer Links-->
    <div class="container-fluid">

        <!-- Footer links -->
        <div class="row text-center text-md-left mt-3 pb-3">

            <!--Grid column-->
            <div class="col-md-3 col-lg-3 col-xl-3 mr-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">Company name</h6>
                <p>Here you can use rows and columns here to organize your footer content. Lorem ipsum dolor sit amet,
                    consectetur
                    adipisicing elit.</p>
            </div>
            <!--/.Grid column-->

            <hr class="w-100 clearfix d-md-none">

            <!--Grid column-->
            <div class="col-md-2 col-lg-2 col-xl-2 mr-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
                <p>
                    <a href="#!">MDBootstrap</a>
                </p>
                <p>
                    <a href="#!">MDWordPress</a>
                </p>
                <p>
                    <a href="#!">BrandFlow</a>
                </p>
                <p>
                    <a href="#!">Bootstrap Angular</a>
                </p>
            </div>
            <!--/.Grid column-->

            <hr class="w-100 clearfix d-md-none">

            <!--Grid column-->
            <div class="col-md-3 col-lg-2 col-xl-2 mr-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">Useful links</h6>
                <p>
                    <a href="#!">Your Account</a>
                </p>
                <p>
                    <a href="#!">Become an Affiliate</a>
                </p>
                <p>
                    <a href="#!">Shipping Rates</a>
                </p>
                <p>
                    <a href="#!">Help</a>
                </p>
            </div>
            <!--/.Third column-->

            <hr class="w-100 clearfix d-md-none">

            <!--Grid column-->
            <div class="col-md-4 col-lg-3 col-xl-3 mr-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                <p>
                    <i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                <p>
                    <i class="fas fa-envelope mr-3"></i> info@example.com</p>
                <p>
                    <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                <p>
                    <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
            </div>
            <!--/.Grid column-->

        </div>
        <!-- Footer links -->

        <hr>

        <div class="row py-3 d-flex align-items-center">

            <!--Grid column-->
            <div class="col-md-7 col-lg-8">

                <!--Copyright-->
                <p class="text-center text-md-left grey-text">
                    © 2019 Copyright: <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> MDBootstrap.com
                    </a>
                </p>
                <!--/.Copyright-->

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-5 col-lg-4 ml-lg-0">

                <!--Social buttons-->
                <div class="social-section text-center mr-auto text-md-left">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight">
                                <i class="fab fa-google-plus-g"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--/.Social buttons-->

            </div>
            <!--Grid column-->

        </div>

    </div>

</footer>
<?php $this->endBody() ?>
<!--<script>-->
<!--    // MDB Lightbox Init-->
<!--    $(function () {-->
<!--        $("#mdb-lightbox-ui").load("https://mdbootstrap.com/previews/templates/magazine/mdb-addons/mdb-lightbox-ui.html");-->
<!--    });-->
<!---->
<!--</script>-->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0" nonce="N1OzaqK9"></script>
</body>

</html>
<?php $this->endPage() ?>
