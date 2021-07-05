<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_projetos_lei extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('site/Projetos_lei_model');

        $this->set_menu_active(
                            array(
                                'menu' => 'site',
                                'submenu' => 'site-projetos-lei'
                                )
                            );
    }



    public function lista()
    {
        $data['projetos_de_lei'] =  $this->Projetos_lei_model->get_projetos();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/projetos/lista', $data);
    }

    function novo_projeto(){
        $this->montaTela('site/projetos/formulario');
    }

    function salvar_projeto(){
        $this->load->helper('text');
        if($this->input->post()){
            if(!empty($_FILES['projeto_img_in']['name'])){
                $this->load->library('upload', array(
                        'upload_path' => FCPATH.'../assets/images/projetosDeLei',
                        'allowed_types' => 'jpg|png|gif',
                        'file_name' => hash('md5', uniqid(rand(0, 500)) . time() . rand(0, 500)),
                        'max_size' => 8 * 1024,
                        'remove_spaces' => TRUE
                    ));

                if ($this->upload->do_upload('projeto_img_in')){
                    $file_data = $this->upload->data();
                    $this->load->library('image_lib', array(
                            'image_library' => 'gd2',
                            'source_image' => $file_data['full_path'],
                            'create_thumb' => FALSE,
                            'maintain_ratio' => TRUE,
                            'width' => 800,
                            'height' => 400
                        )
                    );
                    $this->image_lib->resize();
                }

                //caso alterar imagem de um projeto, apagar a anterior da pasta.
                if($this->input->post('imagem_projeto')){
                    if ($_FILES['projeto_img_in']['name'] != $this->input->post('imagem_projeto')) {
                        $apagar = FCPATH.'../assets/images/projetosDeLei/' . $this->input->post('imagem_projeto');
                        @unlink($apagar);
                    }
                }
            }else{
                if($this->input->post('imagem_projeto')){
                    $file_data['file_name'] = $this->input->post('imagem_projeto');
                }else{
                    $file_data['file_name'] = '';
                }
            }

                  



            //caso nome_url n seja unico
            $slug_url =  url_title(convert_accented_characters($this->input->post('titulo')), '-', TRUE);
            $test_url = $this->Projetos_lei_model->confere_nome_url($slug_url);

            if($test_url){
                //ja existe essa slug
               $nome_url_gerado = $this->gerar_novo_nome_url($slug_url);//gerar uma nova

                   $dados = array(
                        'titulo' => $this->input->post('titulo'),
                        /*'nome_url' => (url_title(convert_accented_characters($this->input->post('titulo')), '-', TRUE)).'-'.time(),*/
                        'nome_url' => $nome_url_gerado,
                        'texto' => $this->input->post('texto'),
                        'imagem' => $file_data['file_name']
                    );
            }else{
                  $dados = array(
                        'titulo' => $this->input->post('titulo'),
                        'nome_url' => url_title(convert_accented_characters($this->input->post('titulo')), '-', TRUE),
                        'texto' => $this->input->post('texto'),
                        'imagem' => $file_data['file_name']
                    );


            }

        



            $id = NULL;

            //editar noticia
            if($this->input->post('id')){
                $id = $this->input->post('id');
            }else{
                $dados['data'] = time();
            }

            if($this->Projetos_lei_model->salvar_projeto($dados, $id))
            {
                $_GET['type'] = 'success';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Projeto atualizado com sucesso!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Projeto cadastrado com sucesso!';
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar o projeto!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar o projeto!';
                }
            }
            $this->lista();
            $url = base_url(array('site', 'projetos'));
            $this->output->append_output('<script>window.history.replaceState("", "Meritus", "'. $url .'")</script>');
        }
    }



    public function editar_projeto()
    {
        if($this->input->get('id')){
            $dados['projetos_de_lei'] = $this->Projetos_lei_model->get_projeto($this->input->get('id'));
            $this->montaTela('site/projetos/formulario', $dados);
        }
    }

    function excluir_projeto(){
        // id do projeto
        if ($this->input->post('id')){            
            //excluir votos
            if($this->Projetos_lei_model->excluir_votos_projeto($this->input->post('id'))){
                //excluir respostas de comentarios
                if($this->Projetos_lei_model->excluir_respostas_cometarios_projeto($this->input->post('id'))){
                    //excluir comentarios
                    if($this->Projetos_lei_model->excluir_cometarios_projeto($this->input->post('id'))){
                        $projeto = $this->Projetos_lei_model->get_projeto($this->input->post('id'));
                        //excluir projeto
                        if($this->Projetos_lei_model->excluir_projeto($this->input->post('id'))){
                            $apagar = FCPATH.'../assets/images/projetosDeLei/' . $projeto->imagem;
                            @unlink($apagar);
                            $response['type'] = 'success';
                            $response['title'] = 'Exclusão';
                            $response['message'] = 'projeto excluído com sucesso!';
                            echo json_encode($response);
                        }else{
                            $response['type'] = 'error';
                            $response['title'] = 'Exclusão';
                            $response['message'] = 'Ocorreu um erro ao excluír o projeto!';
                            echo json_encode($response);
                        }
                    }  
                    
                }

            }
            
        }

        return;
    }




    function gerar_novo_nome_url($slug_url){        

        $contador = 1000000;
        for ($i=1; $i <$contador; $i++) {

           $novo_slug_url = $slug_url ."-" . $i;
           $test_url =  $this->Projetos_lei_model->confere_nome_url($novo_slug_url);

           if($test_url == false){
            break;

           }

            
        }
       

        return $novo_slug_url;

    }

}