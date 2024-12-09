<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_Table_Emprestimo_Add_Valor_Restante_Corrigido extends CI_Migration {

        public function up()
        {
                $fields = array( 
                        'Valor_Restante_Corrigido' => array('type' => 'DECIMAL', 'constraint' => '10,2', 'null' => FALSE),
                );
                $this->dbforge->add_column('emprestimo', $fields);
        }

        public function down()
        {
                $this->dbforge->drop_column('emprestimo', 'Valor_Restante_Corrigido');
        }
}