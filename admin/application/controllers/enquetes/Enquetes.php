<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Enquetes extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('enquetes/Enquetes_model');

        $this->set_menu_active(
                            array(
                                'menu' => 'site',
                                'submenu' => 'enquetes'
                                )
                            );
    }

    public function lista()
    {
        $data['enquetes'] = $this->Enquetes_model->get_enquetes();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/enquetes/lista', $data);
    }

    

    public function nova_enquete(){

    $this->montaTela('site/enquetes/formulario');


    }


    public function salvar_nova_enquete(){

        if($this->input->post()){

            $data['titulo'] = $this->input->post('titulo');
            $data['pergunta'] = $this->input->post('pergunta');
            $data['data'] = date("Y-m-d H:i:s");
            $itens = $this->input->post();
            $itens_resp = array();


            for($i=0; $i<count($itens['resposta']); $i++){

                if(strlen(($itens['resposta'][$i])) > 0 ){

                    $aux['texto_item'] = ($itens['resposta'][$i]);
                    $aux['id'] = ($itens['id_item'][$i]);
                        array_push($itens_resp, $aux);
                    }
                    
                }   

                if($this->input->post('id')){

                    if($id_enquete = $this->Enquetes_model->salvar_enquete($data, $this->input->post('id'))){

                            $this->Enquetes_model->salvar_editar_itens_enquete($itens_resp, $this->input->post('id'));

                        $_GET['type'] = 'success';
                        $_GET['title'] = 'Cadastro';
                        $_GET['message'] = 'Enquete editada com sucesso!';

                    }

                }else{


                

            if($id_enquete = $this->Enquetes_model->salvar_enquete($data)){


                
               if(isset($itens_resp)){


                    if($this->Enquetes_model->salvar_itens_enquete($itens_resp, $id_enquete)){

                        $_GET['type'] = 'success';
                        $_GET['title'] = 'Cadastro';
                        $_GET['message'] = 'Enquete cadastrada com sucesso!';

                    }

               }

                
  
            }else{

                $_GET['type'] = 'error';
                $_GET['title'] = 'Cadastro';
                $_GET['message'] = 'Ocorreu um erro ao cadastrar a enquete!';               
            }
        }

        }else{

            $_GET['type'] = 'error';
            $_GET['title'] = 'Cadastro';
            $_GET['message'] = 'Ocorreu um erro ao cadastrar a enquete!';
                

        }

            $this->lista();
            $url = base_url(array('site', 'enquetes'));
            $this->output->append_output('<script>window.history.replaceState("", "Meritus", "'. $url .'")</script>');

    }





   public function mudar_status_ativar(){

    if($this->Enquetes_model->verificar_status($this->input->get('id'))){

    if($this->Enquetes_model->mudar_status_ativar($this->input->get('id'))){

            $_GET['type'] = 'success';
        $_GET['title'] = 'Ativação';
        $_GET['message'] = 'Enquete ativada com sucesso!';

    }else{

                $_GET['type'] = 'error';
                $_GET['title'] = 'Ativação';
                $_GET['message'] = 'Ocorreu um erro ao ativar a enquete!';               
            }
}else{

                $_GET['type'] = 'error';
                $_GET['title'] = 'Ativação';
                $_GET['message'] = 'Já tem uma enquete ativa, desative-a primeiro!'; 

}

            $this->lista();
            $url = base_url(array('site', 'enquetes'));
            $this->output->append_output('<script>window.history.replaceState("", "Meritus", "'. $url .'")</script>');
   
   }

        

   public function mudar_status_desativar(){


    if($this->Enquetes_model->mudar_status_desativar($this->input->get('id'))){

            $_GET['type'] = 'success';
        $_GET['title'] = 'Desativação';
        $_GET['message'] = 'Enquete desativada com sucesso!';

    }else{

                $_GET['type'] = 'error';
                $_GET['title'] = 'Cadastro';
                $_GET['message'] = 'Ocorreu um erro ao desativar a enquete!';               
            }


            $this->lista();
            $url = base_url(array('site', 'enquetes'));
            $this->output->append_output('<script>window.history.replaceState("", "Meritus", "'. $url .'")</script>');

   }


   public function editar_enquete(){

        if($id = $this->input->get('id')){

                $data['itens'] = $this->Enquetes_model->itens_enquetes($id);
                $data['pergunta'] = $this->Enquetes_model->get_enquetes_id($id);


                $this->montaTela('site/enquetes/formulario', $data);

        }
        


   }


   public function detalhes_enquete(){


        $data['titulo_enquete'] = $this->Enquetes_model->get_titulo_enquete($this->input->get('id'));
        $data['itens_enquete'] = $this->Enquetes_model->get_itens_enquete($data['titulo_enquete']->id);
        $data['parciais'] = $this->Enquetes_model->get_parciais_enquete($data['titulo_enquete']->id);
        $data['total_votacoes'] = $this->Enquetes_model->get_total_votacoes($data['titulo_enquete']->id);

        $this->load->view('site/enquetes/detalhes_enquete', $data);

   }





    }



