<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Transparencia extends TEC_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('transparencia_model');
    }

    public function tranferencia_pag(){
    	

 
        $transparencia = $this->transparencia_model->get_transparencias();
       




        $this->montaTela('site/transparencia/pagina', compact('transparencia'));

    }



}
