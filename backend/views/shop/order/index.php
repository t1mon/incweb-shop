<?php

use shop\entities\Shop\Order\Order;
use shop\helpers\OrderHelper;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\forms\Shop\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <p>
        <?= Html::a('Экспорт заказов', ['export'], ['class' => 'btn btn-primary', 'data-method' => 'post', 'data-confirm' => 'Export?']) ?>
    </p>

    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    [
                        'attribute' => 'id',
                        'value' => function (Order $model) {
                            return Html::a(Html::encode('Заказ №'.$model->id), ['view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    //'created_at:datetime',
                    [
                        'label'=>'Дата создания',
                        'attribute' => 'created_at',
                        'format'=>'datetime',

                    ],
                    [
                        'attribute' => 'Статус Заказа',
                        'filter' => $searchModel->statusList(),
                        'value' => function (Order $model) {
                            return OrderHelper::statusLabel($model->current_status);
                        },
                        'format' => 'raw',
                    ],
                    [
                            'label'=>'Сумма заказа',
                            'attribute' =>'cost',
                            'value' => function (Order $model)
                            {
                                return $model->cost.'<i class="fa fa-fw fa-rub"></i>';
                            },
                            'format'=>'raw',
                    ],
                    ['class' => ActionColumn::class],
                ],
            ]); ?>
        </div>
    </div>
</div>
