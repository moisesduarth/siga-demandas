<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_Table_Pagamento_Add_Lucro_Retorno extends CI_Migration {

        public function up()
        {
						
                $fields = array( 
                        'Valor_Lucro_Pagamento' => array('type' => 'DECIMAL', 'constraint' => '10,2', 'null' => FALSE),
                        'Valor_Retorno_Pagamento' => array('type' => 'DECIMAL', 'constraint' => '10,2', 'null' => FALSE),
                );
                $this->dbforge->add_column('pagamento', $fields);
        }

        public function down()
        {
                $this->dbforge->drop_column('pagamento', 'Valor_Lucro_Pagamento');
                $this->dbforge->drop_column('pagamento', 'Valor_Retorno_Pagamento');
        }
}