<?php

use yii\db\Schema;
use yii\db\Migration;
use app\models\user\User;

class m151026_135904_add_user_table extends Migration
{
    private $users = [
        [
            'username' => 'admin',
            'password' => '1234',
            'firstname' => 'Administrator',
            'email' => 'admin@admin.ru'
        ],
        [
            'username' => 'serviceman',
            'password' => '1234',
            'firstname' => 'Vasily',
            'lastname' => 'Fedorov',
            'company_name' => 'OOO STO-GAZ',
            'email' => 'vasily@fedorov.ru'
        ],
        [
            'username' => 'user',
            'password' => '1234',
            'firstname' => 'Ivan',
            'lastname' => 'Petrov',
            'company_name' => 'IP Petrov',
            'email' => 'ivan@petrov.com'
        ]
    ];

    public function up()
    {
        $this->createTable('user', [
                'id' => 'pk',
                'username' => $this->string(30)->unique(),
                'password' => $this->string(),
                'auth_key' => $this->string()->unique(),
                'firstname' => $this->string(),
                'middlename' => $this->string(),
                'lastname' => $this->string(),
                'company_name' => $this->string(),
                'email' => $this->string()->unique(),
                'phone' => $this->string()->unique(),
                'address' => $this->text(),
                'about' => $this->text(),

            ],
            'ENGINE=InnoDB'
        );

        foreach ($this->users as $userData) {
            $user = new User();
            $user->attributes = $userData;
            $user->save();
        }
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
