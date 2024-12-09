<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_Table_Emprestimo_Add_Modalidade extends CI_Migration {

        public function up()
        {
                $fields = array( 
                        'Modalidade' => array(
                                'type' => 'INT', 
                                'constraint' => '1', 
                                'null' => FALSE,
                                'default' => 3, 
                                'comments' => '1 - DIARIA, 2 - SEMANAL, 3 - MENSAL [DEFAULT]'),
                );
                $this->dbforge->add_column('emprestimo', $fields);
        }

        public function down()
        {
                $this->dbforge->drop_column('emprestimo', 'Modalidade');
        }
}