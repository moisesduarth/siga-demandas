<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_Table_Emprestimo_Add_Total_Parcelas extends CI_Migration {

        public function up()
        {
                $fields = array( 
                        'ID_Emprestimo_Pai' => array('type' => 'INT', 'constraint' => '11', 'null' => TRUE),
                        'Parcela_Atual' => array('type' => 'INT', 'constraint' => '11', 'null' => FALSE, 'default' => '1'),
                        'Total_Emprestimo_Original' => array('type' => 'DECIMAL', 'constraint' => '10,2', 'null' => FALSE),
                );
                $this->dbforge->add_column('emprestimo', $fields);
        }

        public function down()
        {
                $this->dbforge->drop_column('emprestimo', 'ID_Emprestimo_Pai');
                $this->dbforge->drop_column('emprestimo', 'Parcela_Atual');
                $this->dbforge->drop_column('emprestimo', 'Total_Emprestimo_Original');
        }
}