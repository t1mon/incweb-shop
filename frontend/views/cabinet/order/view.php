<?php

use shop\helpers\OrderHelper;
use shop\helpers\PriceHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $order shop\entities\Shop\Order\Order */

$this->title = 'Заказ # ' . $order->id;
$this->params['breadcrumbs'][] = ['label' => 'Профиль', 'url' => ['cabinet/default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Зыказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $order,
        'attributes' => [
            [
                'label'=>'Дата заказа',
                'attribute' => 'created_at',
                'format'=>'datetime',

            ],
            [
                'attribute' => 'current_status',
                'label' => 'Статус Заказа',
                'value' => OrderHelper::statusLabel($order->current_status),
                'format' => 'raw',
            ],
            [
                'label'=>'Доставка',
                'attribute' => 'delivery_method_name',

            ],
            [
                'label'=>'Индекс',
                'attribute' => 'deliveryData.index',

            ],
            [
                'label'=>'Адрес доставки',
                'attribute' => 'deliveryData.address',

            ],
            [
                'label'=>'Стоимость',
                'attribute' => 'cost',

            ],
            [
                'label'=>'Комментарий',
                'attribute' => 'note',
                'format'=>'ntext',

            ],
        ],
    ]) ?>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-left">Продукт</th>
                <th class="text-left">Модель</th>
                <th class="text-left">Количество</th>
                <th class="text-right">Стоимость</th>
                <th class="text-right">Всего</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($order->items as $item): ?>
                <tr>
                    <td class="text-left">
                        <?= Html::encode($item->product_name) ?>
                    </td>
                    <td class="text-left">
                        <?= Html::encode($item->modification_code) ?>
                        <?= Html::encode($item->modification_name) ?>
                    </td>
                    <td class="text-left">
                        <?= $item->quantity ?>
                    </td>
                    <td class="text-right"><?= PriceHelper::format($item->price) ?></td>
                    <td class="text-right"><?= PriceHelper::format($item->getCost()) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<!--
    <?php if ($order->canBePaid()): ?>
        <p>
            <?= Html::a('Pay via Robokassa', ['/payment/robokassa/invoice', 'id' => $order->id], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>
-->
</div>