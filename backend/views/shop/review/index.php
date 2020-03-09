<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\forms\Shop\ReviewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $data shop\entities\Shop\Product\Review */



$this->title = 'Отзывы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <!--  <p>
        <?= Html::a('Create Review', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'product_id',
            [
                'label'=>'Имя Продукта',
                'attribute' => 'product_id',
                'value' => function ($data) {
                    $product = \shop\entities\Shop\Product\Product::findOne($data->product_id);
                    return Html::a($product->name,['shop/product/view','id'=>$product->id]);
                },
                'format' => 'raw',
            ],
            'created_at:datetime',
            //'user_id',
            //'vote',
            [
                'label'=>'Рейтинг',
                'attribute' => 'vote',
                'value' => function ($data) {
                    $vote =  \kartik\widgets\StarRating::widget([
                        'name' => Html::encode($data->id),
                        'value' => $data->vote,
                        'disabled' => true,
                        'pluginOptions' => ['size'=>'xm','displayOnly' => true]
                    ]);
                    return $vote;
                },
                'format' => 'raw',
            ],
            'text:ntext',
            // 'active',
            [
                'label' => 'Статус',
                'attribute' => 'active',
                //'filter' => $searchModel->statusList(),
                'value' => function ($data) {
                    return \shop\helpers\ProductHelper::statusLabel($data->active);
                },
                'format' => 'raw',
            ],
            // 'product_id',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
