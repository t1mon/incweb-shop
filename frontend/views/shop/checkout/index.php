<?php

/* @var $this yii\web\View */
/* @var $cart \shop\cart\Cart */
/* @var $model \shop\forms\Shop\Order\OrderForm */

use shop\helpers\PriceHelper;
use shop\helpers\WeightHelper;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Оформление заказа';
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['/shop/catalog/index']];
$this->params['breadcrumbs'][] = ['label' => 'Корзина', 'url' => ['/shop/cart/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="section-p-30px pages-in chart-page">
    <div class="container">

        <!-- Payments Steps -->
        <div class="payment_steps hidden-xs">
            <ul class="row">
                <!-- SHOPPING CART -->
                <li class="col-sm-4"> <i class="fa fa-shopping-cart"></i>
                    <h6>КОРЗИНА</h6>
                </li>

                <!-- CHECK OUT DETAIL -->
                <li class="col-sm-4 current"> <i class="fa fa-align-left"></i>
                    <h6>ОФОРМЛЕНИЕ ЗАКАЗА</h6>
                </li>

                <!-- ORDER COMPLETE -->
                <li class="col-sm-4"> <i class="fa fa-check"></i>
                    <h6>ЗАКАЗ ОФОРМЛЕН</h6>
                </li>
            </ul>
        </div>

        <!-- Payments Steps -->
        <div class="shopping-cart">

            <!-- SHOPPING INFORMATION -->
            <div class="cart-ship-info">
                <div class="row">

                    <!-- ESTIMATE SHIPPING & TAX -->
                    <div class="col-sm-7">
                        <h6>ИНФОРМАЦИЯ ДЛЯ ЗАКАЗА</h6>
                        <?php $form = ActiveForm::begin(['id'=>'order']) ?>
                            <ul class="row">

                                <!-- *COUNTRY -->
                                <li class="col-md-12">
                                    <label> *СПОСОБ ДОСТАВКИ
                                        <?= $form->field($model->delivery, 'method')->dropDownList($model->delivery->deliveryMethodsList(), ['class'=>'selectpicker'])->label(false) ?>
                                    </label>
                                </li>
                                <li class="col-md-12">
                                    <!-- ADDRESS -->
                                    <label>*АДРЕС ДОСТАВКИ
                                        <?= $form->field($model->delivery, 'address')->textInput()->label(false) ?>
                                    </label>
                                </li>
                                <!-- PHONE -->
                                <li class="col-md-12">
                                    <label> *ТЕЛЕФОН
                                        <?= $form->field($model->customer, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
                                            'mask' => '+7(999)-999-9999',
                                        ])->label(false) ?>
                                    </label>
                                </li>
                                <!-- Name -->
                                <li class="col-md-12">
                                    <label> *ФИО
                                        <?= $form->field($model->customer, 'name')->textInput()->label(false) ?>
                                    </label>
                                </li>
                                <!-- TOWN/CITY -->
                                <li class="col-md-12">
                                    <label>ИНДЕКС
                                        <?= $form->field($model->delivery, 'index')->textInput()->label(false) ?>
                                    </label>
                                </li>
                                <li class="col-md-12">
                                    <label>КОММЕНТАРИЙ К ЗАКАЗУ
                                        <?= $form->field($model, 'note')->textarea(['rows' => 5])->label(false) ?>
                                    </label>
                                </li>
                                <!-- CREATE AN ACCOUNT
                                <li class="col-md-6">
                                    <div class="checkbox">
                                        <input id="checkbox1" class="styled" type="checkbox">
                                        <label for="checkbox1"> CREATE AN ACCOUNT ? </label>
                                    </div>
                                </li> -->

                                <!-- SHIP TO BILLING ADDRESS
                                <li class="col-md-6">
                                    <div class="checkbox">
                                        <input id="checkbox2" class="styled" type="checkbox">
                                        <label for="checkbox2"> SHIP TO BILLING ADDRESS? </label>
                                    </div>
                                </li> -->
                            </ul>
                        <?php ActiveForm::end() ?>
                    </div>

                    <!-- SUB TOTAL -->
                    <div class="col-sm-5">
                        <div class="order-place">
                            <h5>ВАШ ЗАКАЗ</h5>
                            <div class="order-detail">
                                <p>ПРОДУКТ <span>ВСЕГО</span></p>
                                <?php foreach ($cart->getItems() as $item): ?>
                                <?php
                                $product = $item->getProduct();
                                $modification = $item->getModification();
                                $url = Url::to(['/shop/catalog/product', 'id' => $product->id]);
                                ?>
                                <div class="item-order">
                                    <p><a href="<?= $url ?>"><?= Html::encode($product->name) ?></a><span class="color"> x<?= $item->getQuantity() ?> </span></p>
                                    <p>
                                        <?php if ($modification): ?>
                                            <?= Html::encode($modification->name) ?>
                                        <?php endif; ?>
                                    </p>
                                    <p class="text-right"><?= PriceHelper::format($item->getCost()) ?><i class="fa fa-fw fa-rub"></i></p>
                                </div>
                                <?php endforeach;?>
                                <?php $cost = $cart->getCost() ?>
                                <p>ТОВАРОВ НА СУММУ <span><?= PriceHelper::format($cost->getOrigin()) ?><i class="fa fa-fw fa-rub"></i></span></p>
                                <p>ВСЕГО К ОПЛАТЕ <span><?= PriceHelper::format($cost->getTotal()) ?><i class="fa fa-fw fa-rub"></i></span></p>
                            </div>
                            <div class="pay-meth">
                                <h5>ИНФОРМАЦИЯ ПО ДОСТАВКЕ</h5>
                                <ul>
                                    <li>
                                        <div class="checkbox">
                                            <input id="checkbox3-1" class="styled" type="checkbox" checked>
                                            <label for="checkbox3-1"> ОЗНАКОМЛЕН(А) </label>
                                        </div>
                                        <p>Внимание достака не включена в стоимость заказа и оплачивается на месте отдельно</p>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <input id="checkbox3-4" class="styled" type="checkbox" checked>
                                            <label for="checkbox3-4"> ДАЮ СВОЕ СОГЛАСИЕ НА ОБРАБОТКУ ПЕРСОНАЛЬНЫХ ДАННЫХ <span class="color"> ПОСМОТРЕТЬ СОГЛАШЕНИЕ </span> </label>
                                        </div>
                                    </li>
                                </ul>
                                <?= Html::submitButton('ОФОРМИТЬ ЗАКАЗ', ['id'=>'submit-check' , 'class' => 'btn btn-small btn-dark pull-right','form' => 'order']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php

$js = <<<JS
$('#submit-check').click(function(e) {
      if (!$("#checkbox3-4").prop("checked")){ 
          e.preventDefault();
            $.jGrowl("Вы не дали свое согласие на обработку персональных данных!",{theme:'jgrowl danger',life:5000});
    }
          if (!$("#checkbox3-1").prop("checked")){ 
          e.preventDefault();
            $.jGrowl("Вы не ознакомлены с условиями доставки!",{theme:'jgrowl danger',life:5000});
    }
})

JS;
\Yii::$app->view->registerJs($js,\yii\web\View::POS_END);



?>
<!--
<div class="cabinet-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <td class="text-left">Product Name</td>
                <td class="text-left">Model</td>
                <td class="text-left">Quantity</td>
                <td class="text-right">Unit Price</td>
                <td class="text-right">Total</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cart->getItems() as $item): ?>
                <?php
                $product = $item->getProduct();
                $modification = $item->getModification();
                $url = Url::to(['/shop/catalog/product', 'id' => $product->id]);
                ?>
                <tr>
                    <td class="text-left">
                        <a href="<?= $url ?>"><?= Html::encode($product->name) ?></a>
                    </td>
                    <td class="text-left">
                        <?php if ($modification): ?>
                            <?= Html::encode($modification->name) ?>
                        <?php endif; ?>
                    </td>
                    <td class="text-left">
                        <?= $item->getQuantity() ?>
                    </td>
                    <td class="text-right"><?= PriceHelper::format($item->getPrice()) ?></td>
                    <td class="text-right"><?= PriceHelper::format($item->getCost()) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <br />

    <?php $cost = $cart->getCost() ?>
    <table class="table table-bordered">
        <tr>
            <td class="text-right"><strong>Sub-Total:</strong></td>
            <td class="text-right"><?= PriceHelper::format($cost->getOrigin()) ?></td>
        </tr>
        <tr>
            <td class="text-right"><strong>Total:</strong></td>
            <td class="text-right"><?= PriceHelper::format($cost->getTotal()) ?></td>
        </tr>
        <tr>
            <td class="text-right"><strong>Weight:</strong></td>
            <td class="text-right"><?= WeightHelper::format($cart->getWeight()) ?></td>
        </tr>
    </table>

    <?php $form = ActiveForm::begin() ?>

    <div class="panel panel-default">
        <div class="panel-heading">Customer</div>
        <div class="panel-body">
            <?= $form->field($model->customer, 'phone')->textInput() ?>
            <?= $form->field($model->customer, 'name')->textInput() ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Delivery</div>
        <div class="panel-body">
            <?= $form->field($model->delivery, 'method')->dropDownList($model->delivery->deliveryMethodsList(), ['prompt' => '--- Select ---']) ?>
            <?= $form->field($model->delivery, 'index')->textInput() ?>
            <?= $form->field($model->delivery, 'address')->textarea(['rows' => 3]) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Note</div>
        <div class="panel-body">
            <?= $form->field($model, 'note')->textarea(['rows' => 3]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Checkout', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end() ?>

</div>
    
-->