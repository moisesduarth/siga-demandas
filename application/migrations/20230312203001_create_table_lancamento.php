<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Table_Lancamento extends CI_Migration {

        public function up()
        {
            $this->dbforge->add_field(array(
                'ID_Lancamento' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'ID_Cliente_Relacionado' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'null' => TRUE
                ),
                'ID_Emprestimo_Relacionado' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'null' => TRUE
                ),
                'Motivo_Lancamento' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '200',
                    'null' => TRUE
                ),
                'Valor_Lancamento' => array(
                    'type' => 'DECIMAL',
                    'constraint' => '10,2',
                    'null' => FALSE
                ),
                'ID_Conta_Descontada' => array(
                    'type' => 'INT',
                    'constraint' => '1',
                    'default' => 0,
                    'null' => FALSE
                ),
                'Data_Lancamento' => array(
                    'type' => 'DATETIME',
                    'constraint' => '3',
                    'null' => TRUE
                ),
                'Tipo_Lancamento' => array(
                    'type' => 'INT',
                    'constraint' => '1',
                    'null' => FALSE,
                    'comments' => '0 - Saida / 1 = Entrada'
                ),
            ));
            $this->dbforge->add_key('ID_Lancamento', TRUE);
            $this->dbforge->create_table('lancamento');
                
        }

        public function down()
        {
            $this->dbforge->drop_table('lancamento');
        }
}