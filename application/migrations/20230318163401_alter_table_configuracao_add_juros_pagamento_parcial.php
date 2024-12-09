<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_Table_Configuracao_Add_Juros_Pagamento_Parcial extends CI_Migration {

        public function up()
        {
						
                $fields = array( 
                    'Incluir_Juros_Pagamento_Parcial' => array(
                        'type' => 'INT', 
                        'constraint' => '1', 
                        'null' => FALSE, 
                        'default' => 0
                    )
                );
                $this->dbforge->add_column('configuracao', $fields);
        }

        public function down()
        {
            $this->dbforge->drop_column('configuracao', 'Incluir_Juros_Pagamento_Parcial');
        }
}