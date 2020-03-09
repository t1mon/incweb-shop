<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */
/* @var $tag shop\entities\Shop\Tag */

use yii\helpers\Html;

$this->title = 'Продукт с тэгом ' . $tag->name;

$this->params['breadcrumbs'][] = ['label' => 'Каталог продукции', 'url' => ['index']];
$this->params['breadcrumbs'][] = $tag->name;
?>


<div class="col-sm-9 animate fadeInUp" data-wow-delay="0.2s">
<?= $this->render('_list', [
    'dataProvider' => $dataProvider
]) ?>
</div>


