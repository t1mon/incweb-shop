<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \shop\forms\auth\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Сброс пароля аккаунта';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="row">
            <div class="site-request-password-reset">
                <h1><?= Html::encode($this->title) ?></h1>

                <p>Пожалуйста, заполните свой адрес электронной почты. На вашу почту будет отправлена ссылка на сброс пароля.</p>

                <div class="row">
                    <div class="col-lg-5">
                        <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                            <div class="form-group">
                                <?= Html::submitButton('Отправить', ['class' => 'btn btn-dark']) ?>
                            </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
    </div>
</div>
