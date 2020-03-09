<?php
$this->title = 'Розыгрыш прихожей в интернет-магазине мебели MEBEL-STYLE';
?>

<section class="section-p-60px about-us" xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <div class="row">
            <div class="col-md-5 animate fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                <div class="sma-hed">
                    <h5>ЗАБИРАЙ ПРИХОЖУЮ БЕСПЛАТНО</h5>
                </div>

                <div class="about-detail">
                    <p>
                    🎄  Мы запускаем НОВОГОДНИЙ МЕГА-КОНКУРС в котором разыграем прихожую фабрики "Лером" на сумму более 20000 рублей.<br /><br />
                        🥇 место - Победитель получает набор прихожей фабрики "Лером". В набор мебели входит шкаф, вешалка для одежды + тумба <br />
                        🥈место - Победитель получает обувницу фабрики "Лером" <br />
                        🥉 место - Победитель получает единоразовую скидку 20% на любой ассортимент (не участвующий в акции). <br />
                        И ровно 15 Марта 2018 года мы случайным образом выберем 3 победителей. Участвуйте, делитесь этим конкурсом с друзьями и побеждайте. Всем удачи!

                    </p>
                    <div class="sma-hed">
                        <h6 >ДЛЯ ПРИНЯТИЯ УЧАСТИЯ В РОЗЫГРЫШЕ НУЖНО:</h6>
                    </div>
                    <!--  About Featured -->
                    <ul class="about-feat">

                        <!--  WORLD WIDE SHIP -->
                        <li class="animate fadeInUp"  style="visibility: visible;  animation-name: fadeInUp;">
                            <div class="media">
                                <div class="media-left"> <i class="fa fa-vk" aria-hidden="true"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading">АВТОРИЗОВАТЬСЯ НА САЙТЕ
                                        <a  href="<?= \yii\helpers\Html::encode(\yii\helpers\Url::to(['/auth/network/auth','authclient'=>'vk'])) ?>">
                                            <img class="img-responsive" style="margin-top: 5px" src="<?= Yii::getAlias('@web/image/auth-vk.png') ?>" style="max-width:400px; " alt="Вход на сайт через Вконтакте">
                                        </a>
                                    </h6>
                                    <p>Вы будете перенаправлены на страницу авторизации ВКонтакте, где наше официальное приложение MEBEL-STYLE попросит разрешение предоставить информацию с вашего аккаунта.</p>
                                </div>
                            </div>
                        </li>

                        <!--  MONEY BACK -->
                        <li class="animate fadeInUp"  style="visibility: visible; animation-name: fadeInUp;">
                            <div class="media">
                                <div class="media-left"> <i class="fa fa-users" aria-hidden="true"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading"><a  href="https://vk.com/mebelstyle.online" target="_blank">ВСТУПИТЬ В НАШУ ГРУППУ ВКОНТАКТЕ</a></h6>
                                    <p>Быть жителем города Самары или Самарской области</p>
                                </div>
                            </div>
                        </li>

                        <!--  MONEY BACK -->
                        <li class="animate fadeInUp"  style="visibility: visible; animation-name: fadeInUp;">
                            <div class="media">
                                <div class="media-left"> <i class="fa fa-retweet" aria-hidden="true"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading">СДЕЛАТЬ РЕПОСТ ЭТОЙ ЗАПИСИ</h6>
                                        <script type="text/javascript" src="https://vk.com/js/api/share.js?95" charset="windows-1251"></script>

                                        <!-- Put this script tag to the place, where the Share button will be -->
                                        <script type="text/javascript"><!--
                                            document.write(VK.Share.button(false,{type: "round", text: "Репостнуть"}));
                                            --></script>
                                    <p>и проверить участие в розыгрыше по <a href="<?= \yii\helpers\Html::encode(\yii\helpers\Url::to(['/site/rally'])) ?>">ссылке</a></p>
                                </div>
                            </div>
                        </li>

                        <!--  BEST SUPPORT -->
                        <li class="animate fadeInUp"  style="visibility: visible; animation-name: fadeInUp;">
                            <div class="media">
                                <div class="media-left"> <i class="fa fa-whatsapp"></i> </div>
                                <div class="media-body">
                                    <h6 class="media-heading">СЛУЖБА ПОДДЕРЖКИ</h6>
                                    <p>8 (846) 215-16-65</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!--  Video Section -->
            <div class="col-md-7 animate fadeInRight" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInRight;"> <img class="img-responsive" src="<?=\Yii::getAlias('@static/rally/rally.jpg')?>" alt="">

            </div>
        </div>
    </div>
</section>