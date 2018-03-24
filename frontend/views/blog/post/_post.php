<?php

/* @var $this yii\web\View */
/* @var $model shop\entities\Blog\Post\Post */

use yii\helpers\Html;
use yii\helpers\Url;

$url = Url::to(['post', 'id' =>$model->id]);
?>


        <!--  Posts 1 -->
        <li class="animate fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
            <!--  Image -->
            <?php if ($model->photo): ?>
                <a href="<?= Html::encode($url) ?>">
                        <img class="img-responsive" src="<?= Html::encode($model->getThumbFileUrl('photo', 'blog_list')) ?>" alt="<?= Html::encode($model->title) ?>">
                </a>
            <?php endif; ?>

            <!-- Tag Icon -->
            <div class="blog-tag-icon"> <i class="fa fa-pencil"></i> </div>
            <span style="text-transform: uppercase" class="tags">Рубрика: <?=Html::encode($model->category->name)?></span> <a href="<?= Html::encode($url) ?>" class="tittle-post font-playfair"><?= Html::encode($model->title) ?></a>
            <?= Yii::$app->formatter->asNtext($model->description) ?>
            <!--  Post Info -->
            <ul class="info">
                <!--<li><i class="fa fa-user"></i> admin</li>-->
                <li><i class="fa fa-calendar-o"></i><?=Yii::$app->formatter->asDate($model->created_at, 'd MMMM yyyy')?></li>
                <!--<li><i class="fa fa-eye"></i> 325</li>-->
                <li class="read-right"><a class="btn btn-small btn-dark" href="<?= Html::encode($url) ?>">ЧИТАТЬ ДАЛЕЕ</a></li>
            </ul>
        </li>




