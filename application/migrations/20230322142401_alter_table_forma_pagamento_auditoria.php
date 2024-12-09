<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_Table_Forma_Pagamento_Auditoria extends CI_Migration {

        public function up()
        {	
                $fields = array( 
                    'ID_User_Create' => array('type' => 'INT', 'constraint' => '11', 'null' => TRUE),
                    'Date_Created' => array('type' => 'DATETIME', 'null' => TRUE),
                    'ID_User_Update' => array('type' => 'INT', 'constraint' => '11', 'null' => TRUE),
                    'Date_Updated' => array('type' => 'DATETIME', 'null' => TRUE),
                    'Deleted' => array('type' => 'INT', 'constraint' => '1', 'default' => '0'),
                );
                $this->dbforge->add_column('forma_pagamento', $fields);

        }

        public function down()
        {
            $this->dbforge->drop_column('forma_pagamento', 'ID_User_Create');
            $this->dbforge->drop_column('forma_pagamento', 'Date_Created');
            $this->dbforge->drop_column('forma_pagamento', 'ID_User_Update');
            $this->dbforge->drop_column('forma_pagamento', 'Date_Updated');
            $this->dbforge->drop_column('forma_pagamento', 'Deleted');
        }
}