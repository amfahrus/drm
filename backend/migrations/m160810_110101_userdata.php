<?php

use yii\db\Schema;

class m160810_110101_userdata extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('t_userdata_internal', [
            'ui_id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'fullname' => $this->string(64),
            'nik' => $this->string(64),
            'FOREIGN KEY ([[user_id]]) REFERENCES user ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('t_userdata_internal');
    }
}
