<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_loan_items_table extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'loan_id' => ['type' => 'INT'],
            'item_id' => ['type' => 'INT'],
            'asset_id' => ['type' => 'INT', 'null' => true],
            'quantidade' => ['type' => 'INT', 'default' => 0],
            'data_devolucao_prevista' => ['type' => 'DATETIME', 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['ativo', 'devolvido', 'doados', 'extraviado', 'quebrado', 'vendido'], 'default' => 'ativo'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->dbforge->add_key('id', true);
        $this->dbforge->add_key('loan_id');
        $this->dbforge->add_key('item_id');
        $this->dbforge->create_table('loan_items');

        $this->db->query('ALTER TABLE loan_items ADD CONSTRAINT FOREIGN KEY (loan_id) REFERENCES loans (id) ON DELETE CASCADE');
        $this->db->query('ALTER TABLE loan_items ADD CONSTRAINT FOREIGN KEY (item_id) REFERENCES items (id) ON DELETE CASCADE');
        $this->db->query('ALTER TABLE loan_items ADD CONSTRAINT FOREIGN KEY (asset_id) REFERENCES assets (id) ON DELETE CASCADE');
    }

    public function down()
    {
        $this->dbforge->drop_table('loan_items');
    }
}
