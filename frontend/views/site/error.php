<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<section class="page-404 text-center animate fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
    <div class="container">
        <h1><?= Html::encode($this->title) ?></h1>
        <h4 class="alert alert-danger"><?= nl2br(Html::encode($message)) ?></h4>
        <p>Извините, но страница, которую вы ищете, не найдена. Убедитесь, что вы набрали текущий правильный адрес.</p>
        <a href="<?=\yii\helpers\Url::home()?>" class="btn btn-dark btn-small">ВЕРНУТЬСЯ НА ГЛАВНУЮ</a> </div>
</section>

