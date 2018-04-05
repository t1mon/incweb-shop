<?php

/* @var $this yii\web\View */
/* @var $post shop\entities\Blog\Post\Post */

use frontend\widgets\Blog\CommentsWidget;
use yii\helpers\Html;

$this->title = $post->getSeoTitle();

$this->registerMetaTag(['name' =>'description', 'content' => $post->meta->description]);
$this->registerMetaTag(['name' =>'keywords', 'content' => $post->meta->keywords]);

$this->params['breadcrumbs'][] = ['label' => 'Блог', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $post->category->name, 'url' => ['category', 'slug' => $post->category->slug]];
$this->params['breadcrumbs'][] = $post->title;

$this->params['active_category'] = $post->category;

$tagLinks = [];
foreach ($post->tags as $tag) {
    $tagLinks[] = Html::a(Html::encode($tag->name), ['tag', 'slug' => $tag->slug]);
}
?>

<article>


    <p><span class="glyphicon glyphicon-calendar"></span> <?= Yii::$app->formatter->asDatetime($post->created_at); ?></p>

    <?php if ($post->photo): ?>
    <a href="<?= Html::encode($post->getThumbFileUrl('photo', 'origin')) ?>" data-lighter>
        <p><img src="<?= Html::encode($post->getThumbFileUrl('photo', 'origin')) ?>" alt="" class="img-responsive" /></p>
    </a>
    <?php endif; ?>
<div class="lighter-add">
    <?= Yii::$app->formatter->asHtml($post->content, [
        'Attr.AllowedRel' => array('nofollow'),
        'HTML.SafeObject' => true,
        'Output.FlashCompat' => true,
        'HTML.SafeIframe' => true,
        'URI.SafeIframeRegexp'=>'%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%',
    ]) ?>
</div>
</article>
<?php if($tagLinks):?>
<p>Tags: <?= implode(', ', $tagLinks) ?></p>
<?php endif;?>

<?= CommentsWidget::widget([
    'post' => $post,
]) ?>
<?php
$script = <<<JS
 img = $('.lighter-add img').each(function() {
   $(this).wrap('<span style="display:inline-grid;text-align:center;"><a href="'+ $(this).attr('src') +'" data-lighter></a>'+$(this).attr('title')+'</span>');
 });
//img.wrap('<a href="'+ img.attr('src') +'" data-lighter></a>');

JS;
$this->registerJs($script,yii\web\View::POS_READY);
?>

