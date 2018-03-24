<?php

namespace frontend\widgets\Blog;

use shop\entities\Blog\Category;
use shop\readModels\Blog\CategoryReadRepository;
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
        return Html::tag('ul', implode(PHP_EOL, array_map(function (Category $category) {
            $active = $this->active && ($this->active->id == $category->id);
            return Html::beginTag('li',['class'=>'']).Html::a(
                    strtoupper(Html::encode($category->name)),
                ['/blog/post/category', 'slug' => $category->slug],
                ['class' => $active ? 'active' : '']
            );
        }, $this->categories->getAll())), [
            'class' => 'cate',
        ]);
    }
}