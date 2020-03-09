<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model shop\entities\Shop\Product\FakeReviews */

$this->title = 'Update Fake Reviews: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Fake Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fake-reviews-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
