<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */
/* @var $category shop\entities\Shop\Category */

use yii\helpers\Html;

$this->title = 'Каталог продукции';
$this->params['breadcrumbs'][] = $this->title;
?>

<!--<h1><?//= Html::encode($this->title) ?></h1> -->

<?php
/*= $this->render('_subcategories', [
    'category' => $category
]) */
?>

<?= $this->render('_list', [
    'dataProvider' => $dataProvider
]) ?>


