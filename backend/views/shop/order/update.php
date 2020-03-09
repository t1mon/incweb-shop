<?php

/* @var $this yii\web\View */
/* @var $order shop\entities\Shop\Order\Order */
/* @var $model shop\forms\manage\Shop\Order\OrderEditForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Редактирование заказа: ' . $order->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $order->id, 'url' => ['view', 'id' => $order->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="order-update">

    <?php $form = ActiveForm::begin() ?>

    <div class="box box-default">
        <div class="box-header with-border">Клиент</div>
        <div class="box-body">
            <?= $form->field($model->customer, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '+7(999)-999-9999',
            ])->label('Телефон') ?>
            <?= $form->field($model->customer, 'name')->textInput()->label('Имя') ?>
        </div>
    </div>
    <div class="box box-default">
        <div class="box-header with-border">Статус</div>
        <div class="box-body">
            <?= $form->field($model, 'current_status')->dropDownList(\shop\helpers\OrderHelper::statusList())->label('Статус') ?>
        </div>
    </div>

    <div class="box box-default">
        <div class="box-header with-border">Доставка</div>
        <div class="box-body">
            <?= $form->field($model->delivery, 'method')->dropDownList($model->delivery->deliveryMethodsList(), ['prompt' => '--- Select ---','class'=>''])->label('Метод доставки') ?>
            <?= $form->field($model->delivery, 'index')->textInput()->label('Индекс') ?>
            <?= $form->field($model->delivery, 'address')->textarea(['rows' => 3])->label('Адрес доставки') ?>
        </div>
    </div>

    <div class="box box-default">
        <div class="box-header with-border">Комментарий к заказу</div>
        <div class="box-body">
            <?= $form->field($model, 'note')->textarea(['rows' => 3])->label('Комментарий') ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Отмена',\yii\helpers\Url::previous(), ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
