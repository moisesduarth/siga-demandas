#!/bin/bash

# Caminho base para o seu projeto
base_path="/Applications/MAMP/htdocs/credito/application"

# Função para criar arquivos com conteúdo
create_file_with_content() {
    local file_path="$1"
    local content="$2"
    mkdir -p "$(dirname "$file_path")"
    echo "$content" > "$file_path"
}

# Model para Demandas
create_file_with_content "$base_path/models/Demandas_model.php" "<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demandas_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_demanda(\$id)
    {
        \$this->db->select('demandas.*, membros.nome as membro_nome, aprovadores.nome as aprovador_nome');
        \$this->db->from('demandas');
        \$this->db->join('membros', 'membros.id = demandas.membro_id');
        \$this->db->join('membros as aprovadores', 'aprovadores.id = demandas.aprovador_id', 'left');
        \$this->db->where('demandas.id', \$id);
        return \$this->db->get()->row_array();
    }

    public function get_all_demandas()
    {
        \$this->db->select('demandas.*, membros.nome as membro_nome, aprovadores.nome as aprovador_nome');
        \$this->db->from('demandas');
        \$this->db->join('membros', 'membros.id = demandas.membro_id');
        \$this->db->join('membros as aprovadores', 'aprovadores.id = demandas.aprovador_id', 'left');
        \$this->db->order_by('demandas.id', 'desc');
        return \$this->db->get()->result_array();
    }

    public function add_demanda(\$data)
    {
        \$this->db->insert('demandas', \$data);
        return \$this->db->insert_id();
    }

    public function update_demanda(\$id, \$data)
    {
        \$this->db->where('id', \$id);
        \$this->db->update('demandas', \$data);
        return \$this->db->affected_rows();
    }

    public function delete_demanda(\$id)
    {
        \$this->db->delete('demandas', ['id' => \$id]);
        return \$this->db->affected_rows();
    }
}
"

# Controller para Demandas
create_file_with_content "$base_path/controllers/Demandas.php" "<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demandas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        \$this->load->model('Demandas_model');
        \$this->load->model('Membros_model');
        \$this->load->library('form_validation');
    }

    public function index()
    {
        \$data['demandas'] = \$this->Demandas_model->get_all_demandas();
        \$data['_view'] = 'demandas/index';
        \$this->load->view('layouts/main', \$data);
    }

    public function add()
    {
        if (\$this->input->post()) {
            \$this->form_validation->set_rules('titulo', 'Título', 'required');
            \$this->form_validation->set_rules('descricao', 'Descrição', 'required');
            \$this->form_validation->set_rules('categoria', 'Categoria', 'required');

            if (\$this->form_validation->run()) {
                \$data = [
                    'titulo' => \$this->input->post('titulo'),
                    'descricao' => \$this->input->post('descricao'),
                    'categoria' => \$this->input->post('categoria'),
                    'membro_id' => \$this->input->post('membro_id'),
                    'aprovador_id' => \$this->input->post('aprovador_id'),
                    'status' => \$this->input->post('status'),
                    'data_inclusao' => date('Y-m-d H:i:s'),
                    'observacao' => \$this->input->post('observacao')
                ];

                \$this->Demandas_model->add_demanda(\$data);
                redirect('demandas/index');
            }
        }
        \$data['membros'] = \$this->Membros_model->get_all_membros();
        \$data['_view'] = 'demandas/form';
        \$this->load->view('layouts/main', \$data);
    }

    public function edit(\$id)
    {
        \$data['demanda'] = \$this->Demandas_model->get_demanda(\$id);
        
        if (\$this->input->post()) {
            \$this->form_validation->set_rules('titulo', 'Título', 'required');
            \$this->form_validation->set_rules('descricao', 'Descrição', 'required');
            \$this->form_validation->set_rules('categoria', 'Categoria', 'required');

            if (\$this->form_validation->run()) {
                \$update_data = [
                    'titulo' => \$this->input->post('titulo'),
                    'descricao' => \$this->input->post('descricao'),
                    'categoria' => \$this->input->post('categoria'),
                    'membro_id' => \$this->input->post('membro_id'),
                    'aprovador_id' => \$this->input->post('aprovador_id'),
                    'status' => \$this->input->post('status'),
                    'observacao' => \$this->input->post('observacao')
                ];

                \$this->Demandas_model->update_demanda(\$id, \$update_data);
                redirect('demandas/index');
            }
        }
        
        \$data['membros'] = \$this->Membros_model->get_all_membros();
        \$data['_view'] = 'demandas/form';
        \$this->load->view('layouts/main', \$data);
    }

    public function delete(\$id)
    {
        \$this->Demandas_model->delete_demanda(\$id);
        redirect('demandas/index');
    }
}
"

# View form.php para Demandas
view_path="$base_path/views/demandas"
create_file_with_content "$view_path/form.php" "<div class=\"box\">
    <div class=\"box-header with-border\">
        <h3 class=\"box-title\"><?php echo isset(\$demanda) ? 'Editar Demanda' : 'Adicionar Demanda'; ?></h3>
    </div>
    <div class=\"box-body\">
        <?php echo form_open(isset(\$demanda) ? 'demandas/edit/' . \$demanda['id'] : 'demandas/add'); ?>
            <div class=\"form-group\">
                <label for=\"titulo\">Título</label>
                <input type=\"text\" name=\"titulo\" class=\"form-control\" value=\"<?php echo set_value('titulo', \$demanda['titulo'] ?? ''); ?>\">
            </div>
            <div class=\"form-group\">
                <label for=\"descricao\">Descrição</label>
                <textarea name=\"descricao\" class=\"form-control\"><?php echo set_value('descricao', \$demanda['descricao'] ?? ''); ?></textarea>
            </div>
            <div class=\"form-group\">
                <label for=\"categoria\">Categoria</label>
                <select name=\"categoria\" class=\"form-control\">
                    <option value=\"Serviço\" <?php echo isset(\$demanda) && \$demanda['categoria'] == 'Serviço' ? 'selected' : ''; ?>>Serviço</option>
                    <option value=\"Produto\" <?php echo isset(\$demanda) && \$demanda['categoria'] == 'Produto' ? 'selected' : ''; ?>>Produto</option>
                </select>
            </div>
            <div class=\"form-group\">
                <label for=\"membro_id\">Membro</label>
                <select name=\"membro_id\" class=\"form-control\">
                    <?php foreach (\$membros as \$membro): ?>
                        <option value=\"<?php echo \$membro['id']; ?>\" <?php echo isset(\$demanda) && \$demanda['membro_id'] == \$membro['id'] ? 'selected' : ''; ?>>
                            <?php echo \$membro['nome']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type=\"submit\" class=\"btn btn-primary\">Salvar</button>
        <?php echo form_close(); ?>
    </div>
</div>"