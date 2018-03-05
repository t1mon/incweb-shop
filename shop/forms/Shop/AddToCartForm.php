<?php

namespace shop\forms\Shop;

use shop\entities\Shop\Product\Modification;
use shop\entities\Shop\Product\Product;
use shop\helpers\PriceHelper;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class AddToCartForm extends Model
{
    public $modification;
    public $quantity;

    private $_product;

    public function __construct(Product $product, $config = [])
    {
        $this->_product = $product;
        $this->quantity = 1;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return array_filter([
            $this->_product->modifications ? ['modification', 'required', 'whenClient' => "function (attribute, value) {
            if (value == ''){ 
                $.jGrowl(\"Необходимо выбрать модификацию продукта!\", { life:'7000', theme: 'jgrowl warning',position: 'top-right' });
                }
            return true;
    }"] : false,
            ['quantity', 'required'],
            ['quantity', 'integer', 'max' => $this->_product->quantity],
        ]);
    }

    public function modificationsList(): array
    {
        return ArrayHelper::map($this->_product->modifications, 'id', function (Modification $modification) {
            return  $modification->name . ' (Цена: ' . PriceHelper::format($modification->price ?: $this->_product->price_new) . 'руб.)';
        });
        //$modification->code . ' - ' .
    }

    public function modificationsListJava(): array
    {
        return ArrayHelper::map($this->_product->modifications, 'id', function (Modification $modification) {
            return PriceHelper::format($modification->price ?: $this->_product->price_new);
        });
    }
}