<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Denuncias extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('denuncias/Denuncias_model');

        $this->set_menu_active(
                            array(
                                'menu' => 'site',
                                'submenu' => 'denuncias'
                                )
                            );
    }

    public function lista()
    {
        $data['tipos'] = $this->Denuncias_model->get_tipos_denuncias();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/denuncias/lista', $data);
    }

     public function lista_denuncias()
    {
        $data['denuncias'] = $this->Denuncias_model->get_denuncias();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/denuncias/lista-denuncias', $data);
    }

    
    public function tela_novo_tipo(){

        $this->montaTela('site/denuncias/formulario');
    }
    
    public function tela_editar_tipo(){
        $data['tipo'] = $this->Denuncias_model->get_tipo($this->input->get('id'));

        $this->montaTela('site/denuncias/formulario', $data);
    }

    public function salvar_novo_tipo(){

        if($this->input->post('titulo')){
        $data['nome_tipo_denuncia'] = $this->input->post('titulo');

        if($this->input->post('id')){

                if($this->Denuncias_model->salvar_tipo_denuncia($data, $this->input->post('id'))){
                $_GET['type'] = 'success';
                $_GET['title'] = 'Cadastro';
                $_GET['message'] = 'Novo tipo de denúnica cadastrada com sucesso!';
            }else{

                $_GET['type'] = 'error';
                $_GET['title'] = 'Cadastro';
                $_GET['message'] = 'Ocorreu um erro ao cadastrar o novo tipo!';    
        }

        }else{

            if($this->Denuncias_model->salvar_tipo_denuncia($data)){
                $_GET['type'] = 'success';
                $_GET['title'] = 'Cadastro';
                $_GET['message'] = 'Novo tipo de denúnica cadastrada com sucesso!';
            }else{

                $_GET['type'] = 'error';
                $_GET['title'] = 'Cadastro';
                $_GET['message'] = 'Ocorreu um erro ao cadastrar o novo tipo!';    
        }

                }



        }else{

                $_GET['type'] = 'error';
                $_GET['title'] = 'Cadastro';
                $_GET['message'] = 'Ocorreu um erro ao cadastrar o novo tipo!';    
        }
            $this->lista();
            $url = base_url(array('site', 'denuncias'));
            $this->output->append_output('<script>window.history.replaceState("", "Meritus", "'. $url .'")</script>');        
    
        }
        


    public function salvar_editar_tipo(){

        if($this->input->post('titulo')){
            $id['id'] = $this->input->get('id');


        $data['nome_tipo_denuncia'] = $this->input->post('titulo');
            if($this->Denuncias_model->salvar_tipo_denuncia($data))

                $_GET['type'] = 'success';
                $_GET['title'] = 'Cadastro';
                $_GET['message'] = 'Novo tipo de denúnica cadastrada com sucesso!';
        }else{

                $_GET['type'] = 'error';
                $_GET['title'] = 'Cadastro';
                $_GET['message'] = 'Ocorreu um erro ao cadastrar o novo tipo!';    
        }
            $this->lista();
            $url = base_url(array('site', 'denuncias'));
            $this->output->append_output('<script>window.history.replaceState("", "Meritus", "'. $url .'")</script>');        
    
        }


    }








