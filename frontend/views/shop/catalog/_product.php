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
                   <!-- <ul class="animated fadeIn">
                        <?php if ($product->mainPhoto): ?>
                            <li class="rs"> <a href="<?= Html::encode($product->mainPhoto->getThumbFileUrl('file', 'catalog_origin')) ?>" data-lighter><i class="ion-search"></i></a></li>
                        <?php else:?>
                            <li class="rs"> <a href="<?= Url::to(['@web/image/new-item-1.jpg']) ?>" data-lighter><i class="ion-search"></i></a></li>
                        <?php endif; ?>
                        <!--<li class="rs"> <a href="#" onclick="compare.add('<?= $product->id ?>');"><i class="ion-shuffle"></i></a></li>
                        <li class="rs"> <a data-method="post" href="<?= Url::to(['/cabinet/wishlist/add', 'id' => $product->id]) ?> "><i class="fa fa-heart-o"></i></a></li> -->
                        <!--<li class="full-w rs"> <a href="<?//= Url::to(['/shop/cart/add', 'id' => $product->id]) ?>" class="btn">Добавить в Корзину</a></li>-->
                        <!-- Rating Stars -->
                            <!--<li class="stars">
                                <?php
                                echo \kartik\widgets\StarRating::widget([
                                    'name' => Html::encode($product->name),
                                    'value' => $product->rating,
                                    'disabled' => true,
                                    'pluginOptions' => ['size'=>'md','displayOnly' => true]
                                ]);
                                ?>
                            </li>
                    </ul> -->
                </div>
                <!-- Item Name -->
                <div class="details-sec"> <a href="<?= Html::encode($url) ?>"><?= Html::encode(ProductStingHelper::cropName($product->name, 48)) ?></a> <span class="font-montserrat"><?= PriceHelper::format($product->price_new) ?>
                        <i class="fa fa-rub" aria-hidden="true"></i></span>
                    <?php if ($product->price_old): ?>
                    <span class="text-line"><?= PriceHelper::format($product->price_old) ?><i class="fa fa-rub" aria-hidden="true"></i></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="col-md-5">
                <a href="#consultationModal" class="btn btn-consultation" data-toggle="modal" productName='<?=$product->name?>'productId='<?=$product->id?>'>Купить в 1 клик</a>
            </div>
            <div class="col-md-7">
                <a href="<?= Url::to(['/shop/cart/add', 'id' => $product->id]) ?>" class="btn small btn-dark" style="width: 100%" onclick="yaCounter46982373.reachGoal('ADD_CART'); return true;">Добавить в Корзину</a>
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
    $('.btn-consultation').click(function() {
        var productName = $(this).attr('productName');
        productId = $(this).attr('productId');
        $('#consultationModal h4').text(productName);
        yaCounter46982373.reachGoal('CONSULTATION_CLICK');
      
    });
    
    $('#submit_consultation').click(function() {
        name = $("#name_consultation").val();
        phone = $("#phone_consultation").val();
        message = $("#message_consultation").val();
        product_name = $(".modal-title").text();
        if (name == ''){
            $.jGrowl("Не запонено поле Имя",{theme:'jgrowl warning',life:10000});
            $("#name_consultation").focus();
            return false;}
        if (phone == ''){
            $.jGrowl("Не запонено поле Телефон",{theme:'jgrowl warning',life:10000});
            $("#phone_consultation").focus();
            return false;} 
        if (!/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/.exec(phone)){
            $.jGrowl("Неправильный номер Телефона",{theme:'jgrowl warning',life:10000});
            $("#phone_consultation").focus();
            return false;}    
                $.ajax({
                        url: '/shop/catalog/consultation',
                        type: 'POST',
                        data: {name:name,phone:phone,message:message,product_name:product_name},
                        success: function(res){
                            if(res){
                                $("#consultationModal").modal('hide');
                                $.jGrowl("Спасибо! Ваша заявка отправлена! В ближайшее время с вами свяжется ваш персональный менеджер",{theme:'default',life:10000});
                                yaCounter46982373.reachGoal('CONSULTATION_SEND');
                            }
                            
                        //console.log(res);
                        },
                        error: function(){
                        $.jGrowl("ERROR!",{theme:'jgrowl danger',life:10000});
                        }
                        });
                
 
});
    
    
JS;

$this->registerJs($script,yii\web\View::POS_READY);
?>
