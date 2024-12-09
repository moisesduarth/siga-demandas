<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_Table_Users_Change_Cidade_To_City extends CI_Migration {

        public function up()
        {
                $fields = [
                        'cidade' => array('name' => 'city', 'type' => 'VARCHAR','constraint' => '20','null' => FALSE),
                ];
                $this->dbforge->modify_column('users', $fields);
        }

        public function down()
        {
                $fields = [
                        'city' => array('name' => 'cidade', 'type' => 'VARCHAR','constraint' => '20','null' => FALSE),
                ];
                $this->dbforge->modify_column('users', $fields);
        }
}