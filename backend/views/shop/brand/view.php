<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $brand shop\entities\Shop\Brand */

$this->title = $brand->name;
$this->params['breadcrumbs'][] = ['label' => 'Бреды', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $brand->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $brand->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить Бренд: '.$brand->name.'?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="box">
        <div class="box-header with-border">Общее описание</div>
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $brand,
                'attributes' => [
                    'id',
                    //'name',
                    //'slug',
                    [
                        'label'=>'Имя Бренда',
                        'attribute' => 'name'
                    ],
                    [
                        'label'=>'ЧПУ для Бренда',
                        'attribute' => 'slug'
                    ],
                ],
            ]) ?>
        </div>
    </div>

    <div class="box">
        <div class="box-header with-border">SEO</div>
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $brand,
                'attributes' => [
                    'meta.title',
                    'meta.description',
                    'meta.keywords',
                ],
            ]) ?>
        </div>
    </div>
</div>
