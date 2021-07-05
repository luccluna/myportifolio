<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Filtro_palavrao extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('filtro_palavrao/Filtro_palavrao_model');

        $this->set_menu_active(
                            array(
                                'menu' => 'site',
                                'submenu' => 'Filtro_palavrao'
                                )
                            );
    }

    public function lista()
    {
        $data['palavroes'] = $this->Filtro_palavrao_model->get_palavras_feias();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/filtro_palavrao/lista',$data);

    }


    
    public function nova_palavra(){

        $this->montaTela('site/filtro_palavrao/formulario');
    }
    
    public function editar_palavra(){
        $data['palavra'] = $this->Filtro_palavrao_model->get_palavra($this->input->get('id'));

        $this->montaTela('site/filtro_palavrao/formulario', $data);
    }

    public function salvar_palavra(){

        if($this->input->post('palavra')){
        $data['descricao'] = strtolower($this->input->post('palavra'));

        if($this->input->post('id')){
            if($this->Filtro_palavrao_model->salvar_palavra($data, $this->input->post('id'))){
                $_GET['type'] = 'success';
                $_GET['title'] = 'Editar';
                $_GET['message'] = 'Palavra alterada com sucesso!';
            }else{

                $_GET['type'] = 'error';
                $_GET['title'] = 'Editar';
                $_GET['message'] = 'Ocorreu um erro ao editar a palavra!';    
        }

        }else{

            if($this->Filtro_palavrao_model->salvar_palavra($data)){
                $_GET['type'] = 'success';
                $_GET['title'] = 'Cadastro';
                $_GET['message'] = 'Palavra cadastrada com sucesso!';
            }else{

                $_GET['type'] = 'error';
                $_GET['title'] = 'Cadastro';
                $_GET['message'] = 'Ocorreu um erro ao salvar a palavra!';    
            }

        }

        }else{

                $_GET['type'] = 'error';
                $_GET['title'] = 'Cadastro';
                $_GET['message'] = 'Ocorreu um erro no cadastro!';    
        }

            $this->lista();
            $url = base_url(array('site', 'filtro-palavrao'));
            $this->output->append_output('<script>window.history.replaceState("", "Meritus", "'. $url .'")</script>');        
    
        }   

        public function excluir_palavra(){

            if($this->input->post('id'))
            {
                if($this->Filtro_palavrao_model->excluir_palavra($this->input->post('id'))){
                    $response['type'] = 'success';
                    $response['title'] = 'Exclusão';
                    $response['message'] = 'Palavra excluída com sucesso!';
                    echo json_encode($response);

                }else{
                    $response['type'] = 'error';
                    $response['title'] = 'Exclusão';
                    $response['message'] = 'Erro ao excluir a palavra!';
                    echo json_encode($response);

                }

            }

        }     


  


    }








