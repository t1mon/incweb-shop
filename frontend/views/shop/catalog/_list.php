<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>

<!------------------------------------------>
<!--======= ITEMS =========-->
    <div class="items-short-type animate fadeInUp" data-wow-delay="0.4s">

        <!--======= GRID LIST STYLE =========-->
        <div class="grid-list"> <a href="#."><i class="fa fa-th-large"></i></a> <a href="#."><i class="fa fa-th-list"></i></a> </div>

        <!--======= SHORT BY =========-->
        <div class="short-by">
            <p>Фильтр:</p>
            <select class="selectpicker" onchange="location = this.value;">
                <?php
                $values = [
                    '' => 'Default',
                    'name' => 'Name (A - Z)',
                    '-name' => 'Name (Z - A)',
                    'price' => 'Price (Low &gt; High)',
                    '-price' => 'Price (High &gt; Low)',
                    '-rating' => 'Rating (Highest)',
                    'rating' => 'Rating (Lowest)',
                ];
                $current = Yii::$app->request->get('sort');
                ?>
                <?php foreach ($values as $value => $label): ?>
                    <option value="<?= Html::encode(Url::current(['sort' => $value ?: null])) ?>" <?php if ($current == $value): ?>selected="selected"<?php endif; ?>><?= $label ?></option>
                <?php endforeach; ?>
            </select>
            <p>Кол-во элементов:</p>
            <select class="selectpicker" onchange="location = this.value;">
                <?php
                $values = [15, 25, 50, 75, 100];
                $current = $dataProvider->getPagination()->getPageSize();
                ?>
                <?php foreach ($values as $value): ?>
                    <option value="<?= Html::encode(Url::current(['per-page' => $value])) ?>" <?php if ($current == $value): ?>selected="selected"<?php endif; ?>><?= $value ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!--======= VIEW ITEM NUMBER =========-->
        <div class="view-num">
            <p>Показано <?= $dataProvider->getCount() ?> из <?= $dataProvider->getTotalCount() ?></p>
        </div>
    </div>

    <div class="popurlar_product">
        <ul class="row">
            <?php foreach ($dataProvider->getModels() as $product): ?>
                <?= $this->render('_product', [
                    'product' => $product
                ]) ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <!--======= PAGINATION =========-->
        <?= LinkPager::widget([
            'pagination' => $dataProvider->getPagination(),
            'nextPageLabel' => '&rsaquo;',
            'prevPageLabel' => '&lsaquo;',
            //'disabledPageCssClass'=>'',
            'options'=> ['class' =>'pagination animate fadeInUp','data-wow-delay'=>'0.4s']
        ]) ?>
<!--<div class="row">
    <div class="col-sm-6 text-left">
        <?= LinkPager::widget([
            'pagination' => $dataProvider->getPagination(),
        ]) ?>
    </div>
    <div class="col-sm-6 text-right">Showing <?= $dataProvider->getCount() ?> of <?= $dataProvider->getTotalCount() ?></div>
</div> -->
