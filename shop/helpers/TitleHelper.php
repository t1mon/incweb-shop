<?php
namespace shop\helpers;


use shop\entities\Shop\Category;
use yii\web\NotFoundHttpException;

class TitleHelper

{
    public static function getTitle( array $array):string
    {
        return is_string(end($array)) ? end($array) : '';
    }

    public static function getTitleProductCategory(array $array):string
    {
        $categoryName = is_string(end($array)) ? end($array) : null;
        if (!$categoryName)
            throw new NotFoundHttpException('Category Name is NULL .');
        $category = Category::find()->where(['name'=>$categoryName])->one();
        return $category->title?:$category->name;


    }

}