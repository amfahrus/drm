<?php

use yii\db\Schema;

class m160810_220101_userunit extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('t_user_unit', [
            'uu_id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'unit_id' => $this->integer()->notNull(),
            'FOREIGN KEY ([[unit_id]]) REFERENCES t_unit ([[unit_id]]) ON DELETE CASCADE ON UPDATE CASCADE',
            'FOREIGN KEY ([[user_id]]) REFERENCES user ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('t_user_unit');
    }
}
