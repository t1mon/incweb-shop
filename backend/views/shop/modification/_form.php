<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\Shop\Product\ModificationForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="modification-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true])->label('Код продукта') ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Имя модификации') ?>
    <?= $form->field($model, 'price')->textInput(['maxlength' => true])->label('Цена') ?>
    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true])->label('Количество на складе') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
