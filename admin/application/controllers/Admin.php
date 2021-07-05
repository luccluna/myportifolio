<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('loja/pedidos_model');
        $this->set_menu_active(
            array(
                'menu' => 'loja',
                'submenu' => 'loja-pedidos'
            )
        );
    }

    public function index(){
        $this->login();
    }

    public function login(){
        $data = array();
        if($this->input->get('error'))
            $data['error'] = TRUE;
        $this->load->view('auth/formulario_login', $data);
    }

    public function validar_login()
    {
        if($this->input->post()){
            if($user = $this->admin_model->validar_login($this->input->post('cpf'), md5($this->input->post('senha')))){
                $this->session->set_userdata('usuario', $user);
                redirect(base_url('home'),'refresh');
            }
        }
        $_GET['error'] = 'true';
        $this->login();
        $url = base_url(array('login'));
        $this->output->append_output('<script>window.history.replaceState("", "Sistema Agenda", "'. $url .'")</script>');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->login();
        $url = base_url(array('login'));
        $this->output->append_output('<script>window.history.replaceState("", "Sistema Agenda", "'. $url .'")</script>');
    }

    public function home(){

      /*$data['pedidos'] =  $this->pedidos_model->get_pedidos();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }
        //var_dump($data); exit;
        $this->montaTela('pedidos/lista', $data);*/ 
        redirect('/site/noticias/');

    }
}
