<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_contrato extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('site/contrato_model');

        $this->set_menu_active(
                            array(
                                'menu' => 'site',
                                'submenu' => 'site-contrato'
                                )
                            );
    }

    public function index()
    {
        $data['contrato'] = $this->contrato_model->get_contrato();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/contrato/formulario', $data);
    }

    function salvar_contrato(){
        // var_dump($_FILES['contrato']);
        // exit;
        if(!empty($_FILES['contrato']['name'])){
            $this->load->library('upload', array(
                    'upload_path' => FCPATH.'../assets/images/contratos',
                    'allowed_types' => 'pdf',
                    'file_name' => hash('md5', uniqid(rand(0, 500)) . time() . rand(0, 500)),
                    'max_size' => 8 * 1024,
                    'remove_spaces' => TRUE
                ));

            if ($this->upload->do_upload('contrato')){
                $file_data = $this->upload->data();
                // $this->load->library('image_lib', array(
                //         'image_library' => 'gd2',
                //         'source_image' => $file_data['full_path'],
                //         'create_thumb' => FALSE,
                //         'maintain_ratio' => TRUE
                //     )
                // );
                // $this->image_lib->resize();
            }

            if($this->input->post('pdf_contrato')){
                if ($_FILES['contrato']['name'] != $this->input->post('pdf_contrato')) {
                    $apagar = FCPATH.'../assets/images/contratos/' . $this->input->post('pdf_contrato');
                    @unlink($apagar);
                }
            }
        }else{
            if($this->input->post('pdf_contrato')){
                $file_data['file_name'] = $this->input->post('pdf_contrato');
            }else{
                $file_data['file_name'] = '';
            }
        }

        $dados = array(
            'pdf'    => $file_data['file_name']
        );

        $id = NULL;

        //editar agenda
        if($this->input->post('id')){
            $id = $this->input->post('id');
        }

        if($this->contrato_model->salvar_contrato($dados, $id))
        {
            $_GET['type'] = 'success';
            if($id){
                $_GET['title'] = 'Atualização';
                $_GET['message'] = 'Contrato atualizado com sucesso!';
            }else{
                $_GET['title'] = 'Cadastro';
                $_GET['message'] = 'Contrato cadastrado com sucesso!';
            }
        }
        else
        {
            $_GET['type'] = 'error';
            if($id){
                $_GET['title'] = 'Atualização';
                $_GET['message'] = 'Ocorreu um erro ao atualizar o contrato!';
            }else{
                $_GET['title'] = 'Cadastro';
                $_GET['message'] = 'Ocorreu um erro ao cadastrar o contrato!';
            }
        }
        $this->index();
        $url = base_url(array('site', 'contrato'));
        $this->output->append_output('<script>window.history.replaceState("", "Acrilmoc", "'. $url .'")</script>');
    }
}