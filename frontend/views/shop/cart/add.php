<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \shop\forms\Shop\AddToCartForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Выбор модификации продукта';
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['/shop/catalog/index']];
$this->params['breadcrumbs'][] = ['label' => 'Корзина', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <h4 class="text-center">Пожалуйста выберети модификацию продукта</h4>
    <div id="add-mod" class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <?php $form = ActiveForm::begin() ?>

                <?php if ($modifications = $model->modificationsList()): ?>
                    <?= $form->field($model, 'modification')->dropDownList($modifications, ['prompt' => '--- Выбор ---','class'=>'selectpicker'])->label('Модификации') ?>
                <?php endif; ?>

                <?= $form->field($model, 'quantity')->textInput()->label('Количество') ?>

                <div class="form-group">
                    <?= Html::submitButton('Добавить', ['class' => 'btn btn-dark']) ?>
                </div>

                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>



