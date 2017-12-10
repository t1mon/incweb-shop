<?php

use yii\db\Migration;

/**
 * Class m171210_201304_fix_foregin_key_shop_orders
 */
class m171210_201304_fix_foregin_key_shop_orders extends Migration
{
    public function up()
    {
        $this->dropForeignKey('{{%fk-shop_orders-delivery_method_id}}', '{{%shop_orders}}');
        $this->addForeignKey('{{%fk-shop_orders-delivery_method_id}}', '{{%shop_orders}}', 'delivery_method_id', '{{%shop_delivery_methods}}', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('{{%fk-shop_orders-delivery_method_id}}', '{{%shop_orders}}');
        $this->addForeignKey('{{%fk-shop_orders-delivery_method_id}}', '{{%shop_orders}}', 'delivery_method_id', '{{%shop_delivery_methods}}', 'id', 'CASCADE');
    }
}
