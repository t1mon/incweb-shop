<?php

use yii\db\Migration;

/**
 * Class m180404_202751_add_slug_posts
 */
class m180404_202751_add_slug_posts extends Migration
{
    public function Up()
    {
        $this->addColumn('{{%blog_posts}}', 'slug', $this->string()->notNull());
        $this->createIndex('{{%idx-blog_posts_slug}}', '{{%blog_posts}}', 'slug', true);

    }

    public function Down()
    {
        $this->dropColumn('{{%blog_posts}}', 'slug');

    }
}
