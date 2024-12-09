<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_Table_Investidor_Add_Rg_Cpf extends CI_Migration {

        public function up()
        {
						
                $fields = array( 
                        'RG' => array('type' => 'CHAR', 'constraint' => '20', 'null' => FALSE),
                        'CPF' => array('type' => 'CHAR', 'constraint' => '20', 'null' => FALSE),
                );
                $this->dbforge->add_column('investidor', $fields);
        }

        public function down()
        {
                $this->dbforge->drop_column('investidor', 'RG');
                $this->dbforge->drop_column('investidor', 'CPF');
        }
}