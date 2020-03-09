<?php

/* @var $this yii\web\View */
/* @var $cart \shop\cart\Cart */

use shop\helpers\PriceHelper;
use shop\helpers\WeightHelper;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['/shop/catalog/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="section-p-30px pages-in chart-page">
    <div class="container">

        <!-- Payments Steps -->
        <div class="payment_steps hidden-xs">
            <ul class="row">
                <!-- SHOPPING CART -->
                <li class="col-sm-4 current"> <i class="fa fa-shopping-cart"></i>
                    <h6>КОРЗИНА</h6>
                </li>

                <!-- CHECK OUT DETAIL -->
                <li class="col-sm-4"> <i class="fa fa-align-left"></i>
                    <h6>ОФОРМЛЕНИЕ ЗАКАЗА</h6>
                </li>

                <!-- ORDER COMPLETE -->
                <li class="col-sm-4"> <i class="fa fa-check"></i>
                    <h6>ЗАКАЗ ОФОРМЛЕН</h6>
                </li>
            </ul>
        </div>

        <!-- Payments Steps -->
        <div class="shopping-cart text-center">
            <div class="cart-head hidden-xs">
                <ul class="row">
                    <!-- PRODUCTS -->
                    <li class="col-xs-3">
                        <h6>Фото</h6>
                    </li>
                    <!-- NAME -->
                    <li class="col-xs-3">
                        <h6>ИМЯ</h6>
                    </li>
                    <!-- QTY -->
                    <li class="col-xs-1">
                        <h6>КОЛ-ВО</h6>
                    </li>
                    <!-- PRICE -->
                    <li class="col-xs-2">
                        <h6>ЦЕНА</h6>
                    </li>
                    <!-- TOTAL PRICE -->
                    <li class="col-xs-2">
                        <h6>ИТОГО</h6>
                    </li>
                    <li class="col-xs-1"> </li>
                </ul>
            </div>
            <?php if ($cart->getItems()):?>
            <?php foreach ($cart->getItems() as $item): ?>
            <?php
            $product = $item->getProduct();
            $modification = $item->getModification();
            $url = Url::to(['/shop/catalog/product', 'id' => $product->id]);
            ?>
            <!-- Cart Details -->
                <?= Html::beginForm(['quantity', 'id' => $item->getId()]); ?>
            <ul class="row cart-details">
                <li class="col-sm-6">
                    <div class="media">
                        <!-- Media Image -->
                        <div class="media-left media-middle">
                            <a href="<?=$url?>" class="item-img">
                                <?php if ($product->mainPhoto): ?>
                                    <img class="media-object img-thumbnail" src="<?= $product->mainPhoto->getThumbFileUrl('file', 'cart_list') ?>" alt="<?= Html::encode($product->name) ?>">
                                <?php endif; ?>
                            </a>
                        </div>
                        <h6 class="visible-xs"><a href="<?= $url ?>"><?= Html::encode($product->name) ?></a>
                        <?php if ($modification): ?>
                            <?= ' '.Html::encode($modification->name) ?>
                        <?php endif; ?>
                        </h6>
                        <!-- Item Name -->
                        <div class="media-body hidden-xs">
                            <div class="position-center-center">
                                <h6><a href="<?= $url ?>"><?= Html::encode($product->name) ?></a></h6>
                                <?php if ($modification): ?>
                                    <?= ' '.Html::encode($modification->name) ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- QTY -->
                <li class="col-sm-1">
                    <div class="position-center-center">
                        <span class="visible-xs">Кол-во</span><input type="text" name="quantity" onchange="submit()" value="<?= $item->getQuantity() ?>" />
                    </div>
                </li>

                <!-- PRICE -->
                <li class="col-sm-2 hidden-xs">
                    <div class="position-center-center"> <span class="visible-xs">Цена</span><span> <?= PriceHelper::format($item->getPrice()) ?><i class="fa fa-fw fa-rub"></i></span> </div>
                </li>
                <!-- TOTAL PRICE -->
                <li class="col-sm-2">
                    <div class="position-center-center"> <span class="visible-xs">Итого</span><span><?= PriceHelper::format($item->getCost()) ?><i class="fa fa-fw fa-rub"></i></span> </div>
                </li>

                <!-- EDIT AND REMOVE -->
                <li class="col-sm-1">
                    <div class="position-center-center">
                        <a class="hidden-xs" href="#." onclick="submit()"><i class="fa fa-refresh"></i> </a>
                        <a class="hidden-xs" href="<?= Url::to(['remove', 'id' => $item->getId()]) ?>" data-method="post"><i class="fa fa-times"></i></a>
                        <a  href="<?= Url::to(['remove', 'id' => $item->getId()]) ?>" class="btn btn-small btn-dark visible-xs" data-method="post">Удалить</a>
                    </div>
                </li>
            </ul>



<?php Html::endForm();?>

            <?php endforeach;?>
            <!-- BTN INFO -->
            <div class="btn-sec">

                <!-- CLEAR SHOPPING CART -->
                <a href="<?= Url::to('/shop/cart/clear') ?>" class="btn btn-dark"> <i class="fa fa-trash-o"></i> ОЧИСТИТЬ КОРЗИНУ </a>

                <!-- UPDATE SHOPPING CART -->
                <!--<a href="#." class="btn btn-dark"> <i class="fa fa-arrow-circle-o-up"></i> UPDATE SHOPPING CART </a>-->

                <!-- CONTINUE SHOPPING -->
                <a href="<?= Url::to('/shop/catalog/index') ?>" class="btn btn-dark right-btn"> <i class="fa fa-shopping-cart"></i> ПРОДОЛЖИТЬ ПОКУПКИ </a>
            </div>

            <!-- SHOPPING INFORMATION -->
            <div class="cart-ship-info">
                <div class="row">

                    <!-- DISCOUNT CODE -->
                    <div class="discount-margin col-sm-6">
                        <h6>ПРОМОКОД</h6>
                        <form>
                            <input value="" placeholder="ВВЕДИТЕ ПРОМОКОД В ПОЛЕ" type="text">
                            <button onclick="$.jGrowl('Промокод не найден!',{ closer: false ,life:5000,theme:'jgrowl warning'});" type="button" class="btn btn-small btn-dark">ПРИМЕНИТЬ КОД</button>
                        </form>
                    </div>

                    <?php $cost = $cart->getCost() ?>
                    <!-- SUB TOTAL -->
                    <div class="col-sm-6">
                        <div class="grand-total"> <span>ПОКУПОК НА СУММУ: <?= PriceHelper::format($cost->getOrigin()) ?><i class="fa fa-fw fa-rub"></i></span>
                            <?php foreach ($cost->getDiscounts() as $discount): ?>
                                <h5>СКИДКА <?= Html::encode($discount->getName()) ?>: <span> <?= PriceHelper::format($discount->getValue()) ?><i class="fa fa-fw fa-rub"></i></span></h5>
                            <?php endforeach; ?>
                            <h4>ВСЕГО К ОПЛАТЕ: <span> <?= PriceHelper::format($cost->getTotal()) ?><i class="fa fa-fw fa-rub"></i></span></h4>
                            <?php if ($cart->getItems()): ?>
                                <a href="<?= Url::to('/shop/checkout/index') ?>" class="btn">ОФОРМИТЬ ЗАКАЗ</a>
                            <?php endif;?>
                            <p>Внимание онлайн оплата не доступна. Посмотреть способ оплаты</p>
                        </div>
                    </div>
                </div>
            </div>
            <?php else: ?>
                <h1>КОЗИНА ПУСТА</h1>
            <?php endif; ?>
        </div>
    </div>

</section>





