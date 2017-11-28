<?php

use yii\db\Migration;


class m171128_174709_add_column_surname_users_table extends Migration
{

    public function Up()
    {
        $this->addColumn('{{%users}}', 'surname', $this->string());
        $this->addColumn('{{%users}}', 'name', $this->string());
    }


    public function Down()
    {
        $this->dropColumn('{{%users}}', 'surname');
        $this->dropColumn('{{%users}}', 'name');
    }
}
