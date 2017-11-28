<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \shop\forms\auth\SignupForm */

use yii\helpers\Html;
use kartik\form\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="shopping-cart">

        <!-- SHOPPING INFORMATION -->
        <div class="cart-ship-info">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h6>ДАННЫЕ ДЛЯ РЕГИСТРАЦИИ</h6>
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                        <ul class="row">
                            <!-- Name -->
                            <li class="col-md-6">
                                <label> *ИМЯ
                                    <?= $form->field($model, 'name')->label(false) ?>
                                </label>
                            </li>
                            <!-- LAST NAME -->
                            <li class="col-md-6">
                                <label> *ФАМИЛИЯ
                                    <?= $form->field($model, 'surname')->label(false) ?>
                                </label>
                            </li>
                            <!-- EMAIL ADDRESS -->
                            <li class="col-md-6">
                                <label> *EMAIL
                                    <?= $form->field($model, 'email')->label(false) ?>
                                </label>
                            </li>
                            <!-- PHONE -->
                            <li class="col-md-6">
                                <label> *ТЕЛЕФОН
                                    <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
                                        'mask' => '+7(999)-999-9999',
                                    ])->label(false) ?>
                                </label>
                            </li>
                            <li class="col-md-12">
                                <label> *ПАРОЛЬ
                                    <?= $form->field($model, 'password')->passwordInput()->label(false) ?>
                                </label>
                            </li>

                            <!-- CREATE AN ACCOUNT -->
                            <li class="col-md-12">
                                <div class="checkbox">
                                    <input id="checkbox1" class="styled" type="checkbox" checked>
                                    <label for="checkbox1"> ДАЮ СВОЕ СОГЛАСИЕ НА ОБРАБОТКУ ПЕРСОНАЛЬНЫХ ДАННЫХ</label>
                                </div>
                            </li>
                            <div class="form-group">
                                <?= Html::submitButton('Зарегистироваться', ['id'=>'submit-check','class' => 'btn btn-dark', 'name' => 'signup-button']) ?>
                            </div>
                        </ul>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
$js = <<<JS
$('#submit-check').click(function(e) {
      if (!$("#checkbox1").prop("checked")){ 
          e.preventDefault();
            $.jGrowl("Вы не дали свое согласие на обработку персональных данных!",{theme:'jgrowl danger',life:5000});
    }
})

JS;
\Yii::$app->view->registerJs($js,\yii\web\View::POS_READY);
?>