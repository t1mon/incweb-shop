<?php

/* @var $this yii\web\View */

?>


<!--======= Subcribe =========-->
<section class="subcribe news-letter animate fadeInUp" data-wow-delay="0.4s" data-stellar-background-ratio="0.8">
    <div class="overlay">
        <div class="container">
            <!-- Tittle -->
            <div class="tittle tittle-2 white animate fadeInUp" data-wow-delay="0.4s">
                <h5>ПОДПИСАТЬСЯ НА НОВОСТИ</h5>
                <hr>
                <p>Вы будете подписаны на самые интересные новости блога MEBEL-STYLE, будьте в курсе новинок мебельной индустрии и интерьера. Обещаем спамить не будем! </p>
            </div>

            <!--  Subsribe Form -->
            <div class="news-letter-form animate fadeInUp" data-wow-delay="0.4s">
                <div class="sub-mail">
                    <?php $form = \yii\bootstrap\ActiveForm::begin(); ?>
                    <input type="search" name="SubscribeForm[email]" placeholder="ВАШ EMAIL АДРЕС..">
                    <!--  Button -->
                    <?= \yii\helpers\Html::submitButton('ПОДПИСАТЬСЯ', ['type' => 'submit']) ?>
                    <?php \yii\bootstrap\ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>