<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_Table_Configuracao_Add_Telefone_Celular extends CI_Migration {

        public function up()
        {
						
                $fields = array( 
                    'Telefone' => array('type' => 'VARCHAR', 'constraint' => '30', 'null' => TRUE),
                    'Celular' => array('type' => 'VARCHAR', 'constraint' => '30', 'null' => TRUE)
                );
                $this->dbforge->add_column('configuracao', $fields);
        }

        public function down()
        {
            $this->dbforge->drop_column('configuracao', 'Telefone');
            $this->dbforge->drop_column('configuracao', 'Celular');
        }
}