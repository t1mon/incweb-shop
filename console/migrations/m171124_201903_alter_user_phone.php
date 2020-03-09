<?php

use yii\db\Migration;

/**
 * Class m171124_201903_alter_user_phone
 */
class m171124_201903_alter_user_phone extends Migration
{
    public function safeUp()
    {
        $this->alterColumn('{{%users}}', 'phone', $this->string()->null());

    }

    public function down()
    {

        $this->alterColumn('{{%users}}', 'phone', $this->string()->notNull());
    }
}
