<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Loja_tamanhos extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('loja/tamanhos_model');

        $this->set_menu_active(
            array(
                'menu' => 'site',
                'submenu' => 'Loja-produtos'
            )
        );
    }

    public function index()
    {
        $this->lista();
    }


    public function lista()
    {
        $data['tamanhos'] =  $this->tamanhos_model->get_tamanhos($this->input->get('id'));
        $data['produto'] =  $this->tamanhos_model->get_produto($this->input->get('id'));

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $data['id_produto'] = $this->input->get('id');

        $this->montaTela('loja/tamanhos/lista', $data);
    }

    function novo_tamanho(){



        $dados['tamanhos'] = $this->tamanhos_model->get_all_tamanhos();

        $dados['produto_id'] = $this->input->get('id');


        $this->montaTela('loja/tamanhos/formulario', $dados);
    }

    function criar_tamanho(){


        $this->set_menu_active(
            array(
                'menu' => 'site',
                'submenu' => 'loja-tamanho'
            )
        );

        $data = null;
        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('loja/tamanhos/formulario_tamanho', $data);
    }

    function salvar_tamanho(){
        if($this->input->post()){



            $dados = array(
                'tamanhos_id' => $this->input->post('tamanho'),
                'quantidade' => $this->input->post('quantidade'),

            );

            $id_produto = $this->input->post('id_produto');
            $id = NULL;

            //editar agenda
            if($this->input->post('id')){
                $id = $this->input->post('id');
            }elseif($this->input->post('produto_novo')) {
                $dados['produtos_id'] = $this->input->post('produto_novo');
                $id_produto = $this->input->post('produto_novo');
            }


            if($this->tamanhos_model->salvar_tamanho($dados, $id))
            {
                $_GET['type'] = 'success';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'tamanho atualizada com sucesso!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'tamanho cadastrada com sucesso!';
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar a tamanho!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar a tamanho!';
                }
            }
            $_GET['id'] = $id_produto;
            $this->lista();
            $url = base_url('loja').'/tamanhos?id='.$id_produto;

            $this->output->append_output('<script>window.history.replaceState("", "Acrilmoc", "'. $url .'")</script>');
        }
    }

    public function salvar_novo_tamanho(){


    $dados['tamanho'] = $this->input->post('tamanho');

      if($this->tamanhos_model->salvar_novo_tamanho($dados))
      {
        $_GET['type'] = 'success';
      
            $_GET['title'] = 'Cadastro';
            $_GET['message'] = 'tamanho inserido com sucesso!';
        
    }
    else
    {
        $_GET['type'] = 'error';
        if($id){
            $_GET['title'] = 'Atualização';
            $_GET['message'] = 'Ocorreu um erro ao atualizar a tamanho!';
        }else{
            $_GET['title'] = 'Cadastro';
            $_GET['message'] = 'Ocorreu um erro ao cadastrar a tamanho!';
        }
    }
   
    $this->criar_tamanho();
    $url = base_url('loja/criar-tamanho');
    $this->output->append_output('<script>window.history.replaceState("", "IEA", "'. $url .'")</script>');
}


public function editar_tamanho()
{
    if($this->input->get('id')){
        $dados['tamanho'] = $this->tamanhos_model->get_tamanho($this->input->get('id'));
        $dados['tamanhos'] = $this->tamanhos_model->get_all_tamanhos();
        $this->montaTela('loja/tamanhos/formulario', $dados);
    }
}

function excluir_tamanho(){
    if ($this->input->post('id')) {

        if($this->tamanhos_model->excluir_tamanho($this->input->post('id'))){

            $response['type'] = 'success';
            $response['title'] = 'Exclusão';
            $response['message'] = 'tamanho excluída com sucesso!';
            echo json_encode($response);
        }else{
            $response['type'] = 'error';
            $response['title'] = 'Exclusão';
            $response['message'] = 'Ocorreu um erro ao excluír a tamanho!';
            echo json_encode($response);
        }
    }
    return;
}

}