<?php

namespace shop\entities\Shop\Product\events;


use shop\entities\Shop\Product\Product;

class ProductDraft
{
    public $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

}