<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demandas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Demandas_model');
        $this->load->model('Membros_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['demandas'] = $this->Demandas_model->get_all_demandas();
        $data['_view'] = 'demandas/index';
        $this->load->view('layouts/main', $data);
    }

    public function pendentes() {
        $data['demandas_pendentes'] = $this->Demandas_model->get_demandas_pendentes();
        $data['_view'] = 'demandas/pendentes';
        $this->load->view('layouts/main', $data);
    }

    public function add()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('titulo', 'Título', 'required');
            $this->form_validation->set_rules('categoria', 'Categoria', 'required');
            $this->form_validation->set_rules('membro_id', 'Membro', 'required');

            if ($this->form_validation->run()) {
                $data = [
                    'titulo' => $this->input->post('titulo'),
                    'descricao' => $this->input->post('descricao'),
                    'categoria' => $this->input->post('categoria'),
                    'membro_id' => $this->input->post('membro_id'),
                    'aprovador_id' => $this->input->post('aprovador_id'),
                    'data_inclusao' => date('Y-m-d H:i:s'),
                    'observacao' => $this->input->post('observacao')
                ];

                $this->Demandas_model->add_demanda($data);
                redirect('demandas/index');
            }
        }
        $data['membros'] = $this->Membros_model->get_all_membros();
        $data['_view'] = 'demandas/form';
        $this->load->view('layouts/main', $data);
    }

    public function edit($id)
    {
        $data['demanda'] = $this->Demandas_model->get_demanda($id);
        
        if ($this->input->post()) {
            $this->form_validation->set_rules('titulo', 'Título', 'required');
            $this->form_validation->set_rules('categoria', 'Categoria', 'required');
            $this->form_validation->set_rules('membro_id', 'Membro', 'required');

            if ($this->form_validation->run()) {
                $update_data = [
                    'titulo' => $this->input->post('titulo'),
                    'descricao' => $this->input->post('descricao'),
                    'categoria' => $this->input->post('categoria'),
                    'membro_id' => $this->input->post('membro_id'),
                    'status' => $this->input->post('status'),
                    'aprovador_id' => $this->input->post('aprovador_id'),
                    'observacao' => $this->input->post('observacao')
                ];

                $this->Demandas_model->update_demanda($id, $update_data);
                redirect('demandas/index');
            }
        }
        
        $data['membros'] = $this->Membros_model->get_all_membros();
        $data['_view'] = 'demandas/form';
        $this->load->view('layouts/main', $data);
    }

    public function delete($id)
    {
        $this->Demandas_model->delete_demanda($id);
        redirect('demandas/index');
    }
}

