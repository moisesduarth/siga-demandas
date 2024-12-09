<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demandas_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_demanda($id)
    {
        $this->db->select('demandas.*, membros.nome as membro_nome, aprovadores.nome as aprovador_nome');
        $this->db->from('demandas');
        $this->db->join('membros', 'membros.id = demandas.membro_id');
        $this->db->join('membros as aprovadores', 'aprovadores.id = demandas.aprovador_id', 'left');
        $this->db->where('demandas.id', $id);
        return $this->db->get()->row_array();
    }

    public function get_all_demandas()
    {
        $this->db->select('demandas.*, membros.nome as membro_nome, aprovadores.nome as aprovador_nome');
        $this->db->from('demandas');
        $this->db->join('membros', 'membros.id = demandas.membro_id');
        $this->db->join('membros as aprovadores', 'aprovadores.id = demandas.aprovador_id', 'left');
        $this->db->order_by('demandas.id', 'desc');
        return $this->db->get()->result_array();
    }

    public function get_total_demandas_pendentes()
    {
        $this->db->where('status', 'aberto');
        return $this->db->count_all_results('demandas');
    }

    // Métodos para gráficos

    public function get_demandas_abertas_por_mes()
    {
        // Gráfico de demandas abertas por mês
        $this->db->select("DATE_FORMAT(data_inclusao, '%Y-%m') AS mes, COUNT(*) AS total");
        $this->db->from('demandas');
        $this->db->where('status', 'aberto');
        $this->db->group_by("mes");
        $this->db->order_by("mes", "ASC");
        return $this->db->get()->result_array();
    }

    public function get_demandas_sucesso_por_mes()
    {
        // Gráfico de demandas encerradas com sucesso por mês
        $this->db->select("DATE_FORMAT(data_inclusao, '%Y-%m') AS mes, COUNT(*) AS total");
        $this->db->from('demandas');
        $this->db->where('status', 'encerrado_sucesso');
        $this->db->group_by("mes");
        $this->db->order_by("mes", "ASC");
        return $this->db->get()->result_array();
    }

    public function get_demandas_sem_sucesso_por_mes()
    {
        // Gráfico de demandas encerradas sem sucesso por mês
        $this->db->select("DATE_FORMAT(data_inclusao, '%Y-%m') AS mes, COUNT(*) AS total");
        $this->db->from('demandas');
        $this->db->where('status', 'encerrado_sem_sucesso');
        $this->db->group_by("mes");
        $this->db->order_by("mes", "ASC");
        return $this->db->get()->result_array();
    }

    public function get_demandas_por_area()
    {
        // Gráfico de demandas por área via relacionamento indireto
        $this->db->select('areas.nome AS area, COUNT(demandas.id) AS total');
        $this->db->from('demandas');
        $this->db->join('membros', 'demandas.membro_id = membros.id', 'left');
        $this->db->join('instituicoes', 'membros.instituicao_id = instituicoes.id', 'left');
        $this->db->join('areas', 'instituicoes.area_id = areas.id', 'left');
        $this->db->group_by('areas.nome');
        $this->db->order_by('areas.nome', 'ASC');
        return $this->db->get()->result_array();
    }

    public function get_demandas_pendentes()
    {
        $this->db->where('status', 'aberto');
        return $this->db->get('demandas')->result_array();
    }

    public function add_demanda($data)
    {
        $this->db->insert('demandas', $data);
        return $this->db->insert_id();
    }

    public function update_demanda($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('demandas', $data);
        return $this->db->affected_rows();
    }

    public function delete_demanda($id)
    {
        $this->db->delete('demandas', ['id' => $id]);
        return $this->db->affected_rows();
    }
}
