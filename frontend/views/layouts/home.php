<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\widgets\Blog\LastPostsWidget;
use frontend\widgets\Shop\FeaturedProductsWidget;

\frontend\assets\OwlCarouselAsset::register($this);

?>
<?php $this->beginContent('@frontend/views/layouts/main.php') ?>
<?php $this->title = 'Онлайн магазин мебели в Самаре'?>

    <!--======= HOME MAIN SLIDER =========-->
    <section class="home-slider">
        <div class="tp-banner-container">
            <div class="tp-banner-fix" >
                <ul>
                    <!-- Slider 1 -->
                    <li data-transition="fade" data-slotamount="7"> <img src="<?=Yii::getAlias('@static/banners/karina-lerom.jpg')?>" data-bgposition="center top" alt="" />
                        <div class="overlay"></div>
                        <!-- Layer -->
                        <div class="tp-caption sft tp-resizeme rs-parallaxlevel-5"
                             data-x="center"
                             data-y="120"
                             data-speed="700"
                             data-start="1700"
                             data-easing="easeOutBack"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.1"
                             data-endelementdelay="0.1"
                             data-endspeed="300"
                             data-captionhidden="on"> <img src="<?=Yii::getAlias('@static/banners/logo-lerom.png')?>" alt="" /> </div>

                        <!-- Layer -->
                        <div class="tp-caption customin font-playfair tp-resizeme rs-parallaxlevel-4"
                             data-x="center"
                             data-y="center" data-voffset="-40"
                             data-speed="720"
                             data-start="2400"
                             data-easing="easeOutBack"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.1"
                             data-endelementdelay="0.1"
                             data-endspeed="300"
                             data-captionhidden="on"
                             style="color: #fff; font-size: 80px; font-style:italic;">  Скоро в продаже </div>

                        <!-- Layer -->
                        <div class="tp-caption sfb  font-playfair text-center tp-resizeme rs-parallaxlevel-4"
                             data-x="center"
                             data-y="center" data-voffset="40"
                             data-speed="1500"
                             data-start="3200"
                             data-easing="easeOutBack"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.1"
                             data-endelementdelay="0.1"
                             data-endspeed="300"
                             data-captionhidden="on"
                             style="color: #fff; font-size: 18px;  font-style:italic;"> Новая программа мебельной фабрики Лером.<br>
                            Фасад имеет уникальное сочетание глубокого тиснения и эффекта патины, присущей классическому стилю.<br>
                            Изящество фасада подчеркивает стекло с алмазной гравировкой и фацетом.</div>

                        <!-- Layer -->
                        <!-- <div class="tp-caption sfb tp-resizeme rs-parallaxlevel-4"
                              data-x="center"
                              data-y="470"
                              data-speed="700"
                              data-start="4000"
                              data-easing="easeOutBack"
                              data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                              data-splitin="none"
                              data-splitout="none"
                              data-elementdelay="0.1"
                              data-endelementdelay="0.1"
                              data-endspeed="300"
                              data-captionhidden="on"> <a href="#." class="btn btn-1">Shop Now</a> &nbsp; &nbsp; &nbsp; &nbsp; <a href="#" class="btn ">Discover</a> </div> -->
                    </li>
                    <!-- Slider 2 -->
                    <li data-transition="random" data-slotamount="7"> <img src="<?=Yii::getAlias('@static/banners/3.jpg')?>" data-bgposition="center top" alt="" />
                        <div class="overlay"></div>
                        <!-- Layer -->
                        <div class="tp-caption sft font-montserrat text-uppercase tp-resizeme rs-parallaxlevel-4"
                             data-x="center"
                             data-y="center" data-voffset="-50"
                             data-speed="700"
                             data-start="1000"
                             data-easing="easeOutBack"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.1"
                             data-endelementdelay="0.1"
                             data-endspeed="300"
                             data-captionhidden="on"
                             style="color: #fff; font-size: 60px; font-weight: bold; letter-spacing:-2px; "> Ортопедические матрасы. </div>

                        <!-- Layer -->
                        <div class="tp-caption sfb  font-montserrat text-center tp-resizeme rs-parallaxlevel-4"
                             data-x="center"
                             data-y="center" data-voffset="40"
                             data-speed="700"
                             data-start="1700"
                             data-easing="easeOutBack"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.1"
                             data-endelementdelay="0.1"
                             data-endspeed="300"
                             data-captionhidden="on"
                             style="color: #fff; font-size: 18px;">  Благодаря всем трудам мы пришли к той продукции,<br> которая отвечает наивысшим показателям комфортного сна. </div>

                        <!-- Layer -->
                        <div class="tp-caption sfb tp-resizeme rs-parallaxlevel-4"
                             data-x="center"
                             data-y="center" data-voffset="120"
                             data-speed="700"
                             data-start="2400"
                             data-easing="easeOutBack"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.1"
                             data-endelementdelay="0.1"
                             data-endspeed="300"
                             data-captionhidden="on"> <a href="<?=\yii\helpers\Url::to('/catalog/matrasy')?>" class="btn btn-1">Посмотреть продукцию</a></div>
                    </li>


                    <!-- Slider 3 -->
                    <li data-transition="random" data-slotamount="7"> <img src="<?=Yii::getAlias('@static/banners/font.jpg')?>" data-bgposition="center center" alt="" />
                        <!-- SLIDER LAYERS -->
                        <div class="tp-caption lfr tp-resizeme rs-parallaxlevel-4"
                             data-x="right"
                             data-y="top"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="700"
                             data-start="1000"
                             data-easing="Back.easeOut"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.1"
                             data-endelementdelay="0.1"
                             data-endspeed="300"
                             data-captionhidden="on"
                             style="z-index: 1;"> <img src="<?=Yii::getAlias('@static/banners/stul2.png')?>" alt=""> </div>

                        <!-- Layer -->
                        <div class="tp-caption font-montserrat text-center text-uppercase sft tp-resizeme rs-parallaxlevel-4"
                             data-x="left"
                             data-y="center" data-voffset="-80"
                             data-speed="700"
                             data-start="1000"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-easing="Back.easeOut"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.1"
                             data-endelementdelay="0.1"
                             data-endspeed="300"
                             data-captionhidden="on"
                             style="color: #272727; font-size: 18px; font-weight: normal; letter-spacing: 3px; border-top:1px solid #272727; border-bottom:1px solid #272727; padding:20px 0;"> СТОЛЫ и СТУЛЬЯ <br>
                            Огромный выбор кухонной мебели </div>

                        <!-- Layer -->
                        <div class="tp-caption sfb tp-resizeme rs-parallaxlevel-4"
                             data-x="left"
                             data-y="center" data-voffset="20"
                             data-speed="700"
                             data-start="1500"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-easing="Back.easeOut"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.1"
                             data-endelementdelay="0.1"
                             data-endspeed="300"
                             data-captionhidden="on"
                             style="z-index: 10;"> <a href="#" class="btn btn-1">ПОСМОТРЕТЬ ПРОДУКЦИЮ</a> </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- CONTENT START -->
    <div class="content">

        <!--======= NEW COLLECRION =========-->
        <section class="section-p-30px grid-collection">
            <div class="container">
                <ul class="row">

                    <!-- ADD 1 -->
                    <li class="col-sm-4">
                        <div class="inn-sec animate fadeInLeft" data-wow-delay="0.6s"> <a href="#."> <img class="img-responsive" src="image/grid-bnr-img-1.jpg" alt="">
                                <div class="upper"><span> <small>MEN’ </small> -20% ALL ODER</span> </div>
                            </a> </div>

                        <!-- ADD 2 -->
                        <div class="inn-sec animate fadeInLeft" data-wow-delay="0.6s"> <a href="#."><img class="img-responsive" src="image/grid-bnr-img-2.jpg" alt="">
                                <div class="upper"><span> <small>SHOES </small> NEW ARRIVAL</span> </div>
                            </a> </div>
                    </li>

                    <!-- ADD 3 -->
                    <li class="col-sm-4 animate fadeInUp" data-wow-delay="0.6s">
                        <div class="inn-sec trd"> <a href="#."> <img class="img-responsive" src="image/grid-bnr-img-3.jpg" alt="">
                                <div class="upper"> <span> <small>FASHION </small> UP TO</span>
                                    <h2>70%</h2>
                                </div>
                            </a> </div>
                    </li>

                    <!-- ADD 1 -->
                    <li class="col-sm-4">
                        <div class="inn-sec animate fadeInRight" data-wow-delay="0.6s"> <a href="#."> <img class="img-responsive" src="image/grid-bnr-img-4.jpg" alt="">
                                <div class="upper"><span> <small>MEN’ </small> -20% ALL ODER</span> </div>
                            </a> </div>

                        <!-- ADD 2 -->
                        <div class="inn-sec last animate fadeInRight" data-wow-delay="0.6s"> <a href="#."><img class="img-responsive" src="image/grid-bnr-img-5.jpg" alt="">
                                <div class="upper"><span> <small>SHOES </small></span>
                                    <h2>-50%</h2>
                                    <span> ALL PRODUCTS</span> </div>
                            </a> </div>
                    </li>
                </ul>
            </div>
        </section>
    <!--======= New Arrival =========-->
    <section class="section-p-30px new-arrival new-arri-w-slide">
    <div class="container">

    <!--  Tittle -->
    <div class="tittle tittle-2 animate fadeInUp" data-wow-delay="0.4s">
        <h5>NEW ARRIVAL</h5>
        <hr>
        <p>Treding fashion</p>
    </div>

    <!--  New Arrival Tabs Products  -->
    <div class="popurlar_product client-slide animate fadeInUp" data-wow-delay="0.4s">
        <?= FeaturedProductsWidget::widget([
            'limit' => 6,
        ]) ?>

    </div>
    </div>
    </section>

        <!--======= SEASONALS =========-->
        <section class="section-p-60px seasonals no-padding-b">
            <div class="container">
                <!--  Tittle -->
                <div class="tittle tittle-2 animate fadeInUp" data-wow-delay="0.4s">
                    <h5>SEASONALS</h5>
                    <hr>
                    <p>Tell your Story</p>
                </div>
            </div>
            <ul>
                <!-- Image 1 -->
                <li class="animate fadeInUp" data-wow-delay="0.4s"><a href="#."><img src="image/seasonals-img-1.jpg" alt=""></a></li>
                <!-- Image 1 -->
                <li class="animate fadeInUp" data-wow-delay="0.6s"><a href="#."><img src="image/seasonals-img-2.jpg" alt=""></a></li>
                <!-- Image 1 -->
                <li class="animate fadeInUp" data-wow-delay="0.4s"><a href="#."><img src="image/seasonals-img-3.jpg" alt=""></a></li>
                <!-- Image 1 -->
                <li class="animate fadeInUp" data-wow-delay="0.6s"><a href="#."><img src="image/seasonals-img-4.jpg" alt=""></a></li>
            </ul>
        </section>

        <!--======= Popurlar Product =========-->
        <section class="section-p-60px small-r-items">
            <div class="container">
                <!--  Small Items Row -->
                <div class="row">

                    <!--  TOP SELLERS -->
                    <div class="col-md-4 animate fadeInUp" data-wow-delay="0.4s">
                        <!-- Tittle -->
                        <h5>TOP SELLERS</h5>
                        <!--  Item  1 -->
                        <div class="media">
                            <div class="media-left">
                                <!--  Image -->
                                <div class="item-img"> <a href="#"> <img class="media-object" src="image/small-item.jpg" alt=""> </a> </div>
                            </div>
                            <!--  Details -->
                            <div class="media-body"> <a class="media-heading" href="#.">FLAT SOLE PATENT SANDAL</a> <span class="font-montserrat">129.00 USD</span> <a href="#." class="btn btn-small">ADD TO CART</a>
                                <ul class="main-link">
                                    <li> <a href="image/small-item.jpg" data-lighter><i class="ion-search"></i></a></li>
                                    <li> <a href="#."><i class="ion-shuffle"></i></a></li>
                                    <li> <a href="#."><i class="fa fa-heart-o"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <!--  Item  2 -->
                        <div class="media">
                            <div class="media-left">
                                <!--  Image -->
                                <div class="item-img"> <a href="#"> <img class="media-object" src="image/small-item-3.jpg" alt=""> </a> </div>
                            </div>
                            <!--  Details -->
                            <div class="media-body"> <a class="media-heading" href="#.">FLAT SOLE PATENT SANDAL</a> <span class="font-montserrat">129.00 USD</span> <a href="#." class="btn btn-small">ADD TO CART</a>
                                <ul class="main-link">
                                    <li> <a href="image/small-item-3.jpg" data-lighter><i class="ion-search"></i></a></li>
                                    <li> <a href="#."><i class="ion-shuffle"></i></a></li>
                                    <li> <a href="#."><i class="fa fa-heart-o"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--  SALE OFF -->
                    <div class="col-md-4 animate fadeInUp" data-wow-delay="0.4s">
                        <!-- Tittle -->
                        <h5>SALE OFF</h5>
                        <!--  Item  1 -->
                        <div class="media">
                            <div class="media-left">
                                <!--  Image -->
                                <div class="item-img"> <a href="#"> <img class="media-object" src="image/small-item-1.jpg" alt=""> </a> </div>
                            </div>
                            <!--  Details -->
                            <div class="media-body"> <a class="media-heading" href="#.">FLAT SOLE PATENT SANDAL</a> <span class="font-montserrat">129.00 USD</span> <a href="#." class="btn btn-small">ADD TO CART</a>
                                <ul class="main-link">
                                    <li> <a href="image/small-item-1.jpg" data-lighter><i class="ion-search"></i></a></li>
                                    <li> <a href="#."><i class="ion-shuffle"></i></a></li>
                                    <li> <a href="#."><i class="fa fa-heart-o"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <!--  Item  2 -->
                        <div class="media">
                            <div class="media-left">
                                <!--  Image -->
                                <div class="item-img"> <a href="#"> <img class="media-object" src="image/small-item-4.jpg" alt=""> </a> </div>
                            </div>
                            <!--  Details -->
                            <div class="media-body"> <a class="media-heading" href="#.">FLAT SOLE PATENT SANDAL</a> <span class="font-montserrat">129.00 USD</span> <a href="#." class="btn btn-small">ADD TO CART</a>
                                <ul class="main-link">
                                    <li> <a href="image/small-item-4.jpg" data-lighter><i class="ion-search"></i></a></li>
                                    <li> <a href="#."><i class="ion-shuffle"></i></a></li>
                                    <li> <a href="#."><i class="fa fa-heart-o"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--  SALE OFF -->
                    <div class="col-md-4 animate fadeInUp" data-wow-delay="0.4s">
                        <!-- Tittle -->
                        <h5>TOP RATE</h5>
                        <!--  Item  1 -->
                        <div class="media">
                            <div class="media-left">
                                <!--  Image -->
                                <div class="item-img"> <a href="#"> <img class="media-object" src="image/small-item-2.jpg" alt=""> </a> </div>
                            </div>
                            <!--  Details -->
                            <div class="media-body"> <a class="media-heading" href="#.">FLAT SOLE PATENT SANDAL</a> <span class="font-montserrat">129.00 USD</span> <a href="#." class="btn btn-small">ADD TO CART</a>
                                <ul class="main-link">
                                    <li> <a href="image/small-item-2.jpg" data-lighter><i class="ion-search"></i></a></li>
                                    <li> <a href="#."><i class="ion-shuffle"></i></a></li>
                                    <li> <a href="#."><i class="fa fa-heart-o"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <!--  Item  2 -->
                        <div class="media">
                            <div class="media-left">
                                <!--  Image -->
                                <div class="item-img"> <a href="#"> <img class="media-object" src="image/small-item-5.jpg" alt=""> </a> </div>
                            </div>
                            <!--  Details -->
                            <div class="media-body"> <a class="media-heading" href="#.">FLAT SOLE PATENT SANDAL</a> <span class="font-montserrat">129.00 USD</span> <a href="#." class="btn btn-small">ADD TO CART</a>
                                <ul class="main-link">
                                    <li> <a href="image/small-item-5.jpg" data-lighter><i class="ion-search"></i></a></li>
                                    <li> <a href="#."><i class="ion-shuffle"></i></a></li>
                                    <li> <a href="#."><i class="fa fa-heart-o"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--======= Shades =========-->
        <section class="shades">
            <div class="container">
                <!--  Tittle -->
                <div class="tittle tittle-2 animate fadeInUp" data-wow-delay="0.4s">
                    <h5>A few shades of grey</h5>
                    <hr>
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. , consectetur,</p>
                </div>

                <div class="row">
                    <!-- Avatar -->
                    <div class="avatar animate fadeInLeft" data-wow-delay="0.4s"> <img src="image/avatar-7.jpg" alt=""> </div>

                    <!-- Avatar -->
                    <div class="avatar animate fadeInRight" data-wow-delay="0.4s"> <img src="image/avatar-8.jpg" alt=""> </div>
                </div>

                <!-- Btn -->
                <a href="#." class="btn btn-small">JOIN NOW</a> </div>
        </section>

        <!--======= Blog =========-->
        <section class="section-p-60px testimonial testimonial-simple no-padding-b">
            <div class="container">
                <!--  Tittle -->
                <div class="tittle tittle-2 animate fadeInUp" data-wow-delay="0.4s">
                    <h5>WHAT THE SAY ?</h5>
                    <hr>
                    <p>Testtimonial</p>
                </div>
                <ul class="row">
                    <!--  Text  1 -->
                    <li class="col-sm-6 animate fadeInUp" data-wow-delay="0.4s">
                        <div class="media">
                            <div class="media-left">
                                <!--  Image -->
                                <div class="avatar"> <a href="#"> <img class="media-object" src="image/avatar-1.jpg" alt=""> </a> </div>
                            </div>
                            <!--  Details -->
                            <div class="media-body">
                                <p>“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation”</p>
                                <h6>TYRION LANNISTER</h6>
                                <p>Founder-Ceo. Dell Corp</p>
                            </div>
                        </div>
                    </li>

                    <!--  Text  1 -->
                    <li class="col-sm-6 animate fadeInUp" data-wow-delay="0.4s">
                        <div class="media">
                            <div class="media-left">
                                <!--  Image -->
                                <div class="avatar"> <a href="#"> <img class="media-object" src="image/avatar-2.jpg" alt=""> </a> </div>
                            </div>
                            <!--  Details -->
                            <div class="media-body">
                                <p>“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation”</p>
                                <h6>SANSA STARK</h6>
                                <p>Founder-Ceo. Dell Corp</p>
                            </div>
                        </div>
                    </li>

                    <!--  Text  1 -->
                    <li class="col-sm-6 animate fadeInUp" data-wow-delay="0.4s">
                        <div class="media">
                            <div class="media-left">
                                <!--  Image -->
                                <div class="avatar"> <a href="#"> <img class="media-object" src="image/avatar-3.jpg" alt=""> </a> </div>
                            </div>
                            <!--  Details -->
                            <div class="media-body">
                                <p>“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation”</p>
                                <h6>LADY SANSA</h6>
                                <p>Founder-Ceo. Dell Corp</p>
                            </div>
                        </div>
                    </li>

                    <!--  Text  1 -->
                    <li class="col-sm-6 animate fadeInUp" data-wow-delay="0.4s">
                        <div class="media">
                            <div class="media-left">
                                <!--  Image -->
                                <div class="avatar"> <a href="#"> <img class="media-object" src="image/avatar-4.jpg" alt=""> </a> </div>
                            </div>
                            <!--  Details -->
                            <div class="media-body">
                                <p>“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation”</p>
                                <h6>JOHN SNOW</h6>
                                <p>Founder-Ceo. Dell Corp</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <!--======= Portfolio =========-->
        <section class="section-p-30px portfolio">
            <div class="container">
                <!--  Tittle -->
                <div class="tittle tittle-2 animate fadeInUp" data-wow-delay="0.4s">
                    <h5>RECENT WORK</h5>
                    <hr>
                    <p>Show your Portfolio</p>
                </div>
            </div>
            <div class="container-fluid">
                <!-- Portfolio Row -->
                <ul class="port-folio-row row">

                    <!-- Project 1 -->
                    <li class="col-sm-3 animate fadeInUp" data-wow-delay="0.2s"> <img src="image/port-img-1.jpg" alt="">

                        <!-- Hover Info -->
                        <div class="hover-port">
                            <div class="position-center-center">
                                <h6>Navy check</h6>
                                <a href="image/port-img-1.jpg" data-lighter><i class="fa fa-search"></i></a> <a href="#."><i class="fa fa-link"></i></a></div> </div>
                    </li>

                    <!-- Project 2 -->
                    <li class="col-sm-3 animate fadeInUp" data-wow-delay="0.4s"> <img src="image/port-img-2.jpg" alt="">

                        <!-- Hover Info -->
                        <div class="hover-port">
                            <div class="position-center-center">
                                <h6>Navy check</h6>
                                <a href="image/port-img-2.jpg" data-lighter><i class="fa fa-search"></i></a> <a href="#."><i class="fa fa-link"></i></a></div> </div>
                    </li>

                    <!-- Project 3 -->
                    <li class="col-sm-3 animate fadeInUp" data-wow-delay="0.6s"> <img src="image/port-img-3.jpg" alt="">

                        <!-- Hover Info -->
                        <div class="hover-port">
                            <div class="position-center-center">
                                <h6>Navy check</h6>
                                <a href="image/port-img-3.jpg" data-lighter><i class="fa fa-search"></i></a> <a href="#."><i class="fa fa-link"></i></a></div> </div>
                    </li>

                    <!-- Project 4 -->
                    <li class="col-sm-3 animate fadeInUp" data-wow-delay="0.8s"> <img src="image/port-img-4.jpg" alt="">

                        <!-- Hover Info -->
                        <div class="hover-port">
                            <div class="position-center-center">
                                <h6>Navy check</h6>
                                <a href="image/port-img-4.jpg" data-lighter><i class="fa fa-search"></i></a> <a href="#."><i class="fa fa-link"></i></a></div> </div>
                    </li>

                    <!-- Project 5 -->
                    <li class="col-sm-3 animate fadeInUp" data-wow-delay="0.2s"> <img src="image/port-img-5.jpg" alt="">

                        <!-- Hover Info -->
                        <div class="hover-port">
                            <div class="position-center-center">
                                <h6>Navy check</h6>
                                <a href="image/port-img-5.jpg" data-lighter><i class="fa fa-search"></i></a> <a href="#."><i class="fa fa-link"></i></a></div> </div>
                    </li>

                    <!-- Project 6 -->
                    <li class="col-sm-3 animate fadeInUp" data-wow-delay="0.4s"> <img src="image/port-img-6.jpg" alt="">

                        <!-- Hover Info -->
                        <div class="hover-port">
                            <div class="position-center-center">
                                <h6>Navy check</h6>
                                <a href="image/port-img-6.jpg" data-lighter><i class="fa fa-search"></i></a> <a href="#."><i class="fa fa-link"></i></a></div> </div>
                    </li>

                    <!-- Project 7 -->
                    <li class="col-sm-3 animate fadeInUp" data-wow-delay="0.6s"> <img src="image/port-img-7.jpg" alt="">

                        <!-- Hover Info -->
                        <div class="hover-port">
                            <div class="position-center-center">
                                <h6>Navy check</h6>
                                <a href="image/port-img-7.jpg" data-lighter><i class="fa fa-search"></i></a> <a href="#."><i class="fa fa-link"></i></a></div> </div>
                    </li>

                    <!-- Project 8 -->
                    <li class="col-sm-3 animate fadeInUp" data-wow-delay="0.8s"> <img src="image/port-img-8.jpg" alt="">

                        <!-- Hover Info -->
                        <div class="hover-port">
                            <div class="position-center-center">
                                <h6>Navy check</h6>
                                <a href="image/port-img-8.jpg" data-lighter><i class="fa fa-search"></i></a> <a href="#."><i class="fa fa-link"></i></a></div> </div>
                    </li>
                </ul>
            </div>
        </section>

        <!--======= Blog =========-->
        <section class="section-p-60px blog no-padding-b">
            <div class="container">
                <!--  Tittle -->
                <div class="tittle tittle-2 animate fadeInUp" data-wow-delay="0.4s">
                    <h5>RECENT BLOG</h5>
                    <hr>
                    <p>Our Blog</p>
                </div>

                <!--  Blog Posts -->
                <div class="blog-posts">
                    <ul class="row">
                        <!--  Posts 1 -->
                        <li class="col-sm-6 animate fadeInLeft" data-wow-delay="0.4s">
                            <!--  Image -->
                            <img class="img-responsive" src="image/blog-3.jpg" alt=""> <span class="tags">FASHION NEWS</span> <a href="#." class="tittle-post font-playfair">Mighty Healthy 2013 Spring/Summer</a>
                            <p>Gumbo beet greens corn soko endive gumbo gourd. Parsley shallot courgette tatsoi pea sprouts fava bean collard greens danadelion.</p>
                            <!--  Post Info -->
                            <ul class="info">
                                <li><i class="fa fa-user"></i> admin</li>
                                <li><i class="fa fa-calendar-o"></i> 12 JULY</li>
                                <li><i class="fa fa-eye"></i> 325</li>
                            </ul>
                        </li>

                        <!--  Posts 2 -->
                        <li class="col-sm-6 animate fadeInRight" data-wow-delay="0.4s">
                            <!--  Image -->
                            <img class="img-responsive" src="image/blog-4.jpg" alt=""> <span class="tags">MOTION GRAPHIC</span> <a href="#." class="tittle-post font-playfair">All in Black Venna</a>
                            <p>Gumbo beet greens corn soko endive gumbo gourd. Parsley shallot courgette tatsoi pea sprouts fava bean collard greens danadelion.</p>
                            <!--  Post Info -->
                            <ul class="info">
                                <li><i class="fa fa-user"></i> admin</li>
                                <li><i class="fa fa-calendar-o"></i> 12 JULY</li>
                                <li><i class="fa fa-eye"></i> 325</li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!--======= Core Feature =========-->
        <section class="section-p-60px our-clients">
            <div class="container">
                <!-- Tittle -->
                <div class="tittle tittle-2 animate fadeInUp" data-wow-delay="0.4s">
                    <h5>BRANDS</h5>
                    <hr>
                    <p>Our Clients</p>
                </div>

                <!--  Text Intro -->
                <p class="font-montserrat intro text-center animate fadeInUp" data-wow-delay="0.4s">Gumbo beet greens corn soko endive gumbo gourd. Parsley shallot courgette tatsoi pea sprouts fava bean collard greens danadelion.</p>
                <!--  Client Logo Slider -->
                <div class="client-slide animate fadeInUp" data-wow-delay="0.4s">
                    <div class="slide"><a href="#."><img class="img-responsive" src="image/client-logo-1.png" alt=""></a></div>
                    <div class="slide"><a href="#."><img class="img-responsive" src="image/client-logo-2.png" alt=""></a></div>
                    <div class="slide"><a href="#."><img class="img-responsive" src="image/client-logo-3.png" alt=""></a></div>
                    <div class="slide"><a href="#."><img class="img-responsive" src="image/client-logo-4.png" alt=""></a></div>
                    <div class="slide"><a href="#."><img class="img-responsive" src="image/client-logo-2.png" alt=""></a></div>
                    <div class="slide"><a href="#."><img class="img-responsive" src="image/client-logo-4.png" alt=""></a></div>
                </div>
            </div>
        </section>

        <!--======= Subcribe =========-->
        <section class="subcribe news-letter animate fadeInUp" data-wow-delay="0.4s" data-stellar-background-ratio="0.8">
            <div class="overlay">
                <div class="container">
                    <!-- Tittle -->
                    <div class="tittle tittle-2 white animate fadeInUp" data-wow-delay="0.4s">
                        <h5>EMAIL FOR NEWSLETTER</h5>
                        <hr>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. , consectetur,</p>
                    </div>

                    <!--  Subsribe Form -->
                    <div class="news-letter-form animate fadeInUp" data-wow-delay="0.4s">
                        <div class="sub-mail">
                            <form>
                                <input type="search" placeholder="YOUR EMAIL ADDRESS..">
                                <!--  Button -->
                                <button type="submit">SUBSCRIBLE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
$script = <<<JS
var url;
    $('.rs').hover(

 
         function(){
             url = $(this).parents("div.items-in").attr('onclick');
             $(this).parents("div.items-in").removeAttr('onclick');            
        },
            function(){ 
            $(this).parents("div.items-in").attr('onclick',url);
        }
    
    
    
    );
JS;

$this->registerJs($script,yii\web\View::POS_READY);
?>
<?php $this->endContent() ?>