<?php

/** @var $products shop\entities\Shop\Product\Product[] */

use shop\helpers\PriceHelper;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;
use shop\helpers\ProductStingHelper;
?>



            <!--  New Arrival  -->
            <?php foreach ($products as $product): ?>
            <?php $url = Url::to(['shop/catalog/product', 'id' =>$product->id]);?>
            <div style="cursor: pointer" class="items-in" onclick="location.href='<?= Html::encode($url) ?>'">
                <!-- Tags -->
                <?php if ($product->price_old && $percent = PriceHelper::percent($product->price_new,$product->price_old)): ?>
                    <div class="hot-tag"><?=Html::encode($percent)?>% </div>
                <?php endif;?>
                <!-- Image -->
                <?php if ($product->mainPhoto): ?>
                    <img src="<?= Html::encode($product->mainPhoto->getThumbFileUrl('file', 'new_arrival_list_widget')) ?>" alt="<?=Html::encode($product->name)?>">
                <?php else:?>
                    <img src="/image/new-item-1.jpg" alt="">
                <?php endif;?>
                <!-- Hover Details -->
                <div class="over-item">
                    <ul class="animated fadeIn">
                        <?php if ($product->mainPhoto): ?>
                            <li class="rs"> <a href="<?= Html::encode($product->mainPhoto->getThumbFileUrl('file', 'catalog_origin')) ?>" data-lighter><i class="ion-search"></i></a></li>
                        <?php else:?>
                            <li class="rs"> <a href="/image/new-item-1.jpg" data-lighter><i class="ion-search"></i></a></li>
                        <?php endif;?>
                        <li class="rs"> <a href="#."><i class="ion-shuffle"></i></a></li>
                        <li class="rs"> <a href="<?= Url::to(['/cabinet/wishlist/add', 'id' => $product->id]) ?> "><i class="fa fa-heart-o"></i></a></li>
                        <li class="full-w rs"> <a href="<?= Url::to(['/shop/cart/add', 'id' => $product->id])?>" class="btn" methods="post">ДОБАВИТЬ В КОРЗИНУ</a></li>
                        <!-- Rating Stars -->
                        <li class="stars"><?=\shop\helpers\StarHelper::drawStar((int)$product->rating)?></li>
                    </ul>
                </div>
                <!-- Item Name -->
                <div class="details-sec"> <a href="<?= Html::encode($url) ?>"><?= Html::encode(ProductStingHelper::cropName($product->name, 28)) ?></a> <span class="font-montserrat"><?= PriceHelper::format($product->price_new) ?>
                        <i class="fa fa-rub" aria-hidden="true"></i></span>

                    <?php if ($product->price_old): ?>
                        <span class="text-line"><?= PriceHelper::format($product->price_old) ?><i class="fa fa-rub" aria-hidden="true"></i></span>
                    <?php endif;?>
                </div>
            </div>
            <?php endforeach;?>