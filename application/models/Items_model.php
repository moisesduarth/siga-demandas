<?php
class Items_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_all_items()
    {
        return $this->db->get('items')->result_array();
    }

    function get_item($id)
    {
        return $this->db->get_where('items', ['id' => $id])->row_array();
    }

    function add_item($params)
    {
        $this->db->insert('items', $params);
        return $this->db->insert_id();
    }

    function update_item($id, $params)
    {
        $this->db->where('id', $id);
        return $this->db->update('items', $params);
    }

    function delete_item($id)
    {
        return $this->db->delete('items', ['id' => $id]);
    }

    function update_item_stock($id, $quantityChange)
    {
        $this->db->set('quantidade_estoque', 'quantidade_estoque + ' . $quantityChange, false);
        $this->db->where('id', $id);
        $this->db->update('items');
    }
}
