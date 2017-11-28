<?php

use yii\db\Migration;

/**
 * Class m171128_193700_add_column_users_token_vk
 */
class m171128_193700_add_column_users_token_vk extends Migration
{

    public function Up()
    {
        $this->addColumn('{{%users}}', 'token_vk', $this->string());
    }


    public function Down()
    {
        $this->dropColumn('{{%users}}', 'token_vk');

    }
}
