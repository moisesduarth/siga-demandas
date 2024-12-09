<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Table_Configuracao extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                    'ID_Configuracao' => array(
                            'type' => 'INT',
                            'constraint' => 5,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'CNPJ_CPF' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '20',
                            'null' => TRUE
                    ),
                    'Nome_Fantasia' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '200',
                            'null' => TRUE
                    ),
                    'Endereco' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '200',
                        'null' => TRUE
                    ),
                    'CPF_Obrigatorio' => array(
                        'type' => 'INT',
                        'constraint' => '1',
                        'default' => 0,
                        'null' => FALSE
                    ),
                    'RG_Obrigatorio' => array(
                        'type' => 'INT',
                        'constraint' => '1',
                        'default' => 0,
                        'null' => FALSE
                    ),
                    'Habilitar_Parcelamento' => array(
                        'type' => 'INT',
                        'constraint' => '1',
                        'default' => 0,
                        'null' => FALSE
                    ),
                    'Habilitar_Cartao' => array(
                        'type' => 'INT',
                        'constraint' => '1',
                        'default' => 0,
                        'null' => FALSE
                    )
                ));
                $this->dbforge->add_key('ID_Configuracao', TRUE);
                $this->dbforge->create_table('configuracao');

                $data = array(
                    'CNPJ_CPF' => '00000000000',
                    'Nome_Fantasia' => 'NOME FANTASIA',
                    'Endereco' => 'Rua Exemplo, NN - Bairro Exemplo',
                    'CPF_Obrigatorio' => '0',
                    'CPF_Obrigatorio' => '0',
                    'Habilitar_Parcelamento' => '0',
                    'Habilitar_Cartao' => '0'
                );
                $this->db->insert('configuracao', $data);
                
        }

        public function down()
        {
                $this->dbforge->drop_table('configuracao');
        }
}