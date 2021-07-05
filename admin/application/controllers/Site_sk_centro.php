<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_sk_centro extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('site/sk_centro_model');

        $this->set_menu_active(
                            array(
                                'menu' => 'site',
                                'submenu' => 'site-sk-centro'
                                )
                            );
    }

    public function index()
    {
        $data['sk_centro'] = $this->sk_centro_model->get_sk_centro();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/sk_centro/formulario', $data);
    }

    function salvar_sk_centro(){
        if($this->input->post()){
            if(!empty($_FILES['imagem']['name'])){
                $this->load->library('upload', array(
                        'upload_path' => FCPATH.'../assets/images/sk-centro',
                        'allowed_types' => 'jpg|png|gif',
                        'file_name' => hash('md5', uniqid(rand(0, 500)) . time() . rand(0, 500)),
                        'max_size' => 8 * 1024,
                        'remove_spaces' => TRUE
                    ));

                if ($this->upload->do_upload('imagem')){
                    $file_data = $this->upload->data();
                    $this->load->library('image_lib', array(
                            'image_library' => 'gd2',
                            'source_image' => $file_data['full_path'],
                            'create_thumb' => FALSE,
                            'maintain_ratio' => TRUE,
                            'width' => 1200,
                            'height' => 350
                        )
                    );
                    $this->image_lib->resize();
                }

                if($this->input->post('imagem_sk_centro')){
                    if ($_FILES['imagem']['name'] != $this->input->post('imagem_sk_centro')) {
                        $apagar = FCPATH.'../assets/images/sk-centro/' . $this->input->post('imagem_sk_centro');
                        @unlink($apagar);
                    }
                }
            }else{
                if($this->input->post('imagem_sk_centro')){
                    $file_data['file_name'] = $this->input->post('imagem_sk_centro');
                }else{
                    $file_data['file_name'] = '';
                }
            }

            $dados = array(
                'titulo'   => $this->input->post('titulo'),
                'texto'     => $this->input->post('texto'),
                'imagem'    => $file_data['file_name']
            );

            $id = NULL;

            //editar agenda
            if($this->input->post('id')){
                $id = $this->input->post('id');
            }

            if($this->sk_centro_model->salvar_sk_centro($dados, $id))
            {
                $_GET['type'] = 'success';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Sólido centro atualizado com sucesso!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Sólido centro cadastrado com sucesso!';
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar o sólido centro!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar o sólido centro!';
                }
            }
            $this->index();
            $url = base_url(array('site', 'solido-centro'));
            $this->output->append_output('<script>window.history.replaceState("", "Sólido kids", "'. $url .'")</script>');
        }
    }
}