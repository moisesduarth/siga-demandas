<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_items_table extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'nome' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'descricao_curta' => ['type' => 'TEXT', 'null' => true],
            'descricao_longa' => ['type' => 'TEXT', 'null' => true],
            'codigo_barras' => ['type' => 'VARCHAR', 'constraint' => '128', 'null' => true],
            'preco_custo' => ['type' => 'DECIMAL', 'constraint' => '10,2', 'default' => 0],
            'preco_venda' => ['type' => 'DECIMAL', 'constraint' => '10,2', 'default' => 0],
            'quantidade_estoque' => ['type' => 'INT', 'default' => 0],
            'controle_individual' => ['type' => 'BOOLEAN', 'default' => false],
            'usage_type' => ['type' => 'ENUM', 'constraint' => ['returnable', 'consumable'], 'default' => 'returnable'],
            'valor_integral' => ['type' => 'DECIMAL', 'constraint' => '10,2', 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('items');
    }

    public function down()
    {
        $this->dbforge->drop_table('items');
    }
}
