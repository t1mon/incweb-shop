<?php
use \yii\widgets\ActiveForm;
use \yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $review_form shop\forms\manage\Shop\Product\ReviewEditForm */
/* @var $product shop\entities\Shop\Product\Product */
/* @var $review_id*/
$this->title = 'Редактирование отзыва для продукта: '.$product->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $product->name, 'url' => ['view','id'=>$product->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if ($review->isActive())
        echo Html::a('Дезактивировать', ['draft-review', 'id' => $product->id,'review_id'=>$review_id], ['class' => 'btn btn-danger', 'data-method' => 'post']);
    else
        echo Html::a('Активировать', ['activate-review', 'id' => $product->id,'review_id'=>$review_id], ['class' => 'btn btn-success', 'data-method' => 'post']);

?>
<?= Html::a('Удалить', ['delete-review', 'id' => $product->id,'review_id'=>$review_id], ['class' => 'btn btn-danger', 'data-method' => 'post']) ?>

<?php $form = ActiveForm::begin(); ?>

    <div class="box box-default">
        <div class="box-header with-border">Common</div>
        <div class="box-body">
            <?= $form->field($review_form, 'vote')->dropDownList($review_form->votesList(), ['prompt' => '--- Выбор ---']) ?>
            <?= $form->field($review_form, 'text')->textInput(['maxlength' => true]) ?>

        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>