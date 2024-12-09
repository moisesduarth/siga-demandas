<?php
class Areas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Areas_model');
        $this->load->model('Membros_model');
        $this->load->library('form_validation');
    }

    function index()
    {
        $data['areas'] = $this->Areas_model->get_all_areas();
        $this->load->view('layouts/main', ['_view' => 'areas/index', 'areas' => $data['areas']]);
    }

    function add()
    {
        $this->form_validation->set_rules('nome', 'Nome', 'required');

        if ($this->form_validation->run()) {
            $params = [
                'nome' => $this->input->post('nome'),
                'lider_id' => $this->input->post('lider_id')
            ];
            $this->Areas_model->add_area($params);
            redirect('areas');
        } else {
            $data['membros'] = $this->Membros_model->get_all_membros();
            $this->load->view('layouts/main', ['_view' => 'areas/form', 'membros' => $data['membros']]);
        }
    }

    function edit($id)
    {
        $data['area'] = $this->Areas_model->get_area($id);

        if ($this->input->post()) {
            $this->form_validation->set_rules('nome', 'Nome', 'required');

            if ($this->form_validation->run()) {
                $params = [
                    'nome' => $this->input->post('nome'),
                    'lider_id' => $this->input->post('lider_id')
                ];
                $this->Areas_model->update_area($id, $params);
                redirect('areas');
            } else {
                $data['membros'] = $this->Membros_model->get_all_membros();
                $this->load->view('layouts/main', ['_view' => 'areas/form', 'area' => $data['area'], 'membros' => $data['membros']]);
            }
        } else {
            $data['membros'] = $this->Membros_model->get_all_membros();
            $this->load->view('layouts/main', ['_view' => 'areas/form', 'area' => $data['area'], 'membros' => $data['membros']]);
        }
    }

    function delete($id)
    {
        $this->Areas_model->delete_area($id);
        redirect('areas/index');
    }
}

