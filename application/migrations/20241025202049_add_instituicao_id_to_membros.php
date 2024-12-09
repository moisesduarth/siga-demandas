<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Instituicao_Id_To_Membros extends CI_Migration {

    public function up()
    {
        // Adiciona a coluna instituicao_id
        $this->dbforge->add_column('membros', [
            'instituicao_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
            ]
        ]);

        // Adiciona a chave estrangeira para a tabela instituicoes
        $this->db->query('ALTER TABLE `membros` ADD CONSTRAINT `fk_membros_instituicoes` FOREIGN KEY (`instituicao_id`) REFERENCES `instituicoes`(`id`) ON DELETE SET NULL ON UPDATE CASCADE;');
    }

    public function down()
    {
        // Remove a coluna instituicao_id
        $this->dbforge->drop_column('membros', 'instituicao_id');
    }
}
