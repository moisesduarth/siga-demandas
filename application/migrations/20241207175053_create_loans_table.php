<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_loans_table extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'membro_id' => ['type' => 'INT', 'unsigned' => true],
            'user_id' => ['type' => 'mediumint', 'constraint' => 8, 'unsigned' => true],
            'data_emprestimo' => ['type' => 'DATETIME'],
            'status' => ['type' => 'ENUM', 'constraint' => ['ativo', 'finalizado', 'cancelado'], 'default' => 'ativo'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->dbforge->add_key('id', true);
        $this->dbforge->add_key('membro_id');
        $this->dbforge->create_table('loans');

        $this->db->query('ALTER TABLE loans ADD CONSTRAINT FOREIGN KEY (membro_id) REFERENCES membros (id) ON DELETE CASCADE');
    }

    public function down()
    {
        $this->dbforge->drop_table('loans');
    }
}
