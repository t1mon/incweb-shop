<?php

use shop\entities\Shop\Product\Product;
use shop\helpers\PriceHelper;
use shop\helpers\ProductHelper;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\forms\Shop\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <p>
        <?= Html::a('Добавить продукт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'rowOptions' => function (Product $model) {
                    return $model->quantity <= 1 ? ['style' => 'background: #fdc'] : [];
                },
                'columns' => [
                    [
                            'label' => 'Фото',
                        'value' => function (Product $model) {
                            return $model->mainPhoto ? Html::img($model->mainPhoto->getThumbFileUrl('file', 'admin')) : null;
                        },
                        'format' => 'raw',
                        'contentOptions' => ['style' => 'width: 100px'],
                    ],
                    [
                        'label' => 'Код продукта',
                        'attribute' => 'code',
                    ],
                    //'id',
                    [
                        'label' => 'Название товара',
                        'attribute' => 'name',
                        'value' => function (Product $model) {
                            return Html::a(Html::encode($model->name), ['view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Категория',
                        'attribute' => 'category_id',
                        'filter' => $searchModel->categoriesList(),
                        'value' => 'category.name',
                    ],
                    [
                        'label' => 'Цена',
                        'attribute' => 'price_new',
                        'value' => function (Product $model) {
                            return PriceHelper::format($model->price_new);
                        },
                    ],
                    //'quantity',
                    [
                        'label' => 'Кол-во на складе',
                        'attribute' => 'quantity',
                    ],
                    //'code',
                    [
                        'label' => 'Статус',
                        'attribute' => 'status',
                        'filter' => $searchModel->statusList(),
                        'value' => function (Product $model) {
                            return ProductHelper::statusLabel($model->status);
                        },
                        'format' => 'raw',
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
