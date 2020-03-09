<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\widgets\Shop\CategoriesWidget;

?>
<?php $this->beginContent('@frontend/views/layouts/main.php') ?>
<?php if (Yii::$app->controller->action->id == 'index'):?>
<?php $this->title = 'Каталог мебели - каталог товаров и цены в Самаре';
    $this->registerMetaTag([
        'name' => 'keywords',
        'content' => 'мебель каталог товаров цены, мебель официальный каталог,мебель Самара каталог, мебель Самара каталог товаров цены'
    ]);
    $this->registerMetaTag([
        'name' => 'description',
        'content' => 'Мебель для дома в интернет-магазине MEBEL-STYLE. Огромный выбор моделей по низким ценам в наличии и под заказ; доставка, сборка, гарантия качества.'
    ]);

    ?>

<?php endif;?>
<section class="section-p-30px pages-in">
    <div class="container">
        <div class="row">



            <!--======= SIDE BAR =========-->
            <div class="col-sm-3 animate fadeInLeft" data-wow-delay="0.2s">
                <div class="side-bar">
                    <span style="font-size: 1.5em; font-weight: bold;">Фильтр</span>
                    <div class="dropdown visible-xs hidden-sm hidden-md hidden-lg">
                        <a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-dark" data-target="#" href="#">
                            Категории <span class="caret"></span>
                        </a>
                        <?= \frontend\widgets\Shop\CategoryWidgetPhone::widget([
                            'active' => $this->params['active_category'] ?? null
                        ])?>
                    </div>
                    <!-- HEADING -->
                    <div class="heading hidden-xs visible-sm visible-md visible-lg">
                        <span>КАТЕГОРИИ</span>

                    <!-- CATEGORIES -->

                        <?= CategoriesWidget::widget([
                            'active' => $this->params['active_category'] ?? null
                        ]) ?>
                    </div>
                </div>
            </div>

            <?= $content ?>

        </div>
    </div>
</section>
<!-- HTML-код модального окна -->
<div id="consultationModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Заголовок модального окна -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <span class="modal-title"></span>
            </div>
            <!-- Основное содержимое модального окна -->
            <div class="modal-body">
                <div class="avatar"><a target="_blank" href="https://vk.com/agibalova163"><img class="media-object img-circle" src="/image/avatar-11.png" align="left" alt=""></a>
                    <em>Здравствуйте! Меня зовут Анастасия. Я готова перезвонить вам, и проконсультировать вас по возникшему вопросу. Просто заполните обязательные поля снизу и я вам позвоню.  </em>
                </div>

                        <!--======= FORM  =========-->
                        <form role="form" id="consultation_form" class="contact-form" method="post" onsubmit="return false">
                            <div class="row">
                                <div class="col-md-12">
                                                <input class="form-control" name="name" id="name_consultation" placeholder="*ИМЯ" type="text">
                                                <input class="form-control " name="phone" id="phone_consultation" placeholder="*ТЕЛЕФОН" type="text">
                                                <textarea class="form-control" name="message" id="message_consultation" rows="5" placeholder="Комментарий - Можете указать удобное для вас время звонка!"></textarea>
                                </div>
                            </div>
                        </form>


            </div>
            <!-- Футер модального окна -->
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Отменить покупку</button>
                <button id="submit_consultation" type="button" class="btn btn-consultation">Купить</button>
            </div>
        </div>
    </div>
</div>

<?php
$script = <<<JS
$("#price-range").noUiSlider({
    range: {
      'min': [ 0 ],
      'max': [ 1000 ]
    },
    start: [80, 940],
        connect:true,
        serialization:{
            lower: [
        $.Link({
          target: $("#price-min")
        })
      ],
      upper: [
        $.Link({
          target: $("#price-max")
        })
      ],
      format: {
      // Set formatting
        decimals: 2,
        prefix: '$'
      }
        }
  });

JS;

$this->registerJs($script,yii\web\View::POS_READY);
?>
<?php $this->endContent() ?>





