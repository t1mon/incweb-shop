<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\widgets\Blog\LastPostsWidget;
use frontend\widgets\Shop\FeaturedProductsWidget;
use yii\helpers\Url;

\frontend\assets\OwlCarouselAsset::register($this);

?>
<?php $this->beginContent('@frontend/views/layouts/main.php') ?>
<?php $this->title = 'Онлайн магазин мебели в Самаре'?>

    <!--======= HOME MAIN SLIDER =========-->
    <section class="home-slider">
        <div class="tp-banner-container">
            <div class="tp-banner-fix" >
                <ul>
                    <li data-transition="random" data-slotamount="7"> <img src="<?=Yii::getAlias('@static/banners/rally.jpg')?>" data-bgposition="center center" alt="" />
                        <div class="overlay"></div>

                        <!-- SLIDER LAYERS -->
                        <div class="tp-caption white-line-box sft tp-resizeme rs-parallaxlevel-4"
                             data-x="center" data-y="332"
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

                             style="z-index: 10;"> </div>

                        <!-- Layer -->
                        <div class="tp-caption white-line-box sfb tp-resizeme rs-parallaxlevel-4"
                             data-x="center"
                             data-y="420"
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
                             style="z-index: 10;"> </div>

                        <!-- Layer -->
                        <div class="tp-caption font-montserrat customin tp-resizeme rs-parallaxlevel-4"
                             data-x="center"
                             data-y="335"
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
                             style="color: #fff; font-size: 60px; text-transform: uppercase; font-weight: bold; letter-spacing:3px;"> РОЗЫГРЫШ </div>

                        <!-- Layer -->
                        <div class="tp-caption sfb tp-resizeme  font-playfair text-center rs-parallaxlevel-4"
                             data-x="center"
                             data-y="450"
                             data-speed="700"
                             data-start="1700"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-easing="Back.easeOut"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.1"
                             data-endelementdelay="0.1"
                             data-endspeed="300"
                             data-captionhidden="on"
                             style="color: #fff; font-size: 18px; font-weight: normal; font-style:italic; letter-spacing:0px;"> Победитель получит прихожую фабрики Лером, стоимостью более 20000 руб.<br>
                            Абсолютно бесплатно. </div>

                        <!-- Layer -->
                        <div class="tp-caption sfb tp-resizeme rs-parallaxlevel-4"
                             data-x="center"
                             data-y="520"
                             data-speed="700"
                             data-start="2400"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-easing="Back.easeOut"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.1"
                             data-endelementdelay="0.1"
                             data-endspeed="300"
                             data-captionhidden="on"
                             style="z-index: 10;"> <a href="<?=Url::to('/site/rally')?>" class="btn">ПРИНЯТЬ УЧАСТИЕ</a></div>
                    </li>
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
                             style="color: #fff; font-size: 60px; text-transform: uppercase; font-weight: bold; letter-spacing:3px;">  СКОРО В ПРОДАЖЕ </div>

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
                             style="color: #fff; font-size: 20px; padding: 10px"> Новая программа мебельной фабрики Лером.<br>
                            Фасад имеет уникальное сочетание глубокого тиснения и эффекта патины, присущей классическому стилю.<br>
                            Изящество фасада подчеркивает стекло с алмазной гравировкой и фацетом.</div>

                    </li>
                    <!-- Slider 3 -->
                    <li data-transition="random" data-slotamount="7"> <img src="<?=Yii::getAlias('@static/banners/3.jpg')?>" data-bgposition="center center" alt="" />
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
                             style="z-index: 1;"> <img src="<?=Yii::getAlias('@static/banners/matras.png')?>" alt=""> </div>

                        <!-- Layer -->
                        <div class="tp-caption font-montserrat sft tp-resizeme rs-parallaxlevel-4"
                             data-x="left"
                             data-y="center" data-voffset="-140"
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
                             style="color: #333333; font-size: 30px; font-weight: bold; letter-spacing: 0px;"> Ортопедические матрасы <br>
                            Идеал для сна и тела </div>

                        <!-- Layer -->
                        <div class="tp-caption font-montserrat lfr tp-resizeme rs-parallaxlevel-4"
                             data-x="250"
                             data-y="center" data-voffset="-220"
                             data-speed="700"
                             data-start="1400"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-easing="Back.easeOut"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.1"
                             data-endelementdelay="0.1"
                             data-endspeed="300"
                             data-captionhidden="on"> <span class="off-tag">-10%</span> </div>

                        <!-- Layer -->
                        <div class="tp-caption sfb tp-resizeme  font-playfair text-center rs-parallaxlevel-4"
                             data-x="left"
                             data-y="center" data-voffset="-70"
                             data-speed="700"
                             data-start="1700"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-easing="Back.easeOut"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.1"
                             data-endelementdelay="0.1"
                             data-endspeed="300"
                             data-captionhidden="on"
                             style="color: #ababab; font-size: 18px; font-weight: 200; font-style:italic; letter-spacing:0px;"> Товары для сна</div>

                        <!-- Layer -->
                        <div class="tp-caption sfb tp-resizeme rs-parallaxlevel-4"
                             data-x="left"
                             data-y="center" data-voffset="0"
                             data-speed="700"
                             data-start="2400"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-easing="Back.easeOut"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.1"
                             data-endelementdelay="0.1"
                             data-endspeed="300"
                             data-captionhidden="on"
                             style="z-index: 10;"> <a href="<?=Url::to('/catalog/matrasy')?>" class="btn btn-1">ПОСМОТРЕТЬ ПРОДУКЦИЮ</a> </div>
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
                             style="color: #272727; font-size: 18px; font-weight: normal; letter-spacing: 3px; border-top:1px solid #272727; border-bottom:1px solid #272727; padding:20px 0;"> ОБЕДЕННЫЕ ЗОНЫ <br>
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
                             style="z-index: 10;"> <a href="<?=Url::to('/catalog/obedennye-zony')?>" class="btn btn-1">ПОСМОТРЕТЬ ПРОДУКЦИЮ</a> </div>
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
                        <div class="inn-sec animate fadeInLeft" data-wow-delay="0.6s"> <a href="<?=Url::to('/catalog/skafy-kupe')?>"> <img class="img-responsive" src="<?=Yii::getAlias('@static/banners/kupe.jpg')?>" alt="Шкафы-купе для дома в Самаре">
                                <div class="upper"><span> <small>ШКАФЫ - КУПЕ </small>ОТ -10% СКИДКИ</span> </div>
                            </a> </div>

                        <!-- ADD 2 -->
                        <div class="inn-sec animate fadeInLeft" data-wow-delay="0.6s"> <a href="<?=Url::to('/catalog/detskaa')?>"><img class="img-responsive" src="<?=Yii::getAlias('@static/banners/detskya.jpg')?>" alt="Детские для дома в Самаре">
                                <div class="upper"><span> <small>ДЕТСКИЕ </small> БОЛЬШОЙ ВЫБОР МОДУЛЕЙ</span> </div>
                            </a> </div>
                    </li>

                    <!-- ADD 3 -->
                    <li class="col-sm-4 animate fadeInUp" data-wow-delay="0.6s">
                        <div class="inn-sec trd"> <a href="<?=Url::to('/catalog/korpusnay-mebel')?>"> <img class="img-responsive" src="<?=Yii::getAlias('@static/banners/gostinaya.jpg')?>" alt="Гостиные для дома в Самаре">
                                <div class="upper"> <span> <small>ГОСТИНЫЕ </small> НОВЫЕ МОДЕЛИ</span>
                                    <h2>-10%</h2>
                                </div>
                            </a> </div>
                    </li>

                    <!-- ADD 1 -->
                    <li class="col-sm-4">
                        <div class="inn-sec animate fadeInRight" data-wow-delay="0.6s"> <a href="<?=Url::to('/catalog/spalni')?>"> <img class="img-responsive" src="<?=Yii::getAlias('@static/banners/spalnya.jpg')?>" alt="Спальни для дома в Самаре">
                                <div class="upper"><span> <small>СПАЛЬНИ </small> -10% СКИДКА НА КОМПЛЕКТ</span> </div>
                            </a> </div>

                        <!-- ADD 2 -->
                        <div class="inn-sec animate fadeInRight" data-wow-delay="0.6s"> <a href="<?=Url::to('/catalog/obedennye-zony')?>"> <img class="img-responsive" src="<?=Yii::getAlias('@static/banners/stol.jpg')?>" alt="Обеденные зоны для дома в Самаре">
                                <div class="upper"><span> <small>ОБЕДЕННЫЕ ЗОНЫ </small>-10% СКИДКА НА КОМПЛЕКТ</span> </div>
                            </a> </div>
                    </li>
                </ul>
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
    <!--======= New Arrival =========-->
    <section class="section-p-30px new-arrival new-arri-w-slide">
    <div class="container">

    <!--  Tittle -->
    <div class="tittle tittle-2 animate fadeInUp" data-wow-delay="0.4s">
        <h5>НОВЫЕ ПОСТУПЛЕНИЯ</h5>
        <hr>
        <p>тенденция моды для дома</p>
    </div>

    <!--  New Arrival Tabs Products  -->
    <div class="popurlar_product client-slide animate fadeInUp" data-wow-delay="0.4s">
        <?= FeaturedProductsWidget::widget([
            'limit' => 6,
        ]) ?>

    </div>
    </div>
    </section>



        <!--======= Core Feature =========-->
        <section class="section-p-60px our-clients">
            <div class="container">
                <!-- Tittle -->
                <div class="tittle tittle-2 animate fadeInUp" data-wow-delay="0.4s">
                    <h5>БРЕНДЫ С КОТОРЫМИ МЫ РАБОТАЕМ</h5>
                    <hr>
                    <p>Проверенное качество годами</p>
                </div>

                <!--  Text Intro -->
                <p class="font-montserrat intro text-center animate fadeInUp" data-wow-delay="0.4s">Мы знаем толк в мебели. Поэтому сотрудничаем с лучшими фабриками России.</p>
                <!--  Client Logo Slider -->
                <div class="client-slide animate fadeInUp" data-wow-delay="0.4s">
                    <div class="slide"><a href="#."><img class="img-responsive" src="<?=Yii::getAlias('@web/image/lerom.png')?>" alt=""></a></div>
                    <div class="slide"><a href="#."><img class="img-responsive" src="<?=Yii::getAlias('@web/image/natura_vera.png')?>" alt=""></a></div>
                    <div class="slide"><a href="#."><img class="img-responsive" src="<?=Yii::getAlias('@web/image/stolprom.png')?>" alt=""></a></div>
                    <div class="slide"><a href="#."><img class="img-responsive" src="<?=Yii::getAlias('@web/image/avrora.png')?>" alt=""></a></div>
                </div>
            </div>
        </section>

<?=$content?>
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