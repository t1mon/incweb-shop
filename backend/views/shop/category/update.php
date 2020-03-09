<?php

/* @var $this yii\web\View */
/* @var $category shop\entities\Shop\Category */
/* @var $model shop\forms\manage\Shop\CategoryForm */

$this->title = 'Редактирование Категории: ' . $category->name;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $category->name, 'url' => ['view', 'id' => $category->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="category-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
