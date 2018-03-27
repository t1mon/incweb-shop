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
                    <h4>Фильтр</h4>
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
                        <h6>КАТЕГОРИИ</h6>

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
  })

JS;

$this->registerJs($script,yii\web\View::POS_READY);
?>
<?php $this->endContent() ?>





