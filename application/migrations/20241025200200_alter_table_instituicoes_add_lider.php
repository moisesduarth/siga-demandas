<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_Table_Instituicoes_Add_Lider extends CI_Migration
{
    public function up()
    {
        // Drop lider column
        $this->dbforge->drop_column('instituicoes', 'lider');

        $this->dbforge->add_column('instituicoes', [
            'lider_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE
            ]
        ]);

        // Define foreign key constraints
        $this->db->query('ALTER TABLE `instituicoes` ADD CONSTRAINT `fk_instituicoes_membros` FOREIGN KEY (`lider_id`) REFERENCES `membros`(`id`) ON DELETE SET NULL ON UPDATE CASCADE;');
    }

    public function down()
    {
        $this->dbforge->drop_column('instituicoes', 'lider_id');

        $this->dbforge->add_column('instituicoes', [
            'lider' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ]
        ]);
    }
}
