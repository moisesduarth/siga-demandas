<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Forma_pagamento_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get forma_pagamento by ID_Forma_Pagamento
     */
    function get_forma_pagamento($ID_Forma_Pagamento)
    {
        return $this->db->get_where('forma_pagamento',array('ID_Forma_Pagamento'=>$ID_Forma_Pagamento))->row_array();
    }
        
    /*
     * Get all forma_pagamento
     */
    function get_all_forma_pagamento()
    {
        $this->db->where('Deleted', '0');
        $this->db->order_by('ID_Forma_Pagamento', 'asc');
        return $this->db->get('forma_pagamento')->result_array();
    }
        
    /*
     * function to add new forma_pagamento
     */
    function add_forma_pagamento($params)
    {
        $this->db->insert('forma_pagamento',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update forma_pagamento
     */
    function update_forma_pagamento($ID_Forma_Pagamento,$params)
    {
        $this->db->where('ID_Forma_Pagamento',$ID_Forma_Pagamento);
        return $this->db->update('forma_pagamento',$params);
    }
    
    /*
     * function to delete forma_pagamento
     */
    function delete_forma_pagamento($ID_Forma_Pagamento)
    {
        return $this->db->delete('forma_pagamento',array('ID_Forma_Pagamento'=>$ID_Forma_Pagamento));
    }
}
