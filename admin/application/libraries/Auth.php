<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth {

    var $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->verifica_sessao();
    }

    public function verifica_sessao()
    {
        $_login_routes = array(
            'Admin/index',
            'Admin/login',
            'Admin/validar_login'
        );

        if(!$this->CI->session->userdata('usuario')){
            $base_url = config_item('base_url');
            $uri = $this->CI->router->class.'/'.$this->CI->router->method;
            if ( ! in_array($uri, $_login_routes))
            {
                redirect($base_url,'refresh');
            }
        }
    }

    public function get_id_usuario()
    {
        return $this->CI->session->userdata('usuario')->idusuario;
    }

    public function get_email_usuario()
    {
        return $this->CI->session->userdata('usuario')->email;
    }

    public function get_nome_usuario()
    {
        return $this->CI->session->userdata('usuario')->nome;
    }
    
}