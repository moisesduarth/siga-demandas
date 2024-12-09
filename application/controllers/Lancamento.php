<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Lancamento extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Lancamento_model');
        $this->load->model('Investidor_model');
        $this->load->model('Conta_model');
        $this->load->model('Forma_pagamento_model');

        // $this->output->enable_profiler(TRUE);

    }

    function filtrar($page = 'index')
    {

        //Este método apenas irá definir como filtro todos os campos que foram postados e redirecionar para a página desejada        
        $filtro = $_POST;

        $this->session->set_flashdata('filtro', $filtro);
        redirect('lancamento/' . $page);
    }

    function listar_filtros($filtro = array())
    {

        $filtro = array_filter($filtro, 'strlen');

        foreach ($filtro as $chave => $valor) {
            $lista[] = str_replace('_', ' ', $chave) . ': <b>' . str_replace('-', '~', $valor) . '</b>';
        }

        return implode(' / ', $lista) ?: [];
    }

    /*
     * Listing of lancamento
     */
    function index()
    {
        $filtro = $this->session->flashdata('filtro') ?? [];

        // Ajusta valores para 'Cidades' e 'Nome_Usuario' com valores padrão
        $filtro['Cidades'] = $filtro['Cidades'] ?? [];
        $filtro['Nome_Usuario'] = $filtro['Nome_Usuario'] ?? '';

        // Atribui a data somente se estiver definida no filtro
        $data['filtro'] = $filtro;
        $data['lancamentos'] = $this->Lancamento_model->get_all_lancamento($filtro['Data_Lancamento'] ?? null, $filtro['Cidades'], $filtro['Nome_Usuario']);
        $data['entradas_forma_pagamento'] = $this->Lancamento_model->get_all_lancamento_by_forma_pagamento(1, $filtro['Data_Lancamento'] ?? null, $filtro['Cidades'], $filtro['Nome_Usuario']);
        $data['saidas_forma_pagamento'] = $this->Lancamento_model->get_all_lancamento_by_forma_pagamento(0, $filtro['Data_Lancamento'] ?? null, $filtro['Cidades'], $filtro['Nome_Usuario']);
        $data['cidades'] = $this->Investidor_model->get_all_cidades();

        $data['_view'] = 'lancamento/index';
        $this->load->view('layouts/main', $data);
    }


    function fechamento()
    {
        $data['lancamentos'] = $this->Lancamento_model->get_lancamentos_por_data(Date('Y/m/d'), [$this->session->userdata['city']], $this->session->userdata['user_id']);

        $data['_view'] = 'lancamento/fechamento';
        $this->load->view('layouts/main', $data);
    }

    function despesa()
    {
        redirect('lancamento/add');
    }

    /*
     * Adding a new lancamento
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('Motivo_Lancamento', 'Descricao Lancamento', 'required');
        $this->form_validation->set_rules('Valor_Lancamento', 'Saldo Lancamento', 'required|numeric');
        $this->form_validation->set_rules('ID_Forma_Pagamento', 'Forma de Pagamento', 'required');

        // TODO: Criar uma configuração para remover esse hardcode, permitindo ao cliente que configure a conta default
        $conta_descontada = $this->Conta_model->get_conta(2); // 2 - Conta de Lucro

        if ($this->form_validation->run()) {
            $params = array(
                'Motivo_Lancamento' => $this->input->post('Motivo_Lancamento'),
                'Valor_Lancamento' => $this->input->post('Valor_Lancamento'),
                'ID_Conta_Descontada' => $conta_descontada['ID_Conta'], // TODO: Rever conceito de conta de Lucro e Investimento
                'Tipo_Lancamento' => $this->input->post('Tipo_Lancamento'),
                'ID_User_Create' => $this->session->userdata['user_id'],
                'Date_Created' => Date('Y/m/d H:i:s'),
                'ID_User_Update' => $this->session->userdata['user_id'],
                'Date_Updated' => Date('Y/m/d H:i:s'),
                'ID_Forma_Pagamento' => $this->input->post('ID_Forma_Pagamento'),
            );

            $lancamento_id = $this->Lancamento_model->add_lancamento($params);

            // Atualiza saldo da conta
            $params = array('Saldo_Conta' => ($conta_descontada['Saldo_Conta'] - $this->input->post('Valor_Lancamento')));
            $this->Conta_model->update_conta($conta_descontada['ID_Conta'], $params);

            if ($this->ion_auth->is_cobrador()) {
                redirect('lancamento/fechamento');
            } else {
                redirect('lancamento/index');
            }
        } else {

            $data['formas_pagamento'] = $this->Forma_pagamento_model->get_all_forma_pagamento();

            $data['_view'] = 'lancamento/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a lancamento
     */
    function edit($ID_Lancamento)
    {
        // check if the lancamento exists before trying to edit it
        $data['lancamento'] = $this->Lancamento_model->get_lancamento($ID_Lancamento);

        if (isset($data['lancamento']['ID_Lancamento'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('Motivo_Lancamento', 'Descricao Lancamento', 'required');
            $this->form_validation->set_rules('Valor_Lancamento', 'Saldo Lancamento', 'required|numeric');

            if ($this->form_validation->run()) {
                $params = array(
                    'Tipo_Lancamento' => $this->input->post('Tipo_Lancamento'),
                    'Motivo_Lancamento' => $this->input->post('Motivo_Lancamento'),
                    'Valor_Lancamento' => $this->input->post('Valor_Lancamento'),
                    'ID_User_Update' => $this->session->userdata['user_id'],
                    'Date_Updated' => Date('Y/m/d H:i:s'),
                );

                $this->Lancamento_model->update_lancamento($ID_Lancamento, $params);
                redirect('lancamento/index');
            } else {
                $data['_view'] = 'lancamento/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('O lancamento que você está tentando acessar não existe.');
    }


    function estornar($ID_Lancamento)
    {
        $lancamento = $this->Lancamento_model->get_lancamento($ID_Lancamento);
        // echo '<pre>';
        // print_r($lancamento);
        // echo '</pre>';
        // die();

        // Verifica se o lançamento existe antes de tentar estornar
        if (isset($lancamento['ID_Lancamento'])) {

            // Garante que os campos obrigatórios estão presentes
            $params = [
                'Motivo_Lancamento' => 'Estorno de ' . ($lancamento['Motivo_Lancamento'] ?? 'Lançamento Original'),
                'Valor_Lancamento' => $lancamento['Valor_Lancamento'] ?? 0,
                'Tipo_Lancamento' => ($lancamento['Tipo_Lancamento'] == 0) ? 1 : 0,
                'ID_User_Create' => $this->session->userdata('user_id'),
                'ID_User_Update' => $this->session->userdata('user_id'),
                'ID_Lancamento_Estornado' => $ID_Lancamento,
                'Date_Created' => date('Y-m-d H:i:s'),
                'Date_Updated' => date('Y-m-d H:i:s')
            ];

            // Cria o estorno como um novo lançamento
            $lancamento_estorno_id = $this->Lancamento_model->add_lancamento($params);

            // Atualiza o lançamento original para indicar que foi estornado
            $this->Lancamento_model->update_lancamento($ID_Lancamento, ['ID_Lancamento_Estornado' => $lancamento_estorno_id]);

            redirect('lancamento/index');
        } else {
            show_error('O lançamento que você está tentando estornar não existe.');
        }
    }
}
