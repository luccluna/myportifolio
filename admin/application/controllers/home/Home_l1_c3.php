<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home_l1_c3 extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('home/l1_c3_model');

        $this->set_menu_active(
                            array(
                                'menu' => 'home',
                                'submenu' => 'home-l1-c3'
                                )
                            );
    }

    public function index()
    {
        $data['l1_c3'] = $this->l1_c3_model->get_l1_c3();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('home/l1-c3/formulario', $data);
    }

    function salvar_l1_c3(){
        if($this->input->post()){
            $this->load->helper('text');
            $dados['posicao_coluna'] = 'l1-c3';
            $dados['link_pagina'] = '';
            $dados['titulo'] = $this->input->post('titulo');
            $dados['nome_url'] = url_title(convert_accented_characters($this->input->post('titulo')), '-', TRUE);

            //se for para abrir um link já existente
            if(!$this->input->post('ck_link')){

                $config_up_image_interna = array(
                            'upload_path' => FCPATH.'../files/uploads/l1-c3',
                            'allowed_types' => 'jpg|png|gif',
                            'max_size' => 8 * 1024,
                            'remove_spaces' => TRUE
                        );

                 $config_lib_image_interna = array(
                                'image_library' => 'gd2',
                                'create_thumb' => FALSE,
                                'maintain_ratio' => TRUE,
                                'width' => 1680,
                                'height' => 1100
                            );


                if(!empty($_FILES['imagem_interna']['name'])){
                    $this->load->library('upload', $config_up_image_interna);
                    $config_up_image_interna['file_name'] = hash('md5', uniqid(rand(0, 500)) . time() . rand(0, 500));
                    $this->upload->initialize($config_up_image_interna);

                    if ($this->upload->do_upload('imagem_interna')){
                        $file_data = $this->upload->data();
                        $this->load->library('image_lib', $config_lib_image_interna);
                        $config_image_lib['source_image'] = $file_data['full_path'];
                        $this->image_lib->initialize($config_lib_image_interna);
                        $this->image_lib->resize();
                    }

                    if($this->input->post('imagem_l1_c3_interna')){
                        if ($_FILES['imagem_interna']['name'] != $this->input->post('imagem_l1_c3_interna')) {
                            $apagar = FCPATH.'../files/uploads/l1-c3/' . $this->input->post('imagem_l1_c3_interna');
                            @unlink($apagar);
                        }
                    }
                }else{
                    if($this->input->post('imagem_l1_c3_interna')){
                        $file_data['file_name'] = $this->input->post('imagem_l1_c3_interna');
                    }else{
                        $file_data['file_name'] = '';
                    }
                }

                $dados['imagem_interna'] = $file_data['file_name'];
                $dados['texto'] = $this->input->post('texto');
            }else{
                $dados['link_pagina'] = $this->input->post('link_pagina');
            }

            $config_up_image_capa = array(
                        'upload_path' => FCPATH.'../files/uploads/l1-c3',
                        'allowed_types' => 'jpg|png|gif',
                        'max_size' => 8 * 1024,
                        'remove_spaces' => TRUE
                    );

            $config_lib_image_capa = array(
                        'image_library' => 'gd2',
                        'create_thumb' => FALSE,
                        'maintain_ratio' => TRUE,
                        'width' => 600,
                        'height' => 600
                    );

            if(!empty($_FILES['imagem_capa']['name'])){
                $this->load->library('upload', $config_up_image_capa);
                $config_up_image_capa['file_name'] = hash('md5', uniqid(rand(0, 500)) . time() . rand(0, 500));
                $this->upload->initialize($config_up_image_capa);

                if ($this->upload->do_upload('imagem_capa')){
                    $file_data = $this->upload->data();
                    $this->load->library('image_lib', $config_lib_image_capa);

                    $config_image_lib['source_image'] = $file_data['full_path'];
                    $this->image_lib->initialize($config_lib_image_capa);
                    $this->image_lib->resize();
                }

                if($this->input->post('imagem_l1_c3_capa')){
                    if ($_FILES['imagem_capa']['name'] != $this->input->post('imagem_l1_c3_capa')) {
                        $apagar = FCPATH.'../files/uploads/l1-c3/' . $this->input->post('imagem_l1_c3_capa');
                        @unlink($apagar);
                    }
                }
            }else{
                if($this->input->post('imagem_l1_c3_capa')){
                    $file_data['file_name'] = $this->input->post('imagem_l1_c3_capa');
                }else{
                    $file_data['file_name'] = '';
                }
            }

            $dados['imagem'] = $file_data['file_name'];

            $id = NULL;

            //editar agenda
            if($this->input->post('id')){
                $id = $this->input->post('id');
            }

            if($this->l1_c3_model->salvar_l1_c3($dados, $id))
            {
                $_GET['type'] = 'success';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Coluna L1-C3 atualizado com sucesso!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Coluna L1-C3 cadastrado com sucesso!';
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar o coluna L1-C3!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar o coluna L1-C3!';
                }
            }
            $this->index();
            $url = base_url(array('home', 'l1-c3'));
            $this->output->append_output('<script>window.history.replaceState("", "Colégio Vitória", "'. $url .'")</script>');
        }
    }
}