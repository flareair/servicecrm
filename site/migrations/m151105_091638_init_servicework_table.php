<?php

use yii\db\Schema;
use yii\db\Migration;

class m151105_091638_init_servicework_table extends Migration
{
    public function up()
    {

        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('servicework_status', [
                'id' => 'pk',
                'name' => $this->string(),
                'color' => $this->string(),
                'comment' => $this->text(),
            ],
            $tableOptions
        );

        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('servicework', [
                'id' => 'pk',
                'name' => $this->string(),
                'description' => $this->text(),
                'year' => $this->integer(),
                'started' => $this->dateTime(),
                'status_changed' => $this->dateTime(),
                'ended' => $this->dateTime(),
                'comment' => $this->text(),
                'attached_to' => $this->integer(),
                'car_id' => $this->integer(),
                'status_id' => $this->integer(),
                'FOREIGN KEY (attached_to) REFERENCES user(id)',
                'FOREIGN KEY (car_id) REFERENCES car(id) ON DELETE CASCADE ON UPDATE CASCADE',
                'FOREIGN KEY (status_id) REFERENCES servicework_status(id)',

            ],
            $tableOptions
        );
    }

    public function down()
    {
        return $this->dropTable('servicework') && $this->dropTable('servicework_status');
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
