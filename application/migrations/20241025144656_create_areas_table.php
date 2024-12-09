<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Areas_Table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE,
            ],
            'lider_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ]
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('lider_id');
        $this->dbforge->create_table('areas');
    }

    public function down()
    {
        $this->dbforge->drop_table('areas');
    }
}

