<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_assets_table extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'item_id' => ['type' => 'INT'],
            'numero_ativo' => ['type' => 'VARCHAR', 'constraint' => '128'],
            'numero_serie' => ['type' => 'VARCHAR', 'constraint' => '128', 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['disponivel', 'emprestado', 'quebrado', 'extraviado', 'vendido', 'doado'], 'default' => 'disponivel'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->dbforge->add_key('id', true);
        $this->dbforge->add_key('item_id');
        $this->dbforge->create_table('assets');

        $this->db->query('ALTER TABLE assets ADD CONSTRAINT FOREIGN KEY (item_id) REFERENCES items (id) ON DELETE CASCADE');
    }

    public function down()
    {
        $this->dbforge->drop_table('assets');
    }
}
