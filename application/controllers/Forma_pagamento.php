<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Forma_pagamento extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Forma_pagamento_model');
    } 

    /*
     * Listing of forma_pagamento
     */
    function index()
    {
        $data['forma_pagamento'] = $this->Forma_pagamento_model->get_all_forma_pagamento();
        
        $data['_view'] = 'forma_pagamento/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new forma_pagamento
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'Descricao_Forma_Pagamento' => $this->input->post('Descricao_Forma_Pagamento'),
				'ID_User_Create' => $this->session->userdata['user_id'],
                'Date_Created' => Date('Y/m/d H:i:s'),
                'ID_User_Update' => $this->session->userdata['user_id'],
                'Date_Updated' => Date('Y/m/d H:i:s'),
				'Deleted' => 0,
            );
            
            $forma_pagamento_id = $this->Forma_pagamento_model->add_forma_pagamento($params);
            redirect('forma_pagamento/index');
        }
        else
        {            
            $data['_view'] = 'forma_pagamento/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a forma_pagamento
     */
    function edit($ID_Forma_Pagamento)
    {   
        // check if the forma_pagamento exists before trying to edit it
        $data['forma_pagamento'] = $this->Forma_pagamento_model->get_forma_pagamento($ID_Forma_Pagamento);
        
        if(isset($data['forma_pagamento']['ID_Forma_Pagamento']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'Descricao_Forma_Pagamento' => $this->input->post('Descricao_Forma_Pagamento'),
                    'ID_User_Update' => $this->session->userdata['user_id'],
                    'Date_Updated' => Date('Y/m/d H:i:s'),
                );

                $this->Forma_pagamento_model->update_forma_pagamento($ID_Forma_Pagamento,$params);            
                redirect('forma_pagamento/index');
            }
            else
            {
                $data['_view'] = 'forma_pagamento/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('A forma de pagamento que você está tentando acessar não existe.');
    } 

    /*
     * Deleting forma_pagamento
     */
    function remove($ID_Forma_Pagamento)
    {
        $forma_pagamento = $this->Forma_pagamento_model->get_forma_pagamento($ID_Forma_Pagamento);

        // check if the forma_pagamento exists before trying to delete it
        if(isset($forma_pagamento['ID_Forma_Pagamento']))
        {
            $params = array(
                'Deleted' => '1',
                'ID_User_Update' => $this->session->userdata['user_id'],
                'Date_Updated' => Date('Y/m/d H:i:s'),
            );
            $this->Forma_pagamento_model->update_forma_pagamento($ID_Forma_Pagamento,$params);   

            redirect('forma_pagamento/index');
        }
        else
            show_error('A forma de pagamento que você está tentando deletar não existe.');
    }
    
}
