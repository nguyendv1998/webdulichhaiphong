<?php
/* @var $this yii\web\View */
/* @var $faqs \common\models\Faq[] */
/* @var $baiviets \common\models\BaiViet[] */
/* @var $tukhoas \common\models\TuKhoa[] */
/* @var $count_baiviet integer */

use yii\helpers\Html;

$this->title = 'Hỏi đáp';

?>
<main>
    <div class="container-fluid">

        <!-- Magazine -->
        <div class="row mt-2">

            <!-- Main news -->
            <div class="col-xl-8 col-md-12">

                <!-- Post -->
                <div class="row mt-2 mb-5 pb-3 mx-2">

                    <!--Card-->
                    <div class="card card-body mb-5">


                        <!--Title-->
                        <h2 class="font-weight-bold mt-3">
                            Hỏi đáp
                        </h2>
                        <hr class="red title-hr">


                        <!--Grid row-->
                        <div class="row">
                            <!--Accordion wrapper-->
                            <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="false">

                                <!-- Accordion card -->
                                <?php foreach ($faqs as $key=>$faq):?>
                                    <div class="card">

                                        <!-- Card header -->
                                        <div class="card-header" role="tab" id="heading<?=$key?>">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapse<?=$key?>"
                                               aria-expanded="<?=$key==0?'True':'False'?>" aria-controls="collapseThree3">
                                                <h5 class="mb-0">
                                                    <?=$faq->TenCauHoi?>
                                                </h5>
                                            </a>
                                        </div>

                                        <!-- Card body -->
                                        <div id="collapse<?=$key?>" class="collapse" role="tabpanel" aria-labelledby="heading<?=$key?>" data-parent="#accordionEx">
                                            <div class="card-body">
                                                <?=$faq->NoiDungTraLoi?>
                                            </div>
                                        </div>

                                    </div>
                                <?php endforeach;?>
                            </div>
                            <!-- Accordion wrapper -->

                        </div>
                        <!--Grid row-->
                        <!--Grid row-->
                        <div class="row mb-4">

                            <!--Grid column-->
                            <div class="col-md-12 text-right">

                                <h4 class="text-right font-weight-bold dark-grey-text mt-3 mb-3">
                                    <strong>Chia sẻ bài viết </strong>
                                </h4>

                                <div class="fb-share-button" data-href="<?=Yii::$app->request->url?>" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?=Yii::$app->request->url?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Facebook</a></div>

                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->
                    </div>
                    <!--/.Card-->

                    <section class="text-left">

                        <!--Author box-->
                        <div class="card card-body">

                            <div class="row">
                                <!--Avatar-->

                                <!--Author Data-->
                                <div class="col-12 col-sm-12">
                                    <p>
                                        <strong>Từ khóa liên quan</strong>
                                    </p>
                                    <div class="personal-sm">
                                        <?php foreach ($tukhoas as $tukhoa):?>
                                            <a href="<?=\yii\helpers\Url::toRoute(['site/tu-khoa','path'=>$tukhoa->Code])?>"><span class="badge badge-info"><i class="fa fa-tag" aria-hidden="true"></i> <?=$tukhoa->TenTuKhoa?></span></a>
                                        <?php endforeach;?>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--/.Author box-->

                    </section>

                </div>
                <!--/ Post -->

                <h5 class="font-weight-bold mt-3">
                    <strong>CÓ THỂ BẠN QUAN TÂM</strong>
                </h5>
                <hr class="red title-hr">

                <!--Grid row-->
                <div class="row single-post mb-4">

                    <?php foreach ($baiviets as $key =>$item):?>
                    <!--Grid column-->
                    <div class="col-md-4 text-left mt-3">

                        <!--Card-->
                        <div class="card h-100">

                            <!--Card image-->
                            <div class="view overlay">
                                <img src="images/anhdaidien/<?=$item->AnhDaiDien?>" class="card-img-top" alt="<?=$item->Alt?>">
                                <a>
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <!--/.Card image-->

                            <!--Card content-->
                            <div class="card-body">
                                <!--Title-->
                                <h4 class="card-title">
                                    <a href="<?=\yii\helpers\Url::toRoute(['site/bai-viet','path'=>$item->Code])?>"><strong><?=$item->TenBaiViet?></strong></a>
                                </h4>
                                <hr>
                                <!--Text-->
                                <div class="fixed-box-card">
                                    <p class="card-text mb-3"><?=$item->TomTat?>
                                    </p>
                                </div>
                                <p class="font-small font-weight-bold dark-grey-text mb-1">
                                    <i class="far fa-clock-o"></i><?=$item->ThoiGianDang?></p>
                                <p class="font-small grey-text mb-0"><?=$item->nguoiDang->TenNguoiDung?></p>
                                <p class="text-right mb-0 font-small font-weight-bold">
                                    <a href="<?=\yii\helpers\Url::toRoute(['site/bai-viet','path'=>$item->Code])?>">Xem thêm
                                        <i class="fas fa-angle-right"></i>
                                    </a>
                                </p>
                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->
                    </div>
                    <!--Grid column-->
                    <?php endforeach;?>

                </div>
                <!--/Grid row-->

                </section>
                <!--/Section: Magazine posts-->

                <!--Pagination dark-->

                <div id="pagination"></div>
                <input type="hidden" id="maxcountbaiviet" value="<?=$count_baiviet?>">
                <!--/Pagination dark grey-->

            </div>
            <!--/ Main news -->

            <!-- Sidebar -->
            <div class="col-xl-4 col-md-12 widget-column mt-0">

                <!-- Section: Categories -->
                <section class="section mb-5">

                    <h4 class="font-weight-bold mt-2">
                        <strong>PHÂN LOẠI</strong>
                    </h4>
                    <hr class="red title-hr">

                    <ul class="list-group z-depth-1 mt-4">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a>Lịch sử Hải Phòng</a>
                            <span class="badge badge-danger badge-pill">4</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a>Danh nhân văn hóa</a>
                            <span class="badge badge-danger badge-pill">2</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a>Lễ hội</a>
                            <span class="badge badge-danger badge-pill">1</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a>Làng nghề</a>
                            <span class="badge badge-danger badge-pill">2</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a>Đình - Đền - Chùa</a>
                            <span class="badge badge-danger badge-pill">1</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a>Vịnh - Đảo - Hang động</a>
                            <span class="badge badge-danger badge-pill">2</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a>Di tích lịch sử</a>
                            <span class="badge badge-danger badge-pill">5</span>
                        </li>
                    </ul>
                </section>
                <!-- Section: Categories -->


                <!-- Section: Newsletter -->
                <section class="section mt-5">
                    <h4 class="font-weight-bold">
                        <strong>NEWSLETTER</strong>
                    </h4>
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

                    <h4 class="font-weight-bold">
                        <strong>GALLERY</strong>
                    </h4>
                    <hr class="red title-hr">

                    <!--Grid row-->

                    <div class="row">
                        <div class="col-md-12">

                            <div id="mdb-lightbox-ui"></div>

                            <div class="mdb-lightbox">

                                <figure class="col-md-4 px-1 py-1">
                                    <a href="img/Photos/Horizontal/Nature/12-col/img%20(10).jpg" data-size="1600x1067">
                                        <img src="img/Photos/Horizontal/Nature/4-col/img%20(10).jpg" class="img-fluid" alt="sample image">
                                    </a>
                                </figure>

                                <figure class="col-md-4 px-1 py-1">
                                    <a href="img/Photos/Horizontal/Nature/12-col/img%20(98).jpg" data-size="1600x1067">
                                        <img src="img/Photos/Horizontal/Nature/4-col/img%20(98).jpg" class="img-fluid" alt="sample image"
                                        />
                                    </a>
                                </figure>

                                <figure class="col-md-4 px-1 py-1">
                                    <a href="img/Photos/Horizontal/Nature/12-col/img%20(131).jpg" data-size="1600x1067">
                                        <img src="img/Photos/Horizontal/Nature/4-col/img%20(131).jpg" class="img-fluid" alt="sample image"
                                        />
                                    </a>
                                </figure>

                                <figure class="col-md-4 px-1 py-1">
                                    <a href="img/Photos/Horizontal/City/12-col/img%20(4).jpg" data-size="1600x1067">
                                        <img src="img/Photos/Horizontal/City/4-col/img%20(4).jpg" class="img-fluid" alt="sample image" />
                                    </a>
                                </figure>

                                <figure class="col-md-4 px-1 py-1">
                                    <a href="img/Photos/Horizontal/City/12-col/img%20(51).jpg" data-size="1600x1067">
                                        <img src="img/Photos/Horizontal/City/4-col/img%20(51).jpg" class="img-fluid" alt="sample image" />
                                    </a>
                                </figure>

                                <figure class="col-md-4 px-1 py-1">
                                    <a href="img/Photos/Horizontal/Nature/12-col/img%20(128).jpg" data-size="1600x1067">
                                        <img src="img/Photos/Horizontal/Nature/4-col/img%20(128).jpg" class="img-fluid" alt="sample image"
                                        />
                                    </a>
                                </figure>

                                <figure class="col-md-4 px-1 py-1">
                                    <a href="img/Photos/Horizontal/People/12-col/img%20(49).jpg" data-size="1600x1067">
                                        <img src="img/Photos/Horizontal/People/4-col/img%20(49).jpg" class="img-fluid" alt="sample image"
                                        />
                                    </a>
                                </figure>

                                <figure class="col-md-4 px-1 py-1">
                                    <a href="img/Photos/Horizontal/Nature/12-col/img%20(115).jpg" data-size="1600x1067">
                                        <img src="img/Photos/Horizontal/Nature/4-col/img%20(115).jpg" class="img-fluid" alt="sample image"
                                        />
                                    </a>
                                </figure>

                                <figure class="col-md-4 px-1 py-1">
                                    <a href="img/Photos/Horizontal/People/12-col/img%20(15).jpg" data-size="1600x1067">
                                        <img src="img/Photos/Horizontal/People/4-col/img%20(15).jpg" class="img-fluid" alt="sample image"
                                        />
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
                    <h4 class="font-weight-bold pt-2">
                        <strong>Các bài viết mới nhất</strong>
                    </h4>
                    <hr class="red title-hr mb-4">

                    <!--/ Card -->
                    <div class="card card-body pb-0">
                        <div class="single-post">

                            <!-- Grid row -->
                            <div class="row">
                                <div class="col-4">

                                    <!-- Image -->
                                    <div class="view overlay">
                                        <img src="img/Photos/Horizontal/People/4-col/img%20(121).jpg" class="img-fluid z-depth-1 rounded-0" alt="sample image">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                </div>

                                <!-- Excerpt -->
                                <div class="col-8">
                                    <h6 class="mt-0 mb-3">
                                        <a>
                                            <strong>This is title of the news</strong>
                                        </a>
                                    </h6>

                                    <div class="post-data">
                                        <p class="font-small grey-text mb-0">
                                            <i class="far fa-clock-o"></i> 18/08/2017</p>
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
