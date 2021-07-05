<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Loja_promocoes_slides extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('loja/promocoes_slides_model');

        $this->set_menu_active(
                            array(
                                'menu' => 'conteudo',
                                'submenu' => 'site-promo3'
                                )
                            );
    }

    public function index()
    {
        $this->lista();
    }


    public function lista()
    {
        $data['promocoes_slides'] =  $this->promocoes_slides_model->get_promocoes_slides();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('loja/promocoes_slides/lista', $data);
    }

    function novo_promocao(){
        $this->montaTela('loja/promocoes_slides/formulario');
    }

    function salvar_promocao(){

        if($this->input->post()){


            $dados = array(
                'titulo' => $this->input->post('titulo'),
                'descricao' => $this->input->post('descricao'),
                'icone' => $this->input->post('icone'),

            );
            $id = NULL;

            //editar agenda
            if($this->input->post('id')){
                $id = $this->input->post('id');
            }

            if($this->promocoes_slides_model->salvar_promocao($dados, $id))
            {
                $_GET['type'] = 'success';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Categoria atualizada com sucesso!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Categoria cadastrada com sucesso!';
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar a promocao!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar a promocao!';
                }
            }
            $this->lista();
            $url = base_url(array('loja/promocoes-slides'));
            $this->output->append_output('<script>window.history.replaceState("", "swe", "'. $url .'")</script>');
        }
    }

    public function editar_promocao()
    {
        if($this->input->get('id')){
            $dados['promocao_slides'] = $this->promocoes_slides_model->get_promocao($this->input->get('id'));
          
            $this->montaTela('loja/promocoes_slides/formulario', $dados);
        }
    }

    function excluir_promocao(){
        if ($this->input->post('id')) {

            if($this->promocoes_slides_model->excluir_promocao($this->input->post('id'))){

                $response['type'] = 'success';
                $response['title'] = 'Exclusão';
                $response['message'] = 'Categoria excluída com sucesso!';
                echo json_encode($response);
            }else{
                $response['type'] = 'error';
                $response['title'] = 'Exclusão';
                $response['message'] = 'Ocorreu um erro ao excluír a promocao!';
                echo json_encode($response);
            }
        }
        return;
    }

}
