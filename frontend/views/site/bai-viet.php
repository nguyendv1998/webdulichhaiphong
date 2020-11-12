<?php
/* @var $baivietchitiet \common\models\BaiViet */
/* @var $nguoidang \common\models\User */
/* @var $anhlienquans \common\models\AnhLienQuan[] */
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

                        <div class="post-data mb-4">
                            <p class="font-small dark-grey-text mb-1">
                                <strong>Tác giả:</strong> <?=$nguoidang->TenNguoiDung?></p>
                            <p class="font-small grey-text">
                                <i class="far fa-clock-o"></i><?=$baivietchitiet->ThoiGianDang?></p>
                        </div>

                        <a>
                            <span class="badge badge-danger">Latest</span>
                        </a>

                        <!--Title-->
                        <h2 class="font-weight-bold mt-3">
                            <strong><?=$baivietchitiet->TenBaiViet?></strong>
                        </h2>
                        <hr class="red title-hr">

                        <img src="images/anhdaidien/<?=$baivietchitiet->AnhDaiDien?>" class="img-fluid z-depth-1 rounded" alt="sample image">

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-6 mt-4">

                                <h5 class="font-weight-bold dark-grey-text">
                                    <i class="fas fa-thumbs-up mr-3" style="color: #2b58f4"></i>
                                    <strong><?=$baivietchitiet->liked?></strong> Lượt thích</h5>

                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6 mt-2 d-flex justify-content-end">

                                <!--Facebook-->
                                <div style="margin-top: 15px;" class="fb-share-button" data-href="<?=Yii::$app->request->url?>" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?=Yii::$app->request->url?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Facebook</a></div>

                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->
                        <hr>
                        <div style="text-align:justify"><strong><?=$baivietchitiet->TomTat?></strong></div>
                        <hr>

                        <?=$baivietchitiet->NoiDung?>

                        <hr>
                        <?php if($anhlienquans!=null && count($anhlienquans)>0):?>
                            <h5>Các ảnh liên quan</h5>



                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <?php foreach ($anhlienquans as $key=> $anhlienquan):?>
                                        <?php if($key==0){ ?>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <?php } else{?>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="<?=$key?>"></li>
                                        <?php }?>
                                    <?php endforeach;?>
                                </ol>
                                <div class="carousel-inner">
                                    <?php foreach ($anhlienquans as $key => $anhlienquan):?>
                                        <?php if($key==0){ ?>
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" src="images/anhlienquan/<?=$anhlienquan->File?>" alt="<?=$anhlienquan->Alt?>">
                                            </div>
                                        <?php } else{?>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="images/anhlienquan/<?=$anhlienquan->File?>" alt="<?=$anhlienquan->Alt?>">
                                            </div>
                                        <?php }?>
                                    <?php endforeach;?>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        <?php endif;?>
                        <!--Grid row-->
                        <div class="row mb-4">

                            <!--Grid column-->
                            <div class="col-md-12 text-center">

                                <h4 class="text-center font-weight-bold dark-grey-text mt-3 mb-3">
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
                                <div class="col-12 col-sm-2 mb-md-0 mb-3">
                                    <img src="img/Photos/Avatars/img%20(26).jpg" class="img-fluid rounded-circle" alt="">
                                </div>
                                <!--Author Data-->
                                <div class="col-12 col-sm-10">
                                    <p>
                                        <strong>Anna Doe</strong>
                                    </p>
                                    <div class="personal-sm">
                                        <a class="pr-2 fb-ic">
                                            <i class="fab fa-facebook-f"> </i>
                                        </a>
                                        <a class="p-2 tw-ic">
                                            <i class="fab fa-twitter"> </i>
                                        </a>
                                        <a class="p-2 gplus-ic">
                                            <i class="fab fa-google-plus-g"> </i>
                                        </a>
                                        <a class="p-2 li-ic">
                                            <i class="fab fa-linkedin-in"> </i>
                                        </a>
                                    </div>
                                    <p class="dark-grey-text article">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo
                                        minus. Voluptatum pariatur eveniet ea, officiis vitae praesentium beatae quas
                                        libero, esse facere.
                                    </p>

                                </div>
                            </div>
                        </div>
                        <!--/.Author box-->

                    </section>

                </div>
                <!--/ Post -->

                <h5 class="font-weight-bold mt-3">
                    <strong>YOU MIGHT ALSO LIKE</strong>
                </h5>
                <hr class="red title-hr">

                <!--Grid row-->
                <div class="row single-post mb-4">

                    <!--Grid column-->
                    <div class="col-md-6 text-left mt-3">

                        <!--Card-->
                        <div class="card">

                            <!--Card image-->
                            <div class="view overlay">
                                <img src="img/Photos/Slides/img%20(134).jpg" class="card-img-top" alt="Sample image">
                                <a>
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <!--/.Card image-->

                            <!--Card content-->
                            <div class="card-body">
                                <!--Title-->
                                <h4 class="card-title">
                                    <strong>Card title</strong>
                                </h4>
                                <hr>
                                <!--Text-->
                                <p class="card-text mb-3">Some quick example text to build on the card title and make up the bulk of the card's
                                    content.
                                </p>
                                <p class="font-small font-weight-bold dark-grey-text mb-1">
                                    <i class="far fa-clock-o"></i> 27/08/2017</p>
                                <p class="font-small grey-text mb-0">Anna Smith</p>
                                <p class="text-right mb-0 font-small font-weight-bold">
                                    <a>read more
                                        <i class="fas fa-angle-right"></i>
                                    </a>
                                </p>
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
                                <img src="img/Photos/Slides/img%20(124).jpg" class="card-img-top" alt="sample image">
                                <a>
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <!--/.Card image-->

                            <!--Card content-->
                            <div class="card-body">
                                <!--Title-->
                                <h4 class="card-title">
                                    <strong>Card title</strong>
                                </h4>
                                <hr>
                                <!--Text-->
                                <p class="card-text mb-3">Some quick example text to build on the card title and make up the bulk of the card's
                                    content.
                                </p>
                                <p class="font-small font-weight-bold dark-grey-text mb-1">
                                    <i class="far fa-clock-o"></i> 27/08/2017</p>
                                <p class="font-small grey-text mb-0">Anna Smith</p>
                                <p class="text-right mb-0 font-small font-weight-bold">
                                    <a>read more
                                        <i class="fas fa-angle-right"></i>
                                    </a>
                                </p>
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
                        <li class="page-item active">
                            <a class="page-link">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link">4</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link">5</a>
                        </li>

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
