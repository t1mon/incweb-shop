<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */

?>
<div class="blog-posts">
    <ul>
<?= \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'layout' => "{items}\n{pager}",
    'itemView' => '_post',
]) ?>
    </ul>
</div>
