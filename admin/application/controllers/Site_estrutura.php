<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_estrutura extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('site/estrutura_model');

        $this->set_menu_active(
            array(
                'menu' => 'conteudo',
                'submenu' => 'site-estrutura'
            )
        );
    }

    public function index()
    {
        $this->lista();
    }


    public function lista()
    {
        $data['categorias'] =  $this->estrutura_model->get_estruturas();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/estrutura/lista', $data);
    }

    function novo_estrutura(){
        $this->montaTela('site/estrutura/formulario');
    }

    function salvar_estrutura(){
        if($this->input->post()){

            $dados = array(
                'nome' => $this->input->post('nome'),
                'rgb' => $this->input->post('rgb'),
            );

            $id = NULL;

            //editar agenda
            if($this->input->post('id')){
                $id = $this->input->post('id');
            }

            if($this->estrutura_model->salvar_estrutura($dados, $id))
            {
                $_GET['type'] = 'success';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'categoria atualizado com sucesso!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'categoria cadastrado com sucesso!';
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar a categoria!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar a categoria!';
                }
            }
            $this->lista();
            $url = base_url(array('site'));
            $this->output->append_output('<script>window.history.replaceState("", "SWE", "'. $url .'")</script>');
        }
    }

    public function editar_estrutura()
    {
        if($this->input->get('id')){
            $dados['categorias'] = $this->estrutura_model->get_estrutura($this->input->get('id'));
            $this->montaTela('site/estrutura/formulario', $dados);
        }
    }

    function excluir_estrutura(){
        if ($this->input->post('id')) {
            $estrutura = $this->estrutura_model->get_estrutura($this->input->post('id'));
            if($this->estrutura_model->excluir_estrutura($this->input->post('id'))){

                $response['type'] = 'success';
                $response['title'] = 'Exclusão';
                $response['message'] = 'estrutura excluído com sucesso!';
                echo json_encode($response);
            }else{
                $response['type'] = 'error';
                $response['title'] = 'Exclusão';
                $response['message'] = 'Ocorreu um erro ao excluír o estrutura!';
                echo json_encode($response);
            }
        }
        return;
    }






}
