<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Members_Table extends CI_Migration {

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
            'rg' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => TRUE,
            ],
            'cpf' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => TRUE,
            ],
            'endereco' => [
                'type' => 'TEXT',
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
        $this->dbforge->create_table('membros');
    }

    public function down()
    {
        $this->dbforge->drop_table('membros');
    }
}

