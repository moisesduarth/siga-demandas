<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_Table_Instituicoes_Add_Area extends CI_Migration
{
    public function up()
    {
        // Verifica se a coluna já existe para evitar duplicação
        if (!$this->db->field_exists('area_id', 'instituicoes')) {
            $this->dbforge->add_column('instituicoes', [
                'area_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'null' => TRUE
                ]
            ]);

            // Define foreign key constraint
            $this->db->query('ALTER TABLE `instituicoes` ADD CONSTRAINT `fk_instituicoes_areas` FOREIGN KEY (`area_id`) REFERENCES `areas`(`id`) ON DELETE SET NULL ON UPDATE CASCADE;');
        }
    }

    public function down()
    {
        $this->dbforge->drop_column('instituicoes', 'area_id');
    }
}
