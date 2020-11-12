<?php

/* @var $this yii\web\View */

$this->title = 'Trang chủ -  du lịch Hải Phòng';
?>
<div class="site-index">
    <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-1z" data-slide-to="1"></li>
            <li data-target="#carousel-example-1z" data-slide-to="2"></li>
        </ol>
        <!--/.Indicators-->
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
            <!--First slide-->
            <div class="carousel-item active">
                <div class="view h-100">
                    <img class="d-block h-100 w-lg-100" src="img/Photos/Others/city8.jpg" alt="First slide">
                    <div class="mask rgba-black-light ">
                        <!-- Caption -->
                        <div class="full-bg-img flex-center white-text">
                            <ul class="animated fadeIn col-10 list-unstyled">
                                <li>
                                    <h1 class="h1-responsive font-weight-bold">Khám phá Hải Phòng theo cách của chính bạn</h1>
                                </li>
<!--                                <li>-->
<!--                                    <p>Tempora incidunt ut labore et dolore veritatis et quasi architecto beatae</p>-->
<!--                                </li>-->
                                <li>
                                    <a target="_blank" href="https://mdbootstrap.com/docs/jquery/getting-started/download/" class="btn btn-info"
                                       rel="nofollow">Xem thêm</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.Caption -->
                    </div>
                </div>
            </div>
            <!--/First slide-->
            <!--Second slide-->
            <div class="carousel-item h-100">
                <div class="view h-100">
                    <img class="d-block h-100 w-lg-100" src="img/Photos/Others/slider1.jpg" alt="Second slide">
                    <div class="mask rgba-stylish-strong">
                        <!-- Caption -->
                        <div class="full-bg-img flex-center white-text">
                            <ul class="animated fadeIn col-10 list-unstyled">
                                <li>
                                    <h1 class="h1-responsive font-weight-bold">Khám phá Hải Phòng theo cách của chính bạn </h1>
                                </li>
<!--                                <li>-->
<!--                                    <p>Nemo enim ipsam voluptatem quia veritatis et quasi architecto beatae</p>-->
<!--                                </li>-->
                                <li>
                                    <a target="_blank" href="https://mdbootstrap.com/education/bootstrap/" class="btn btn-info" rel="nofollow"> Xem thêm</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.Caption -->
                    </div>
                </div>
            </div>
            <!--/Second slide-->
            <!--Third slide-->
            <div class="carousel-item">
                <div class="view h-100">
                    <img class="d-block h-100 w-lg-100" src="img/Photos/Others/city9.jpg" alt="Third slide">
                    <div class="mask rgba-black-light">
                        <!-- Caption -->
                        <div class="full-bg-img flex-center white-text">
                            <ul class="animated fadeIn col-md-12 list-unstyled">
                                <li>
                                    <h1 class="h1-responsive font-weight-bold">Khám phá Hải Phòng theo cách của chính bạn</h1>
                                </li>
