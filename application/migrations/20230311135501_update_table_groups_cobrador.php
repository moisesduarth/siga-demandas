<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Migration_Update_Table_Groups_Cobrador
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Migration_Update_Table_Groups_Cobrador extends CI_Migration {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
    }

    public function up()
    {	
        $this->ion_auth->update_group(1, 'admin', 'Administradores');
        $this->ion_auth->update_group(2, 'cobrador', 'Cobradores');
        $this->ion_auth->update_group(3, 'operador', 'Operadores');
    }

    public function down()
    {
        $this->ion_auth->update_group(1, 'admin', 'Administrador');
        $this->ion_auth->update_group(2, 'pcp', 'PCP');
        $this->ion_auth->update_group(3, 'operador', 'Operador');
    }

}