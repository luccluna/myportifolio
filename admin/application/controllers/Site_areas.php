<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_areas extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('site/areas_model');

        $this->set_menu_active(
                            array(
                                'menu' => 'atuacao',
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
        $data['areas'] =  $this->areas_model->get_areas();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/areas/lista', $data);
    }

    function novo_area(){
        $this->montaTela('site/areas/formulario');
    }

    function salvar_area(){
        $this->load->helper('text');
        if($this->input->post()){
            if(!empty($_FILES['area']['name'])){
                $this->load->library('upload', array(
                        'upload_path' => FCPATH.'../public/imagens/areas',
                        'allowed_types' => 'jpg|png|gif',
                        'file_name' => hash('md5', uniqid(rand(0, 500)) . time() . rand(0, 500)),
                        'max_size' => 8 * 1024,
                        'remove_spaces' => TRUE
                    ));

                if ($this->upload->do_upload('area')){
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
                    // $this->image_lib->resize();
                }

                if($this->input->post('imagem_area')){
                    if ($_FILES['area']['name'] != $this->input->post('imagem_area')) {
                        $apagar = FCPATH.'../public/imagens/areas/' . $this->input->post('imagem_area');
                        @unlink($apagar);
                    }
                }
            }else{
                if($this->input->post('imagem_area')){
                    $file_data['file_name'] = $this->input->post('imagem_area');
                }else{
                    $file_data['file_name'] = '';
                }
            }

            $dados = array(
                'titulo' => $this->input->post('titulo'),
                'descricao' => $this->input->post('descricao'),
      
                'texto_breve' => $this->input->post('texto_breve'),
                'imagem' => $file_data['file_name']
            );

            $id = NULL;

            //editar area
            if($this->input->post('id')){
                $id = $this->input->post('id');
            }else{
                $dados['data'] = time();
            }

            if($this->areas_model->salvar_area($dados, $id))
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
                    $_GET['message'] = 'Ocorreu um erro ao atualizar a area!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar a area!';
                }
            }
            $this->lista();
            $url = base_url(array('site', 'areas'));
            $this->output->append_output('<script>window.history.replaceState("", "Sólido kids", "'. $url .'")</script>');
        }
    }

    public function editar_area()
    {
        if($this->input->get('id')){
            $dados['area'] = $this->areas_model->get_area($this->input->get('id'));
            $this->montaTela('site/areas/formulario', $dados);
        }
    }

    function excluir_area(){
        if ($this->input->post('id')) {
            $area = $this->areas_model->get_area($this->input->post('id'));
            if($this->areas_model->excluir_area($this->input->post('id'))){
                $apagar = FCPATH.'../files/uploads/areas/' . $area->imagem;
                @unlink($apagar);
                $response['type'] = 'success';
                $response['title'] = 'Exclusão';
                $response['message'] = 'area excluído com sucesso!';
                echo json_encode($response);
            }else{
                $response['type'] = 'error';
                $response['title'] = 'Exclusão';
                $response['message'] = 'Ocorreu um erro ao excluír o area!';
                echo json_encode($response);
            }
        }
        return;
    }



    public function excluir_pessoa(){



        if ($this->input->post('id')) {

            if($this->areas_model->excluir_pessoa($this->input->post('id'))){

                $this->areas_model->atualiza_area($this->input->get('id_area'));

                $response['type'] = 'success';
                $response['title'] = 'Exclusão';
                $response['message'] = 'area excluído com sucesso!';
                echo json_encode($response);
            }else{
                $response['type'] = 'error';
                $response['title'] = 'Exclusão';
                $response['message'] = 'Ocorreu um erro ao excluír o area!';
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

        $data['agendamentos'] =  $this->areas_model->get_agendamentos();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/areas/lista_agendamentos', $data);
    }


    public function lista_pessoas(){

           $this->set_menu_active(
                            array(
                                'menu' => 'agenda',
                                'submenu' => 'agenda-lista'
                                )
                            );

        $data['pessoas'] =  $this->areas_model->get_pessoas($this->input->get('id'));
        $data['id_area'] =  $this->input->get('id_area');

        // var_dump($data['pessoas']);
        // exit;
        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/areas/lista_pessoas', $data);
    }

}
