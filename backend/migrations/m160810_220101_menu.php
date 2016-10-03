<?php

use yii\db\Schema;

class m160810_220101_menu extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('menu', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128)->notNull(),
            'parent' => $this->integer(),
            'route' => $this->string(255),
            'order' => $this->integer(),
            'data' => $this->binary(),
            'icon' => $this->string(128),
            'FOREIGN KEY ([[parent]]) REFERENCES menu ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('menu');
    }
}
