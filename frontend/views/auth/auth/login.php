<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \shop\forms\auth\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <div class="shopping-cart">

        <!-- SHOPPING INFORMATION -->
        <div class="cart-ship-info">
            <div class="row">

                <!-- ESTIMATE SHIPPING & TAX -->
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="order-place" style="margin-bottom: 50px">
                    <h6>АВТОРИЗАЦИЯ</h6>
                        <center>
                        <a  href="<?= Html::encode(Url::to(['/auth/network/auth','authclient'=>'vk'])) ?>">
                            <img class="img-responsive" src="<?= Yii::getAlias('@web/image/auth-vk.png') ?>" style="max-width:400px; " alt="Вход на сайт через Вконтакте">
                        </a>
                        <h4>ИЛИ</h4>
                        </center>
                        <!-- <h5>Авторизоваться через: <?= yii\authclient\widgets\AuthChoice::widget([
                            'baseAuthUrl' => ['auth/network/auth']
                            ]); ?>
                        </h5> -->
                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                        <ul class="row">
                            <!-- Name -->
                            <li class="col-md-12">
                                <label> *EMAIL
                                    <?= $form->field($model, 'username')->textInput()->label(false) ?>
                                </label>
                            </li>
                            <li class="col-md-12">
                                <label> *ПАРОЛЬ
                                    <?= $form->field($model, 'password')->passwordInput()->label(false) ?>
                                </label>
                            </li>
                            <!-- SHIP TO BILLING ADDRESS -->
                            <li class="col-md-6">
                                <div class="checkbox">
                                    <?=Html::checkbox('rememberMe',['id'=>'loginform-rememberme','class'=>'styled'])?>
                                    <label for="loginform-rememberme"> ЗАПОМНИТЬ МЕНЯ </label>
                                </div>
                            </li>
                            <label>  Если вы забыли свой пароль, вы можете <?= Html::a('выполнить сброс.', ['auth/reset/request']) ?></label>
                        </ul>
                        <?= Html::submitButton('ВОЙТИ', ['class' => 'btn btn-dark', 'name' => 'login-button']) ?>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>

                <!-- SUB TOTAL --> <!--
                <div class="col-sm-5">
                    <div class="order-place">
                        <h6>ЗАРЕГЕСТРИРОВАТЬ АККАУНТ</h6>
                        <p>
                            Создав учетную запись, вы сможете делать покупки быстрее, быть в курсе состояния заказа и отслеживать заказы, которые вы ранее делали.
                        </p>


                            <a href="<?= Html::encode(Url::to(['/auth/signup/request'])) ?>" class="btn btn-small btn-dark pull-right">РЕГИСТРАЦИЯ</a>

                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
