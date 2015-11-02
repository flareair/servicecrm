<?php

use yii\db\Schema;
use yii\db\Migration;

class m151030_084542_init_cars_table extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('car', [
                'id' => 'pk',
                'manufacturer' => $this->string(),
                'model' => $this->string(),
                'year' => $this->integer(),
                'date_in' => $this->dateTime(),
                'date_out' => $this->dateTime(),
                'comment' => $this->text(),
                'owner' => $this->integer(),
                'FOREIGN KEY (owner) REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE',

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
