<?php
class Loans_items_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function add_loan_item($params)
    {
        $this->db->insert('loan_items', $params);
    }

    function get_items_by_loan($loan_id)
    {
        $this->db->select('loan_items.*, items.nome as item_nome, assets.numero_ativo, assets.numero_serie');
        $this->db->join('items', 'items.id = loan_items.item_id');
        $this->db->join('assets', 'assets.id = loan_items.asset_id', 'left');
        $this->db->where('loan_items.loan_id', $loan_id);
        return $this->db->get('loan_items')->result_array();
    }
}
