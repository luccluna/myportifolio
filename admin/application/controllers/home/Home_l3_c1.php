<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home_l3_c1 extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('home/l3_c1_model');

        $this->set_menu_active(
                            array(
                                'menu' => 'home',
                                'submenu' => 'home-l3-c1'
                                )
                            );
    }

    public function index()
    {
        $data['l3_c1'] = $this->l3_c1_model->get_l3_c1();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('home/l3-c1/formulario', $data);
    }

    function salvar_l3_c1(){
        if($this->input->post()){
            $this->load->helper('text');
            if(!empty($_FILES['imagem']['name'])){
                $this->load->library('upload', array(
                        'upload_path' => FCPATH.'../files/uploads/l3-c1',
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

                if($this->input->post('imagem_l3_c1')){
                    if ($_FILES['imagem']['name'] != $this->input->post('imagem_l3_c1')) {
                        $apagar = FCPATH.'../files/uploads/l3_c1/' . $this->input->post('imagem_l3_c1');
                        @unlink($apagar);
                    }
                }
            }else{
                if($this->input->post('imagem_l3_c1')){
                    $file_data['file_name'] = $this->input->post('imagem_l3_c1');
                }else{
                    $file_data['file_name'] = '';
                }
            }

            $dados = array(
                'titulo'   => $this->input->post('titulo'),
                'nome_url' => url_title(convert_accented_characters($this->input->post('titulo')), '-', TRUE),
                'posicao_coluna'   => 'l3-c1',
                'texto'     => $this->input->post('texto'),
                'imagem_interna'    => $file_data['file_name']
            );

            $id = NULL;

            //editar agenda
            if($this->input->post('id')){
                $id = $this->input->post('id');
            }

            if($this->l3_c1_model->salvar_l3_c1($dados, $id))
            {
                $_GET['type'] = 'success';
                if($id){
                    $_GET['title'] = 'Atualiza????o';
                    $_GET['message'] = 'Coluna vermelha atualizada com sucesso!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Coluna vermelha cadastrada com sucesso!';
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualiza????o';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar a coluna vermelha!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar a coluna vermelha!';
                }
            }
            $this->index();
            $url = base_url(array('home', 'l3-c1'));
            $this->output->append_output('<script>window.history.replaceState("", "Col??gio Vit??ria", "'. $url .'")</script>');
        }
    }
}