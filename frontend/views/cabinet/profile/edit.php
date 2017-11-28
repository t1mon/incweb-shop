<?php

/* @var $this yii\web\View */
/* @var $model shop\forms\manage\User\UserEditForm */
/* @var $user shop\entities\User\User */

use kartik\form\ActiveForm;
use yii\helpers\Html;

$this->title = 'Редактирование профиля';
$this->params['breadcrumbs'][] = ['label' => 'Профиль', 'url' => ['cabinet/default/index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="container">
    <div class="row">
        <div class="user-update" style="font-family: initial">

            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">

                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'email')->textInput(['maxLength' => true]) ?>
                    <?= $form->field($model, 'name')->label('Имя') ?>
                    <?= $form->field($model, 'surname')->label('Фамилия')?>
                    <?= $form->field($model, 'phone')->textInput(['maxLength' => true])->widget(\yii\widgets\MaskedInput::className(), [
                        'mask' => '+7(999)-999-9999',
                    ])->label('Телефон') ?>

                    <div class="form-group">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-dark']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>

        </div>
    </div>
</div>
