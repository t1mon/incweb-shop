<?php

use yii\db\Migration;

class m171016_175920_add_slug_products extends Migration
{
    public function Up()
    {
        $this->addColumn('{{%shop_products}}', 'slug', $this->string()->notNull());
        $this->createIndex('{{%idx-shop_products_slug}}', '{{%shop_products}}', 'slug', true);

    }

    public function Down()
    {
        $this->dropColumn('{{%shop_products}}', 'slug');

    }
}
