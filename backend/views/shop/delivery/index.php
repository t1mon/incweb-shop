<?php

use shop\entities\Shop\DeliveryMethod;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\forms\Shop\DeliveryMethodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Способы доставки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <p>
        <?= Html::a('Создать Доставку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    'id',
                    [
                        'label' => 'Имя Доставки',
                        'attribute' => 'name',
                        'value' => function (DeliveryMethod $model) {
                            return Html::a(Html::encode($model->name), ['view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    //'cost',
                    [
                        'label' => 'Стоимость',
                        'attribute' => 'cost',
                    ],
                    'min_weight',
                    'max_weight',
                    ['class' => ActionColumn::class],
                ],
            ]); ?>
        </div>
    </div>
</div>
