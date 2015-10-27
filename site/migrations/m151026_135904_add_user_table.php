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
        ],
        [
            'username' => 'serviceman',
            'password' => '1234',
        ],
        [
            'username' => 'user',
            'password' => '1234',
        ]
    ];

    public function up()
    {
        $this->createTable('user', [
                'id' => 'pk',
                'username' => 'string unique',
                'password' => 'string',
                'auth_key' => 'string unique'

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
