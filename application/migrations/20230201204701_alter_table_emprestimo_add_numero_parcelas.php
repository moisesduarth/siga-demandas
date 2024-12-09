<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_Table_Emprestimo_Add_Numero_Parcelas extends CI_Migration {

        public function up()
        {
                $fields = array( 
                        'Numero_Parcelas' => array('type' => 'INT', 'constraint' => '11', 'null' => FALSE, 'default' => '1'),
                );
                $this->dbforge->add_column('emprestimo', $fields);
        }

        public function down()
        {
                $this->dbforge->drop_column('emprestimo', 'Numero_Parcelas');
        }
}