<?php

use yii\db\Schema;

class m160810_220101_unit extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('t_unit', [
            'unit_id' => $this->primaryKey(),
            'unit_name' => $this->string(),
            'unit_code' => $this->string(),
            'unit_status' => $this->integer(),
            'unit_parent' => $this->integer()->defaultValue('0'),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('t_unit');
    }
}
