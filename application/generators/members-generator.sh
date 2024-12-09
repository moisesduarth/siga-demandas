#!/bin/bash

# Caminho base para o seu projeto
base_path="/Applications/MAMP/htdocs/credito/application"

# Função para criar um arquivo com conteúdo e garantir a criação do diretório
create_file_with_content() {
  local file_path=$1
  local content=$2
  mkdir -p "$(dirname "$file_path")"  # Cria o diretório, se não existir
  echo "$content" > "$file_path"      # Cria o arquivo com o conteúdo
}

# 1. Migration para Membros
migration_file="$base_path/migrations/$(date +%Y%m%d%H%M%S)_create_members_table.php"
create_file_with_content "$migration_file" "<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Members_Table extends CI_Migration {

    public function up()
    {
        \$this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE,
            ],
            'rg' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => TRUE,
            ],
            'cpf' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => TRUE,
            ],
            'endereco' => [
                'type' => 'TEXT',
                'null' => TRUE,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ]
        ]);
        \$this->dbforge->add_key('id', TRUE);
        \$this->dbforge->create_table('membros');
    }

    public function down()
    {
        \$this->dbforge->drop_table('membros');
    }
}
"

# 2. Model para Membros (Membros_model.php)
create_file_with_content "$base_path/models/Membros_model.php" "<?php
class Membros_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_all_membros()
    {
        \$this->db->order_by('id', 'desc');
        return \$this->db->get('membros')->result_array();
    }

    function get_membro(\$id)
    {
        return \$this->db->get_where('membros', ['id' => \$id])->row_array();
    }

    function add_membro(\$params)
    {
        \$this->db->insert('membros', \$params);
        return \$this->db->insert_id();
    }

    function update_membro(\$id, \$params)
    {
        \$this->db->where('id', \$id);
        return \$this->db->update('membros', \$params);
    }

    function delete_membro(\$id)
    {
        return \$this->db->delete('membros', ['id' => \$id]);
    }
}
"

# 3. Controller para Membros (Membros.php)
create_file_with_content "$base_path/controllers/Membros.php" "<?php
class Membros extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        \$this->load->model('Membros_model');
        \$this->load->library('form_validation');
    }

    function index()
    {
        \$data['membros'] = \$this->Membros_model->get_all_membros();
        \$this->load->view('layouts/main', ['_view' => 'membros/index', 'membros' => \$data['membros']]);
    }

    function add()
    {
        \$this->form_validation->set_rules('nome', 'Nome', 'required');

        if (\$this->form_validation->run()) {
            \$params = [
                'nome' => \$this->input->post('nome'),
                'rg' => \$this->input->post('rg'),
                'cpf' => \$this->input->post('cpf'),
                'endereco' => \$this->input->post('endereco')
            ];
            \$this->Membros_model->add_membro(\$params);
            redirect('membros');
        } else {
            \$this->load->view('layouts/main', ['_view' => 'membros/form']);
        }
    }

    function edit(\$id)
    {
        \$data['membro'] = \$this->Membros_model->get_membro(\$id);

        if (\$this->input->post()) {
            \$this->form_validation->set_rules('nome', 'Nome', 'required');

            if (\$this->form_validation->run()) {
                \$params = [
                    'nome' => \$this->input->post('nome'),
                    'rg' => \$this->input->post('rg'),
                    'cpf' => \$this->input->post('cpf'),
                    'endereco' => \$this->input->post('endereco')
                ];
                \$this->Membros_model->update_membro(\$id, \$params);
                redirect('membros');
            } else {
                \$this->load->view('layouts/main', ['_view' => 'membros/form', 'membro' => \$data['membro']]);
            }
        } else {
            \$this->load->view('layouts/main', ['_view' => 'membros/form', 'membro' => \$data['membro']]);
        }
    }
}
"

# 4. View para Formulário de Membros (form.php)
create_file_with_content "$base_path/views/membros/form.php" "<div class=\"box\">
    <div class=\"box-header with-border\">
        <h3 class=\"box-title\"><?php echo isset(\$membro) ? 'Editar' : 'Adicionar'; ?> Membro</h3>
    </div>
    <?php echo form_open(isset(\$membro) ? 'membros/edit/' . \$membro['id'] : 'membros/add'); ?>
    <div class=\"box-body\">
        <div class=\"form-group\">
            <label for=\"nome\">Nome</label>
            <input type=\"text\" name=\"nome\" class=\"form-control\" value=\"<?php echo isset(\$membro) ? \$membro['nome'] : ''; ?>\" required>
        </div>
        <div class=\"form-group\">
            <label for=\"rg\">RG</label>
            <input type=\"text\" name=\"rg\" class=\"form-control\" value=\"<?php echo isset(\$membro) ? \$membro['rg'] : ''; ?>\">
        </div>
        <div class=\"form-group\">
            <label for=\"cpf\">CPF</label>
            <input type=\"text\" name=\"cpf\" class=\"form-control\" value=\"<?php echo isset(\$membro) ? \$membro['cpf'] : ''; ?>\">
        </div>
        <div class=\"form-group\">
            <label for=\"endereco\">Endereço</label>
            <textarea name=\"endereco\" class=\"form-control\"><?php echo isset(\$membro) ? \$membro['endereco'] : ''; ?></textarea>
        </div>
    </div>
    <div class=\"box-footer\">
        <button type=\"submit\" class=\"btn btn-primary\">Salvar</button>
    </div>
    <?php echo form_close(); ?>
</div>
"

# 5. View para Listagem de Membros (index.php)
create_file_with_content "$base_path/views/membros/index.php" "<div class=\"box\">
    <div class=\"box-header with-border\">
        <h3 class=\"box-title\">Membros</h3>
        <a href=\"<?php echo site_url('membros/add'); ?>\" class=\"btn btn-success btn-sm\">Adicionar Membro</a>
    </div>
    <div class=\"box-body\">
        <table class=\"table table-bordered\">
            <tr>
                <th>Nome</th>
                <th>RG</th>
                <th>CPF</th>
                <th>Ações</th>
            </tr>
            <?php foreach (\$membros as \$membro): ?>
                <tr>
                    <td><?php echo \$membro['nome']; ?></td>
                    <td><?php echo \$membro['rg']; ?></td>
                    <td><?php echo \$membro['cpf']; ?></td>
                    <td>
                        <a href=\"<?php echo site_url('membros/edit/' . \$membro['id']); ?>\" class=\"btn btn-warning btn-sm\">Editar</a>
                        <a href=\"<?php echo site_url('membros/delete/' . \$membro['id']); ?>\" class=\"btn btn-danger btn-sm\">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
"

echo "Arquivos e conteúdo criados com sucesso!"
