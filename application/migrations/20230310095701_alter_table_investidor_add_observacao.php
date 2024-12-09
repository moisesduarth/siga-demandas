<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_Table_Investidor_Add_Observacao extends CI_Migration {

        public function up()
        {
						
                $fields = array( 
                    'Observacao' => array('type' => 'TEXT', 'null' => TRUE)
                );
                $this->dbforge->add_column('investidor', $fields);
        }

        public function down()
        {
            $this->dbforge->drop_column('investidor', 'Observacao');
        }
}