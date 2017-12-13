<?php

namespace shop\forms\manage\Shop\Order;

use shop\entities\Shop\Order\Order;
use yii\base\Model;

class CustomerForm extends Model
{
    public $phone;
    public $name;

    public function __construct(Order $order, array $config = [])
    {
        $this->phone = $order->customerData->phone;
        $this->name = $order->customerData->name;
        parent::__construct($config);
    }

    public function beforeValidate()
    {
        $this->phone = mb_substr(preg_replace('/[^\d]/', '', $this->phone),1);
        //$this->phone = preg_replace('/[^\d]/', '', $this->phone);
        return parent::beforeValidate();
    }

    public function afterValidate()
    {
        $this->phone = preg_replace('/[^\d]/', '', $this->phone);
        //$this->phone = mb_substr(preg_replace('/[^\d]/', '', $this->phone),1);
        parent::afterValidate();
    }

    public function rules(): array
    {
        return [
            [['phone', 'name'], 'required'],
            [['phone', 'name'], 'string', 'max' => 255],
        ];
    }
}