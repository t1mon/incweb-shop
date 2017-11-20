<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $method shop\entities\Shop\DeliveryMethod */

$this->title = $method->name;
$this->params['breadcrumbs'][] = ['label' => 'Способы Доставки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $method->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $method->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить способ доставки: '.$method->name.'?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="box">
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $method,
                'attributes' => [
                    'id',
                    //'name',
                    [
                        'label' => 'Имя Доставки',
                        'attribute' => 'name',
                    ],
                    //'cost',
                    [
                        'label' => 'Стоимость',
                        'attribute' => 'cost',
                    ],
                    'min_weight',
                    'max_weight',
                ],
            ]) ?>
        </div>
    </div>
</div>
