<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_Table_Observacao_Emprestimo extends CI_Migration
{

    public function up()
    {
        $this->dbforge->drop_table('observacao_emprestimo', TRUE);
        $this->dbforge->drop_table('observacao_emprestimo', TRUE);

        $this->dbforge->add_field(array(
            'ID_Observacao' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'ID_Emprestimo_Parcela' => array(
                'type' => 'INT',
                'constraint' => '1',
                'default' => 0,
                'null' => FALSE
            ),
            'ID_Emprestimo_Pai' => array(
                'type' => 'INT',
                'constraint' => '1',
                'default' => 0,
                'null' => FALSE
            ),
            'Observacao' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => FALSE
            ),
            'ID_User_Create' => array(
                'type' => 'INT',
                'constraint' => '11',
                'null' => TRUE
            ),
            'Date_Created' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
            'ID_User_Update' => array(
                'type' => 'INT',
                'constraint' => '11',
                'null' => TRUE
            ),
            'Date_Updated' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
        ));
        $this->dbforge->add_key('ID_Observacao', TRUE);
        $this->dbforge->create_table('observacao_emprestimo');
    }

    public function down()
    {
        $this->dbforge->drop_table('observacao_emprestimo');
    }
}
