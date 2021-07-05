<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_depoimentos extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('site/depoimentos_model');

        $this->set_menu_active(
            array(
                'menu' => 'conteudo',
                'submenu' => 'site-depoimentos'
            )
        );
    }

    public function index()
    {
        echo "string";
        exit;
        $this->lista();
    }


    public function lista()
    {
        $data['depoimentos'] =  $this->depoimentos_model->get_depoimentos();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/depoimentos/lista', $data);
    }

    function novo_depoimento(){
        $this->montaTela('site/depoimentos/formulario');
    }

    function salvar_depoimento(){
        $this->load->helper('text');
        if($this->input->post()){
            if(!empty($_FILES['depoimento']['name'])){
                $this->load->library('upload', array(
                    'upload_path' => FCPATH.'../public/imagens/depoimentos',
                    'allowed_types' => 'jpg|png|gif',
                    'file_name' => hash('md5', uniqid(rand(0, 500)) . time() . rand(0, 500)),
                    'max_size' => 8 * 1024,
                    'remove_spaces' => TRUE
                ));

                if ($this->upload->do_upload('depoimento')){
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

                if($this->input->post('imagem_depoimento')){
                    if ($_FILES['depoimento']['name'] != $this->input->post('imagem_depoimento')) {
                        $apagar = FCPATH.'../public/imagens/depoimentos/' . $this->input->post('imagem_depoimento');
                        @unlink($apagar);
                    }
                }
            }else{
                if($this->input->post('imagem_depoimento')){
                    $file_data['file_name'] = $this->input->post('imagem_depoimento');
                }else{
                    $file_data['file_name'] = '';
                }
            }

            $dados = array(
                'titulo' => $this->input->post('titulo'),
                'descricao' => $this->input->post('descricao'),

                //'video' => $this->input->post('video'),

            );

            $id = NULL;

            //editar depoimento
            if($this->input->post('id')){
                $id = $this->input->post('id');
            }else{
                // $dados['data'] = time();
            }

            if($this->depoimentos_model->salvar_depoimento($dados, $id))
            {
                $_GET['type'] = 'success';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Edição cadastrada com sucesso!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Novo depoimento cadastrado com sucesso!';
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar a depoimento!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar a depoimento!';
                }
            }
            $this->lista();
            $url = base_url(array('site', 'depoimentos'));
            $this->output->append_output('<script>window.history.replaceState("", "Sólido kids", "'. $url .'")</script>');
        }
    }

    public function editar_depoimento()
    {
        if($this->input->get('id')){
            $dados['depoimento'] = $this->depoimentos_model->get_depoimento($this->input->get('id'));
            $this->montaTela('site/depoimentos/formulario', $dados);
        }
    }

    function excluir_depoimento(){
        if ($this->input->post('id')) {
            $depoimento = $this->depoimentos_model->get_depoimento($this->input->post('id'));
            if($this->depoimentos_model->excluir_depoimento($this->input->post('id'))){
                $response['type'] = 'success';
                $response['title'] = 'Exclusão';
                $response['message'] = 'Depoimento excluído com sucesso!';
                echo json_encode($response);
            }else{
                $response['type'] = 'error';
                $response['title'] = 'Exclusão';
                $response['message'] = 'Ocorreu um erro ao excluír o depoimento!';
                echo json_encode($response);
            }
        }
        return;
    }



    public function excluir_pessoa(){



        if ($this->input->post('id')) {

            if($this->depoimentos_model->excluir_pessoa($this->input->post('id'))){

                $this->depoimentos_model->atualiza_depoimento($this->input->get('id_depoimento'));

                $response['type'] = 'success';
                $response['title'] = 'Exclusão';
                $response['message'] = 'depoimento excluído com sucesso!';
                echo json_encode($response);
            }else{
                $response['type'] = 'error';
                $response['title'] = 'Exclusão';
                $response['message'] = 'Ocorreu um erro ao excluír o depoimento!';
                echo json_encode($response);
            }
        }
        return;
    }

    public function lista_agendamentos(){

       $this->set_menu_active(
        array(
            'menu' => 'agenda',
            'submenu' => 'agenda-lista'
        )
    );

       $data['agendamentos'] =  $this->depoimentos_model->get_agendamentos();

       if($this->input->get('type')){
        $notification = new stdClass;
        $notification->type = $this->input->get('type');
        $notification->title = $this->input->get('title');
        $notification->message = $this->input->get('message');
        $data['notification'] = $notification;
    }

    $this->montaTela('site/depoimentos/lista_agendamentos', $data);
}


public function lista_pessoas(){

 $this->set_menu_active(
    array(
        'menu' => 'agenda',
        'submenu' => 'agenda-lista'
    )
);

 $data['pessoas'] =  $this->depoimentos_model->get_pessoas($this->input->get('id'));
 $data['id_depoimento'] =  $this->input->get('id_depoimento');

        // var_dump($data['pessoas']);
        // exit;
 if($this->input->get('type')){
    $notification = new stdClass;
    $notification->type = $this->input->get('type');
    $notification->title = $this->input->get('title');
    $notification->message = $this->input->get('message');
    $data['notification'] = $notification;
}

$this->montaTela('site/depoimentos/lista_pessoas', $data);
}

}
