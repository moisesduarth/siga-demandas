<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_Table_Users_Add_Cidade_Uf extends CI_Migration {

        public function up()
        {
						
                $fields = array( 
                    'cidade' => array('type' => 'VARCHAR','constraint' => '20','null' => FALSE),
                    'uf' => array('type' => 'VARCHAR','constraint' => '2','null' => FALSE),
                );
                $this->dbforge->add_column('users', $fields);
        }

        public function down()
        {
            $this->dbforge->drop_column('users', 'cidade');
            $this->dbforge->drop_column('users', 'uf');
        }
}