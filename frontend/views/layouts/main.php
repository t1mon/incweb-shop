<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use frontend\widgets\Shop\CartWidget;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use shop\entities\Shop\Category;

AppAsset::register($this);
\frontend\widgets\JgrowlWidget::widget();
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111095563-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-111095563-1');
    </script>

<meta charset="<?= Yii::$app->charset ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="yandex-verification" content="5a09ace581bf0355" />
    <meta name="google-site-verification" content="iOAJxOaiXvTY-De4ash5bJOIDAbaVrG5033k9y7Ij1o" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="<?= Html::encode(Url::canonical()) ?>" rel="canonical"/>
    <link href="<?= Yii::getAlias('@web/image/image_old/cart.png') ?>" rel="icon"/>


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter46982373 = new Ya.Metrika({
                        id:46982373,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true,
                        webvisor:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/46982373" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!-- LOADER ===========================================-->

<div id="loader">
  <div class="loader">
    <div class="position-center-center"> <img src="/image/logo-dark-new.png" alt="">
      
      <p class="font-playfair text-center">Загрузка...</p>
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

  <!-- Header -->
  <header class="header-style-2 header-style-3">
    <!-- Top Bar -->
    <div class="top-bar">
      <div class="container">
        <!-- Language -->
        <!--<div class="language"> <a href="#." class="active">EN</a> <a href="#.">FR</a> <a href="#.">GE</a> </div>-->
          <i class="fa fa-phone" aria-hidden="true"></i> 8 (846) 215-1665
          <i class="fa fa-clock-o" aria-hidden="true">24/7</i>


          <div class="top-links">
            <ul>
                <?php if (Yii::$app->user->isGuest): ?>
                    <li><a href="<?= Html::encode(Url::to(['/auth/auth/login'])) ?>">ВОЙТИ</a></li>
                    <li><a href="<?= Html::encode(Url::to(['/auth/signup/request'])) ?>">РЕГИСТРАЦИЯ</a></li>
                <?php else: ?>
                    <li><a href="<?= Html::encode(Url::to(['/cabinet/default/index'])) ?>">ПРОФИЛЬ</a></li>
                    <li><a href="<?= Html::encode(Url::to(['/auth/auth/logout'])) ?>" data-method="post">ВЫЙТИ</a></li>
                <?php endif; ?>
                <li><a href="<?= Html::encode(Url::to(['/cabinet/wishlist/index'])) ?>" id="wishlist-total"
                       title="Wish List"><i class="fa fa-heart"></i> <span class="hidden-xs hidden-sm hidden-md">Мои Желания</span></a>
                </li>
                <li><a href="<?= Url::to(['/shop/cart/index']) ?>" title="Корзина"><i
                                class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Корзина</span></a>
                </li>
               <!-- <li><a href="/index.php?route=checkout/checkout" title="Checkout"><i
                                class="fa fa-share"></i> <span class="hidden-xs hidden-sm hidden-md">Checkout</span></a>
                </li> -->
                <!--<li class="font-montserrat">CURRENCY:
                    <select class="selectpicker">
                        <option>USD</option>
                        <option>EURO</option>
                    </select>
                </li>-->
            </ul>
          <!-- Social Icons -->
          <ul class="social_icons">
            <li class="facebook"><a href="<?=Url::to('https://vk.com/mebelstyle.online')?> " target="_blank"><i class="fa fa-vk"></i> </a></li>
            <li class="twitter"><a href="#."><i class="fa fa-twitter"></i> </a></li>
            <li class="dribbble"><a href="#."><i class="fa fa-instagram"></i> </a></li>
           <!-- <li class="googleplus"><a href="#."><i class="fa fa-google-plus"></i> </a></li>
            <li class="linkedin"><a href="#."><i class="fa fa-linkedin"></i> </a></li> -->
          </ul>
        </div>
      </div>
    </div>

    <!-- Logo -->
    <div class="sticky">
    <div class="container">
        <div class="logo"> <a href="<?= Url::home() ?>"><img src="<?= Yii::getAlias('@web/image/logo-dark-new.png') ?>" alt="<?=$this->title?>"></a> </div>

        <!-- Nav -->
      <!-- Nav -->
        <nav class="webimenu">
          <!-- MENU BUTTON RESPONSIVE -->
          <div class="menu-toggle"> <i class="fa fa-bars"> </i> </div>
          <ul class="ownmenu">
              <li class="active"><a href="<?=Url::to(['/site/index'])?>">Главная</a></li>
              <li class="active"><a href="<?=Url::to(['/shop/catalog/index'])?>">Каталог</a></li>
              <li class="active"><a href="<?=Url::to(['/blog/post/index'])?>">Блог</a></li>
              <li class="active"><a href="<?=Url::to(['/contact/index'])?>">Контакты</a></li>
              <li><a href="tel:+78462151665"><i class="fa fa-phone" aria-hidden="true"></i> 8 (846) 215-1665 </a> </li>

          <!--======= Shopping Cart =========-->
              <?= CartWidget::widget() ?>
          <!--======= SEARCH ICON =========-->
                  <li class="search-nav sub-menu">
                      <a href="#."><i class="fa fa-search"></i></a>
                    <ul class="dropdown">
                      <li class="row">
                          <?= Html::beginForm(['/shop/catalog/search'], 'get') ?>
                        <div class="col-sm-4 no-padding">
                            <?php
                            $items = \yii\helpers\ArrayHelper::map(Category::find()->where(['<>','id',1])->all(),'id','name');
                            ?>
                            <?= Html::dropDownList('category', 'null', $items,['class'=>'selectpicker','prompt'=>'Выберите категорию...','onchange'=>'location ="/shop/catalog/search?category="+this.value;']);?>
                        </div>
                        <div class="col-sm-8 no-padding">
                          <input type="search" name="text" class="form-control" placeholder="Поиск...">
                          <button type="submit"> <i class="fa fa-search"></i> </button>
                        </div>
                          <?= Html::endForm() ?>
                      </li>
                    </ul>
                  </li>
        </ul>
      </nav>
    </div>
    </div>
  </header>
  <!-- Header End -->
    <div class="content">
    <!--======= SUB BANNER =========-->
<?php if (Yii::$app->controller->id != 'site'):?>
    <section class="sub-banner animate fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
        <div class="container">
            <h1><?=isset($this->params['breadcrumbs']) ? \shop\helpers\TitleHelper::getTitle($this->title): ''?></h1>
            <!-- Breadcrumb -->
            <?= Breadcrumbs::widget([
                'tag' => 'ol',
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </div>
    </section>
<?php endif; ?>
<!---
<div class="container">
        <div class="row">
            <?= Alert::widget() ?>
        </div>
</div>
--->

    <?= $content ?>

    </div>

  <!--======= Footer =========-->
  <footer>
    <div class="container">
      <div class="text-center"> <a href="#."><img src="/image/logo.png" alt=""></a><br>
        <img class="margin-t-40" src="/image/hammer.png" alt="">
        <p class="intro-small margin-t-40">Мебельный ОНЛАЙН магазин в Самаре MEBEL-STYLE. Мы знаем, какую мебель вы предпочитаете.</p>
      </div>
      
      <!--  Footer Links -->
      <div class="footer-link row">
        <div class="col-md-6">
          <ul>
            
            <!--  INFOMATION -->
            <li class="col-sm-6">
              <h5>ИНФОРМАЦИЯ</h5>
              <ul class="f-links">
                <li><a href="<?= Html::encode(Url::to(['/contact/index'])) ?>">КОНТАКТЫ</a></li>
                <li><a href="#.">ИНФОРМАЦИЯ О ДОСТАВКЕ</a></li>
                <li><a href="#.">ПОЛИТИКА КОНФИДЕНЦИАЛЬНОСТИ</a></li>
              </ul>
            </li>
            
            <!-- MY ACCOUNT -->
            <li class="col-sm-6">
              <h5>ПРОФИЛЬ</h5>
              <ul class="f-links">
                <li><a href="<?= Html::encode(Url::to(['/cabinet/default/index'])) ?>">МОЙ ПРОФИЛЬ</a></li>
                <li><a href="<?= Html::encode(Url::to(['/auth/auth/login'])) ?>"> ВОЙТИ</a></li>
                <li><a href="<?= Html::encode(Url::to(['/shop/cart/index'])) ?>"> МОЯ КОРЗИНА</a></li>
                <li><a href="<?= Html::encode(Url::to(['/cabinet/wishlist/index']))?>"> МОЙ ЖЕЛАНИЯ</a></li>
                <li><a href="<?= Html::encode(Url::to(['/shop/checkout/index']))?>"> ОФОРМИТЬ ЗАКАЗ</a></li>
              </ul>
            </li>
          </ul>
        </div>
        
        <!-- Second Row -->
        <div class="col-md-6">
          <ul class="row">
            
            <!-- TWITTER -->
            <li class="col-sm-6">
              <h5>TWITTER</h5>
              <p>Check out new work on my @Behance portfolio: "BCreative_Multipurpose Theme" http://on.be.net/1zOOfBQ </p>
            </li>
            
            <!-- FLICKR PHOTO -->
            <li class="col-sm-6">
              <h5>FLICKR PHOTO</h5>
              <ul class="flicker">
                <li><a href="#."><img src="/image/flicker-1.jpg" alt=""></a></li>
                <li><a href="#."><img src="/image/flicker-2.jpg" alt=""></a></li>
                <li><a href="#."><img src="/image/flicker-3.jpg" alt=""></a></li>
                <li><a href="#."><img src="/image/flicker-4.jpg" alt=""></a></li>
                <li><a href="#."><img src="/image/flicker-5.jpg" alt=""></a></li>
                <li><a href="#."><img src="/image/flicker-6.jpg" alt=""></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      
      <!-- Rights -->
      <div class="rights">
        <p>© <?=date('Y')?> MEBEL-STYLE <?=Yii::powered()?> Разработка IncWeb</p>
      </div>
    </div>
  </footer>  
  <!-- GO TO TOP --> 
  	<a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
  <!-- GO TO TOP End -->
</div>

<!-- Wrap End -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


