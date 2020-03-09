<?php

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\Shop\DeliveryMethodForm */

$this->title = 'Добавление способа доставки';
$this->params['breadcrumbs'][] = ['label' => 'Способы доставки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="method-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
