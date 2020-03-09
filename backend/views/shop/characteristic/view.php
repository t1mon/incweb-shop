<?php

use shop\helpers\CharacteristicHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $characteristic shop\entities\Shop\Characteristic */

$this->title = $characteristic->name;
$this->params['breadcrumbs'][] = ['label' => 'Характеристики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $characteristic->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $characteristic->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить характеристику: '.$characteristic->name.'?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="box">
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $characteristic,
                'attributes' => [
                    'id',
                    //'name',
                    [
                        'label' => 'Имя Характеристики',
                        'attribute' => 'name',
                    ],
                    [
                        'attribute' => 'type',
                        'value' => CharacteristicHelper::typeName($characteristic->type),
                    ],
                    //'sort',
                    [
                        'label' => 'Сортировка',
                        'attribute' => 'sort',
                    ],
                    //'required:boolean',
                    [
                        'label' => 'Обязательно для заполнения',
                        'attribute' => 'required',
                        'format' => 'boolean',
                    ],
                    //'default',
                    [
                        'label' => 'Значение по умолчанию',
                        'attribute' => 'default',
                    ],
                    [
                        'label' => 'Варианты',
                        'attribute' => 'variants',
                        'value' => implode(PHP_EOL, $characteristic->variants),
                        'format' => 'ntext',
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>
