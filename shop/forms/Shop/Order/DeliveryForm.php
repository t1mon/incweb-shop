<?php

namespace shop\forms\Shop\Order;

use shop\entities\Shop\DeliveryMethod;
use shop\helpers\PriceHelper;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\validators\RequiredValidator;

class DeliveryForm extends Model
{
    public $method;
    public $index;
    public $address;

    private $_weight;

    public function __construct(int $weight, array $config = [])
    {
        $this->_weight = $weight;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['method'], 'integer'],
            [['method'], 'required'],
            [['address'], 'required','when' => function($model) {
                if ($model->method != 2) return true; }, 'whenClient' => 'function (attribute, value) {
    if ($("#deliveryform-method").val() != 2) return true;
}'

                ],
            [['index'], 'string', 'max' => 255],
            [['address'], 'string'],
        ];
    }

    public function deliveryMethodsList(): array
    {
        $methods = DeliveryMethod::find()->availableForWeight($this->_weight)->orderBy('sort')->all();

        return ArrayHelper::map($methods, 'id', function (DeliveryMethod $method) {
            return $method->name /*. ' (' . PriceHelper::format($method->cost) . ')'*/;
        });
    }

    public function attributeLabels()
    {
        return [
            'method' => 'Способ доставки',
            'address' => 'Адрес доставки',
        ];
    }
}