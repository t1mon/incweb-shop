<?php

namespace shop\forms\manage\Shop\Order;

use shop\entities\Shop\Order\Order;
use shop\forms\CompositeForm;
use shop\helpers\OrderHelper;

/**
 * @property DeliveryForm $delivery
 * @property CustomerForm $customer
 */
class OrderEditForm extends CompositeForm
{
    public $note;
    public $current_status;

    public function __construct(Order $order, array $config = [])
    {
        $this->note = $order->note;
        $this->current_status = $order->current_status;
        $this->delivery = new DeliveryForm($order);
        $this->customer = new CustomerForm($order);
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['note'], 'string'],
            [['current_status'], 'integer'],
        ];
    }

    protected function internalForms(): array
    {
        return ['delivery', 'customer'];
    }
}