<?php

use yii\db\Schema;
use yii\db\Migration;

class m151026_135904_add_user_table extends Migration
{
    public function up()
    {
        $this->createTable('user', [
                'id' => 'pk',
                'login' => 'string unique',
                'password' => 'string',
                'auth_key' => 'string unique'

            ],
            'ENGINE=InnoDB'
        );
    }

    public function down()
    {
        return $this->dropTable('user');
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
