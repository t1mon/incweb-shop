<?php
/**
* @var $user /shop/entities/User/User
 * @var $isGroupVK
 *
 *
 */
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Розыгрыш - Онлайн магазин мебели в Самаре</title>
    <link href="/image/image_old/cart.png" rel="icon"/>
    <meta name="keywords" content="">
    <meta name="description" content="">


    <!-- FONTS ONLINE -->
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!--MAIN STYLE-->
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    <link href="/css/responsive.css" rel="stylesheet" type="text/css">
    <link href="/css/animate.css" rel="stylesheet" type="text/css">
    <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- ADD YOUR OWN STYLING HERE. AVOID TO USE STYLE.CSS AND MAIN.CSS. IT WILL BE HELPFUL FOR YOU IN FUTURE UPDATES -->
    <link href="/css/custom.css" rel="stylesheet" type="text/css">

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="/rs-plugin/css/settings.css" media="screen" />

    <!-- JavaScripts -->
    <script src="/js/modernizr.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- LOADER ===========================================-->
<div id="loader">
    <div class="loader">
        <div class="position-center-center"> <img src="/image/logo-dark-new.png" alt="">

            <p class="font-playfair text-center">Пожалуйста подождите...</p>
            <div class="loading">
                <div class="ball"></div>
                <div class="ball"></div>
                <div class="ball"></div>
            </div>
        </div>
    </div>
</div>

<!-- Page Wrap -->
<div id="wrap">

    <!-- Coming Soon -->
    <div class="coming-soon" style="background: url('<?=\Yii::getAlias('@static/rally/rally1.jpg')?>') center center fixed no-repeat;">
        <div class="container">
            <div class="avatar animate fadeInUp" data-wow-delay="0.4s"> <img src="<?=\Yii::getAlias('@static/rally/icon.png')?>" alt="" > </div>
            <h1 class="animate fadeInUp" data-wow-delay="0.4s">ВНИМАНИЕ РОЗЫГРЫШ</h1>
            <?php if($isGroupVK):?>
            <h3 class="animate fadeInUp" data-wow-delay="0.4s">Приветствуем вас <?=$user->getSurnameName()?></h3>
                <h4 class="animate fadeInUp" data-wow-delay="0.4s">Поздравляем. Вы являетесь участником розыгрыша</h4>
                <img class="margin-t-40 margin-b-40 animate fadeInUp" data-wow-delay="0.4s" src="/image/hammer-soon.png" alt="" >
                <p class="animate fadeInUp" data-wow-delay="0.4s"> provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. </p>
                <ul>
                    <li><b>1 МЕСТО:</b> Победитель получает набор прихожей фабрики Лером. В набор мебели входит шкаф, вешалка для одежды + тумба</li>
                    <li><b>2 МЕСТО:</b> Победитель получает обувницу фабрики Лером</li>
                    <li><b>3 МЕСТО:</b> Победитель получает единоразовую скидку 20% на любой ассортимент <a href="<?=\yii\helpers\Url::to(['/catalog'])?>">на сайте</a></li>
                </ul>
                <a href="<?=\yii\helpers\Url::home()?>" class="btn btn-white">ПОСЕТИТЬ САЙТ</a>
                <h3 class="countdown animate fadeInUp" data-wow-delay="0.4s">НАЧАЛО РОЗЫГРЫША ЧЕРЕЗ: </h3>
                <div id="timer">
                    <div class="time">

                        <!-- Countdown-->
                        <ul class="countdown animate fadeInUp" data-wow-delay="0.4s">
                            <!--======= Days =========-->
                            <li> <span class="days">00</span>
                                <p class="days_ref">days</p>
                            </li>
                            <!--======= Hours =========-->
                            <li>
                                <div> <span class="hours">00</span>
                                    <p class="hours_ref">hours</p>
                                </div>
                            </li>
                            <!--======= Mintes =========-->
                            <li> <span class="minutes">00</span>
                                <p class="minutes_ref">minutes</p>
                            </li>
                            <!--======= Seconds =========-->
                            <li> <span class="seconds">00</span>
                                <p class="seconds_ref">seconds</p>
                            </li>
                        </ul>
                        <!-- Countdown end-->
                    </div>
                </div>
                <center style="margin-top:50px "><script type="text/javascript" src="//vk.com/js/api/openapi.js?150"></script>

                    <!-- VK Widget -->
                    <div id="vk_groups"></div>
                    <script type="text/javascript">
                        VK.Widgets.Group("vk_groups", {mode: 1, color1: '333', color2: 'FFF', color3: 'FFF',height: "300"}, 132528657);
                    </script></center>
                <!--======= FOOTER ICONS =========-->
            <?php else:?>
                <h3 class="animate fadeInUp" data-wow-delay="0.4s" style="color: #9d261d">Для участия в розыгрыше, вам необходимо вступить в группу и обновить страницу:</h3>
                <center style="margin-top:50px "><script type="text/javascript" src="//vk.com/js/api/openapi.js?150"></script>

                    <!-- VK Widget -->
                    <div id="vk_groups"></div>
                    <script type="text/javascript">
                        VK.Widgets.Group("vk_groups", {mode: 1, color1: '333', color2: 'FFF', color3: 'FFF',height: "300"}, 132528657);
                    </script></center>
                <a href="<?=\yii\helpers\Url::to(['rally'])?>"  class="btn btn-white">Обновить страницу</a><br>
            <?php endif;?>

            <!--
            <ul class="social_icons animate fadeInUp" data-wow-delay="0.4s">
                <li class="facebook"><a href="#."> <i class="fa fa-facebook"></i></a></li>
                <li class="twitter"><a href="#."> <i class="fa fa-twitter"></i></a></li>
                <li class="googleplus"><a href="#."> <i class="fa fa-google"></i></a></li>
                <li class="skype"><a href="#."> <i class="fa fa-skype"></i></a></li>
                <li class="pinterest"><a href="#."> <i class="fa fa-pinterest"></i></a></li>
                <li class="dribbble"><a href="#."> <i class="fa fa-dribbble"></i></a></li>
                <li class="flickr"><a href="#."> <i class="fa fa-flickr"></i></a></li>
            </ul> -->
        </div>
    </div>
</div>
<!-- Wrap End -->
<script src="/js/jquery-1.11.3.js"></script>
<script src="/js/wow.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/own-menu.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/jquery.magnific-popup.min.js"></script>
<script src="/js/jquery.isotope.min.js"></script>
<script src="/js/jquery.flexslider-min.js"></script>
<script src="/js/jquery.downCount.js"></script>

<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script type="text/javascript" src="/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="/js/main.js"></script>
<script type="text/javascript">
    /* ==========================================================================
        countdown timer
    ========================================================================== */
    (function($) {
        "use strict";

        $('.countdown').downCount({
            date: '12/14/2017 12:00:00' // M/D/Y
        });
    })(jQuery);
</script>
</body>
</html>