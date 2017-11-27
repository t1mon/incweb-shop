<?php

/* @var $this yii\web\View */
/* @var $user shop\entities\User\User */

use yii\helpers\Html;

$this->title = 'Профиль';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cabinet-index">

    <p>
        <?= Html::a('Редактирование профиля', ['cabinet/profile/edit'], ['class' => 'btn btn-dark']) ?>
        <h4>Связать аккаунт</h4>
        <?= yii\authclient\widgets\AuthChoice::widget([
            'baseAuthUrl' => ['cabinet/network/attach'],
        ]); ?>
    </p>

    <table class="table table-striped table-responsive">
        <thead>
        <tr>
            <th>Имя</th>
            <td>Иван</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th>Фамилия</th>
            <td>Чмель</td>
        </tr>
        <tr>
            <th>Логин</th>
            <td><?=$user->username?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?=$user->email?></td>
        </tr>
        <tr>
            <th>Телефон</th>
            <td><?=$user->phone?></td>
        </tr>
        </tbody>
    </table>
</div>
