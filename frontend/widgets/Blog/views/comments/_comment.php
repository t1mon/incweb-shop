<?php

/* @var $item \frontend\widgets\Blog\CommentView */
?>

<div class="comment-item" id="comment_<?= $item->comment->id ?>">
    <div class="panel panel-default">
        <div class="panel-body">
            <p class="comment-content">
                <?php if ($item->comment->isActive()): ?>
                    <?= Yii::$app->formatter->asNtext($item->comment->text) ?>
                <?php else: ?>
                    <i>Комментарий удален.</i>
                <?php endif; ?>
            </p>
                    <div>
                        <div class="pull-left">
                            <?= Yii::$app->formatter->asDatetime($item->comment->created_at) ?>
                            <?php $user =  \shop\entities\User\User::find($item->comment->user_id)->one() ?>
                            <?=$user->getSurnameName() ?>
                        </div>
                        <div class="pull-right">
                            <span class="comment-reply btn btn-small btn-dark">Ответить</span>
                        </div>
                    </div>
        </div>
    </div>
    <div class="margin">
        <div class="reply-block"></div>
        <div class="comments">
            <?php foreach ($item->children as $children): ?>
                <?= $this->render('_comment', ['item' => $children]) ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
 