<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Processos extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('site/Processos_model');

        $this->set_menu_active(
                            array(
                                'menu' => 'processos',
                                'submenu' => 'processos_aba'
                                )
                            );
    }

    public function lista(){

        
        $data['processos'] = $this->Processos_model->get_processos();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/processos/lista', $data);
    }
  
    public function novo_processo(){

        $data['candidatos'] = $this->Processos_model->get_candidatos();
       // var_dump($data);exit;
        $this->montaTela('site/processos/formulario', $data);
    } 


    public function detalhes_processo(){

       
       $data['processo'] = $this->Processos_model->get_processo($this->input->get('id'));

        $this->load->view('site/processos/detalhes_processo', $data);
    }

    public function salvar_processo(){

       $data['descricao_completa'] = $this->input->post('descricao');
       $data['perfis_candidato_id'] = $this->input->post('candidato');
       $data['titulo'] = $this->input->post('titulo');

       if($this->Processos_model->salvar_novo_processo($data, $this->input->post('id'))){
            
            $_GET['type'] = 'success';
            $_GET['title'] = 'cadastrado/Atualizado';
            $_GET['message'] = 'Processo atualizado ou cadastrado com sucesso!';
             $this->lista();
            $url = base_url(array('site', 'processos'));
            $this->output->append_output('<script>window.history.replaceState("", "Processos", "'. $url .'")</script>');
        }else{

            $_GET['type'] = 'error';
            $_GET['title'] = 'Error';
            $_GET['message'] = 'Error ao atualizar ou cadastrar o processo!';
            $this->lista();
            $url = base_url(array('site', 'processos'));
            $this->output->append_output('<script>window.history.replaceState("", "Processos", "'. $url .'")</script>');
        }
       
    }


    public function editar_processo(){

       

        $data['processo'] = $this->Processos_model->get_processo($this->input->get('id'));
        
            $this->montaTela('site/processos/formulario', $data);

    }


    public function excluir_processo(){

       

             if($this->input->post('id'))
            {
                if($this->Processos_model->excluir_processo($this->input->post('id'))){
                    $response['type'] = 'success';
                    $response['title'] = 'Exclusão';
                    $response['message'] = 'Processo Excluido com sucesso!';
                    echo json_encode($response);

                }else{
                    $response['type'] = 'error';
                    $response['title'] = 'Exclusão';
                    $response['message'] = 'Erro ao excluir o processo!';
                    echo json_encode($response);

                }

            }
         
    }
  
}