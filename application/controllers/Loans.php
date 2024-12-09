<?php
class Loans extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Loans_model');
        $this->load->model('Loans_items_model');
        $this->load->model('Items_model');
        $this->load->model('Assets_model');
        $this->load->model('Membros_model');
        $this->load->library('form_validation');
    }

    function index()
    {
        $data['loans'] = $this->Loans_model->get_all_loans();
        $this->load->view('layouts/main', ['_view' => 'loans/index', 'loans' => $data['loans']]);
    }

    function add()
    {
        $data['membros'] = $this->Membros_model->get_all_membros();
        $data['items'] = $this->Items_model->get_all_items();
        $this->load->view('layouts/main', ['_view' => 'loans/form', 'membros' => $data['membros'], 'items' => $data['items']]);
    }

    function store()
    {
        $this->form_validation->set_rules('membro_id', 'Membro', 'required');

        if ($this->form_validation->run()) {
            $postData = $this->input->post();

            $loanId = $this->Loans_model->add_loan([
                'membro_id' => $postData['membro_id'],
                'user_id' => $this->session->userdata['user_id'],
                'data_emprestimo' => date('Y-m-d H:i:s'),
            ]);

            foreach ($postData['itens'] as $itemData) {
                $this->Loans_items_model->add_loan_item([
                    'loan_id' => $loanId,
                    'item_id' => $itemData['item_id'],
                    'asset_id' => $itemData['asset_id'] ?? null,
                    'quantidade' => $itemData['quantidade'] ?? 0,
                    'status' => 'ativo',
                ]);

                $item = $this->Items_model->get_item($itemData['item_id']);
                if ($item['usage_type'] === 'returnable') {
                    if (!empty($itemData['asset_id'])) {
                        $this->Assets_model->update_asset_status($itemData['asset_id'], 'emprestado');
                    }
                } elseif ($item['usage_type'] === 'consumable') {
                    $this->Items_model->update_item_stock($itemData['item_id'], -$itemData['quantidade']);
                }
            }

            redirect('loans');
        } else {
            $this->add();
        }
    }

    function receipt($id)
    {
        $data['loan'] = $this->Loans_model->get_loan($id);
        $data['loanItems'] = $this->Loans_items_model->get_loan_items($id);
        $this->load->view('loans/receipt', $data);
    }

    function delete($id)
    {
        $loan = $this->Loans_model->get_loan($id);

        if (isset($loan['id'])) {
            $this->Loans_model->delete_loan($id);
            redirect('loans');
        } else {
            show_error('O empréstimo que você está tentando excluir não existe.');
        }
    }

    function return($id)
    {
        $loan = $this->Loans_model->get_loan($id);

        if (isset($loan['id'])) {
            $this->Loans_model->update_loan($id, ['status' => 'devolvido']);
            $this->Loans_items_model->update_loan_items($id, ['status' => 'devolvido']);

            $loanItems = $this->Loans_items_model->get_loan_items($id);
            foreach ($loanItems as $item) {
                $itemData = $this->Items_model->get_item($item['item_id']);
                if ($itemData['usage_type'] === 'returnable') {
                    if (!empty($item['asset_id'])) {
                        $this->Assets_model->update_asset_status($item['asset_id'], 'disponivel');
                    }
                } elseif ($itemData['usage_type'] === 'consumable') {
                    $this->Items_model->update_item_stock($item['item_id'], $item['quantidade']);
                }
            }

            redirect('loans');
        } else {
            show_error('O empréstimo que você está tentando devolver não existe.');
        }
    }
}
