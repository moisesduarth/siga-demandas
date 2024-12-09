<?php
class Areas_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_all_areas()
    {
        $this->db->select('areas.*, membros.nome as lider_nome');
        $this->db->join('membros', 'areas.lider_id = membros.id', 'left');
        $this->db->order_by('id', 'desc');
        return $this->db->get('areas')->result_array();
    }

    function get_area($id)
    {
        return $this->db->get_where('areas', ['id' => $id])->row_array();
    }

    public function get_total_areas() {
        return $this->db->count_all('areas');
    }    

    function add_area($params)
    {
        $this->db->insert('areas', $params);
        return $this->db->insert_id();
    }

    function update_area($id, $params)
    {
        $this->db->where('id', $id);
        return $this->db->update('areas', $params);
    }

    function delete_area($id)
    {
        return $this->db->delete('areas', ['id' => $id]);
    }
}

