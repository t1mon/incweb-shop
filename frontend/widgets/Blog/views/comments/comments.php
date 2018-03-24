<?php

use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $post \shop\entities\Blog\Post\Post */
/* @var $items \frontend\widgets\Blog\CommentView[] */
/* @var $count integer */
/* @var $commentForm \shop\forms\Blog\CommentForm */
?>

<div id="comments" class="inner-bottom-xs">
    <h3>Комментарии</h3>
    <?php foreach ($items as $item): ?>
        <?= $this->render('_comment', ['item' => $item]) ?>
    <?php endforeach; ?>
</div>
<?php if (Yii::$app->user->isGuest): ?>

    <div class="panel-panel-info">
        <div class="panel-body">
            <p style="color: #e84545">Для возможности комментирования статьи, необходима авторизация любым удобном способом!</p>
            <?= \yii\helpers\Html::a('Вход на сайт', ['/auth/auth/login'],['class'=>'btn btn-dark']) ?> <br><br>
            <a  href="<?= Html::encode(\yii\helpers\Url::to(['/auth/network/auth','authclient'=>'vk'])) ?>">
                <img class="img-responsive" src="<?= Yii::getAlias('@web/image/auth-vk.png') ?>" style="max-width:350px; " alt="Вход на сайт через Вконтакте">
            </a>
        </div>
    </div>

<?php else: ?>
<div id="reply-block" class="leave-reply">
    <?php $form = ActiveForm::begin([
        'action' => ['comment', 'id' => $post->id],
    ]); ?>

    <?= Html::activeHiddenInput($commentForm, 'parentId') ?>
    <?= $form->field($commentForm, 'text')->textarea(['rows' => 5]) ?>

    <div class="form-group">
        <?= Html::submitButton('Комментировать', ['class' => 'btn btn-dark']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<?php endif;?>
<?php $this->registerJs("
    jQuery(document).on('click', '#comments .comment-reply', function () {
        var link = jQuery(this);
        var form = jQuery('#reply-block');
        var comment = link.closest('.comment-item');
        jQuery('#commentform-parentid').val(comment.data('id'));
        form.detach().appendTo(comment.find('.reply-block:first'));
        return false;
    });
"); ?>


 