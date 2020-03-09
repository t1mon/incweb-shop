<?php

use kartik\file\FileInput;
use shop\entities\Shop\Product\Modification;
use shop\entities\Shop\Product\Value;
use shop\helpers\PriceHelper;
use shop\helpers\ProductHelper;
use shop\helpers\WeightHelper;
use yii\bootstrap\ActiveForm;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $product shop\entities\Shop\Product\Product */
/* @var $photosForm shop\forms\manage\Shop\Product\PhotosForm */
/* @var $modificationsProvider yii\data\ActiveDataProvider */

$this->title = $product->name;
$this->params['breadcrumbs'][] = ['label' => 'Продукты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?php if ($product->isActive()): ?>
            <?= Html::a('Снять с публикации', ['draft', 'id' => $product->id], ['class' => 'btn btn-warning', 'data-method' => 'post']) ?>
        <?php else: ?>
            <?= Html::a('Активировать', ['activate', 'id' => $product->id], ['class' => 'btn btn-success', 'data-method' => 'post']) ?>
        <?php endif; ?>
        <?= Html::a('Редактировать', ['update', 'id' => $product->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $product->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить продукт ' .$product->name.'?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php if(Yii::$app->session->getFlash('success_update'))
        { ?>
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Оповещение!</h4>
                <?=Yii::$app->session->getFlash('success_update')?>
            </div>
        <?php } ?>


    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">Общее описание</div>
                <div class="box-body">
                    <?= DetailView::widget([
                        'model' => $product,
                        'attributes' => [
                            'id',
                            [
                                'label'=>'Статус',
                                'attribute' => 'status',
                                'value' => ProductHelper::statusLabel($product->status),
                                'format' => 'raw',
                            ],
                            [
                                'label'=>'Бренд',
                                'attribute' => 'brand_id',
                                'value' => ArrayHelper::getValue($product, 'brand.name'),
                            ],
                            //'code',
                            [
                                'label' => 'Код продукта',
                                'attribute' => 'code',
                            ],
                           // 'name',
                            [
                                'label' => 'Название товара',
                                'attribute' => 'name',
                            ],
                            [
                                'label' => 'Категория',
                                'attribute' => 'category_id',
                                'value' => ArrayHelper::getValue($product, 'category.name'),
                            ],
                            [
                                'label' => 'Остальные категории',
                                'value' => implode(', ', ArrayHelper::getColumn($product->categories, 'name')),
                            ],
                            [
                                'label' => 'Тэги',
                                'value' => implode(', ', ArrayHelper::getColumn($product->tags, 'name')),
                            ],
                            //'quantity',
                            [
                                'label' => 'Кол-во на складе',
                                'attribute' => 'quantity',
                            ],
                            [
                                'label' => 'Вес',
                                'attribute' => 'weight',
                                'value' => WeightHelper::format($product->weight),
                            ],
                            [
                                'label' => 'Текущая цена продукта',
                                'attribute' => 'price_new',
                                'value' => PriceHelper::format($product->price_new),
                            ],
                            [
                                'label' => 'Цена без скидки',
                                'attribute' => 'price_old',
                                'value' => PriceHelper::format($product->price_old),
                            ],
                        ],
                    ]) ?>
                    <br />
                    <p>
                        <?= Html::a('Изменить цену', ['price', 'id' => $product->id], ['class' => 'btn btn-primary']) ?>
                        <?php if ($product->canChangeQuantity()): ?>
                            <?= Html::a('Изменить количество', ['quantity', 'id' => $product->id], ['class' => 'btn btn-primary']) ?>
                        <?php endif; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">

            <div class="box box-default">
                <div class="box-header with-border">Характеристики</div>
                <div class="box-body">

                    <?= DetailView::widget([
                        'model' => $product,
                        'attributes' => array_map(function (Value $value) {
                            return [
                                'label' => $value->characteristic->name,
                                'value' => $value->value,
                            ];
                        }, $product->values),
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="box-header with-border">Описание продукта</div>
        <div class="box-body">
            <?= Yii::$app->formatter->asHtml($product->description, [
                'Attr.AllowedRel' => array('nofollow'),
                'HTML.SafeObject' => true,
                'Output.FlashCompat' => true,
                'HTML.SafeIframe' => true,
                'URI.SafeIframeRegexp'=>'%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%',
            ]) ?>
        </div>
    </div>

    <div class="box" id="modifications">
        <div class="box-header with-border">Модификации продукта</div>
        <div class="box-body">
            <p>
                <?= Html::a('Добавить модификацию', ['shop/modification/create', 'product_id' => $product->id], ['class' => 'btn btn-success']) ?>
            </p>
            <?= GridView::widget([
                'dataProvider' => $modificationsProvider,
                'columns' => [
                    //'code',
                    [
                        'label' => 'Код продукта',
                        'attribute' => 'code',
                    ],
                    //'name',
                    [
                        'label' => 'Имя продукта',
                        'attribute' => 'name',
                    ],
                    [
                        'label' => 'Цена',
                        'attribute' => 'price',
                        'value' => function (Modification $model) {
                            return PriceHelper::format($model->price);
                        },
                    ],
                   // 'quantity',
                    [
                        'label' => 'Количество',
                        'attribute' => 'quantity',
                    ],
                    [
                        'class' => ActionColumn::class,
                        'controller' => 'shop/modification',
                        'template' => '{update} {delete}',
                    ],
                ],
            ]); ?>
        </div>
    </div>

    <div class="box">
        <div class="box-header with-border">SEO</div>
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $product,
                'attributes' => [
                    [
                        'attribute' => 'meta.title',
                        'value' => $product->meta->title,
                    ],
                    [
                        'attribute' => 'meta.description',
                        'value' => $product->meta->description,
                    ],
                    [
                        'attribute' => 'meta.keywords',
                        'value' => $product->meta->keywords,
                    ],
                ],
            ]) ?>
        </div>
    </div>

    <div class="box" id="photos">
        <div class="box-header with-border">Фото продукта</div>
        <div class="box-body">

            <div class="row">
                <?php foreach ($product->photos as $photo): ?>
                    <div class="col-md-2 col-xs-3" style="text-align: center">
                        <div class="btn-group">
                            <?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span>', ['move-photo-up', 'id' => $product->id, 'photo_id' => $photo->id], [
                                'class' => 'btn btn-default',
                                'data-method' => 'post',
                            ]); ?>
                            <?= Html::a('<span class="glyphicon glyphicon-remove"></span>', ['delete-photo', 'id' => $product->id, 'photo_id' => $photo->id], [
                                'class' => 'btn btn-default',
                                'data-method' => 'post',
                                'data-confirm' => 'Remove photo?',
                            ]); ?>
                            <?= Html::a('<span class="glyphicon glyphicon-arrow-right"></span>', ['move-photo-down', 'id' => $product->id, 'photo_id' => $photo->id], [
                                'class' => 'btn btn-default',
                                'data-method' => 'post',
                            ]); ?>
                        </div>
                        <div>
                            <?= Html::a(
                                Html::img($photo->getThumbFileUrl('file', 'thumb')),
                                $photo->getUploadedFileUrl('file'),
                                ['class' => 'thumbnail', 'target' => '_blank']
                            ) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php $form = ActiveForm::begin([
                'options' => ['enctype'=>'multipart/form-data'],
            ]); ?>

            <?= $form->field($photosForm, 'files[]')->label(false)->widget(FileInput::class, [
                'options' => [
                    'accept' => 'image/*',
                    'multiple' => true,
                ]
            ]) ?>

            <div class="form-group">
                <?= Html::submitButton('Загрузить', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
 <?php   /*


           <?php if ($product->isActive()): ?>
            <?= Html::a('Draft', ['draft', 'id' => $product->id], ['class' => 'btn btn-primary', 'data-method' => 'post']) ?>
        <?php else: ?>
            <?= Html::a('Activate', ['activate', 'id' => $product->id], ['class' => 'btn btn-success', 'data-method' => 'post']) ?>
        <?php endif; ?>

  */ ?>
    <!------ Вывод отзывов ------->
    <?php if ($reviews=$product->reviews):?>
        <h2 id="reviews">Отзывы к продукту</h2>
        <?php
        foreach ($reviews as $review ):
            $user = \shop\entities\User\User::findOne($review->user_id);
            if ($review->isActive()){
                ?>
                <div class="box box-success collapsed-box ">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?=date('G:h:m d/m/y',$review->created_at)." ".$user['username']."  ".\shop\helpers\StarHelper::drawStar($review->vote).  '  <span class="label label-success">Активен</span><br />';?></h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <pre><?=$review->text."<br />"?></pre>
                        <?= Html::a('Дезактивировать', ['draft-review', 'id' => $product->id,'review_id'=>$review->id], ['class' => 'btn btn-danger', 'data-method' => 'post']) ?>
                        <?= Html::a('', ['remove-review', 'id' => $product->id,'review_id'=>$review->id], ['class' => 'btn btn-box-tool', 'type'=>'button','data-method' => 'post','data-widget'=>'remove', 'data-toggle'=>'tooltip', 'title'=>'', 'data-original-title'=>'Remove']) ?>
                        <?= Html::a('Редактировать', ['update-review', 'id' => $product->id,'review_id'=>$review->id], ['class' => 'btn btn-danger', 'data-method' => 'post']) ?>
                    </div>
                    <!-- /.box-body -->
                </div>
            <?php }else{ ?>
                <div class="box box-danger collapsed-box ">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?=date('G:h:m d/m/y',$review->created_at)." ".$user['username']."  ".\shop\helpers\StarHelper::drawStar($review->vote).  '  <span class="label label-danger">Не активен</span><br />';?></h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <pre><?=$review->text."<br />"?></pre>
                        <?= Html::a('Активировать', ['activate-review', 'id' => $product->id,'review_id'=>$review->id], ['class' => 'btn btn-success', 'data-method' => 'post']) ?>
                        <?= Html::a('', ['remove-review', 'id' => $product->id,'review_id'=>$review->id], ['class' => 'btn btn-box-tool', 'type'=>'button','data-method' => 'post','data-widget'=>'remove', 'data-toggle'=>'tooltip', 'title'=>'', 'data-original-title'=>'Remove']) ?>
                    </div>
                    <!-- /.box-body -->
                </div>

            <?php      }

        endforeach;
        ?>
    <?php endif;?>
   <!--------------Модальное окно----------------------->
    <div class="modal modal-warning fade" id="modal-warning" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Warning Modal</h4>
                </div>
                <div class="modal-body">
                    <p>One fine body…</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--------------Модальное окно конец----------------------->
</div>
