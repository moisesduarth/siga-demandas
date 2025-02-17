<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Pagamento_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Copiar este método em todas as models onde necessitar de filtros
     * TODO: Tentar tornar isso generico (numa espécie de model genérica)
     */
    function tratar_filtro($filtro = array()) {

        #Eliminar todos registros sem valor do array
        $filtro = array_filter($filtro, 'strlen');

        #Percorrer apenas as chaves e valores que restaram após eliminar os vazios
        foreach ($filtro as $campo => $valor) {

            #Se o nome do campo iniciar com Data iremos fazer um Data Range (ou seja: Campo BETWEEN Valor1 AND Valor2)
            if (substr($campo,0,4)=='Data') {

                #Divide o valor (espera receber duas datas separados por traço tipo: 10/10/2019 - 20/10/2019)
                $datas = explode('-', $valor);
                $data1 = formataData(ltrim(rtrim($datas[0])));
                $data2 = formataData(ltrim(rtrim($datas[1])));

                $this->db->where($campo . '>=', $data1 . ' 00:00:00');
                $this->db->where($campo . '<=', $data2 . ' 23:59:59');

            } else if (substr($campo,0,4)=='Nome') {

                $this->db->like($campo, $valor);

            } else if (substr($campo,0,6)=='Status' || strpos($campo, 'Total') !== false || strpos($campo, 'Valor') !== false) {

                $this->db->where($campo, $valor);

            } else if ($campo == 'Ano_Mes_Pagamento') {

                $this->db->where('DATE_FORMAT(pagamento.Data_Pagamento, "%m-%Y")="'.$valor.'"');

            } else {

                $this->db->like($campo, $valor);
                
            }

            // $this->db->where($campo, $valor);
        }
       

    }
    
    /*
     * Get pagamento by ID_Pagamento
     */
    function get_pagamento($ID_Pagamento)
    {
        $this->db->join('emprestimo','emprestimo.ID_Emprestimo = pagamento.ID_Emprestimo','inner');
        $this->db->join('investidor','emprestimo.ID_Investidor = investidor.ID_Investidor','inner');
        return $this->db->get_where('pagamento',array('ID_Pagamento'=>$ID_Pagamento))->row_array();
    }
    
    /*
     * Get all pagamento count
     */
    function get_all_pagamento_count($params = array())
    {
        $this->db->join('emprestimo','emprestimo.ID_Emprestimo = pagamento.ID_Emprestimo','inner');
        $this->db->join('investidor','emprestimo.ID_Investidor = investidor.ID_Investidor','inner');
        $this->db->from('pagamento');

        //Sempre que se desejar adicionar filtro a uma consulta (model), este snnipet deve ser adicionado
        if (isset($params['filtro'])) {
            $this->tratar_filtro($params['filtro']);
        }

        $this->db->where('pagamento.Valor_Pago > 0');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all pagamento
     */
    function get_all_pagamento($params = array())
    {
        $this->db->join('emprestimo','emprestimo.ID_Emprestimo = pagamento.ID_Emprestimo','inner');
        $this->db->join('investidor','emprestimo.ID_Investidor = investidor.ID_Investidor','inner');
        $this->db->order_by('Nome_Investidor', 'asc');

        //Sempre que se desejar adicionar filtro a uma consulta (model), este snnipet deve ser adicionado
        if (isset($params['filtro'])) {
            $this->tratar_filtro($params['filtro']);
        }

        //Sempre que for utilizar filtros deve-se checar a existência das chaves limit e offset no array $params
        if(isset($params) && !empty($params) && array_key_exists('limit',$params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }

        $this->db->where('pagamento.Valor_Pago > 0');
        return $this->db->get('pagamento')->result_array();
    }

    function get_all_last_pagamento($limit = 100)
    {
        $this->db->join('emprestimo','emprestimo.ID_Emprestimo = pagamento.ID_Emprestimo','inner');
        $this->db->join('investidor','emprestimo.ID_Investidor = investidor.ID_Investidor','inner');

        $this->db->where('pagamento.Valor_Pago > 0');
        
        $this->db->order_by('Nome_Investidor', 'asc');
        $this->db->limit($limit);

        return $this->db->get('pagamento')->result_array();
    }

    function get_total_pago_by_emprestimo($ID_Emprestimo) {

        $this->db->select_sum('Valor_Pago');
        $objeto = $this->db->get_where('pagamento',array('ID_Emprestimo'=>$ID_Emprestimo))->row_array();

        return $objeto['Valor_Pago'];
    }

    function get_total_pagamento() {

        $this->db->select_sum('Valor_Pago');
        $objeto = $this->db->get('pagamento')->row_array();

        return $objeto['Valor_Pago'];
    }
        
    /*
     * function to add new pagamento
     */
    function add_pagamento($params)
    {
        $this->db->insert('pagamento',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update pagamento
     */
    function update_pagamento($ID_Pagamento,$params)
    {
        $this->db->where('ID_Pagamento',$ID_Pagamento);
        return $this->db->update('pagamento',$params);
    }
    
    /*
     * function to delete pagamento
     */
    function delete_pagamento($ID_Pagamento)
    {
        return $this->db->delete('pagamento',array('ID_Pagamento'=>$ID_Pagamento));
    }

    function delete_pagamento_by_emprestimo($ID_Emprestimo)
    {
        return $this->db->delete('pagamento',array('ID_Emprestimo'=>$ID_Emprestimo));
    }
}
