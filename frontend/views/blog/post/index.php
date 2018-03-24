<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */
/* @var $category shop\entities\Shop\Category */

use yii\helpers\Html;

$this->title = 'Блог интернет магазина мебели MEBEL-STYLE';
$this->params['breadcrumbs'][] = 'Блог';
?>

<?= $this->render('_list', [
    'dataProvider' => $dataProvider
]) ?>