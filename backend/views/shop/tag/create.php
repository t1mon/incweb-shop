<?php

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\Shop\TagForm */

$this->title = 'Создание Тэга';
$this->params['breadcrumbs'][] = ['label' => 'Теги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tag-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
