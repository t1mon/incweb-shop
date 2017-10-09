<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\forms\Shop\ReviewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reviews';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Review', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'created_at',
            'user_id',
            'vote',
            'text:ntext',
            // 'active',
            // 'product_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
