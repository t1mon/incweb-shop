<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;

?>
<?php $this->beginContent('@frontend/views/layouts/main.php') ?>
<div class="container">
        <div class="row">
            <div id="content" class="col-sm-9">
                <?= $content ?>
            </div>
            <aside id="column-right" class="col-sm-3 hidden-xs">
                <div class="list-group">
                    <a href="<?= Html::encode(Url::to(['/cabinet/default/index'])) ?>" class="list-group-item">Мой профиль</a>
                    <a href="<?= Html::encode(Url::to(['/auth/reset/request'])) ?>" class="list-group-item">Сброс пароля</a>
                    <a href="<?= Html::encode(Url::to(['/cabinet/wishlist/index'])) ?>" class="list-group-item">Список желаний</a>
                    <a href="<?= Html::encode(Url::to(['/cabinet/order/index'])) ?>" class="list-group-item">Мои заказы</a>
                </div>
            </aside>
        </div>
</div>

<?php $this->endContent() ?>
