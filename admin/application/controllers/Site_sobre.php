<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_sobre extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('site/sobre_model');

        $this->set_menu_active(
                            array(
                                'menu' => 'conteudo',
                                'submenu' => 'site-sobre'
                                )
                            );
    }

    public function index()
    {
        $data['sobre'] = $this->sobre_model->get_sobre();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/sobre/formulario', $data);
    }

    function salvar_sobre(){
        if($this->input->post()){
            $dados = array(
                'sobre' => $this->input->post('texto')
            );

            $id = NULL;

            //editar agenda
            if($this->input->post('id')){
                $id = $this->input->post('id');
            }

            if($this->sobre_model->salvar_sobre($dados, $id))
            {
                $_GET['type'] = 'success';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Sobre atualizado com sucesso!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Sobre cadastrado com sucesso!';
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar o sobre!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar o sobre!';
                }
            }
            $this->index();
            $url = base_url(array('site', 'sobre'));
            $this->output->append_output('<script>window.history.replaceState("", "Acrilmoc", "'. $url .'")</script>');
        }
    }
}
