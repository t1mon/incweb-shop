<?php

use yii\db\Migration;

/**
 * Class m171119_163146_alter_shop_orders
 */
class m171119_163146_alter_shop_orders extends Migration
{

    public function safeUp()
    {
        $this->alterColumn('{{%shop_orders}}', 'user_id', $this->integer()->null());

    }

    public function down()
    {

        $this->alterColumn('{{%shop_orders}}', 'user_id', $this->integer()->notNull());
    }
}
