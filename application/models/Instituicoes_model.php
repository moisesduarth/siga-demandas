<?php
class Instituicoes_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_instituicoes()
    {
        $this->db->select('instituicoes.*, areas.nome as area_nome, membros.nome as lider_nome');
        $this->db->from('instituicoes');
        $this->db->join('areas', 'instituicoes.area_id = areas.id', 'left');
        $this->db->join('membros', 'instituicoes.lider_id = membros.id', 'left');
        $this->db->order_by('instituicoes.id', 'desc');
        return $this->db->get()->result_array();
    }

    public function get_instituicao($id)
    {
        return $this->db->get_where('instituicoes', ['id' => $id])->row_array();
    }

    public function get_total_instituicoes() {
        return $this->db->count_all('instituicoes');
    }    

    public function add_instituicao($data)
    {
        $this->db->insert('instituicoes', $data);
        return $this->db->insert_id();
    }

    public function update_instituicao($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('instituicoes', $data);
    }

    public function delete_instituicao($id)
    {
        return $this->db->delete('instituicoes', ['id' => $id]);
    }
}
