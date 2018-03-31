<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\widgets\Blog\LastPostsWidget;
use frontend\widgets\Shop\FeaturedProductsWidget;
use yii\helpers\Url;

\frontend\assets\OwlCarouselAsset::register($this);

?>
<?php $this->beginContent('@frontend/views/layouts/main.php') ?>
<?php $this->title = 'Мебель в Самаре - купить мебель по ценам производителя! Жми'?>
<?php
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'Мебель в Самаре, купить мебель в Самаре, много мебели в Самаре, где купить мебель в самаре, интернет магазин мебели, мебельный магазин, хорошая мебель, цена мебель товар '
]);
$this->registerMetaTag([
    'name' => 'description',
    'content' => ' Купить хорошую мебель в Самаре в ассортименте от проверенных производителей. Гарантия качества, низкой цены на мебель из нашего каталога.'
]);
?>
    <!--======= HOME MAIN SLIDER =========-->
    <section class="home-slider boxedcontainer">
        <div class="tp-banner-container">
            <div class="tp-banner-fix" >
                <ul>
                    <!-- Slider 1 -->
                    <li data-transition="fade" data-slotamount="7"> <img src="<?=Yii::getAlias('@static/banners/divan-banner.jpg')?>" data-bgposition="center center" alt="" />
                        <div class="overlay"></div>
                        <!-- Layer -->
                        <div class="tp-caption sft tp-resizeme rs-parallaxlevel-5"
                             data-x="100"
                             data-y="110"
                             data-speed="3000"
                             data-start="4000"
                             data-easing="easeOutBack"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.1"
                             data-endelementdelay="0.1"
                             data-endspeed="300"
                             data-captionhidden="on"> <img src="<?=Yii::getAlias('@web/image/avrora.png')?>" alt="" /> </div>
                        <div class="tp-caption sft tp-resizeme rs-parallaxlevel-5"
                             data-x="100"
                             data-y="80"
                             data-speed="3000"
                             data-start="4000"
                             data-easing="easeOutBack"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.1"
                             data-endelementdelay="0.1"
                             data-endspeed="300"
                             data-captionhidden="on"> <img src="<?=Yii::getAlias('@static/banners/aurora-logo.png')?>" alt="" /> </div>

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
                             style="color: #fff; font-size: 40px; text-transform: uppercase; font-weight: bold; letter-spacing:3px;">  МЯГКАЯ МЕБЕЛЬ </div>

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
                             style="color: #fff; font-size: 20px; padding: 10px"> Фабрика мягкой мебели «Аврора» поставляет на российский рынок<br> огромную линейку продукции представительского, среднего и эконом-класса.</div>
                        <div class="tp-caption sfb tp-resizeme rs-parallaxlevel-4"
                             data-x="center"
                             data-y="280" data-voffset="0"
                             data-speed="3000"
                             data-start="4000"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-easing="Back.easeOut"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.1"
                             data-endelementdelay="0.1"
                             data-endspeed="300"
                             data-captionhidden="on"
                             style="z-index: 10; margin-left: 50px;"> <a href="<?=Url::to('/catalog/magkaa-mebel')?>" class="btn btn-white">ПОСМОТРЕТЬ КАТАЛОГ МЯГКОЙ МЕБЕЛИ</a> </div>

                    </li>
                    <!-- Slider 2 -->
                    <li data-transition="fade" data-slotamount="7"> <img src="<?=Yii::getAlias('@static/banners/karina-lerom.jpg')?>" data-bgposition="center top" alt="" />
                        <div class="overlay"></div>
                        <!-- Layer -->
                        <div class="tp-caption sft tp-resizeme rs-parallaxlevel-5"
                             data-x="100"
                             data-y="100"
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
                             style="color: #fff; font-size: 60px; text-transform: uppercase; font-weight: bold; letter-spacing:3px;">  УЖЕ В ПРОДАЖЕ </div>

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
                    <li data-transition="random" data-slotamount="7"> <img src="<?=Yii::getAlias('@static/banners/matras.jpg')?>" data-bgposition="center center" alt="" />
                        <!-- SLIDER LAYERS -->
                        <div class="tp-caption lfr tp-resizeme rs-parallaxlevel-4"
                             data-x="right"
                             data-y="top"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="700"
                             data-start="2000"
                             data-easing="Back.easeOut"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.1"
                             data-endelementdelay="0.1"
                             data-endspeed="300"
                             data-captionhidden="on"
                             style="z-index: 1;"> <img src="<?=Yii::getAlias('@static/banners/matras.png')?>" alt=""> </div>
                        <div class="tp-caption sft tp-resizeme rs-parallaxlevel-4"
                             data-x="right"
                             data-y="top"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="700"
                             data-start="4000"
                             data-easing="Back.easeOut"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.1"
                             data-endelementdelay="0.1"
                             data-endspeed="300"
                             data-captionhidden="on"
                             style="z-index: 2;"> <img src="<?=Yii::getAlias('@web/image/natura_vera.png')?>" alt=""> </div>

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
                             style="color: #fff; font-size: 30px; font-weight: bold; letter-spacing: 0px; padding-left: 15px;"> Ортопедические матрасы <br>
                            Все размеры<br>
                            Идеал для сна и тела </div>

                        <!-- Layer -->
                        <!--<div class="tp-caption font-montserrat lfr tp-resizeme rs-parallaxlevel-4"
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
                             data-captionhidden="on"> <span class="off-tag" style="background-color: red">СКИДКИ<br> до<br> -10%</span> </div>-->

                        <!-- Layer -->
                        <!--<div class="tp-caption sfb tp-resizeme  font-playfair text-center rs-parallaxlevel-4"
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
                             style="color: #ababab; font-size: 18px; font-weight: 200; font-style:italic; letter-spacing:0px;"> Товары для сна</div>-->

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
                             style="z-index: 10; margin-left: 50px;"> <a href="<?=Url::to('/catalog/matrasy')?>" class="btn btn-1">ПОСМОТРЕТЬ ВСЕ МОДЕЛИ</a> </div>
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
                             style="z-index: 1;"> <img src="<?=Yii::getAlias('@static/banners/stul.png')?>" alt=""> </div>

                        <!-- Layer -->
                        <div class="tp-caption font-montserrat text-center text-uppercase sft tp-resizeme rs-parallaxlevel-4"
                             data-x="20"
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
                             data-x="50"
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
                             style="z-index: 10;"> <a href="<?=Url::to('/catalog/obedennye-zonyy')?>" class="btn btn-1">ПОСМОТРЕТЬ ПРОДУКЦИЮ</a> </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="section-p-60px about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12 animate fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                    <div class="sma-hed">
                        <h1 style="font-size: 1.3em; font-weight: bold;">Мебель в Самаре. Купить мебель по ценам производителя.</h1>
                    </div>
                    <div class="about-detail">
                        <p>
                            Практичные потребители, умеющие ценить качественную продукцию, не задаются вопросом, <b>где купить мебель в Самаре</b>. Они знают, что если нужно оформить модный, красивый и максимально комфортный интерьер, необходимо отправиться в «MEBEL-STYLE».
                            Высокая популярность нашего интернет-магазина не является результатом дорогой рекламной кампании. Внимание и любовь потребителей мы заслужили благодаря большому ассортименту качественной, надежной продукции, грамотной ценовой политике, высокому уровню сервиса. Каждому потребителю мы поможем купить мебель в Самаре, идеально оформить интерьер без необоснованных затрат.
                        </p>
                    <p>
                        <b style="font-size: 1.3em;">Весь спектр мебельной продукции в нашем каталоге</b><br>
                            Создать в доме уютную обстановку, обеспечить жилью современный, стильный вид помогает хорошая мебель, соответствующая личным предпочтениям и новейшим тенденциям. В нашем интернет-магазине вы найдете все, что требуется для комфортного домашнего очага:
                    </p>
                        <ol class="ol_home">
                            <li ><a href="<?=Url::to('/catalog/korpusnay-mebel')?>">корпусные конструкции;</a></li>
                            <li><a href="<?=Url::to('/catalog/magkaa-mebel')?>">мягкие уголки, диваны и кресла;</a></li>
                            <li><a href="<?=Url::to('/catalog/obedennye-zonyy')?>">столы разных типов и стулья;</a></li>
                            <li><a href="<?=Url::to('/catalog/matrasy')?>">ортопедические матрасы.</a></li>
                        </ol><br>
                        <p>
                            У нас вы можете заказать лучшую <b>мебель в Самаре</b>, изготовленную известными фабриками: Аврора, Лером, СтолПром, Disavi, Aurora, Мебель из Малайзии. Потребители успели оценить по достоинству высокое качество этой продукции, ее эстетические показатели.
                            Ассортимент товаров, представленных в нашем каталоге, включает несколько сотен наименований. Это является гарантией оптимального выбора, дает возможность каждому покупателю найти изделия, отвечающие всем требованиям. Все изделия имеют сертификаты, подтверждающие качество и экологическую безопасность.
                        </p>
                        <p>
                            <b style="font-size: 1.3em;">Удобная и выгодная покупка предметов обстановки в MEBEL-STYLE</b><br>
                            <b>Много мебели в Самаре</b> предлагают специализированные розничные предприятия. Но не всегда удается сделать удачную покупку предметов для дома. На долгие поиски нужного изделия у жителя мегаполиса нет времени, ассортимент любого магазина ограничен, не предоставляет весь спектр продукции. Может не устраивать цена изделий, включающая различные надбавки, наценки.
                            Наш <b>интернет-магазин мебели</b> устраняет все эти препятствия. У нас:
                        </p>
                        <ol class="ol_home">
                                <li>вы можете выбрать, заказать нужный товар, не выходя из дома;</li>
                                <li>представлен полный ассортимент мебели во всех ценовых сегментах;</li>
                                <li>предлагается оперативная доставка заказа.</li>
                        </ol><br>
                        <p>
                            Каталог оснащен фильтрами, обеспечивающими оперативный поиск нужного предмета. Качественные фото, описания позволяют сделать грамотный выбор. Вы можете посмотреть образцы в ТЦ «Мега Мебель», расположенном на Партизанской улице д.17 на 3 этаже в офисе 304 (вход со двора).<br>
                            <b>Мебельный магазин</b> в сети позволяет выгодно приобрести качественную продукцию. Изделия поставляются с фабрик без участия посредников, нет розничных наценок, покрывающих расходы на содержание торговых залов. Поэтому у нас <b>цена</b> на <b>товары мебели</b> минимальная, обновление домашнего интерьера не потребует чрезмерных затрат.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 animate fadeInRight hidden-xs" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                    <img class="img-responsive" src="<?=Yii::getAlias('@static/banners/ofis.jpg')?>" alt="Магазин мебели «Мебель Стайл»">
                </div>
                <div class="col-md-6 animate fadeInRight hidden-xs" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                    <span class="text-center" style="font-size: 1.3em;font-weight: bold;">Наши преимущества</span>
                    <!--  About Featured -->
                    <ul class="about-feat">

                        <!--  WORLD WIDE SHIP -->
                        <li class="animate fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                            <div class="media">
                                <div class="media-left"> <i class="fa fa-thumbs-o-up"></i> </div>
                                <div class="media-body">
                                    <span class="media-heading" style="font-size: 1em;">НИЗКИЕ ЦЕНЫ</span>
                                    <p>Вы экономите свои деньги преобретая товар у нас</p>
                                </div>
                            </div>
                        </li>

                        <!--  MONEY BACK -->
                        <li class="animate fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                            <div class="media">
                                <div class="media-left"> <i class="fa fa-truck"></i> </div>
                                <div class="media-body">
                                    <span class="media-heading" style="font-size: 1em;">ДОСТАВКА И СБОРКА В ОДИН ДЕНЬ</span>
                                    <p>Вам останется только принять работу</p>
                                </div>
                            </div>
                        </li>

                        <!--  BEST SUPPORT -->
                        <li class="animate fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                            <div class="media">
                                <div class="media-left"> <i class="fa fa-user"></i> </div>
                                <div class="media-body">
                                    <span style="font-size: 1em;" class="media-heading">ПЕРСОНАЛЬНЫЙ МЕНЕДЖЕР КАЖДОМУ КЛИЕНТУ</span>
                                    <p>24/7 На протяжении всего времени заказа</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
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
                        <div class="inn-sec animate fadeInLeft" data-wow-delay="0.6s"> <a href="<?=Url::to('/catalog/korpusnay-mebel')?>"> <img class="img-responsive" src="<?=Yii::getAlias('@static/banners/ghost-menu.jpg')?>" alt="Шкафы-купе для дома в Самаре">
                                <div class="upper"><span> <small>ГОСТИНЫЕ </small></span> </div>
                            </a> </div>

                        <!-- ADD 2 -->
                        <div class="inn-sec animate fadeInLeft" data-wow-delay="0.6s"> <a href="<?=Url::to('/catalog/matrasy')?>"><img class="img-responsive" src="<?=Yii::getAlias('@static/banners/matras-menu.jpg')?>" alt="Детские для дома в Самаре">
                                <div class="upper"><span> <small>ОРТОПЕДИЧЕСКИЕ МАТРАСЫ </small></span> </div>
                            </a> </div>
                    </li>

                    <!-- ADD 3 -->
                    <li class="col-sm-4">
                        <div class="inn-sec animate fadeInDown" data-wow-delay="0.6s">
                            <a href="<?=Url::to('/catalog/spalni')?>"> <img class="img-responsive" src="<?=Yii::getAlias('@static/banners/spalnya-menu.jpg')?>" alt="Гостиные для дома в Самаре">
                                <div class="upper"> <span> <small>СПАЛЬНИ </small></span></div>
                            </a>
                        </div>
                        <div class="inn-sec animate fadeInUp" data-wow-delay="0.6s">
                            <a href="<?=Url::to('/catalog/magkaa-mebel')?>"> <img class="img-responsive" src="<?=Yii::getAlias('@static/banners/divan-menu.jpg')?>" alt="Гостиные для дома в Самаре">
                                <div class="upper"> <span> <small>МЯГКАЯ МЕБЕЛЬ </small></span></div>
                            </a>
                        </div>
                    </li>

                    <!-- ADD 1 -->
                    <li class="col-sm-4">
                        <div class="inn-sec animate fadeInRight" data-wow-delay="0.6s"> <a href="<?=Url::to('/catalog/skafy-kupe')?>"> <img class="img-responsive" src="<?=Yii::getAlias('@static/banners/kupe-menu.jpg')?>" alt="Спальни для дома в Самаре">
                                <div class="upper"><span> <small>ШКАФЫ-КУПЕ </small></span> </div>
                            </a> </div>

                        <!-- ADD 2 -->
                        <div class="inn-sec animate fadeInRight" data-wow-delay="0.6s"> <a href="<?=Url::to('/catalog/obedennye-zonyy')?>"> <img class="img-responsive" src="<?=Yii::getAlias('@static/banners/stol-menu.jpg')?>" alt="Обеденные зоны для дома в Самаре">
                                <div class="upper"><span> <small>ОБЕДЕННЫЕ ЗОНЫ </small></span> </div>
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
        <span style="font-size: 2.1em; font-weight: bold">НОВЫЕ ПОСТУПЛЕНИЯ</span>
        <hr>
        <p>тенденция моды для дома</p>
    </div>

    <!--  New Arrival Tabs Products  -->
    <div class="popurlar_product client-slide animate fadeInUp" data-wow-delay="0.4s">
        <?= FeaturedProductsWidget::widget([
            'limit' => 10,
        ]) ?>

    </div>
    </div>
    </section>



        <!--======= Core Feature =========-->
        <section class="section-p-60px our-clients">
            <div class="container">
                <!-- Tittle -->
                <div class="tittle tittle-2 animate fadeInUp" data-wow-delay="0.4s">
                    <span style="font-size: 2.1em; font-weight: bold">БРЕНДЫ С КОТОРЫМИ МЫ РАБОТАЕМ</span>
                    <hr>
                    <p>Проверенное качество годами</p>
                </div>

                <!--  Text Intro -->
                <p class="font-montserrat intro text-center animate fadeInUp" data-wow-delay="0.4s">Мы знаем толк в мебели. Поэтому сотрудничаем с лучшими фабриками России.</p>
                <!--  Client Logo Slider -->
                <div class="client-slide animate fadeInUp" data-wow-delay="0.4s">
                    <div class="slide"><a href="<?=Url::to(['/shop/catalog/brand','id'=>'2'])?>"><img class="img-responsive" src="<?=Yii::getAlias('@web/image/lerom.png')?>" alt=""></a></div>
                    <div class="slide"><a href="<?=Url::to(['/shop/catalog/brand','id'=>'6'])?>"><img class="img-responsive" src="<?=Yii::getAlias('@web/image/natura_vera.png')?>" alt=""></a></div>
                    <div class="slide"><a href="<?=Url::to(['/shop/catalog/brand','id'=>'5'])?>"><img class="img-responsive" src="<?=Yii::getAlias('@web/image/stolprom.png')?>" alt=""></a></div>
                    <div class="slide"><a href="<?=Url::to(['/shop/catalog/brand','id'=>'7'])?>"><img class="img-responsive" src="<?=Yii::getAlias('@web/image/avrora.png')?>" alt=""></a></div>
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