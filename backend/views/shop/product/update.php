<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $product shop\entities\Shop\Product\Product */
/* @var $model shop\forms\manage\Shop\Product\ProductEditForm */

$this->title = 'Редактирование продукта: ' . $product->name;
$this->params['breadcrumbs'][] = ['label' => 'Продукты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $product->name, 'url' => ['view', 'id' => $product->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="product-update">

    <?php $form = ActiveForm::begin(); ?>

    <div class="box box-default">
        <div class="box-header with-border">Общее заполнение</div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'brandId')->dropDownList($model->brandsList())->label('Бренд') ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'code')->textInput(['maxlength' => true])->label('Код продукта') ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Название продукта') ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'slug')->textInput(['maxlength' => true])->label('ЧПУ Продукта (адрес формируется автоматически)') ?>
                </div>
            </div>
            <?= $form->field($model, 'description')->widget(CKEditor::className())->label('Описание продукта') ?>
        </div>
    </div>

    <div class="box box-default">
        <div class="box-header with-border">Склад</div>
        <div class="box-body">
            <?= $form->field($model, 'weight')->textInput(['maxlength' => true])->label('Вес') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">Категории продукта</div>
                <div class="box-body">
                    <?= $form->field($model->categories, 'main')->dropDownList($model->categories->categoriesList(), ['prompt' => ''])->label('Основная категория') ?>
                    <?= $form->field($model->categories, 'others')->checkboxList($model->categories->categoriesList())->label('Остальные') ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">Тэги</div>
                <div class="box-body">
                    <?= $form->field($model->tags, 'existing')->checkboxList($model->tags->tagsList())->label('Существующие тэги') ?>
                    <?= $form->field($model->tags, 'textNew')->textInput()->label('Новый тэг') ?>
                </div>
            </div>
        </div>
    </div>

    <div class="box box-default">
        <div class="box-header with-border">Характеристики</div>
        <div class="box-body">
            <?php foreach ($model->values as $i => $value): ?>
                <?php if ($variants = $value->variantsList()): ?>
                    <?= $form->field($value, '[' . $i . ']value')->dropDownList($variants, ['prompt' => '']) ?>
                <?php else: ?>
                    <?= $form->field($value, '[' . $i . ']value')->textInput() ?>
                <?php endif ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="box box-default">
        <div class="box-header with-border">SEO</div>
        <div class="box-body">
            <?= $form->field($model->meta, 'title')->textInput() ?>
            <?= $form->field($model->meta, 'description')->textarea(['rows' => 2]) ?>
            <?= $form->field($model->meta, 'keywords')->textInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
