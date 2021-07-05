<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_videos extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('site/videos_model');

        $this->set_menu_active(
            array(
                'menu' => 'site',
                'submenu' => 'site-videos'
            )
        );
    }

    public function index()
    {
        $this->lista();
    }


    public function lista()
    {
        $data['videos'] =  $this->videos_model->get_videos();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/videos/lista', $data);
    }

    function novo_video(){
        $this->montaTela('site/videos/formulario');
    }

    function salvar_video(){
        $this->load->helper('text');
        if($this->input->post()){
            if (!empty($_FILES['img_fundo']['name'])) {
                $this->load->library('upload', array(
                    'upload_path' => FCPATH.'../assets/images/video',
                    'allowed_types' => 'jpg|png|gif',
                    'file_name' => hash('md5', uniqid(rand(0, 500)) . time() . rand(0, 500)),
                    'max_size' => 800 * 530,
                    'remove_spaces' => TRUE,
                ));


                if ($this->upload->do_upload('img_fundo')){
                    $file_data = $this->upload->data();
                    $this->load->library('image_lib', array(
                        'image_library' => 'gd2',
                        'source_image' => $file_data['full_path'],
                        'create_thumb' => FALSE,
                        'maintain_ratio' => TRUE,
                            //'width' => 800,
                            //'height' => 400
                    )
                );
                    $this->image_lib->resize();
                }
                if($this->input->post('img_fundo_antiga')){
                    if ($_FILES['img_fundo']['name'] != $this->input->post('img_fundo_antiga')) {
                        $apagar = FCPATH.'../public/imagens/video/' . $this->input->post('img_fundo_antiga');
                        @unlink($apagar);
                    }
                }
            }

        else{
            if($this->input->post('img_fundo_antiga')){
                $file_data['file_name'] = $this->input->post('img_fundo_antiga');
            }else{
                $file_data['file_name'] = '';
            }
        }


        $img_fundo = $file_data['file_name'];

        $dados = array(
            'titulo' => $this->input->post('titulo'),
            'nome_url' => $this->input->post('nome_url'),
            'data' => $this->input->post('data'),
            'autor' => $this->input->post('autor'),
            'imagem' => $img_fundo,
            'texto' => $this->input->post('conteudo')
        );

        $id = NULL;

            //editar videos
        if($this->input->post('id')){
            $id = $this->input->post('id');
        }

        if($this->videos_model->salvar_video($dados, $id))
        {
            $_GET['type'] = 'success';
            if($id){
                $_GET['title'] = 'Atualização';
                $_GET['message'] = 'Vídeos atualizada com sucesso!';
            }else{
                $_GET['title'] = 'Cadastro';
                $_GET['message'] = 'Vídeos cadastrada com sucesso!';
            }
        }
        else
        {
            $_GET['type'] = 'error';
            if($id){
                $_GET['title'] = 'Atualização';
                $_GET['message'] = 'Ocorreu um erro ao atualizar a vídeos!';
            }else{
                $_GET['title'] = 'Cadastro';
                $_GET['message'] = 'Ocorreu um erro ao cadastrar a vídeos!';
            }
        }
        $this->lista();
        $url = base_url(array('site', 'videos'));
        $this->output->append_output('<script>window.history.replaceState("", "Sólido kids", "'. $url .'")</script>');

    }
}

    public function editar_video()
    {
        if($this->input->get('id')){
            $dados['videos'] = $this->videos_model->get_video($this->input->get('id'));
            $this->montaTela('site/videos/formulario', $dados);
        }
    }

    function excluir_video(){
        if ($this->input->post('id')) {
            $videos = $this->videos_model->get_video($this->input->post('id'));
            if($this->videos_model->excluir_video($this->input->post('id'))){
                $response['type'] = 'success';
                $response['title'] = 'Exclusão';
                $response['message'] = 'Vídeos excluído com sucesso!';
                echo json_encode($response);
            }else{
                $response['type'] = 'error';
                $response['title'] = 'Exclusão';
                $response['message'] = 'Ocorreu um erro ao excluír o vídeos!';
                echo json_encode($response);
            }
        }
        return;
    }

}