<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model shop\entities\Shop\Product\FakeReviews */

$this->title = 'Create Fake Reviews';
$this->params['breadcrumbs'][] = ['label' => 'Fake Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fake-reviews-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
