<?php

use yii\db\Schema;
use yii\db\Migration;
use app\models\user\User;

class m151026_135904_add_user_table extends Migration
{

    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('user', [
                'id' => 'pk',
                'username' => $this->string(30)->unique(),
                'password' => $this->string(),
                'auth_key' => $this->string()->unique(),
                'role' => $this->string(),
                'firstname' => $this->string(),
                'middlename' => $this->string(),
                'lastname' => $this->string(),
                'company_name' => $this->string(),
                'email' => $this->string()->unique(),
                'phone' => $this->string()->unique(),
                'address' => $this->text(),
                'about' => $this->text(),

            ],
            $tableOptions
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
