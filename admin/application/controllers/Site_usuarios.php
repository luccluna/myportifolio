<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_usuarios extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('site/usuarios_model');

        $this->set_menu_active(
            array(
                'menu' => 'conteudo',
                'submenu' => 'site-usuarios'
            )
        );
    }

    public function index()
    {
        $this->lista();
    }


    public function lista()
    {

      $data['usuarios'] =  $this->usuarios_model->get_usuarios();
      if($this->input->get('type')){
        $notification = new stdClass;
        $notification->type = $this->input->get('type');
        $notification->title = $this->input->get('title');
        $notification->message = $this->input->get('message');
        $data['notification'] = $notification;
    }
    $this->montaTela('site/usuarios/lista', $data);
}

public function nova()
{


    $this->montaTela('site/usuarios/usuarios');
}

public function conteudo()
{

    $dados['usuario'] = $this->usuarios_model->get_usuario();

    $this->montaTela('site/usuarios/conteudo',$dados);
}



function salvar_usuario(){

    $this->load->helper('text');

    if($this->input->post()){
        $dados = array(
            'nome' => $this->input->post('nome'),
            'cpf' => $this->input->post('cpf'),
            'email' => $this->input->post('email'),
            'senha' => md5($this->input->post('senha'))
        );

        $id = NULL;

        if ($this->input->post('id')) {
            $id = $this->input->post('id');
            if ($this->input->post('senha')) {
                $dados = array(
                    'nome' => $this->input->post('nome'),
                    'cpf' => $this->input->post('cpf'),
                    'email' => $this->input->post('email'),
                    'senha' => md5($this->input->post('senha'))
                );
                
            }else{
                $dados = array(
                    'nome' => $this->input->post('nome'),
                    'cpf' => $this->input->post('cpf'),
                    'email' => $this->input->post('email'),

                );
            }



            if($this->usuarios_model->salvar_usuario($dados, $id))
            {
                $_GET['type'] = 'success';
                if ($id) {
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Usuário atualizado com Sucesso!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Usuário cadastrado com Sucesso!';
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar o contato!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar o contato!';
                }
            }
            $this->lista();

            $url = base_url(array('site', 'usuarios'));
            $this->output->append_output('<script>window.history.replaceState("", "Lamitié", "'. $url .'")</script>');  

        }else{


            if($this->usuarios_model->salvar_usuario($dados, $id))
            {
                $_GET['type'] = 'success';
                if ($id) {
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Usuário atualizado com Sucesso!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Usuário cadastrado com Sucesso!';
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar o contato!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar o contato!';
                }
            }
            $this->lista();

            $url = base_url(array('site', 'usuarios'));
            $this->output->append_output('<script>window.history.replaceState("", "Lamitié", "'. $url .'")</script>');  
        }
    }
}


public function excluir(){

    if ($id = $this->input->post('id')) {

        $usuario = $this->usuarios_model->get_usuario($id);
        if ($this->usuarios_model->delete_usuario($id)) {
            $response['type'] = 'success';
            $response['title'] = 'Exclusão';
            $response['message'] = 'Usuario excluído com sucesso!';
            echo json_encode($response);
        }else{
            $response['type'] = 'error';
            $response['title'] = 'Exclusão';
            $response['message'] = 'Ocorreu um erro ao excluír o usuario!';
            echo json_encode($response);
        }
    }
}


public function editar_usuario()
{

    if($this->input->get('id')){
        $dados['usuario'] = $this->usuarios_model->get_usuario($this->input->get('id'));
        $this->montaTela('site/usuarios/usuarios', $dados);
    }
}









}
