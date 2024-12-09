<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_Table_Lancamento_Add_Forma_Pagamento extends CI_Migration {

        public function up()
        {	
                $fields = array( 
                    'ID_Forma_Pagamento' => array('type' => 'INT','constraint' => '11','null' => FALSE, 'default' => '1'),
                );
                $this->dbforge->add_column('lancamento', $fields);

                $fields = array( 
                    'ID_Forma_Pagamento' => array('type' => 'INT','constraint' => '11','null' => FALSE, 'default' => '1'),
                );
                $this->dbforge->add_column('pagamento', $fields);
        }

        public function down()
        {
            $this->dbforge->drop_column('lancamento', 'ID_Forma_Pagamento');
            $this->dbforge->drop_column('pagamento', 'ID_Forma_Pagamento');
        }
}