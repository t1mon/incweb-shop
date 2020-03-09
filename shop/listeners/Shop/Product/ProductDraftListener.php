<?php

namespace shop\listeners\Shop\Product;


use shop\entities\Shop\Product\events\ProductDraft;
use yii\db\Connection;

class ProductDraftListener
{

    public function handle(ProductDraft $event): void
    {
        if ($event->product->isDraft()) {
            \Yii::$app->db->createCommand()->delete('{{%shop_cart_items}}', [
                'product_id' => $event->product->id,
            ])->execute();

        }
    }

}