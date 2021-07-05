<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TEC_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function set_menu_active($menu='')
    {
        $this->active_menu = $menu;
    }

    //recebe a url da pagina para ser adicionada no conteudo
    public function montaTela($paginaConteudo, $data = NULL)
    {
        $data['active_menu'] = $this->active_menu;
        $this->load->view('includes/header', $data);
        $this->load->view($paginaConteudo);
        $this->load->view('includes/footer');
    }
}
