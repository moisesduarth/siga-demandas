<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_Table_Lancamento_Timestamp extends CI_Migration {

        public function up()
        {
            $this->db->query('ALTER TABLE lancamento CHANGE `Data_Lancamento` `Data_Lancamento` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP');
                
        }

        public function down()
        {
            $this->db->query('ALTER TABLE lancamento CHANGE `Data_Lancamento` `Data_Lancamento` DATETIME NULL');
        }
}