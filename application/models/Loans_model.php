<?php
class Loans_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_all_loans()
    {
        $this->db->select('loans.*, membros.nome as membro_nome, users.username as user_nome');
        $this->db->join('membros', 'membros.id = loans.membro_id');
        $this->db->join('users', 'users.id = loans.user_id');
        $this->db->order_by('loans.id', 'desc');
        return $this->db->get('loans')->result_array();
    }

    function add_loan($params)
    {
        $this->db->insert('loans', $params);
        return $this->db->insert_id();
    }

    function get_loan($id)
    {
        return $this->db->get_where('loans', ['id' => $id])->row_array();
    }

    function delete_loan($id)
    {
        return $this->db->delete('loans', ['id' => $id]);
    }
}
