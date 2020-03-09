<?php
namespace shop\helpers;


use yii\data\DataProviderInterface;

class ProductStingHelper
{

    public static function cropName(string $str, $maxLength):string
    {
        return mb_strimwidth($str, 0, $maxLength, "...");
    }

    public static function productFields(DataProviderInterface $dataProvider):string //Показы с по из
    {
       $current_page = \Yii::$app->request->get('page')? \Yii::$app->request->get('page'): 1;
       $start_line = ($current_page-1)*$dataProvider->getCount()+1;
       $end_line = $start_line+$dataProvider->getCount()-1;
       if ($dataProvider->getPagination()->getLimit() > $dataProvider->getCount() ) {
           $start_line = $dataProvider->getTotalCount() - $dataProvider->getCount() + 1;
           $end_line = $dataProvider->getTotalCount();
       }
        return 'Показаны '.$start_line.'-'.$end_line.' из '.$dataProvider->getTotalCount();


    }
}