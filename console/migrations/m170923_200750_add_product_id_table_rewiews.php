<?php

use yii\db\Migration;

class m170923_200750_add_product_id_table_rewiews extends Migration
{
    public function up()
    {
        $this->addColumn('{{%shop_reviews}}', 'product_id', $this->integer()->notNull());
        $this->addForeignKey('{{%fk-shop_reviews_product_id}}', '{{%shop_reviews}}', 'product_id', '{{%shop_products}}', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropColumn('{{%shop_reviews}}', 'product_id');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
