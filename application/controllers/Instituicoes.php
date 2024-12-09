<?php
class Instituicoes extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Instituicoes_model');
        $this->load->model('Areas_model');
        $this->load->model('Membros_model');
        $this->load->library('form_validation'); // Carrega a biblioteca de validação de formulários
    }

    /*
     * Listar todas as instituições
     */
    function index()
    {
        $data['instituicoes'] = $this->Instituicoes_model->get_all_instituicoes();
        $this->load->view('layouts/main', ['_view' => 'instituicoes/index', 'instituicoes' => $data['instituicoes']]);
    }

    /*
     * Adicionar nova instituição
     */
    function add()
    {
        $this->form_validation->set_rules('codigo', 'Código', 'required');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required');
        $this->form_validation->set_rules('area_id', 'Área', 'required');
        $this->form_validation->set_rules('lider_id', 'Líder', 'required');

        if ($this->form_validation->run()) {
            $params = array(
                'codigo' => $this->input->post('codigo'),
                'descricao' => $this->input->post('descricao'),
                'area_id' => $this->input->post('area_id'),
                'lider_id' => $this->input->post('lider_id'),
                'tesoureiro' => $this->input->post('tesoureiro'),
                'endereco' => $this->input->post('endereco')
            );
            $this->Instituicoes_model->add_instituicao($params);
            redirect('instituicoes/index');
        } else {
            $data['areas'] = $this->Areas_model->get_all_areas();
            $data['membros'] = $this->Membros_model->get_all_membros();
            $this->load->view('layouts/main', ['_view' => 'instituicoes/form', 'areas' => $data['areas'], 'membros' => $data['membros']]);
        }
    }

    /*
     * Editar instituição existente
     */
    function edit($id)
    {
        $data['instituicao'] = $this->Instituicoes_model->get_instituicao($id);

        if ($this->input->post()) {
            $this->form_validation->set_rules('codigo', 'Código', 'required');
            $this->form_validation->set_rules('descricao', 'Descrição', 'required');
            $this->form_validation->set_rules('area_id', 'Área', 'required');
            $this->form_validation->set_rules('lider_id', 'Líder', 'required');

            if ($this->form_validation->run()) {
                $params = array(
                    'codigo' => $this->input->post('codigo'),
                    'descricao' => $this->input->post('descricao'),
                    'area_id' => $this->input->post('area_id'),
                    'lider_id' => $this->input->post('lider_id'),
                    'tesoureiro' => $this->input->post('tesoureiro'),
                    'endereco' => $this->input->post('endereco')
                );
                $this->Instituicoes_model->update_instituicao($id, $params);
                redirect('instituicoes');
            } else {
                $data['areas'] = $this->Areas_model->get_all_areas();
                $data['membros'] = $this->Membros_model->get_all_membros();
                $this->load->view('layouts/main', ['_view' => 'instituicoes/form', 'instituicao' => $data['instituicao'], 'areas' => $data['areas'], 'membros' => $data['membros']]);
            }
        } else {
            $data['areas'] = $this->Areas_model->get_all_areas();
            $data['membros'] = $this->Membros_model->get_all_membros();
            $this->load->view('layouts/main', ['_view' => 'instituicoes/form', 'instituicao' => $data['instituicao'], 'areas' => $data['areas'], 'membros' => $data['membros']]);
        }
    }

    /*
     * Remover instituição
     */
    function remove($id)
    {
        $instituicao = $this->Instituicoes_model->get_instituicao($id);

        if (isset($instituicao['id'])) {
            $this->Instituicoes_model->delete_instituicao($id);
            redirect('instituicoes');
        } else {
            show_error('A instituição que você está tentando excluir não existe.');
        }
    }
}
