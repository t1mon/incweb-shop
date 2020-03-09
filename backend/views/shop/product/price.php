<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $product shop\entities\Shop\Product\Product */
/* @var $model shop\forms\manage\Shop\Product\PriceForm */

$this->title = 'Цена продукта: ' . $product->name;
$this->params['breadcrumbs'][] = ['label' => 'Продукты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $product->name, 'url' => ['view', 'id' => $product->id]];
$this->params['breadcrumbs'][] = 'Цена';
?>
<div class="product-price">

    <?php $form = ActiveForm::begin(); ?>

    <div class="box box-default">
        <div class="box-header with-border">Настройка</div>
        <div class="box-body">
            <?= $form->field($model, 'new')->textInput(['maxlength' => true])->label('Текущаяя цена') ?>
            <?= $form->field($model, 'old')->textInput(['maxlength' => true])->label('Старая цена (будет отображаться зачеркнутой)') ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
