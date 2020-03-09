<?php

use shop\helpers\OrderHelper;
use shop\helpers\PriceHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $order shop\entities\Shop\Order\Order */

$this->title = 'Заказ № ' . $order->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\helpers\Url::remember();
?>
<div class="user-view">

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $order->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $order->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить данную позицию?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="box">
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $order,
                'attributes' => [
                    //'id',
                    [
                        'label'=>'Номер заказа',
                        'attribute' => 'id',

                    ],
                    //'created_at:datetime',
                    [
                        'label'=>'Дата создания',
                        'attribute' => 'created_at',
                        'format'=>'datetime',

                    ],
                    [
                        'label'=>'Статус заказа',
                        'attribute' => 'current_status',
                        'value' => OrderHelper::statusLabel($order->current_status),
                        'format' => 'raw',
                    ],
                    [
                        'label'=>'Клиент',
                        'attribute' => 'user_id',
                        'value'=> function (\shop\entities\Shop\Order\Order $model)
                        {
                            $user = $model->user_id ? \shop\entities\User\User::findOne($model->user_id)->getSurnameName() : 'Пользователь не зарегестрирован';
                            return $user;
                        }

                    ],
                    //'user_id',
                    //'delivery_method_name',
                    [
                        'label'=>'Название доставки',
                        'attribute' => 'delivery_method_name',
                    ],
                    //'deliveryData.index',
                    [
                        'label'=>'Индекс города',
                        'attribute' => 'deliveryData.index',
                    ],
                    //'deliveryData.address',
                    [
                        'label'=>'Адрес доставки',
                        'attribute' => 'deliveryData.address',
                    ],
                    //'cost',
                    [
                        'label'=>'Сумма заказа',
                        'attribute' =>'cost',
                        'value' => function (\shop\entities\Shop\Order\Order $model)
                        {
                            return $model->cost.'<i class="fa fa-fw fa-rub"></i>';
                        },
                        'format'=>'raw',
                    ],
                    //'note:ntext',
                    [
                        'label'=>'Коментарий к заказу',
                        'attribute' => 'note',
                        'format'=>'ntext',

                    ],
                ],
            ]) ?>
        </div>
    </div>

    <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered" style="margin-bottom: 0">
                    <thead>
                    <tr>
                        <th class="text-left">Имя продукта</th>
                        <th class="text-left">Модель</th>
                        <th class="text-left">Количество</th>
                        <th class="text-right">Цена за шт</th>
                        <th class="text-right">Всего</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($order->items as $item): ?>
                        <tr>
                            <td class="text-left">
                                <b>Код продукта:</b><?= Html::encode($item->product_code) ?><br />
                                <?php echo Html::a(Html::encode($item->product_name), ['shop/product/view', 'id' => $item->product_id]);?>
                            </td>
                            <td class="text-left">
                                <?= Html::encode($item->modification_code) ?><br />
                                <?= Html::encode($item->modification_name) ?>
                            </td>
                            <td class="text-left">
                                <?= $item->quantity ?>
                            </td>
                            <td class="text-right"><?= PriceHelper::format($item->price) ?><i class="fa fa-fw fa-rub"></i></td>
                            <td class="text-right"><?= PriceHelper::format($item->getCost()) ?><i class="fa fa-fw fa-rub"></i></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered" style="margin-bottom: 0">
                    <thead>
                    <tr>
                        <th class="text-left">Дата изменения статуса</th>
                        <th class="text-left">Статус</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($order->statuses as $status): ?>
                        <tr>
                            <td class="text-left">
                                <?= Yii::$app->formatter->asDatetime($status->created_at) ?>
                            </td>
                            <td class="text-left">
                                <?= OrderHelper::statusLabel($status->value) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
