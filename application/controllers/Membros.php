<?php
class Membros extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Membros_model');
        $this->load->library('form_validation');
    }

    function index()
    {
        $data['membros'] = $this->Membros_model->get_all_membros();
        $this->load->view('layouts/main', ['_view' => 'membros/index', 'membros' => $data['membros']]);
    }

    function add()
    {
        $this->form_validation->set_rules('nome', 'Nome', 'required');

        if ($this->form_validation->run()) {
            $params = [
                'nome' => $this->input->post('nome'),
                'rg' => $this->input->post('rg'),
                'cpf' => $this->input->post('cpf'),
                'endereco' => $this->input->post('endereco')
            ];
            $this->Membros_model->add_membro($params);
            redirect('membros');
        } else {
            $this->load->view('layouts/main', ['_view' => 'membros/form']);
        }
    }

    function edit($id)
    {
        $data['membro'] = $this->Membros_model->get_membro($id);

        if ($this->input->post()) {
            $this->form_validation->set_rules('nome', 'Nome', 'required');

            if ($this->form_validation->run()) {
                $params = [
                    'nome' => $this->input->post('nome'),
                    'rg' => $this->input->post('rg'),
                    'cpf' => $this->input->post('cpf'),
                    'endereco' => $this->input->post('endereco')
                ];
                $this->Membros_model->update_membro($id, $params);
                redirect('membros');
            } else {
                $this->load->view('layouts/main', ['_view' => 'membros/form', 'membro' => $data['membro']]);
            }
        } else {
            $this->load->view('layouts/main', ['_view' => 'membros/form', 'membro' => $data['membro']]);
        }
    }

    function delete($id)
    {
        $membro = $this->Membros_model->get_membro($id);

        if (isset($membro['id'])) {
            $this->Membros_model->delete_membro($id);
            redirect('membros');
        } else {
            show_error('O membro que você está tentando excluir não existe.');
        }
    }
}

