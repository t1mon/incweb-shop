<?php

namespace shop\helpers;

use shop\entities\Shop\Order\Status;
use shop\entities\Shop\Product\Product;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class OrderHelper
{
    public static function statusList(): array
    {
        return [
            Status::NEW => 'Новый',
            Status::PAID => 'Оплачен',
            Status::SENT => 'Доставляется',
            Status::COMPLETED => 'Завершен',
            Status::CANCELLED => 'Отменен',
            Status::CANCELLED_BY_CUSTOMER => 'Отменен клиентом',
        ];
    }

    public static function statusName($status): string
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function statusLabel($status): string
    {
        switch ($status) {
            case Status::NEW:
                $class = 'label label-success';
                break;
            case Status::PAID:
                $class = 'label label-warning';
                break;
            case Status::SENT:
                $class = 'label label-warning';
                break;
            case Status::COMPLETED:
                $class = 'label label-info';
                break;
            case Status::CANCELLED:
                $class = 'label label-danger';
                break;
            case Status::CANCELLED_BY_CUSTOMER:
                $class = 'label label-danger';
                break;
            default:
                $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::statusList(), $status), [
            'class' => $class,
        ]);
    }
}