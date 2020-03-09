<?php

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\Shop\CharacteristicForm */

$this->title = 'Добавление Характеристики';
$this->params['breadcrumbs'][] = ['label' => 'Характиристики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="characteristic-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
