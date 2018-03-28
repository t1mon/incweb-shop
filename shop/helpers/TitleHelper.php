<?php
namespace shop\helpers;


use shop\entities\Shop\Tag;
use shop\entities\Shop\Brand;
use shop\entities\Shop\Category;
use yii\web\NotFoundHttpException;

class TitleHelper

{
    public static function getTitle( array $array):string
    {
        return is_string(end($array)) ? end($array) : '';
    }

    public static function getTitleProductCategory(array $array)
    {
        if (\Yii::$app->controller->action->id == 'index' || \Yii::$app->controller->action->id == 'product')
            return is_string(end($array)) ? end($array) : '';
        if (\Yii::$app->controller->action->id == 'category')
        {
            $categoryName = is_string(end($array)) ? end($array) : null;
            if (!$categoryName)
                throw new NotFoundHttpException('Category Name is NULL .');
            $category = Category::find()->where(['name'=>$categoryName])->one();
            return $category?$category->title:$category->name;
        }
        if (\Yii::$app->controller->action->id == 'brand')
        {
            $brandName = is_string(end($array)) ? end($array) : null;
            if (!$brandName)
                throw new NotFoundHttpException('Brand Name is NULL .');
            $brand = Brand::find()->where(['name'=>$brandName])->one();
            return $brand->meta->title;
        }

        if (\Yii::$app->controller->action->id == 'tag')
        {
            $tagName = is_string(end($array)) ? end($array) : null;
            if (!$tagName)
                throw new NotFoundHttpException('Tag Name is NULL .');
            $tag = Tag::find()->where(['name'=>$tagName])->one();
            return $tag->name;
        }



        //return '';


    }

}