<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_matriculas extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('site/matriculas_model');

        $this->set_menu_active(
                            array(
                                'menu' => 'site',
                                'submenu' => 'site-matricula'
                                )
                            );
    }

    public function index()
    {
        $data['matricula'] = $this->matriculas_model->get_matricula();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/matricula/formulario', $data);
    }

    function salvar_matricula(){
        if($this->input->post()){
            if(!empty($_FILES['imagem']['name'])){
                $this->load->library('upload', array(
                        'upload_path' => FCPATH.'../files/uploads/matricula',
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
                            'width' => 1680,
                            'height' => 1100
                        )
                    );
                    $this->image_lib->resize();
                }

                if($this->input->post('imagem_matricula')){
                    if ($_FILES['imagem']['name'] != $this->input->post('imagem_matricula')) {
                        $apagar = FCPATH.'../files/uploads/matricula/' . $this->input->post('imagem_matricula');
                        @unlink($apagar);
                    }
                }
            }else{
                if($this->input->post('imagem_matricula')){
                    $file_data['file_name'] = $this->input->post('imagem_matricula');
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

            if($this->matriculas_model->salvar_matricula($dados, $id))
            {
                $_GET['type'] = 'success';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Matrícula atualizada com sucesso!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Matrícula cadastrada com sucesso!';
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar a matrícula!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar a matrícula!';
                }
            }
            $this->index();
            $url = base_url(array('site', 'matricula'));
            $this->output->append_output('<script>window.history.replaceState("", "Sólido kids", "'. $url .'")</script>');
        }
    }
}