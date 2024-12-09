<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Table_Instituicoes extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'codigo' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'descricao' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'lider' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'tesoureiro' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
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
        $this->dbforge->create_table('instituicoes');  // Nome correto da tabela
    }

    public function down()
    {
        $this->dbforge->drop_table('instituicoes');  // Nome correto da tabela
    }

}
