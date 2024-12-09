<?php
class Membros_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_all_membros()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('membros')->result_array();
    }

    function get_membro($id)
    {
        return $this->db->get_where('membros', ['id' => $id])->row_array();
    }

    public function get_total_membros() {
        return $this->db->count_all('membros');
    }
    
    public function get_membros_por_area()
    {
        // Gráfico de membros por área via relacionamento indireto
        $this->db->select('areas.nome AS area, COUNT(membros.id) AS total');
        $this->db->from('membros');
        $this->db->join('instituicoes', 'membros.instituicao_id = instituicoes.id', 'left');
        $this->db->join('areas', 'instituicoes.area_id = areas.id', 'left');
        $this->db->group_by('areas.nome');
        $this->db->order_by('areas.nome', 'ASC');
        return $this->db->get()->result_array();
    }

    function add_membro($params)
    {
        $this->db->insert('membros', $params);
        return $this->db->insert_id();
    }

    function update_membro($id, $params)
    {
        $this->db->where('id', $id);
        return $this->db->update('membros', $params);
    }

    function delete_membro($id)
    {
        return $this->db->delete('membros', ['id' => $id]);
    }
}

