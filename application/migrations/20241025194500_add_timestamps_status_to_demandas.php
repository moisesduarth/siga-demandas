<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_Timestamps_Status_To_Demandas extends CI_Migration
{
    public function up()
    {
        $fields = [
            'created_at' => [
                'type' => 'DATETIME',
                'null' => TRUE,
                'default' => NULL
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => TRUE,
                'default' => NULL
            ],
        ];

        $this->dbforge->add_column('demandas', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_column('demandas', 'created_at');
        $this->dbforge->drop_column('demandas', 'updated_at');
    }
}
