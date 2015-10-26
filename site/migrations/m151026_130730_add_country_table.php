<?php

use yii\db\Schema;
use yii\db\Migration;

class m151026_130730_add_country_table extends Migration
{

    private $countries = [
        [
            'code' => 'AU',
            'name' => 'Australia',
            'population' => 18886000
        ],
        [
            'code' => 'BR',
            'name' => 'Brazil',
            'population' => 170115000
        ],
        [
            'code' => 'GB',
            'name' => 'United Kingdom',
            'population' => 59623400
        ]
    ];

    public function up()
    {
        $this->createTable('country', [
                'code' => 'VARCHAR(2) NOT NULL PRIMARY KEY',
                'name' => 'VARCHAR(30) NOT NULL',
                'population' => 'INT DEFAULT \'0\'',

            ],
            'ENGINE=InnoDB'
        );

        foreach ($this->countries as $country) {
            $this->insert('country', $country);
        }
    }

    public function down()
    {
        return $this->dropTable('country');
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
