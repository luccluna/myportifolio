<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class EleicaoFinal extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('eleicaoFinal/EleicaoFinal_model');

        $this->set_menu_active(
                            array(
                                'menu' => 'site',
                                'submenu' => 'site-eleicao'
                                )
                            );
    }

    public function lista()
    {
        $dados['eleicoes'] = $this->EleicaoFinal_model->get_eleicoes();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $dados['notification'] = $notification;
        }

           /* echo "<pre>";
            print_r($_GET);
            echo "</pre>";
            exit();*/


        $this->montaTela('site/eleicaoFinal/lista',$dados);
    }

    public function nova_eleicao(){
        $dados['paises']  = $this->EleicaoFinal_model->get_paises(); 
        $this->montaTela('site/eleicaoFinal/formulario',$dados);

    }

    public function pegar_estados(){
        if($this->input->post()){
            if($result['estados'] = $this->EleicaoFinal_model->get_estados($this->input->post('idPais'))){
                $result['status'] = 'estados';
                echo json_encode($result);
            }else{
                $result['status'] = 'sem_estados';
                echo json_encode($result);

            }            

        }        

    }

     public function pegar_cidades(){
        if($this->input->post()){
            if($result['cidades'] = $this->EleicaoFinal_model->get_cidades($this->input->post('idEstado'))){
                $result['status'] = 'cidades';
                echo json_encode($result);
            }else{
                $result['status'] = 'sem_cidades';
                echo json_encode($result);

            }
           /* echo "<pre>";
            print_r($result);
            echo "</pre>";
            exit();*/           

        }
        

    }

    public function editar_eleicao(){
        if($this->input->get('id')){
            //dados necessarios para edicao
            $dados['paises']  = $this->EleicaoFinal_model->get_paises(); 
            $dados['eleicao'] = $this->EleicaoFinal_model->get_eleicao($this->input->get('id'));
            $dados['estados'] = $this->EleicaoFinal_model->get_estados($dados['eleicao']->paises_id);
            $dados['cidades'] = $this->EleicaoFinal_model->get_cidades($dados['eleicao']->estados_id);

           /* echo "<pre>";
            print_r($dados);
            echo "</pre>";
            exit();*/

            $this->montaTela('site/eleicaoFinal/formulario',$dados);
        }

    }

    function salvar_eleicao(){
        if($this->input->post()){
            $tipo = $this->input->post('tipo');
            //se cadastro for presidente
            if($tipo == 1){
                $dados = array(
                    'periodo' => $this->input->post('periodo'),                
                    'tipo' => $this->input->post('tipo'),
                    'paises_id' => $this->input->post('pais'),
                    'estados_id' => NULL,
                    'cidades_id' => NULL
              
                );
             }
             //se cadastro for cargos a nivel de estado
            if($tipo == 2 || $tipo == 3 || $tipo == 4 || $tipo == 5){
                $dados = array(
                    'periodo' => $this->input->post('periodo'),                
                    'tipo' => $this->input->post('tipo'),
                    'paises_id' => $this->input->post('pais'),
                    'estados_id' => $this->input->post('estado'),
                    'cidades_id' => NULL
              
                );
             }
            //vereador e prefeito
            if($tipo == 6 || $tipo == 7){
               $dados = array(
                    'periodo' => $this->input->post('periodo'),                
                    'tipo' => $this->input->post('tipo'),
                    'paises_id' => $this->input->post('pais'),
                    'estados_id' => $this->input->post('estado'),
                    'cidades_id' => $this->input->post('cidade')              
                );
             }



           /* echo "<pre>";
            print_r($tipo);
            echo "</pre>";
            exit();*/


            $id = NULL;

            //editar agenda
            if($this->input->post('id')){
                $id = $this->input->post('id');
            }

            if($this->EleicaoFinal_model->salvar_eleicao($dados, $id))
            {
                $_GET['type'] = 'success';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Eleição atualizado com sucesso!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Eleição cadastrado com sucesso!';
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar a eleição!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar a eleição!';
                }
            }
            $this->lista();
            $url = base_url(array('site', 'eleicao-final'));
            $this->output->append_output('<script>window.history.replaceState("", "Meritus", "'. $url .'")</script>');
        }
    }




    public function excluir_eleicao(){       

        if ($this->input->post('id')){
            //excluir todos os votos para todos os candidatos
            if($this->EleicaoFinal_model->excluir_votos_eleicao($this->input->post('id'))){
                //excluir fotos dos candidatos vinculados a eleicao
                if($candidatos = $this->EleicaoFinal_model->get_candidatos_eleicao($this->input->post('id'))){
                    foreach ($candidatos as $key => $val){
                        $apagar = FCPATH.'../assets/images/candidatoFotos/' . $val->foto;
                        @unlink($apagar);
                    }
                }
            //excluir candidatos vinculados a eleicao
            if($this->EleicaoFinal_model->excluir_candidatos_eleicao($this->input->post('id'))){ 
                //excluir eleicao
                if($this->EleicaoFinal_model->excluir_eleicao($this->input->post('id'))){
                    $response['type'] = 'success';
                    $response['title'] = 'Exclusão';
                    $response['message'] = 'Eleição excluída com sucesso!';
                    echo json_encode($response);
                }else{
                    $response['type'] = 'error';
                    $response['title'] = 'Exclusão';
                    $response['message'] = 'Ocorreu um erro ao excluír a eleição!';
                    echo json_encode($response);
                }
            }else{
                $response['type'] = 'error';
                $response['title'] = 'Exclusão';
                $response['message'] = 'Ocorreu um erro ao tentar excluír os candidatos desta eleição!';
                echo json_encode($response);
            }

        }else{
            $response['type'] = 'error';
            $response['title'] = 'Exclusão';
            $response['message'] = 'Ocorreu um erro ao tentar excluír os votos dos candidatos desta eleição!';
            echo json_encode($response);

        }



        }

        return;
    }


    








}