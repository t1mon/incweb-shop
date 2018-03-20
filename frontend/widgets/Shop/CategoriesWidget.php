<?php

namespace frontend\widgets\Shop;

use shop\entities\Shop\Category;
use shop\readModels\Shop\CategoryReadRepository;
use shop\readModels\Shop\views\CategoryView;
use yii\base\Widget;
use yii\helpers\Html;

class CategoriesWidget extends Widget
{
    /** @var Category|null */
    public $active;

    private $categories;

    public function __construct(CategoryReadRepository $categories, $config = [])
    {
        parent::__construct($config);
        $this->categories = $categories;
    }

    public function run(): string
    {

                 return Html::tag('ul', implode(PHP_EOL, array_map(function (CategoryView $view) {
            $plus = $view->category->depth > 1 ? 'drop-menu' : null;
            $indent = ($view->category->depth > 1 ? str_repeat('&nbsp;&nbsp;&nbsp;', $view->category->depth - 1) . '- ' : '');
            $active = $this->active && ($this->active->id == $view->category->id || $this->active->isChildOf($view->category));
            return Html::beginTag('li',['class'=>'drop-menu']).Html::a(
                $indent . Html::encode($view->category->name) /*. ' <span>(' . $view->count . ')</span>'*/,
                ['/shop/catalog/category', 'id' => $view->category->id],
                ['class' => $active ? 'active' : '']
            ).Html::endTag('li');
        }, $this->categories->getTreeWithSubsOf($this->active))), [
            'class' => 'cate',
        ]);



    }
}