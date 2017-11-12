<?php

/* @var $this yii\web\View */
/* @var $product shop\entities\Shop\Product\Product */

use shop\helpers\PriceHelper;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;

$url = Url::to(['product', 'id' =>$product->id]);

?>

        <!-- New Products -->
        <li class="col-sm-4 animate fadeIn" data-wow-delay="0.4s">
            <div class="items-in">
                <!-- Image -->
                <?php if ($product->mainPhoto): ?>
                <img src="<?= Html::encode($product->mainPhoto->getThumbFileUrl('file', 'catalog_list')) ?>" alt="<?=Html::encode($product->name)?>">
                <?php endif; ?>
                <!-- Hover Details -->
                <div class="over-item">
                    <ul class="animated fadeIn">
                        <li> <a href="<?= Html::encode($product->mainPhoto->getThumbFileUrl('file', 'catalog_origin')) ?>" data-lighter><i class="ion-search"></i></a></li>
                        <li> <a href="#" onclick="compare.add('<?= $product->id ?>');"><i class="ion-shuffle"></i></a></li>
                        <li> <a href="<?= Url::to(['/cabinet/wishlist/add', 'id' => $product->id]) ?>"><i class="fa fa-heart-o"></i></a></li>
                        <li class="full-w"> <a href="<?= Url::to(['/shop/cart/add', 'id' => $product->id]) ?>" class="btn">Добавить в Корзину</a></li>
                        <!-- Rating Stars -->
                        <?php if ($product->rating):?>
                            <li class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></li>
                        <?php else:?>
                            <li class="stars"><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></li>
                        <?php endif;  ?>
                    </ul>
                </div>
                <!-- Item Name -->
                <div class="details-sec"> <a href="<?= Html::encode($url) ?>"><?= Html::encode($product->name) ?></a> <span class="font-montserrat"><?= PriceHelper::format($product->price_new) ?>
                        <i class="fa fa-rub" aria-hidden="true"></i></span>

                    <?php if ($product->price_old): ?>
                    <span class="text-line"><?= PriceHelper::format($product->price_old) ?><i class="fa fa-rub" aria-hidden="true"></i></span>
                </div>
                <?php endif;?>
            </div>
        </li>



