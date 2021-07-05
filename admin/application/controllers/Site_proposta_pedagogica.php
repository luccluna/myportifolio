
<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_proposta_pedagogica extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('site/proposta_pedagogica_model');

        $this->set_menu_active(
                            array(
                                'menu' => 'site',
                                'submenu' => 'site-proposta-pedagogica'
                                )
                            );
    }

    public function index()
    {
        $data['proposta'] = $this->proposta_pedagogica_model->get_proposta_pedagogica();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/proposta_pedagogica/formulario', $data);
    }

    function salvar_proposta_pedagogica(){
        if($this->input->post()){
            if(!empty($_FILES['imagem']['name'])){
                $this->load->library('upload', array(
                        'upload_path' => FCPATH.'../assets/images/proposta-pedagogica',
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

                if($this->input->post('imagem_proposta')){
                    if ($_FILES['imagem']['name'] != $this->input->post('imagem_proposta')) {
                        $apagar = FCPATH.'../assets/images/proposta-pedagogica/' . $this->input->post('imagem_proposta');
                        @unlink($apagar);
                    }
                }
            }else{
                if($this->input->post('imagem_proposta')){
                    $file_data['file_name'] = $this->input->post('imagem_proposta');
                }else{
                    $file_data['file_name'] = '';
                }
            }

            $dados = array(
                'texto'     => $this->input->post('texto'),
                'imagem'    => $file_data['file_name']
            );

            $id = NULL;

            //editar agenda
            if($this->input->post('id')){
                $id = $this->input->post('id');
            }

            if($this->proposta_pedagogica_model->salvar_proposta_pedagogica($dados, $id))
            {
                $_GET['type'] = 'success';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Proposta pedagógica atualizado com sucesso!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Proposta pedagógica cadastrado com sucesso!';
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar o prodposta pedagógica!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar o prodposta pedagógica!';
                }
            }
            $this->index();
            $url = base_url(array('site', 'proposta-pedagogica'));
            $this->output->append_output('<script>window.history.replaceState("", "Acrilmoc", "'. $url .'")</script>');
        }
    }
}