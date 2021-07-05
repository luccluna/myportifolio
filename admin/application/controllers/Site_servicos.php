<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_servicos extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('site/servicos_model');

        $this->set_menu_active(
                            array(
                                'menu' => 'servicos',
                                'submenu' => ''
                                )
                            );
    }

    public function index()
    {
        $this->lista();
    }


    public function lista()
    {
        $data['servicos'] =  $this->servicos_model->get_servicos();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/servicos/lista', $data);
    }

    function novo_servico(){
        $this->montaTela('site/servicos/formulario');
    }

    function salvar_servico(){
        $this->load->helper('text');
        if($this->input->post()){
            if(!empty($_FILES['servico']['name'])){
                $this->load->library('upload', array(
                        'upload_path' => FCPATH.'../public/imagens/servicos',
                        'allowed_types' => 'jpg|png|gif',
                        'file_name' => hash('md5', uniqid(rand(0, 500)) . time() . rand(0, 500)),
                        'max_size' => 8 * 1024,
                        'remove_spaces' => TRUE
                    ));

                if ($this->upload->do_upload('servico')){
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

                if($this->input->post('imagem_servico')){
                    if ($_FILES['servico']['name'] != $this->input->post('imagem_servico')) {
                        $apagar = FCPATH.'../public/imagens/servicos/' . $this->input->post('imagem_servico');
                        @unlink($apagar);
                    }
                }
            }else{
                if($this->input->post('imagem_servico')){
                    $file_data['file_name'] = $this->input->post('imagem_servico');
                }else{
                    $file_data['file_name'] = '';
                }
            }

            $dados = array(
                'titulo' => $this->input->post('titulo'),
                'descricao' => $this->input->post('descricao'),
                'imagem' => $file_data['file_name']
            );
          
            $id = NULL;

            //editar servico
            if($this->input->post('id')){
                $id = $this->input->post('id');
            }else{

            }

            if($this->servicos_model->salvar_servico($dados, $id))
            {
                $_GET['type'] = 'success';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Evento atualizada com sucesso!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Evento cadastrada com sucesso!';
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar a servico!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar a servico!';
                }
            }
            $this->lista();
            $url = base_url(array('site', 'servicos'));
            $this->output->append_output('<script>window.history.replaceState("", "Sólido kids", "'. $url .'")</script>');
        }
    }

    public function editar_servico()
    {
        if($this->input->get('id')){
            $dados['servico'] = $this->servicos_model->get_servico($this->input->get('id'));
            $this->montaTela('site/servicos/formulario', $dados);
        }
    }

    function excluir_servico(){
        if ($this->input->post('id')) {
            $servico = $this->servicos_model->get_servico($this->input->post('id'));
            if($this->servicos_model->excluir_servico($this->input->post('id'))){
                $apagar = FCPATH.'../files/uploads/servicos/' . $servico->imagem;
                @unlink($apagar);
                $response['type'] = 'success';
                $response['title'] = 'Exclusão';
                $response['message'] = 'servico excluído com sucesso!';
                echo json_encode($response);
            }else{
                $response['type'] = 'error';
                $response['title'] = 'Exclusão';
                $response['message'] = 'Ocorreu um erro ao excluír o servico!';
                echo json_encode($response);
            }
        }
        return;
    }



    public function excluir_pessoa(){



        if ($this->input->post('id')) {

            if($this->servicos_model->excluir_pessoa($this->input->post('id'))){

                $this->servicos_model->atualiza_servico($this->input->get('id_servico'));

                $response['type'] = 'success';
                $response['title'] = 'Exclusão';
                $response['message'] = 'servico excluído com sucesso!';
                echo json_encode($response);
            }else{
                $response['type'] = 'error';
                $response['title'] = 'Exclusão';
                $response['message'] = 'Ocorreu um erro ao excluír o servico!';
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

        $data['agendamentos'] =  $this->servicos_model->get_agendamentos();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/servicos/lista_agendamentos', $data);
    }


    public function lista_pessoas(){

           $this->set_menu_active(
                            array(
                                'menu' => 'agenda',
                                'submenu' => 'agenda-lista'
                                )
                            );

        $data['pessoas'] =  $this->servicos_model->get_pessoas($this->input->get('id'));
        $data['id_servico'] =  $this->input->get('id_servico');

        // var_dump($data['pessoas']);
        // exit;
        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/servicos/lista_pessoas', $data);
    }

}
