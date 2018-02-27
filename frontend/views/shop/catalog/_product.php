<?php

/* @var $this yii\web\View */
/* @var $product shop\entities\Shop\Product\Product */

use shop\helpers\PriceHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use shop\helpers\ProductStingHelper;
$url = Url::to(['product', 'id' =>$product->id]);

?>

        <!-- New Products -->
        <li class="col-sm-6 animate fadeIn" data-wow-delay="0.4s">
            <div style="cursor: pointer" class="items-in"  onclick="location.href='<?= Html::encode($url) ?>'">
                <!-- Tags -->
                <?php if ($product->price_old && $percent = PriceHelper::percent($product->price_new,$product->price_old)): ?>
                <div class="hot-tag"><?=Html::encode($percent)?>% </div>
                <?php endif;?>
                <!-- Image -->
                <?php if ($product->mainPhoto): ?>
                    <img src="<?= Html::encode($product->mainPhoto->getThumbFileUrl('file', 'catalog_list')) ?>" alt="<?=Html::encode($product->name)?>" class="img-responsive">
                    <?php else:?>
                    <img src="<?= Url::to(['@web/image/new-item-1.jpg']) ?>" alt="">
                <?php endif; ?>
                <!-- Hover Details -->
                <div class="over-item">
                    <ul class="animated fadeIn">
                        <?php if ($product->mainPhoto): ?>
                            <li class="rs"> <a href="<?= Html::encode($product->mainPhoto->getThumbFileUrl('file', 'catalog_origin')) ?>" data-lighter><i class="ion-search"></i></a></li>
                        <?php else:?>
                            <li class="rs"> <a href="<?= Url::to(['@web/image/new-item-1.jpg']) ?>" data-lighter><i class="ion-search"></i></a></li>
                        <?php endif; ?>
                        <li class="rs"> <a href="#" onclick="compare.add('<?= $product->id ?>');"><i class="ion-shuffle"></i></a></li>
                        <li class="rs"> <a data-method="post" href="<?= Url::to(['/cabinet/wishlist/add', 'id' => $product->id]) ?> "><i class="fa fa-heart-o"></i></a></li>
                        <li class="full-w rs"> <a href="<?= Url::to(['/shop/cart/add', 'id' => $product->id]) ?>" class="btn">Добавить в Корзину</a></li>
                        <!-- Rating Stars -->
                            <li class="stars">
                                <?php
                                echo \kartik\widgets\StarRating::widget([
                                    'name' => Html::encode($product->name),
                                    'value' => $product->rating,
                                    'disabled' => true,
                                    'pluginOptions' => ['size'=>'rs','displayOnly' => true]
                                ]);
                                ?>
                            </li>
                    </ul>
                </div>
                <!-- Item Name -->
                <div class="details-sec"> <a href="<?= Html::encode($url) ?>"><?= Html::encode(ProductStingHelper::cropName($product->name, 48)) ?></a> <span class="font-montserrat"><?= PriceHelper::format($product->price_new) ?>
                        <i class="fa fa-rub" aria-hidden="true"></i></span>

                    <?php if ($product->price_old): ?>
                    <span class="text-line"><?= PriceHelper::format($product->price_old) ?><i class="fa fa-rub" aria-hidden="true"></i></span>
                    <?php endif;?>
                </div>
            </div>
        </li>

<!---onclick="location.href='<?= Html::encode($url) ?>'"-->
<?php
$script = <<<JS
var url;
    $('.rs').hover(

 
         function(){
             url = $(this).parents("div.items-in").attr('onclick');
             $(this).parents("div.items-in").removeAttr('onclick');            
        },
            function(){ 
            $(this).parents("div.items-in").attr('onclick',url);
        }
    
    
    
    );
JS;

$this->registerJs($script,yii\web\View::POS_READY);
?>
