<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \shop\forms\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'КОНТАКТЫ';
$this->params['breadcrumbs'][] = $this->title;
\frontend\assets\GoogleMapsAsset::register($this);
?>

<!-- CONTENT START -->
<div class="content">

    <!-- Map -->
    <div id="map" class="animate fadeInUp" data-wow-delay="0.4s"></div>
    <!--======= BOXES =========-->
    <section class="section-p-60px contact-box animate fadeInUp" data-wow-delay="0.4s">
        <div class="container">
            <div class="row">

                <!-- Shop Location -->
                <div class="col-md-4 animate fadeInLeft" data-wow-delay="0.4s">
                    <div class="boxes-in">
                        <h6>НАШ АДРЕС</h6>
                        <ul class="location">
                            <li> <i class="fa fa-location-arrow"></i>
                                <p>г. Самара, ул. Партизанская 17 ТЦ Мега-Мебель
                                    3 этаж офис 304 "MEBEL-STYLE"</p>
                            </li>
                            <li> <i class="fa fa-phone"></i>
                                <p>Телефон: 8(846) 215 16 65</p>
                            </li>
                            <li> <i class="fa fa-envelope"></i>
                                <p>support@mebel-style.online</p>
                            </li>
                            <li> <i class="fa fa-clock-o"></i>
                                <p>ОТКРЫТ: 9:00 - 20:00 ПН-ПТ</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- NEWSLETTER -->
                <!--<div class="col-md-4 animate fadeInUp" data-wow-delay="0.4s">
                    <div class="boxes-in">
                        <h6>МЫ В ВКОНТАКТЕ</h6>
                        <!-- VK Widget -->
                <!-- <div id="vk_groups"></div>
                 <script type="text/javascript">
                     VK.Widgets.Group("vk_groups", {mode: 4, wide: 1, height: "400"}, 132528657);
                 </script>
                 <!--======= FOOTER ICONS =========-->
                <!-- <ul class="social_icons">
                     <li class="facebook"><a href="#."> <i class="fa fa-facebook"></i></a></li>
                     <li class="twitter"><a href="#."> <i class="fa fa-twitter"></i></a></li>
                     <li class="googleplus"><a href="#."> <i class="fa fa-google"></i></a></li>
                     <li class="skype"><a href="#."> <i class="fa fa-skype"></i></a></li>
                     <li class="pinterest"><a href="#."> <i class="fa fa-pinterest"></i></a></li>
                     <li class="dribbble"><a href="#."> <i class="fa fa-dribbble"></i></a></li>
                     <li class="flickr"><a href="#."> <i class="fa fa-flickr"></i></a></li>
                     <li class="behance"><a href="#."> <i class="fa fa-behance"></i></a></li>
                     <li class="linkedin"><a href="#."> <i class="fa fa-linkedin"></i></a></li>
                     <li class="youtube"><a href="#."> <i class="fa fa-youtube"></i></a></li>
                     <li class="instagram"><a href="#."> <i class="fa fa-instagram"></i></a></li>
                     <li class="stumbleupon"><a href="#."> <i class="fa fa-stumbleupon"></i></a></li>
                     <li class="soundcloud"><a href="#."> <i class="fa fa-soundcloud"></i></a></li>
                 </ul> -->
                <!-- </div>
             </div> -->

                <!-- TESTIMONIAL -->
                <div class="col-md-4 animate fadeInRight" data-wow-delay="0.4s">
                    <div class="boxes-in">
                        <h6>СЛУЖБА ПОДДЕРЖКИ</h6>
                        <div class="media">
                            <div class="media-left">
                                <!--  Image -->
                                <div class="avatar"> <a target="_blank" href="https://vk.com/id52154333"> <img class="media-object" src="/image/avatar-pavel.jpg" alt=""> </a> </div>
                            </div>
                            <!--  Details -->
                            <div class="media-body">
                                <h5>ПАВЕЛ</h5>
                                <p>Менеджер по работе с клиентами</p>
                                <!--<span><i class="fa fa-skype"></i> adnan.arif69</span> </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!--======= Contact Us =========-->
    <section class="section-p-30px conact-us no-padding-b animate fadeInUp" data-wow-delay="0.4s">
        <!--======= CONTACT FORM =========-->
        <div class="container">
            <!-- Tittle -->
            <div class="tittle">
                <p>Пожалуйста, обращаться к нам, если у вас есть какие-либо вопросы, комментарии или сообщения.
                    Мы постараюсь ответить в кротчайшие сроки!</p>
            </div>
            <div class="contact section-p-30px no-padding-b">
                <div class="contact_form">
                    <!--======= FORM  =========-->
                    <?php $form = ActiveForm::begin(['id' => 'contact-form', 'class' => 'contact_form']); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="row">
                                    <li class="col-sm-12">
                                        <label>
                                            <?= $form->field($model, 'name')->textInput(['placeholder'=>'ВВЕДИТЕ ИМЯ'])->label(false) ?>
                                        </label>
                                    </li>
                                    <li class="col-sm-12">
                                        <label>
                                            <?= $form->field($model, 'email')->textInput(['placeholder'=>'ВВЕДИТЕ EMAIL'])->label(false) ?>
                                        </label>
                                    </li>
                                    <li class="col-sm-12">
                                        <label>
                                            <?= $form->field($model, 'verifyCode')->widget(
                                                \himiklab\yii2\recaptcha\ReCaptcha::className())->label(false) ?>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="row">
                                    <li class="col-sm-12">
                                        <label>
                                            <?= $form->field($model, 'subject')->textInput(['placeholder'=>'ВВЕДИТЕ ТЕМУ ПИСЬМА'])->label(false) ?>
                                        </label>
                                    </li>
                                    <li class="col-sm-12">
                                        <label>
                                            <?= $form->field($model, 'body')->textarea(['rows' => 6, 'placeholder'=>'ВВЕДИТЕ СООБЩЕНИЕ'])->label(false) ?>
                                        </label>
                                    </li>
                                    <li class="col-sm-12 no-margin">
                                        <?= Html::submitButton('ОТПРАВИТЬ ПИСЬМО', ['class' => 'btn', 'name' => 'contact-button']) ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </section>


</div>

<?php
$script = <<<JS
var map;
function initialize_map() {
if ($('#map').length) {
	var myLatLng = new google.maps.LatLng(53.191095,50.167357);
	var mapOptions = {
		zoom: 16,
		center: myLatLng,
		scrollwheel: false,
		panControl: false,
		zoomControl: true,
		scaleControl: false,
		mapTypeControl: false,
		streetViewControl: false
	};
	map = new google.maps.Map(document.getElementById('map'), mapOptions);
	var marker = new google.maps.Marker({
		position: myLatLng,
		map: map,
		tittle: 'Envato',
		icon: './image/map-locator-new.png'
	});
} else {
	return false;
}
}
google.maps.event.addDomListener(window, 'load', initialize_map);
JS;

$this->registerJs($script,\yii\web\View::POS_READY);
?>


<!-- VK Widget -->
<div id="vk_community_messages"></div>
<script type="text/javascript">
    VK.Widgets.CommunityMessages("vk_community_messages", 132528657, {expandTimeout: "225000",widgetPosition: "left",disableExpandChatSound: "1",tooltipButtonText: "Есть вопрос?", buttonType:'blue_circle', expanded:"0"});
</script>
