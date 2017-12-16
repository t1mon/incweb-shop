<?php

/* @var $this yii\web\View */
/* @var $product shop\entities\Shop\Product\Product */
/* @var $cartForm shop\forms\Shop\AddToCartForm */
/* @var $reviewForm shop\forms\Shop\ReviewForm */

use frontend\assets\MagnificPopupAsset;
use shop\helpers\PriceHelper;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\rating\StarRating;

$this->title = $product->getSeoTitle();

$this->registerMetaTag(['name' =>'description', 'content' => $product->meta->description]);
$this->registerMetaTag(['name' =>'keywords', 'content' => $product->meta->keywords]);

$this->params['breadcrumbs'][] = ['label' => 'Каталог продукции', 'url' => ['index']];
$reviews = $product->reviews;
foreach ($product->category->parents as $parent) {
    if (!$parent->isRoot()) {
        $this->params['breadcrumbs'][] = ['label' => $parent->name, 'url' => ['category', 'id' => $parent->id]];
    }
}
$this->params['breadcrumbs'][] = ['label' => $product->category->name, 'url' => ['category', 'id' => $product->category->id]];
$this->params['breadcrumbs'][] = $product->name;

$this->params['active_category'] = $product->category;
$reviews_count =$product->getActiveReviewCount($reviews);
//MagnificPopupAsset::register($this);
?>

            <!--======= PAGES INNER =========-->
            <section class="section-p-30px pages-in item-detail-page">
                <div class="container">
                    <div class="row">

                        <!--======= IMAGES SLIDER =========-->
                        <div class="col-sm-6 large-detail animate fadeInLeft" data-wow-delay="0.4s">
                            <div class="images-slider">
                                <ul class="slides">
                                <?php foreach ($product->photos as $i => $photo): ?>

                                   <li data-thumb="<?= $photo->getThumbFileUrl('file', 'thumb') ?>">
                                       <a class="popup-link" href="<?= $photo->getThumbFileUrl('file','catalog_origin') ?>"><img class="img-responsive zoom_05" data-zoom-image="<?= $photo->getImageFileUrl('file') ?>" src="<?= $photo->getThumbFileUrl('file', 'catalog_product_main') ?>"  alt="<?= Html::encode($product->name) ?>"></a>
                                    </li>

                                <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <!--======= ITEM DETAILS =========-->
                        <div class="col-sm-6 animate fadeInRight" data-wow-delay="0.4s">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h5><?= mb_strtoupper(Html::encode($product->name)) ?></h5>
                                    <span class="price"><?= PriceHelper::format($product->price_new) ?> <i class="fa fa-rub" aria-hidden="true"></i></span> </div>
                                <div class="col-sm-12">
                                    <span class="code">КОД ПРОДУКТА: <?= Html::encode($product->code) ?></span>
                                    <span class="code">ФАБРИКА: <a href="<?= Html::encode(Url::to(['brand', 'id' => $product->brand->id])) ?>"><?= Html::encode($product->brand->name) ?></a></span>
                                    <span class="code">Теги:
                                    <?php foreach ($product->tags as $tag): ?>
                                        <a href="<?= Html::encode(Url::to(['tag', 'id' => $tag->id])) ?>"><?= Html::encode($tag->name) ?></a>
                                    <?php endforeach; ?>
                                    </span>
                                    <div class="some-info no-border"> <br>
                                        <!--<div class="in-stoke"> <i class="fa fa-check-circle"></i> В наличии</div>-->
                                        <div class="not-stoke blue-tooltip" data-toggle="tooltip" title='Под заказ. Срок выполнения заказа от 10 рабочих дней'> <i class="fa fa-info-circle" ></i>Под заказ </div>
                                        <div class="stars">
                                            <?php
                                            echo StarRating::widget([
                                                'name' => Html::encode($product->name),
                                                'value' => $product->rating,
                                                'disabled' => true,
                                                'pluginOptions' => ['size'=>'sx','displayOnly' => true]
                                            ]);
                                            ?>
                                        </div>
                                        <a href="#review"  class="review">(<?=$reviews_count?>) Отзывы</a> &nbsp;&nbsp;&nbsp; <a href="#form-review" class="review">Добавить отзыв</a></div>
                                    <hr>
                                </div>
                            </div>
                            <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectusLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectusLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>-->
                            <!--<hr>-->
                        <?php if ($product->isAvailable()): ?>
                            <?php $form = ActiveForm::begin([
                                'action' => ['/shop/cart/add', 'id' => $product->id],
                                'id' =>'validate_red',
                            ]) ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="item-select">
                                        <?php if ($modifications = $cartForm->modificationsList()): ?>
                                            <?= $form->field($cartForm, 'modification')->dropDownList($modifications, ['prompt' => '--- Выбор модификации ---','class'=>'selectpicker','onchange'=>'renderPrice(this.value,'.\yii\helpers\Json::encode($cartForm->modificationsListJava()).');'])->label('Модификация') ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- QUIENTY -->
                                <div class="col-sm-12">
                                    <div class="fun-share">


                                        <?= $form->field($cartForm, 'quantity')->textInput()->label(false) ?>
                                        <?= Html::submitButton('Добавить в корзину', ['class' => 'btn btn-small btn-dark']) ?>

                                        <a href="#."  class="share-sec" onclick="compare.add('47');"><i class="ion-shuffle"></i></a>
                                        <a class="share-sec"  href="<?= Url::to(['/cabinet/wishlist/add', 'id' => $product->id]) ?>" data-method="post"><i class="fa fa-heart-o"></i></a> </div>
                                </div>
                                <!-- SHARE -->
                                <div class="col-sm-12">
                                    <ul class="share-with">
                                        <li>
                                            <!-- Put this script tag to the <head> of your page -->
                                            <!-- Put this script tag to the place, where the Share button will be -->
                                            <script type="text/javascript">
                                                document.write(VK.Share.button(false,{type: "round", text: "Репостнуть"}));
                                                </script>
                                        </li>
                                        <li>
                                            <!-- Put this script tag to the <head> of your page -->
                                            <script type="text/javascript">
                                                VK.init({apiId: 6273822, onlyWidgets: true});
                                            </script>

                                            <!-- Put this div tag to the place, where the Like block will be -->
                                            <div id="vk_like"></div>
                                            <script type="text/javascript">
                                                VK.Widgets.Like("vk_like", {
                                                    type: "button",
                                                    image:"<?= $product->mainPhoto->getThumbFileUrl('file','catalog_origin') ?>",
                                                    url: "<?= Url::to(['/shop/catalog', 'id' => $product->id])?>"
                                                });
                                            </script>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <?php ActiveForm::end() ?>
                        <?php else: ?>

                            <div class="alert alert-danger">
                                The product is not available for purchasing right now.<br />Add it to your wishlist.
                            </div>
                        <?php endif;?>
                        </div>
                    </div>

                    <!--======= PRODUCT DESCRIPTION =========-->
                    <div class="item-decribe animate fadeInUp" data-wow-delay="0.4s">
                        <div class="text-center">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#descr" aria-controls="men" role="tab" data-toggle="tab">Описание</a></li>
                                <li role="presentation"><a href="#review" aria-controls="women" role="tab" data-toggle="tab">Отзывы (<?=$reviews_count?>)</a></li>
                                <li role="presentation"><a href="#tags" aria-controls="access" role="tab" data-toggle="tab">Характеристики</a></li>
                            </ul>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- DESCRIPTION -->
                            <div role="tabpanel" class="tab-pane fade in active" id="descr">
                                <?= Yii::$app->formatter->asHtml($product->description, [
                                    'Attr.AllowedRel' => array('nofollow'),
                                    'HTML.SafeObject' => true,
                                    'Output.FlashCompat' => true,
                                    'HTML.SafeIframe' => true,
                                    'URI.SafeIframeRegexp'=>'%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%',
                                ]) ?>
                            </div>

                            <!-- REVIEW -->
                            <div role="tabpanel" class="tab-pane fade" id="review">
                                <h6><?=$reviews_count?> ОТЗЫВЫ ДЛЯ ПРОДУКТА <?=mb_strtoupper(Html::encode($product->name))?></h6>

                                <!-- REVIEW PEOPLE 1 -->
                                <?php
                                foreach ($reviews as $review):
                                    if ($review->isActive()): ?>
                                        <?php $user = \shop\entities\User\User::findOne($review->user_id)?>
                                        <div class="media">
                                            <div class="media-left">
                                                <!--  Image -->
                                                <div class="avatar"> <a href="#"> <img class="media-object" src="/image/avatar-1.jpg" alt=""> </a> </div>
                                            </div>
                                            <!--  Details -->
                                            <div class="media-body">
                                                <p class="font-playfair">“<?=$review->text?>”</p>
                                                <h6><?=$user['username'];?> <span class="pull-right"><?=date('G:h:m d/m/y',$review->created_at)?></span> </h6>
                                            </div>
                                        </div>
                                    <?php endif;?>
                                <?php endforeach;?>
                                <!-- ADD REVIEW -->
                                <h6 class="margin-t-40">ДОБАВИТЬ ОТЗЫВ</h6>
                                <?php if (Yii::$app->user->isGuest): ?>

                                    <div class="panel-panel-info">
                                        <div class="panel-body">
                                            Пожалуйста войдите <?= Html::a('Log In', ['/auth/auth/login']) ?> чтобы добавить отзыв.
                                        </div>
                                    </div>

                                <?php else: ?>

                                    <?php $form = ActiveForm::begin(['id' => 'form-review']) ?>
                                    <ul class="row">

                                        <li class="col-sm-12">
                                                <?= $form->field($reviewForm, 'text')->textarea(['rows' => 5]) ?>
                                        </li>

                                        <li class="col-sm-6">
                                    <?php echo $form->field($reviewForm, 'vote')->widget(StarRating::classname(), [
                                        'pluginOptions' => [
                                            'step' => 1,
                                            'size' =>'sm',
                                            'starCaptions' => [
                                                0 => 'Вы уверены?',
                                                1 => 'Ну ладно...',
                                                2 => 'Нормально',
                                                3 => 'Хорошо',
                                                4 => 'Отлично',
                                                5 => 'Спасибо! Мы вам блогодарны!!!',
                                            ],

                                        ]
                                    ]);?>
                                        </li>
                                        <li class="col-sm-6">
                                        <?= Html::submitButton('ДОБАВИТЬ ОТЗЫВ', ['class' => 'btn btn-dark btn-small pull-right no-margin']) ?>
                                        </li>

                                    <?php ActiveForm::end() ?>
                                    </ul>
                                <?php endif; ?>

                            </div>

                            <!-- TAGS -->
                            <div role="tabpanel" class="tab-pane fade" id="tags">
                                <table class="table table-bordered">
                                    <tbody>
                                    <?php foreach ($product->values as $value): ?>
                                        <?php if (!empty($value->value)): ?>
                                            <tr>
                                                <th><?= Html::encode($value->characteristic->name) ?></th>
                                                <td><?= Html::encode($value->value) ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <!--======= RELATED PRODUCTS =========-->
               <!-- <section class="section-p-60px new-arrival new-arri-w-slide">
                    <div class="container">


                        <div class="tittle tittle-2 animate fadeInUp" data-wow-delay="0.4s">
                            <h5>RELATED PRODUCTS</h5>
                            <p class="font-playfair">Most haver in your Shop </p>
                        </div>


                        <div class="popurlar_product client-slide animate fadeInUp" data-wow-delay="0.4s">



                            <div class="items-in">

                                <img src="/image/new-item-1.jpg" alt="">

                                <div class="over-item">
                                    <ul class="animated fadeIn">
                                        <li> <a href="/image/new-item-1.jpg" data-lighter><i class="ion-search"></i></a></li>
                                        <li> <a href="#."><i class="ion-shuffle"></i></a></li>
                                        <li> <a href="#."><i class="fa fa-heart-o"></i></a></li>
                                        <li class="full-w"> <a href="#." class="btn">ADD TO CART</a></li>

                                        <li class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></li>
                                    </ul>
                                </div>

                                <div class="details-sec"> <a href="#.">LOOSE-FIT TRENCH COAT</a> <span class="font-montserrat">129.00 USD</span> </div>
                            </div>


                            <div class="items-in">

                                <img src="/image/new-item-2.jpg" alt="">

                                <div class="over-item">
                                    <ul class="animated fadeIn">
                                        <li> <a href="/image/new-item-2.jpg" data-lighter><i class="ion-search"></i></a></li>
                                        <li> <a href="#."><i class="ion-shuffle"></i></a></li>
                                        <li> <a href="#."><i class="fa fa-heart-o"></i></a></li>
                                        <li class="full-w"> <a href="#." class="btn">ADD TO CART</a></li>

                                        <li class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></li>
                                    </ul>
                                </div>

                                <div class="details-sec"> <a href="#.">LOOSE-FIT TRENCH COAT</a> <span class="font-montserrat">129.00 USD</span> </div>
                            </div>


                            <div class="items-in">

                                <div class="new-tag"> NEW </div>


                                <img src="/image/new-item-3.jpg" alt="">

                                <div class="over-item">
                                    <ul class="animated fadeIn">
                                        <li> <a href="/image/new-item-3.jpg" data-lighter><i class="ion-search"></i></a></li>
                                        <li> <a href="#."><i class="ion-shuffle"></i></a></li>
                                        <li> <a href="#."><i class="fa fa-heart-o"></i></a></li>
                                        <li class="full-w"> <a href="#." class="btn">ADD TO CART</a></li>

                                        <li class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></li>
                                    </ul>
                                </div>

                                <div class="details-sec"> <a href="#.">LOOSE-FIT TRENCH COAT</a> <span class="font-montserrat">129.00 USD</span> </div>
                            </div>


                            <div class="items-in">

                                <div class="hot-tag"> HOT </div>

                                <img src="/image/new-item-4.jpg" alt="">

                                <div class="over-item">
                                    <ul class="animated fadeIn">
                                        <li> <a href="/image/new-item-4.jpg" data-lighter><i class="ion-search"></i></a></li>
                                        <li> <a href="#."><i class="ion-shuffle"></i></a></li>
                                        <li> <a href="#."><i class="fa fa-heart-o"></i></a></li>
                                        <li class="full-w"> <a href="#." class="btn">ADD TO CART</a></li>

                                        <li class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></li>
                                    </ul>
                                </div>

                                <div class="details-sec"> <a href="#.">LOOSE-FIT TRENCH COAT</a> <span class="font-montserrat">129.00 USD</span> </div>
                            </div>
                        </div>
                    </div>
                </section>
            </section> -->
<?php
$script = <<<JS
var price = $product->price_new;
  function renderPrice(value,modification) {
    //console.log(modification[value]);
    if (modification[value] == undefined)
        $('.price').html(price +' <i class="fa fa-rub" aria-hidden="true"></i>');
    else 
        $('.price').html(modification[value]+' <i class="fa fa-rub" aria-hidden="true"></i>');
  }  
JS;

$this->registerJs($script,yii\web\View::POS_HEAD);
$this->registerJs('$("[data-toggle=\'tooltip\']").tooltip(); $("[data-toggle=\'popover\']").popover(); ', \yii\web\View::POS_READY);
$this->registerJsFile('https://vk.com/js/api/share.js?95',['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile('https://vk.com/js/api/openapi.js?150',['position' => \yii\web\View::POS_HEAD]);
?>