<!--                                <li>-->
<!--                                    <p>Unde omnis iste natus sit voluptatem veritatis et quasi architecto beatae</p>-->
<!--                                </li>-->
                                <li>
                                    <a target="_blank" href="https://mdbootstrap.com/forums/forum/support/" class="btn btn-default" rel="nofollow">Xem thêm</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.Caption -->
                    </div>
                </div>
            </div>
            <!--/Third slide-->
        </div>
        <!--/.Slides-->
        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
    <main>
        <div class="container-fluid">

            <!-- Magazine -->
            <div class="row mt-5">

                <!-- Main news -->
                <div class="col-xl-8 col-md-12">

                    <!--Section: Magazine posts-->
                    <section class="section extra-margins listing-section mt-2">

                        <h4 class="font-weight-bold"><strong>LỊCH SỬ PHÁT TRIỂN</strong></h4>
                        <hr class="red title-hr">

                        <!--Grid row-->
                        <div class="row mb-4">

                            <!--Grid column-->
                            <div class="col-md-3 my-3">
                                <!--Card-->
                                <div class="card">

                                    <!--Card image-->
                                    <div class="view overlay">
                                        <img src="img/Photos/Horizontal/City/6-col/img%20(49).jpg" class="card-img-top"
                                             alt="">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!--/.Card image-->

                                    <!--Card content-->
                                    <div class="card-body">
                                        <!--Title-->
                                        <h5 class="card-title"><strong>Thời kỳ đầu cho đến thế kỷ XVI</strong></h5>
                                        <hr>
                                        <!--Text-->
                                        <p class="text-right mb-0 font-small font-weight-bold"><a href="<?=\yii\helpers\Url::toRoute(['site/bai-viet','path'=>'giai-doan-truoc-the-ky-xvi'])?>">Xem thêm <i class="fas fa-angle-right"></i></a></p>
                                    </div>
                                    <!--/.Card content-->

                                </div>
                                <!--/.Card-->

                            </div>
                            <!--Grid column-->
                            <!--Grid column-->
                            <div class="col-md-3 text-left mt-3">

                                <!--Card-->
                                <div class="card">

                                    <!--Card image-->
                                    <div class="view overlay">
                                        <img src="img/Photos/Horizontal/People/6-col/img%20(33).jpg" class="card-img-top"
                                             alt="">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!--/.Card image-->

                                    <!--Card content-->
                                    <div class="card-body">
                                        <!--Title-->
                                        <h5 class="card-title"><strong>Cuối thế kỷ XVI - cuối thế kỷ XVIII</strong></h5>
                                        <hr>
                                        <p class="text-right mb-0 font-small font-weight-bold"><a href="<?=\yii\helpers\Url::toRoute(['site/bai-viet','path'=>'giai-doan-dau-the-ky-xvi-den-cuoi-the-ky-xviii'])?>">Xem thêm <i class="fas fa-angle-right"></i></a></p>
                                    </div>
                                    <!--/.Card content-->

                                </div>
                                <!--/.Card-->
                            </div>
                            <!--Grid column-->
                            <!--Grid column-->
                            <div class="col-md-3 text-left mt-3">

                                <!--Card-->
                                <div class="card">

                                    <!--Card image-->
                                    <div class="view overlay">
                                        <img src="img/Photos/Horizontal/People/6-col/img%20(33).jpg" class="card-img-top"
                                             alt="">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!--/.Card image-->

                                    <!--Card content-->
                                    <div class="card-body">
                                        <!--Title-->
                                        <h5 class="card-title"><strong>Đầu thế kỷ XIX đến năm 1945</strong></h5>
                                        <hr>
                                        <!--Text-->
                                        <p class="text-right mb-0 font-small font-weight-bold"><a href="<?=\yii\helpers\Url::toRoute(['site/bai-viet','path'=>'dau-the-ky-xix'])?>">Xem thêm <i class="fas fa-angle-right"></i></a></p>
                                    </div>
                                    <!--/.Card content-->

                                </div>
                                <!--/.Card-->
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-3 text-left mt-3">

                                <!--Card-->
                                <div class="card">

                                    <!--Card image-->
                                    <div class="view overlay">
                                        <img src="img/Photos/Horizontal/People/6-col/img%20(84).jpg" class="card-img-top"
                                             alt="">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!--/.Card image-->

                                    <!--Card content-->
                                    <div class="card-body">
                                        <!--Title-->
                                        <h5 class="card-title"><strong>Từ năm 1945 đến ngày nay</strong></h5>
                                        <hr>
                                        <p class="text-right mb-0 font-small font-weight-bold"><a href="<?=\yii\helpers\Url::toRoute(['site/bai-viet','path'=>'tu-nam-1945-den-nay'])?>">Xem thêm <i class="fas fa-angle-right"></i></a></p>
                                    </div>
                                    <!--/.Card content-->

                                </div>
                                <!--/.Card-->
                            </div>
                            <!--Grid column-->

                        </div>
                        <!--/Grid row-->

                        <!--News card-->
                        <div class="card  mb-3 text-center hoverable">
                            <div class="card-body">
                                <!--Grid row-->
                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-5 mx-3 my-3">
                                        <!--Featured image-->
                                        <div class="view overlay">
                                            <img src="img/Photos/Others/img%20(43).jpg" class="img-fluid rounded-0"
                                                 alt="Sample image">
                                            <a>
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <!--Grid column-->

                                    <!--Grid column-->
                                    <div class="col-md-6 text-left ml-3 mt-3">
                                        <h4 class="mb-4"><strong>This is title of the news</strong></h4>
                                        <p class="dark-grey-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                            accusantium doloremque,
                                            totam rem aperiam, eaque ipsa quae ab illo inventore veritatis...</p>
                                        <p>by <a><strong>Carine Fox</strong></a>, 19/08/2016</p>
                                        <a class="btn btn-indigo btn-sm">Read more</a>
                                    </div>
                                    <!--Grid column-->
                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row mt-4">
                                    <!--Grid column-->
                                    <div class="col-md-5 mx-3 my-3">
                                        <!--Small news-->
                                        <div class="single-news">

                                            <div class="row mb-2">
                                                <div class="col-md-4">

                                                    <!--Image-->
                                                    <div class="view overlay rgba-white-slight z-depth-1 mb-2">
                                                        <img src="img/Photos/Horizontal/People/4-col/img%20(95).jpg" class="img-fluid rounded-0"
                                                             alt="Minor sample post image">
                                                        <a>
                                                            <div class="mask rgba-white-slight"></div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <!--Excerpt-->
                                                <div class="col-md-8">
                                                    <p class="font-small text-left mb-2"><strong>19/08/2016</strong></p>
                                                    <p class="text-left"><a>Title of the news
                                                            <i class="fas fa-angle-right float-right"></i>
                                                        </a></p>
                                                </div>

                                            </div>
                                        </div>
                                        <!--/Small news-->

                                        <!--Small news-->
                                        <div class="single-news">

                                            <div class="row mb-2">
                                                <div class="col-md-4">

                                                    <!--Image-->
                                                    <div class="view overlay rgba-white-slight z-depth-1 mb-2">
                                                        <img src="img/Photos/Horizontal/People/4-col/img%20(78).jpg" class="img-fluid rounded-0"
                                                             alt="Minor sample post image">
                                                        <a>
                                                            <div class="mask rgba-white-slight"></div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <!--Excerpt-->
                                                <div class="col-md-8">
                                                    <p class="font-small text-left mb-2"><strong>18/08/2016</strong></p>
                                                    <p class="text-left"><a>Title of the news
                                                            <i class="fas fa-angle-right float-right"></i>
                                                        </a></p>
                                                </div>

                                            </div>
                                        </div>
                                        <!--/Small news-->

                                        <!--Small news-->
                                        <div class="single-news">

                                            <div class="row">
                                                <div class="col-md-4">

                                                    <!--Image-->
                                                    <div class="view overlay rgba-white-slight z-depth-1 mb-2">
                                                        <img src="img/Photos/Horizontal/City/4-col/img%20(45).jpg" class="img-fluid rounded-0"
                                                             alt="Minor sample post image">
                                                        <a>
                                                            <div class="mask rgba-white-slight"></div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <!--Excerpt-->
                                                <div class="col-md-8">
                                                    <p class="font-small text-left mb-2"><strong>17/08/2016</strong></p>
                                                    <p class="text-left"><a>Title of the news
                                                            <i class="fas fa-angle-right float-right"></i>
                                                        </a></p>
                                                </div>

                                            </div>
                                        </div>
                                        <!--/Small news-->
                                    </div>
                                    <!--Grid column-->

                                    <!--Grid column-->
                                    <div class="col-md-5 mx-3 my-3">
                                        <!--Small news-->
                                        <div class="single-news">

                                            <div class="row mb-2">
                                                <div class="col-md-4">

                                                    <!--Image-->
                                                    <div class="view overlay rgba-white-slight z-depth-1 mb-2">
                                                        <img src="img/Photos/Horizontal/People/4-col/img%20(93).jpg" class="img-fluid rounded-0"
                                                             alt="Minor sample post image">
                                                        <a>
                                                            <div class="mask rgba-white-slight"></div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <!--Excerpt-->
                                                <div class="col-md-8">
                                                    <p class="font-small text-left mb-2"><strong>19/08/2016</strong></p>
                                                    <p class="text-left"><a>Title of the news
                                                            <i class="fas fa-angle-right float-right"></i>
                                                        </a></p>
                                                </div>

                                            </div>
                                        </div>
                                        <!--/Small news-->

                                        <!--Small news-->
                                        <div class="single-news">

                                            <div class="row mb-2">
                                                <div class="col-md-4">

                                                    <!--Image-->
                                                    <div class="view overlay rgba-white-slight z-depth-1 mb-2">
                                                        <img src="img/Photos/Horizontal/People/6-col/img%20(43).jpg" class="img-fluid rounded-0"
                                                             alt="Minor sample post image">
                                                        <a>
                                                            <div class="mask rgba-white-slight"></div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <!--Excerpt-->
                                                <div class="col-md-8">
                                                    <p class="font-small text-left mb-2"><strong>18/08/2016</strong></p>
                                                    <p class="text-left"><a>Title of the news
                                                            <i class="fas fa-angle-right float-right"></i>
                                                        </a></p>
                                                </div>

                                            </div>
                                        </div>
                                        <!--/Small news-->

                                        <!--Small news-->
                                        <div class="single-news">

                                            <div class="row">
                                                <div class="col-md-4">

                                                    <!--Image-->
                                                    <div class="view overlay rgba-white-slight z-depth-1 mb-2">
                                                        <img src="img/Photos/Horizontal/City/4-col/img%20(60).jpg" class="img-fluid rounded-0"
                                                             alt="Minor sample post image">
                                                        <a>
                                                            <div class="mask rgba-white-slight"></div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <!--Excerpt-->
                                                <div class="col-md-8">
                                                    <p class="font-small text-left mb-2"><strong>17/08/2016</strong></p>
                                                    <p class="text-left"><a>Title of the news
                                                            <i class="fas fa-angle-right float-right"></i>
                                                        </a></p>
                                                </div>

                                            </div>
                                        </div>
                                        <!--/Small news-->


                                    </div>
                                    <!--Grid column-->

                                </div>
                            </div>
                            <!--News card-->
                        </div>
                        <!--/Grid row-->

                        <h4 class="font-weight-bold mt-5"><strong>TOP NEWS</strong></h4>
                        <hr class="red title-hr">

                        <!--Grid row-->
                        <div class="row mb-4">

                            <!--Grid column-->
                            <div class="col-md-6 text-left mt-3">

                                <!--Card-->
                                <div class="card">

                                    <!--Card image-->
                                    <div class="view overlay">
                                        <img src="img/Photos/Horizontal/Technology/4-col/img%20(1).jpg" class="card-img-top"
                                             alt="Sample image">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!--/.Card image-->

                                    <!--Card content-->
                                    <div class="card-body">
                                        <!--Title-->
                                        <h4 class="card-title"><strong>Card title</strong></h4>
                                        <hr>
                                        <!--Text-->
                                        <p class="card-text mb-3">Some quick example text to build on the card title and make up the bulk
                                            of the card's
                                            content.
                                        </p>
                                        <p class="font-small font-weight-bold dark-grey-text mb-1"><i class="far fa-clock-o"></i>
                                            27/08/2017</p>
                                        <p class="font-small grey-text mb-0">Anna Smith</p>
                                        <p class="text-right mb-0 font-small font-weight-bold"><a>read more <i class="fas fa-angle-right"></i></a></p>
                                    </div>
                                    <!--/.Card content-->

                                </div>
                                <!--/.Card-->
                            </div>
                            <!--Grid column-->


                            <!--Grid column-->
                            <div class="col-md-6 text-left mt-3">

                                <!--Card-->
                                <div class="card">

                                    <!--Card image-->
                                    <div class="view overlay">
                                        <img src="img/Photos/Horizontal/Technology/4-col/img%20(4).jpg" class="card-img-top"
                                             alt="Sample image">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!--/.Card image-->

                                    <!--Card content-->
                                    <div class="card-body">
                                        <!--Title-->
                                        <h4 class="card-title"><strong>Card title</strong></h4>
                                        <hr>
                                        <!--Text-->
                                        <p class="card-text mb-3">Some quick example text to build on the card title and make up the bulk
                                            of the card's
                                            content.
                                        </p>
                                        <p class="font-small font-weight-bold dark-grey-text mb-1"><i class="far fa-clock-o"></i>
                                            27/08/2017</p>
                                        <p class="font-small grey-text mb-0">Anna Smith</p>
                                        <p class="text-right mb-0 font-small font-weight-bold"><a>read more <i class="fas fa-angle-right"></i></a></p>
                                    </div>
                                    <!--/.Card content-->

                                </div>
                                <!--/.Card-->
                            </div>
                            <!--Grid column-->

                        </div>
                        <!--/Grid row-->

                        <h4 class="font-weight-bold mt-5"><strong>SPORT</strong></h4>
                        <hr class="red title-hr">

                        <!--Grid row-->
                        <div class="row mb-4">

                            <!--Grid column-->
                            <div class="col-md-4 my-3">
                                <!--Card-->
                                <div class="card">

                                    <!--Card image-->
                                    <div class="view overlay">
                                        <img src="img/Photos/Horizontal/Sport/6-col/img%20(1).jpg" class="card-img-top"
                                             alt="Sample image">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!--/.Card image-->

                                    <!--Card content-->
                                    <div class="card-body">
                                        <!--Title-->
                                        <h4 class="card-title"><strong>Card title</strong></h4>
                                        <hr>
                                        <!--Text-->
                                        <p class="card-text mb-3">Some quick example text to build on the card title and make up the bulk
                                            of the card's
                                            content.
                                        </p>
                                        <p class="font-small font-weight-bold dark-grey-text mb-1"><i class="far fa-clock-o"></i>
                                            27/08/2017</p>
                                        <p class="font-small grey-text mb-0">Anna Smith</p>
                                        <p class="text-right mb-0 font-small font-weight-bold"><a>read more <i class="fas fa-angle-right"></i></a></p>
                                    </div>
                                    <!--/.Card content-->

                                </div>
                                <!--/.Card-->

                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-4 text-left mt-3">

                                <!--Card-->
                                <div class="card">

                                    <!--Card image-->
                                    <div class="view overlay">
                                        <img src="img/Photos/Horizontal/Sport/6-col/img%20(2).jpg" class="card-img-top"
                                             alt="Sample image">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!--/.Card image-->

                                    <!--Card content-->
                                    <div class="card-body">
                                        <!--Title-->
                                        <h4 class="card-title"><strong>Card title</strong></h4>
                                        <hr>
                                        <!--Text-->
                                        <p class="card-text mb-3">Some quick example text to build on the card title and make up the bulk
                                            of the card's
                                            content.
                                        </p>
                                        <p class="font-small font-weight-bold dark-grey-text mb-1"><i class="far fa-clock-o"></i>
                                            27/08/2017</p>
                                        <p class="font-small grey-text mb-0">Anna Smith</p>
                                        <p class="text-right mb-0 font-small font-weight-bold"><a>read more <i class="fas fa-angle-right"></i></a></p>
                                    </div>
                                    <!--/.Card content-->

                                </div>
                                <!--/.Card-->
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-4 text-left mt-3">

                                <!--Card-->
                                <div class="card">

                                    <!--Card image-->
                                    <div class="view overlay">
                                        <img src="img/Photos/Horizontal/Sport/6-col/img%20(3).jpg" class="card-img-top"
                                             alt="Sample image">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!--/.Card image-->

                                    <!--Card content-->
                                    <div class="card-body">
                                        <!--Title-->
                                        <h4 class="card-title"><strong>Card title</strong></h4>
                                        <hr>
                                        <!--Text-->
                                        <p class="card-text mb-3">Some quick example text to build on the card title and make up the bulk
                                            of the card's
                                            content.
                                        </p>
                                        <p class="font-small font-weight-bold dark-grey-text mb-1"><i class="far fa-clock-o"></i>
                                            27/08/2017</p>
                                        <p class="font-small grey-text mb-0">Anna Smith</p>
                                        <p class="text-right mb-0 font-small font-weight-bold"><a>read more <i class="fas fa-angle-right"></i></a></p>
                                    </div>
                                    <!--/.Card content-->

                                </div>
                                <!--/.Card-->
                            </div>
                            <!--Grid column-->

                        </div>
                        <!--/Grid row-->

                        <h4 class="font-weight-bold mt-5"><strong>LIFESTYLE</strong></h4>
                        <hr class="red title-hr">

                        <!--Grid row-->
                        <div class="row single-post mb-4">

                            <!--Grid column-->
                            <div class="col-md-6 text-left mt-3">

                                <!--Card-->
                                <div class="card">

                                    <!--Card image-->
                                    <div class="view overlay">
                                        <img src="img/Photos/Horizontal/Work/6-col/img%20(12).jpg" class="card-img-top"
                                             alt="Sample image">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!--/.Card image-->

                                    <!--Card content-->
                                    <div class="card-body">
                                        <!--Title-->
                                        <h4 class="card-title"><strong>Card title</strong></h4>
                                        <hr>
                                        <!--Text-->
                                        <p class="card-text mb-3">Some quick example text to build on the card title and make up the bulk
                                            of the card's
                                            content.
                                        </p>
                                        <p class="font-small font-weight-bold dark-grey-text mb-1"><i class="far fa-clock-o"></i>
                                            27/08/2017</p>
                                        <p class="font-small grey-text mb-0">Anna Smith</p>
                                        <p class="text-right mb-0 font-small font-weight-bold"><a>read more <i class="fas fa-angle-right"></i></a></p>
                                    </div>
                                    <!--/.Card content-->

                                </div>
                                <!--/.Card-->
                            </div>
                            <!--Grid column-->


                            <!--Grid column-->
                            <div class="col-md-6 text-left mt-3">

                                <!--Card-->
                                <div class="card">

                                    <!--Card image-->
                                    <div class="view overlay">
                                        <img src="img/Photos/Horizontal/Architecture/4-col/img%20(3).jpg" class="card-img-top"
                                             alt="sample image">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!--/.Card image-->

                                    <!--Card content-->
                                    <div class="card-body">
                                        <!--Title-->
                                        <h4 class="card-title"><strong>Card title</strong></h4>
                                        <hr>
                                        <!--Text-->
                                        <p class="card-text mb-3">Some quick example text to build on the card title and make up the bulk
                                            of the card's
                                            content.
                                        </p>
                                        <p class="font-small font-weight-bold dark-grey-text mb-1"><i class="far fa-clock-o"></i>
                                            27/08/2017</p>
                                        <p class="font-small grey-text mb-0">Anna Smith</p>
                                        <p class="text-right mb-0 font-small font-weight-bold"><a>read more <i class="fas fa-angle-right"></i></a></p>
                                    </div>
                                    <!--/.Card content-->

                                </div>
                                <!--/.Card-->
                            </div>
                            <!--Grid column-->

                        </div>
                        <!--/Grid row-->

                    </section>
                    <!--/Section: Magazine posts-->

                    <!--Pagination dark-->
                    <nav>
                        <ul class="pagination pg-dark flex-center pt-4">
                            <!--Arrow left-->
                            <li class="page-item">
                                <a class="page-link" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>

                            <!--Numbers-->
                            <li class="page-item active"><a class="page-link">1</a></li>
                            <li class="page-item"><a class="page-link">2</a></li>
                            <li class="page-item"><a class="page-link">3</a></li>
                            <li class="page-item"><a class="page-link">4</a></li>
                            <li class="page-item"><a class="page-link">5</a></li>

                            <!--Arrow right-->
                            <li class="page-item">
                                <a class="page-link" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!--/Pagination dark grey-->

                </div>
                <!--/ Main news -->

                <!-- Sidebar -->
                <div class="col-xl-4 col-md-12 widget-column mt-0">

                    <!-- Section: Categories -->
                    <section class="section mb-5">

                        <h4 class="font-weight-bold mt-2"><strong>CATEGORIES</strong></h4>
                        <hr class="red title-hr">

                        <ul class="list-group z-depth-1 mt-4">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a>Business</a>
                                <span class="badge badge-danger badge-pill">4</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a>Entertainment</a>
                                <span class="badge badge-danger badge-pill">2</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a>Health</a>
                                <span class="badge badge-danger badge-pill">1</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a>Lifestyle</a>
                                <span class="badge badge-danger badge-pill">2</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a>Photography</a>
                                <span class="badge badge-danger badge-pill">1</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a>Technology</a>
                                <span class="badge badge-danger badge-pill">2</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a>Sport</a>
                                <span class="badge badge-danger badge-pill">5</span>
                            </li>
                        </ul>
                    </section>
                    <!-- Section: Categories -->

                    <h4 class="font-weight-bold"><strong>POPULAR POSTS</strong></h4>
                    <hr class="red title-hr mb-4">

                    <!--Carousel Wrapper-->
                    <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
                        <!--Indicators-->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-2" data-slide-to="1"></li>
                            <li data-target="#carousel-example-2" data-slide-to="2"></li>
                        </ol>
                        <!--/.Indicators-->
                        <!--Slides-->
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <div class="view">
                                    <img class="d-block w-100" src="img/Photos/Others/images/7.jpg" alt="First slide">
                                    <div class="mask rgba-black-light"></div>
                                </div>
                                <div class="carousel-caption">
                                    <h3 class="h3-responsive font-weight-bold">This is news</h3>
                                    <p>First text</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <!--Mask color-->
                                <div class="view">
                                    <img class="d-block w-100" src="img/Photos/Others/images/5.jpg" alt="Second slide">
                                    <div class="mask rgba-black-light"></div>
                                </div>
                                <div class="carousel-caption">
                                    <h3 class="h3-responsive font-weight-bold">This is news</h3>
                                    <p>Secondary text</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <!--Mask color-->
                                <div class="view">
                                    <img class="d-block w-100" src="img/Photos/Others/images/6.jpg" alt="Third slide">
                                    <div class="mask rgba-black-light"></div>
                                </div>
                                <div class="carousel-caption">
                                    <h3 class="h3-responsive font-weight-bold">This is news</h3>
                                    <p>Third text</p>
                                </div>
                            </div>
                        </div>
                        <!--/.Slides-->

                        <!--Controls-->
                        <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <!--/.Controls-->
                    </div>
                    <!--/.Carousel Wrapper-->


                    <!-- Section: Advertisment -->
                    <section class="section mt-5">

                        <h6 class="grey-text text-center mb-3"><strong>- Advertisment -</strong></h6>

                        <!--Jumbotron-->
                        <div class="jumbotron text-center">

                            <!--Title-->
                            <h1 class="card-title h2-responsive mt-2"><strong>Material Design for Bootstrap</strong></h1>
                            <!--Subtitle-->
                            <p class="blue-text mb-4 mt-5 font-weight-bold">Powerful and free Material Design UI KIT</p>

                            <!--Text-->
                            <div class="d-flex justify-content-center">
                                <p class="card-text mb-1" style="max-width: 43rem;">Sed ut perspiciatis unde omnis iste natus sit
                                    voluptatem accusantium doloremque laudantium,
                                    totam rem aperiam.
                                </p>
                            </div>

                            <hr class="my-4">

                            <button type="button" class="btn btn-primary btn-sm waves-effect">Buy now <span class="far fa-gem ml-1"></span></button>
                            <button type="button" class="btn btn-outline-primary btn-sm waves-effect">Download <i class="fas fa-download ml-1"></i></button>

                        </div>
                        <!--Jumbotron-->

                    </section>
                    <!--/ Section: Advertisment -->

                    <!-- Section: Newsletter -->
                    <section class="section mt-5">
                        <h4 class="font-weight-bold"><strong>NEWSLETTER</strong></h4>
                        <hr class="red title-hr mb-4">

                        <!-- Newsletter -->
                        <div class="card z-depth-1 widget-spacing mt-0">
                            <div class="card-body">

                                <!-- Header -->
                                <div class="text-center">
                                    <h4>Subscribe:</h4>
                                    <hr class="mt-2">
                                </div>

                                <!-- Body -->
                                <p class="font-small text-center">We'll write rarely, but only the best content.</p>

                                <!-- Body -->
                                <div class="md-form">
                                    <i class="fas fa-user prefix grey-text"></i>
                                    <input type="text" id="form3" class="form-control">
                                    <label for="form3">Your name</label>
                                </div>

                                <div class="md-form">
                                    <i class="fas fa-envelope prefix grey-text"></i>
                                    <input type="text" id="form2" class="form-control">
                                    <label for="form2">Your email</label>
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-primary">Send</button>
                                </div>

                            </div>
                        </div>

                    </section>
                    <!--/ Section: Newsletter -->

                    <!-- Section: Gallery -->
                    <section class="section sidebar-imgs mb-5">

                        <h4 class="font-weight-bold"><strong>GALLERY</strong></h4>
                        <hr class="red title-hr">

                        <!--Grid row-->

                        <div class="row">
                            <div class="col-md-12">

                                <div id="mdb-lightbox-ui"></div>

                                <div class="mdb-lightbox">

                                    <figure class="col-md-4 px-1 py-1">
                                        <a href="img/Photos/Horizontal/Nature/12-col/img%20(10).jpg" data-size="1600x1067">
                                            <img src="img/Photos/Horizontal/Nature/4-col/img%20(10).jpg" class="img-fluid"
                                                 alt="sample image">
                                        </a>
                                    </figure>

                                    <figure class="col-md-4 px-1 py-1">
                                        <a href="img/Photos/Horizontal/Nature/12-col/img%20(98).jpg" data-size="1600x1067">
                                            <img src="img/Photos/Horizontal/Nature/4-col/img%20(98).jpg" class="img-fluid"
                                                 alt="sample image" />
                                        </a>
                                    </figure>

                                    <figure class="col-md-4 px-1 py-1">
                                        <a href="img/Photos/Horizontal/Nature/12-col/img%20(131).jpg" data-size="1600x1067">
                                            <img src="img/Photos/Horizontal/Nature/4-col/img%20(131).jpg" class="img-fluid"
                                                 alt="sample image" />
                                        </a>
                                    </figure>

                                    <figure class="col-md-4 px-1 py-1">
                                        <a href="img/Photos/Horizontal/City/12-col/img%20(4).jpg" data-size="1600x1067">
                                            <img src="img/Photos/Horizontal/City/4-col/img%20(4).jpg" class="img-fluid"
                                                 alt="sample image" />
                                        </a>
                                    </figure>

                                    <figure class="col-md-4 px-1 py-1">
                                        <a href="img/Photos/Horizontal/City/12-col/img%20(51).jpg" data-size="1600x1067">
                                            <img src="img/Photos/Horizontal/City/4-col/img%20(51).jpg" class="img-fluid"
                                                 alt="sample image" />
                                        </a>
                                    </figure>

                                    <figure class="col-md-4 px-1 py-1">
                                        <a href="img/Photos/Horizontal/Nature/12-col/img%20(128).jpg" data-size="1600x1067">
                                            <img src="img/Photos/Horizontal/Nature/4-col/img%20(128).jpg" class="img-fluid"
                                                 alt="sample image" />
                                        </a>
                                    </figure>

                                    <figure class="col-md-4 px-1 py-1">
                                        <a href="img/Photos/Horizontal/People/12-col/img%20(49).jpg" data-size="1600x1067">
                                            <img src="img/Photos/Horizontal/People/4-col/img%20(49).jpg" class="img-fluid"
                                                 alt="sample image" />
                                        </a>
                                    </figure>

                                    <figure class="col-md-4 px-1 py-1">
                                        <a href="img/Photos/Horizontal/Nature/12-col/img%20(115).jpg" data-size="1600x1067">
                                            <img src="img/Photos/Horizontal/Nature/4-col/img%20(115).jpg" class="img-fluid"
                                                 alt="sample image" />
                                        </a>
                                    </figure>

                                    <figure class="col-md-4 px-1 py-1">
                                        <a href="img/Photos/Horizontal/People/12-col/img%20(15).jpg" data-size="1600x1067">
                                            <img src="img/Photos/Horizontal/People/4-col/img%20(15).jpg" class="img-fluid"
                                                 alt="sample image" />
                                        </a>
                                    </figure>

                                </div>

                            </div>

                        </div>
                        <!--Grid row-->

                    </section>
                    <!--/ Section: Gallery -->

                    <!-- Section: Featured posts -->
                    <section class="section widget-content">
                        <!-- Heading -->
                        <h4 class="font-weight-bold pt-2"><strong>FEATURED POSTS</strong></h4>
                        <hr class="red title-hr mb-4">

                        <!--/ Card -->
                        <div class="card card-body pb-0">
                            <div class="single-post">

                                <!-- Grid row -->
                                <div class="row">
                                    <div class="col-4">

                                        <!-- Image -->
                                        <div class="view overlay">
                                            <img src="img/Photos/Horizontal/People/4-col/img%20(121).jpg" class="img-fluid rounded-0"
                                                 alt="sample image">
                                            <a>
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Excerpt -->
                                    <div class="col-8">
                                        <h6 class="mt-0 mb-3"><a><strong>This is title of the news</strong></a></h6>

                                        <div class="post-data">
                                            <p class="font-small grey-text mb-0"><i class="far fa-clock-o"></i> 18/08/2017</p>
                                        </div>
                                    </div>
                                    <!--/ Excerpt -->
                                </div>
                                <!--/ Grid row -->
                            </div>

                            <div class="single-post">
                                <!-- Grid row -->
                                <div class="row">
                                    <!-- Image -->
                                    <div class="col-4">
                                        <div class="view overlay">
                                            <img src="img/Photos/Horizontal/City/4-col/img%20(30).jpg" class="img-fluid rounded-0"
                                                 alt="sample image">
                                            <a>
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <!--/ Image -->

                                    <!-- Excerpt -->
                                    <div class="col-8">
                                        <h6 class="mt-0 mb-3"><a><strong>This is title of the news</strong></a></h6>

                                        <div class="post-data">
                                            <p class="font-small grey-text mb-0"><i class="far fa-clock-o"></i> 21/08/2017</p>
                                        </div>
                                    </div>
                                    <!--/ Excerpt -->
                                </div>
                                <!--/ Grid row -->
                            </div>

                            <div class="single-post">
                                <!-- Grid row -->
                                <div class="row">
                                    <!-- Image -->
                                    <div class="col-4">
                                        <div class="view overlay">
                                            <img src="img/Photos/Horizontal/People/4-col/img%20(118).jpg" class="img-fluid rounded-0"
                                                 alt="sample image">
                                            <a>
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <!--/ Image -->

                                    <!-- Excerpt -->
                                    <div class="col-8">
                                        <h6 class="mt-0 mb-3"><a><strong>This is title of the news</strong></a></h6>

                                        <div class="post-data">
                                            <p class="font-small grey-text mb-0"><i class="far fa-clock-o"></i> 27/08/2017</p>
                                        </div>

                                    </div>
                                    <!--/ Excerpt -->
                                </div>
                                <!--/ Grid row -->
                            </div>

                            <div class="single-post">
                                <!-- Grid row -->
                                <div class="row">
                                    <!-- Image -->
                                    <div class="col-4">
                                        <div class="view overlay">
                                            <img src="img/Photos/Horizontal/People/4-col/img%20(124).jpg" class="img-fluid rounded-0"
                                                 alt="sample image">
                                            <a>
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <!--/ Image -->

                                    <!-- Excerpt -->
                                    <div class="col-8">
                                        <h6 class="mt-0 mb-3"><a><strong>This is title of the news</strong></a></h6>

                                        <div class="post-data">
                                            <p class="font-small grey-text mb-0"><i class="far fa-clock-o"></i> 15/09/2017</p>
                                        </div>

                                    </div>
                                    <!--/ Excerpt -->
                                </div>
                                <!--/ Grid row -->
                            </div>

                            <div class="single-post mb-0">
                                <!-- Grid row -->
                                <div class="row">
                                    <!-- Image -->
                                    <div class="col-4">
                                        <div class="view overlay">
                                            <img src="img/Photos/Horizontal/People/4-col/img%20(85).jpg" class="img-fluid rounded-0"
                                                 alt="sample image">
                                            <a>
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <!--/ Image -->

                                    <!-- Excerpt -->
                                    <div class="col-8">
                                        <h6 class="mt-0  mb-3"><a><strong>This is title of the news</strong></a></h6>

                                        <div class="post-data">
                                            <p class="font-small grey-text mb-0"><i class="far fa-clock-o"></i> 21/08/2018</p>
                                        </div>
                                    </div>
                                    <!--/ Excerpt -->
                                </div>
                                <!--/ Grid row -->
                            </div>
                        </div>
                    </section>
                    <!--/ Section: Featured posts -->
                </div>
                <!--/ Sidebar -->
            </div>
            <!--/ Magazine -->
        </div>
    </main>
</div>
