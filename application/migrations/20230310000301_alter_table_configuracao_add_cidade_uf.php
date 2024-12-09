<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_Table_Configuracao_Add_Cidade_Uf extends CI_Migration {

        public function up()
        {
						
                $fields = array( 
                    'Cidade' => array('type' => 'VARCHAR', 'constraint' => '30', 'null' => TRUE),
                    'UF' => array('type' => 'VARCHAR', 'constraint' => '2', 'null' => TRUE)
                );
                $this->dbforge->add_column('configuracao', $fields);
        }

        public function down()
        {
            $this->dbforge->drop_column('configuracao', 'Cidade');
            $this->dbforge->drop_column('configuracao', 'UF');
        }
}