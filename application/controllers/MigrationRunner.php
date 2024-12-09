<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MigrationRunner extends CI_Controller {

    public function __construct()
    {

        parent::__construct();

        // Carregue a biblioteca Migration apenas uma vez
        $this->load->library('migration');
        
    }

    public function run()
    {
        if ($this->migration->current() === FALSE) {
            show_error($this->migration->error_string());
        } else {
            echo "Migração aplicada com sucesso.";
        }
    }
}
