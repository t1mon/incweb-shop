<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */
/* @var $searchForm \shop\forms\Shop\Search\SearchForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Поиск по каталогу';

$this->params['breadcrumbs'][] = $this->title;
?>
<section class="section-p-30px conact-us no-padding-b animate fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
    <!--======= CONTACT FORM =========-->
    <div class="container">
        <div class="contact section-p-30px no-padding-b">
            <div class="contact-form">
                <!--======= FORM  =========-->
                <?php $form = ActiveForm::begin(['action' => [''], 'method' => 'get','options'=>['class'=>'contact-form contact_form']]) ?>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="row">
                                <li class="col-sm-12">
                                    <label>
                                        <?= $form->field($searchForm, 'text')->textInput(['placeholder'=>'Введите текст для поиска...'])->label(false) ?>
                                    </label>
                                </li>
                                <li class="col-sm-6">
                                    <label>
                                        <?= $form->field($searchForm, 'category')->dropDownList($searchForm->categoriesList(), ['prompt' => 'Не выбрано','class'=>'selectpicker'])->label(false) ?>
                                    </label>
                                </li>
                                <li class="col-sm-6">
                                    <label>
                                        <?= $form->field($searchForm, 'category')->dropDownList($searchForm->brandsList(), ['prompt' => 'Не выбрано','class'=>'selectpicker'])->label(false) ?>
                                    </label>
                                </li>
                            </ul>
                            <ul class="row">
                                <li class="col-sm-12 no-margin">
                                    <?= Html::submitButton('Поиск', ['class' => 'btn']) ?>
                                    <?= Html::a('Очистить', [''], ['class' => 'btn']) ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>
</section>

<!--
<div class="panel panel-default">
    <div class="panel-body">
        <?php $form = ActiveForm::begin(['action' => [''], 'method' => 'get']) ?>

        <div class="row">
            <div class="col-md-4">
                <?= $form->field($searchForm, 'text')->textInput() ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($searchForm, 'category')->dropDownList($searchForm->categoriesList(), ['prompt' => '']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($searchForm, 'brand')->dropDownList($searchForm->brandsList(), ['prompt' => '']) ?>
            </div>
        </div>

        <?php foreach ($searchForm->values as $i => $value): ?>
            <div class="row">
                <div class="col-md-4">
                    <?= Html::encode($value->getCharacteristicName()) ?>
                </div>
                <?php if ($variants = $value->variantsList()): ?>
                    <div class="col-md-4">
                        <?= $form->field($value, '[' . $i . ']equal')->dropDownList($variants, ['prompt' => '']) ?>
                    </div>
                <?php elseif ($value->isAttributeSafe('from') && $value->isAttributeSafe('to')): ?>
                    <div class="col-md-2">
                        <?= $form->field($value, '[' . $i . ']from')->textInput() ?>
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($value, '[' . $i . ']to')->textInput() ?>
                    </div>
                <?php endif ?>
            </div>
        <?php endforeach; ?>

        <div class="row">
            <div class="col-md-6">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
            </div>
            <div class="col-md-6">
                <?= Html::a('Clear', [''], ['class' => 'btn btn-default btn-lg btn-block']) ?>
            </div>
        </div>

        <?php ActiveForm::end() ?>
    </div>
</div>

-->

<?php if ($dataProvider != null):?>
<?= $this->render('_list', [
    'dataProvider' => $dataProvider
]) ?>

<?php endif;?>
