<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_Table_Investidor_Add_Novos_Campos extends CI_Migration {

        public function up()
        {
						
                $fields = array( 
                    'Profissao' => array('type' => 'VARCHAR', 'constraint' => '30', 'null' => TRUE),
                    'Local_Trabalho' => array('type' => 'VARCHAR', 'constraint' => '30', 'null' => TRUE),
                    'Tempo_Servico' => array('type' => 'VARCHAR', 'constraint' => '20', 'null' => TRUE),
                    'Salario_Atual' => array('type' => 'DECIMAL', 'constraint' => '10,2', 'null' => FALSE, 'default' => 0),
                    'Data_Admissao' => array('type' => 'DATETIME'),
                    'Limite_Credito' => array('type' => 'DECIMAL', 'constraint' => '10,2', 'null' => FALSE, 'default' => 0),
                    'Data_Serasa' => array('type' => 'DATETIME'),
                    'Pendencia_Bancaria' => array('type' => 'INT', 'constraint' => '1', 'null' => FALSE),
                    'Pendencia_Banco' => array('type' => 'VARCHAR', 'constraint' => '20', 'null' => TRUE),
                    'Pendencia_Valor' => array('type' => 'DECIMAL', 'constraint' => '10,2', 'null' => FALSE, 'default' => 0),
                    'Cidade' => array('type' => 'VARCHAR', 'constraint' => '20', 'null' => TRUE),
                    'UF' => array('type' => 'VARCHAR', 'constraint' => '2', 'null' => TRUE),
                    'Bloqueio_Serasa' => array('type' => 'INT', 'constraint' => '1', 'null' => FALSE, 'default' => 0),
                );
                $this->dbforge->add_column('investidor', $fields);
        }

        public function down()
        {
            $this->dbforge->drop_column('investidor', 'Profissao');
            $this->dbforge->drop_column('investidor', 'Local_Trabalho');
            $this->dbforge->drop_column('investidor', 'Tempo_Servico');
            $this->dbforge->drop_column('investidor', 'Salario_Atual');
            $this->dbforge->drop_column('investidor', 'Data_Admissao');
            $this->dbforge->drop_column('investidor', 'Limite_Credito');
            $this->dbforge->drop_column('investidor', 'Data_Serasa');
            $this->dbforge->drop_column('investidor', 'Pendencia_Bancaria');
            $this->dbforge->drop_column('investidor', 'Pendencia_Banco');
            $this->dbforge->drop_column('investidor', 'Pendencia_Valor');
            $this->dbforge->drop_column('investidor', 'Cidade');
            $this->dbforge->drop_column('investidor', 'UF');
            $this->dbforge->drop_column('investidor', 'Bloqueio_Serasa');
        }
}