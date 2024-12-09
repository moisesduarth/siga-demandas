<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_Table_Emprestimo_Lancamento_Pagamento_Auditoria extends CI_Migration {

        public function up()
        {
            $fields = array( 
                'ID_Lancamento_Estornado' => array('type' => 'INT', 'constraint' => '11', 'null' => TRUE),
                'ID_User_Create' => array('type' => 'INT', 'constraint' => '11', 'null' => TRUE),
                'Date_Created' => array('type' => 'DATETIME', 'null' => TRUE),
                'ID_User_Update' => array('type' => 'INT', 'constraint' => '11', 'null' => TRUE),
                'Date_Updated' => array('type' => 'DATETIME', 'null' => TRUE),
            );
            $this->dbforge->add_column('lancamento', $fields);

            $fields = array( 
                'ID_User_Create' => array('type' => 'INT', 'constraint' => '11', 'null' => TRUE),
                'Date_Created' => array('type' => 'DATETIME', 'null' => TRUE),
                'ID_User_Update' => array('type' => 'INT', 'constraint' => '11', 'null' => TRUE),
                'Date_Updated' => array('type' => 'DATETIME', 'null' => TRUE),
            );
            $this->dbforge->add_column('emprestimo', $fields);

            $fields = array( 
                'ID_User_Create' => array('type' => 'INT', 'constraint' => '11', 'null' => TRUE),
                'Date_Created' => array('type' => 'DATETIME', 'null' => TRUE),
                'ID_User_Update' => array('type' => 'INT', 'constraint' => '11', 'null' => TRUE),
                'Date_Updated' => array('type' => 'DATETIME', 'null' => TRUE),
            );
            $this->dbforge->add_column('pagamento', $fields);

            $fields = array( 
                'ID_User_Create' => array('type' => 'INT', 'constraint' => '11', 'null' => TRUE),
                'Date_Created' => array('type' => 'DATETIME', 'null' => TRUE),
                'ID_User_Update' => array('type' => 'INT', 'constraint' => '11', 'null' => TRUE),
                'Date_Updated' => array('type' => 'DATETIME', 'null' => TRUE),
            );
            $this->dbforge->add_column('investidor', $fields);
                
        }

        public function down()
        {
            $this->dbforge->drop_column('lancamento', 'ID_User_Create');
            $this->dbforge->drop_column('lancamento', 'ID_User_Update');

            $this->dbforge->drop_column('pagamento', 'ID_User_Create');
            $this->dbforge->drop_column('pagamento', 'ID_User_Update');

            $this->dbforge->drop_column('emprestimo', 'ID_User_Create');
            $this->dbforge->drop_column('emprestimo', 'ID_User_Update');

            $this->dbforge->drop_column('investidor', 'ID_User_Create');
            $this->dbforge->drop_column('investidor', 'ID_User_Update');
        }
}