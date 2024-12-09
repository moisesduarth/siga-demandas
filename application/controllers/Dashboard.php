<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {

        parent::__construct();

        if ($this->ion_auth->is_cobrador()) {
            redirect('rota/index');
        }

        $this->load->model('Membros_model');
        $this->load->model('Instituicoes_model');
        $this->load->model('Areas_model');
        $this->load->model('Demandas_model');
        // $this->output->enable_profiler(TRUE);
    }

    public function index() {

        // Contadores principais
        $data['total_membros'] = $this->Membros_model->get_total_membros();
        $data['total_instituicoes'] = $this->Instituicoes_model->get_total_instituicoes();
        $data['total_areas'] = $this->Areas_model->get_total_areas();
        $data['demandas_pendentes'] = $this->Demandas_model->get_total_demandas_pendentes();
        $data['demandas_todas'] = $this->Demandas_model->get_all_demandas();

        // Gráficos
        $data['data_demandas_abertas'] = $this->Demandas_model->get_demandas_abertas_por_mes();
        $data['data_demandas_sucesso'] = $this->Demandas_model->get_demandas_sucesso_por_mes();
        $data['data_demandas_sem_sucesso'] = $this->Demandas_model->get_demandas_sem_sucesso_por_mes();
        $data['data_demandas_area'] = $this->Demandas_model->get_demandas_por_area();
        $data['data_membros_area'] = $this->Membros_model->get_membros_por_area();

        // Processar dados para o gráfico de demandas encerradas
        // Obter todos os meses presentes nos dados de sucesso e sem sucesso
        $meses = array();
        if (!empty($data['data_demandas_sucesso'])) {
            foreach ($data['data_demandas_sucesso'] as $item) {
                $meses[] = $item['mes'];
            }
        }
        if (!empty($data['data_demandas_sem_sucesso'])) {
            foreach ($data['data_demandas_sem_sucesso'] as $item) {
                if (!in_array($item['mes'], $meses)) {
                    $meses[] = $item['mes'];
                }
            }
        }
        // Ordenar os meses
        sort($meses);

        // Inicializar arrays de dados
        $dados_sucesso = array_fill_keys($meses, 0);
        $dados_sem_sucesso = array_fill_keys($meses, 0);

        // Preencher os dados de sucesso
        if (!empty($data['data_demandas_sucesso'])) {
            foreach ($data['data_demandas_sucesso'] as $item) {
                $dados_sucesso[$item['mes']] = (int)$item['total'];
            }
        }

        // Preencher os dados sem sucesso
        if (!empty($data['data_demandas_sem_sucesso'])) {
            foreach ($data['data_demandas_sem_sucesso'] as $item) {
                $dados_sem_sucesso[$item['mes']] = (int)$item['total'];
            }
        }

        // Adicionar os dados processados ao array $data
        $data['labels_meses'] = $meses;
        $data['dados_sucesso'] = array_values($dados_sucesso);
        $data['dados_sem_sucesso'] = array_values($dados_sem_sucesso);

        $data['_view'] = 'dashboard';
        $this->load->view('layouts/main', $data);

    }
}
