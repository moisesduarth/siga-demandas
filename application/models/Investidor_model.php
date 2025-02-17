<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Investidor_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get investidor by ID_Investidor
     */
    function get_investidor($ID_Investidor)
    {
        return $this->db->get_where('investidor',array('ID_Investidor'=>$ID_Investidor))->row_array();
    }
    
    /*
     * Get all investidor count
     */
    function get_all_investidor_count()
    {
        $this->db->from('investidor');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all investidor
     */
    function get_all_investidor($params = array())
    {
        $this->db->order_by('ID_Investidor', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('investidor')->result_array();
    }

    function get_all_cidades()
    {
        $this->db->distinct();
        $this->db->select('Cidade');
        $this->db->order_by('Cidade', 'asc');
        return $this->db->get('investidor')->result_array();
    }
        
    /*
     * function to add new investidor
     */
    function add_investidor($params)
    {
        $this->db->insert('investidor',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update investidor
     */
    function update_investidor($ID_Investidor,$params)
    {
        $this->db->where('ID_Investidor',$ID_Investidor);
        return $this->db->update('investidor',$params);
    }
    
    /*
     * function to delete investidor
     */
    function delete_investidor($ID_Investidor)
    {
        return $this->db->delete('investidor',array('ID_Investidor'=>$ID_Investidor));
    }
}
