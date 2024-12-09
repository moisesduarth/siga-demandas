<?php
class Items extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Items_model');
        $this->load->library('form_validation');
    }

    function index()
    {
        $data['items'] = $this->Items_model->get_all_items(); // Corrigido: get_all_items
        $this->load->view('layouts/main', ['_view' => 'items/index', 'items' => $data['items']]);
    }

    function add()
    {
        $this->form_validation->set_rules('nome', 'Nome', 'required|max_length[255]');
        $this->form_validation->set_rules('preco_custo', 'Preço de Custo', 'required|numeric');
        $this->form_validation->set_rules('preco_venda', 'Preço de Venda', 'required|numeric');
        $this->form_validation->set_rules('quantidade_estoque', 'Quantidade em Estoque', 'required|integer');
        $this->form_validation->set_rules('usage_type', 'Tipo de Uso', 'required|in_list[returnable,consumable]');

        if ($this->form_validation->run()) {
            $params = [
                'nome' => $this->input->post('nome'),
                'codigo_barras' => $this->input->post('codigo_barras'),
                'preco_custo' => $this->input->post('preco_custo'),
                'preco_venda' => $this->input->post('preco_venda'),
                'quantidade_estoque' => $this->input->post('quantidade_estoque'),
                'controle_individual' => $this->input->post('controle_individual') ? 1 : 0,
                'usage_type' => $this->input->post('usage_type'),
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $this->Items_model->add_item($params);
            redirect('items');
        } else {
            $this->load->view('layouts/main', ['_view' => 'items/form']);
        }
    }

    function edit($id)
    {
        $data['item'] = $this->Items_model->get_item($id);

        if (!$data['item']) {
            show_error('O item que você está tentando editar não existe.');
        }

        $this->form_validation->set_rules('nome', 'Nome', 'required|max_length[255]');
        $this->form_validation->set_rules('preco_custo', 'Preço de Custo', 'required|numeric');
        $this->form_validation->set_rules('preco_venda', 'Preço de Venda', 'required|numeric');
        $this->form_validation->set_rules('quantidade_estoque', 'Quantidade em Estoque', 'required|integer');
        $this->form_validation->set_rules('usage_type', 'Tipo de Uso', 'required|in_list[returnable,consumable]');

        if ($this->form_validation->run()) {
            $params = [
                'nome' => $this->input->post('nome'),
                'codigo_barras' => $this->input->post('codigo_barras'),
                'preco_custo' => $this->input->post('preco_custo'),
                'preco_venda' => $this->input->post('preco_venda'),
                'quantidade_estoque' => $this->input->post('quantidade_estoque'),
                'controle_individual' => $this->input->post('controle_individual') ? 1 : 0,
                'usage_type' => $this->input->post('usage_type'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $this->Items_model->update_item($id, $params);
            redirect('items');
        } else {
            $this->load->view('layouts/main', ['_view' => 'items/form', 'item' => $data['item']]);
        }
    }

    function delete($id)
    {
        $item = $this->Items_model->get_item($id);

        if (isset($item['id'])) {
            $this->Items_model->delete_item($id);
            redirect('items');
        } else {
            show_error('O item que você está tentando excluir não existe.');
        }
    }
}
