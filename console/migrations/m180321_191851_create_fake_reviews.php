<?php

use yii\db\Migration;


class m180321_191851_create_fake_reviews extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%shop_fake_reviews}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->unsigned()->notNull(),
            'user_name' => $this->string()->notNull(),
            'vote' => $this->integer()->notNull(),
            'text' => $this->text()->notNull(),
            'active' => $this->boolean()->notNull(),
        ], $tableOptions);

        $this->createIndex('{{%idx-shop_reviews-product_id}}', '{{%shop_fake_reviews}}', 'product_id');

        $this->addForeignKey('{{%fk-shop_fake_reviews_product_id}}', '{{%shop_fake_reviews}}', 'product_id', '{{%shop_products}}', 'id', 'CASCADE','RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%shop_fake_reviews}}');
    }

}
