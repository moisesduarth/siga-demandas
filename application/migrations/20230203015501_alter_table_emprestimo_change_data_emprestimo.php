<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_Table_Emprestimo_Change_Data_Emprestimo extends CI_Migration {

        public function up()
        {
                $fields = [
                        'Data_Emprestimo' => ['type' => 'DATETIME'],
                        'Data_Pagamento' => ['type' => 'DATETIME']
                ];
                $this->dbforge->modify_column('emprestimo', $fields);
        }

        public function down()
        {
                $fields = [
                        'Data_Emprestimo' => ['type' => 'DATE'],
                        'Data_Pagamento' => ['type' => 'DATE']
                ];
                $this->dbforge->modify_column('emprestimo', $fields);
        }
}