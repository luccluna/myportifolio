<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth {

    var $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->verifica_sessao();


        if(!$this->existe_sessao()){

            if(get_cookie('login')){

             $this->CI->load->model('loja_model');

             $sessao = $this->CI->site_model->get_perfil_by_token(get_cookie('login'));
             $perfil['id'] =  $sessao->id;
             $perfil['nome'] =  $sessao->nome;
             $perfil['sexo'] =  $sessao->sexo;
             $perfil['tipo'] =  $sessao->tipo;
             $perfil['email'] =  $sessao->email;
             $perfil['foto_perfil'] =  $sessao->foto_perfil;
            //var_dump($perfil);exit;
             $perfil = (object) $perfil;

             $this->criar_sessao($perfil);

         }
     }
 }

 public function verifica_sessao()
 {
    $_login_routes = array(
        'meus_pedidos',
        'finalizar',
        'fechar_pedido',
        'meus_dados',
        'perfil_instituto_IEA',
        'editar_perfil',
        'salvar_editar_perfil',
        'pedido_detalhes',
        'pedido_finalizado',
        'tranferencia_pag'
        );



    if(!$this->CI->session->userdata('perfil_instituto_IEA')){
        $base_url = config_item('base_url').'login';

        $uri = $this->CI->router->method;

        if (in_array($uri, $_login_routes))
        {
            redirect($base_url);
        }
    }
}


public function criar_sessao($dados)
{
    $this->CI->session->set_userdata('perfil_instituto_IEA', $dados);
}

public function atualizar_sessao()
{


    $this->CI->session->set_userdata('perfil_instituto_IEA', $this->CI->loja_model->atualizar_sessao($this->get_id_perfil()));
}

public function destruir_sessao()
{
    unset($_SESSION['perfil_instituto_IEA']);
}

public function existe_sessao()
{
    if($this->CI->session->userdata('perfil_instituto_IEA')){
        return TRUE;
    }else{
        return FALSE;
    }
}

public function get_id_perfil()
{
    return $this->CI->session->userdata('perfil_instituto_IEA')->id;
}

public function get_email_perfil()
{
    return $this->CI->session->userdata('perfil_instituto_IEA')->email;
}

public function get_nome_perfil()
{
    return $this->CI->session->userdata('perfil_instituto_IEA')->nome;
}

public function get_sexo_perfil()
{
    return $this->CI->session->userdata('perfil_instituto_IEA')->sexo;
}

public function get_foto_perfil()
{
    return $this->CI->session->userdata('perfil_instituto_IEA')->foto_perfil;
}

public function get_foto_capa()
{
    return $this->CI->session->userdata('perfil_instituto_IEA')->foto_capa;
}

public function get_tipo_perfil()
{
    return $this->CI->session->userdata('perfil_instituto_IEA')->tipo;
}

// public function get_nome_sobrenome()
// {


//     $nome = $this->CI->session->userdata('perfil_instituto_IEA')->primeiro_nome.' '.$this->CI->session->userdata('perfil_instituto_IEA')->ultimo_nome;

//     return  $nome;
// }

// public function get_primeiro_nome()
// {


//     $primeiro_nome = $this->CI->session->userdata('perfil_instituto_IEA')->primeiro_nome;
//     $nome = explode(' ',$primeiro_nome);


//     return  $nome[0];
// }
}
