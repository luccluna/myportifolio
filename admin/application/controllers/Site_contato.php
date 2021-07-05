<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_contato extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('site/contato_model');

        $this->set_menu_active(
                            array(
                                'menu' => 'conteudo',
                                'submenu' => 'site-contato'
                                )
                            );
    }

    public function index()
    {
        $data['contato'] = $this->contato_model->get_contato();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }


        $this->montaTela('site/contato/formulario', $data);
    }

    function salvar_contato(){

        if($this->input->post()){
            $dados = array(
                'cidade' => $this->input->post('cidade'),
                'endereco' => $this->input->post('endereco'),
                'cep' => $this->input->post('cep'),
                'telefone1' => $this->input->post('telefone1'),
                'telefone2' => $this->input->post('telefone2'),
                'email' => $this->input->post('email'),
                'facebook' => $this->input->post('facebook'),
                'instagram' => $this->input->post('instagram'),
            );

            $id = NULL;

            //editar agenda
            if($this->input->post('id')){
                $id = $this->input->post('id');
            }

            if($this->contato_model->salvar_contato($dados, $id))
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
                    $_GET['message'] = 'Ocorreu um erro ao atualizar o contato!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar o contato!';
                }
            }
            $this->index();
            $url = base_url(array('site', 'contato'));
            $this->output->append_output('<script>window.history.replaceState("", "Acrilmoc", "'. $url .'")</script>');
        }
    }
}
