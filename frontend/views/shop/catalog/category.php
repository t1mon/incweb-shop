<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */
/* @var $category shop\entities\Shop\Category */

use yii\helpers\Html;

$this->title = $category->getSeoTitle();

$this->registerMetaTag(['name' =>'description', 'content' => $category->meta->description]);
$this->registerMetaTag(['name' =>'keywords', 'content' => $category->meta->keywords]);

$this->params['breadcrumbs'][] = ['label' => 'Каталог продукции', 'url' => ['index']];
if (is_array($category)) {
    foreach ($category->parents as $parent) {
        if (!$parent->isRoot()) {
            $this->params['breadcrumbs'][] = ['label' => $parent->name, 'url' => ['category', 'id' => $parent->id]];
        }
    }
}
$this->params['breadcrumbs'][] = $category->name;

$this->params['active_category'] = $category;
?>
<div class="col-sm-9 animate fadeInUp" data-wow-delay="0.2s">
<!--<h1><?= Html::encode($category->getHeadingTile()) ?></h1>-->

<?php /*= $this->render('_subcategories', [
    'category' => $category
]) */?>

<?php if (trim($category->description)): ?>
    <!--<div class="panel panel-default">
        <div class="panel-body"> -->
            <?=$category->description?>
      <!--  </div>
    </div> -->
<?php endif; ?>

<?= $this->render('_list', [
    'dataProvider' => $dataProvider
]) ?>
</div>

