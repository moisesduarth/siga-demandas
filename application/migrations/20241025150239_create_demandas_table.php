<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Demandas_Table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'titulo' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE,
            ],
            'descricao' => [
                'type' => 'TEXT',
                'null' => FALSE,
            ],
            'status' => [
                'type' => 'ENUM("aberto","encerrado_sucesso","encerrado_sem_sucesso","pendencia_externa")',
                'default' => 'aberto',
                'null' => FALSE,
            ],
            'categoria' => [
                'type' => 'ENUM("servico","produto")',
                'null' => FALSE,
            ],
            'prazo' => [
                'type' => 'DATE',
                'null' => TRUE,
            ],
            'data_inclusao' => [
                'type' => 'DATETIME',
                'null' => FALSE,
            ],
            'data_solucao' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ],
            'observacao' => [
                'type' => 'TEXT',
                'null' => TRUE,
            ],
            'membro_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => FALSE,
            ],
            'aprovador_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
            ],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (membro_id) REFERENCES membros(id) ON DELETE CASCADE');
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (aprovador_id) REFERENCES membros(id) ON DELETE SET NULL');
        $this->dbforge->create_table('demandas');
    }

    public function down()
    {
        $this->dbforge->drop_table('demandas');
    }
}

