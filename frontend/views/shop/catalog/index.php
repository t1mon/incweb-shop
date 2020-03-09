<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */
/* @var $category shop\entities\Shop\Category */

use yii\helpers\Html;

$this->title = 'Каталог мебели. Каталог товаров и цены в Самаре';
$this->params['breadcrumbs'][] = $this->title;
?>

<!--<h1><?//= Html::encode($this->title) ?></h1> -->
<div class="col-sm-9 animate fadeInUp" data-wow-delay="0.2s">
<?php /*= $this->render('_subcategories', [
    'category' => $category
]) */
?>

<?= $this->render('_list', [
    'dataProvider' => $dataProvider
]) ?>
</div>

