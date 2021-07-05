<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_eventos extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('site/eventos_model');

        $this->set_menu_active(
                            array(
                                'menu' => 'agenda',
                                'submenu' => 'site-eventos'
                                )
                            );
    }

    public function index()
    {
        $this->lista();
    }


    public function lista()
    {
        $data['eventos'] =  $this->eventos_model->get_eventos();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/eventos/lista', $data);
    }

    function novo_evento(){
        $this->montaTela('site/eventos/formulario');
    }

    function salvar_evento(){
        $this->load->helper('text');
        if($this->input->post()){
            if(!empty($_FILES['evento']['name'])){
                $this->load->library('upload', array(
                        'upload_path' => FCPATH.'../public/imagens/alojamentos',
                        'allowed_types' => 'jpg|png|gif',
                        'file_name' => hash('md5', uniqid(rand(0, 500)) . time() . rand(0, 500)),
                        'max_size' => 8 * 1024,
                        'remove_spaces' => TRUE
                    ));

                if ($this->upload->do_upload('evento')){
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

                if($this->input->post('imagem_evento')){
                    if ($_FILES['evento']['name'] != $this->input->post('imagem_evento')) {
                        $apagar = FCPATH.'../public/imagens/alojamentos/' . $this->input->post('imagem_evento');
                        @unlink($apagar);
                    }
                }
            }else{
                if($this->input->post('imagem_evento')){
                    $file_data['file_name'] = $this->input->post('imagem_evento');
                }else{
                    $file_data['file_name'] = '';
                }
            }


            $dados = array(
                'titulo' => $this->input->post('titulo'),
                'descricao' => $this->input->post('descricao'),
                // 'vagas' => $this->input->post('vagas'),
                // 'texto_breve' => $this->input->post('texto_breve'),
                'data' => $this->input->post('data'),
                'imagem' => $file_data['file_name']
            );

            $id = NULL;

            //editar evento
            if($this->input->post('id')){
                $id = $this->input->post('id');
            }else{
                $dados['data'] = time();
            }

            if($this->eventos_model->salvar_evento($dados, $id))
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
                    $_GET['message'] = 'Ocorreu um erro ao atualizar a evento!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar a evento!';
                }
            }
            $this->lista();
            $url = base_url(array('site', 'eventos'));
            $this->output->append_output('<script>window.history.replaceState("", "Sólido kids", "'. $url .'")</script>');
        }
    }

    public function editar_evento()
    {
        if($this->input->get('id')){
            $dados['evento'] = $this->eventos_model->get_evento($this->input->get('id'));
            $this->montaTela('site/eventos/formulario', $dados);
        }
    }

    function excluir_evento(){
        if ($this->input->post('id')) {
            $evento = $this->eventos_model->get_evento($this->input->post('id'));
            if($this->eventos_model->excluir_evento($this->input->post('id'))){
                $apagar = FCPATH.'../files/uploads/eventos/' . $evento->imagem;
                @unlink($apagar);
                $response['type'] = 'success';
                $response['title'] = 'Exclusão';
                $response['message'] = 'evento excluído com sucesso!';
                echo json_encode($response);
            }else{
                $response['type'] = 'error';
                $response['title'] = 'Exclusão';
                $response['message'] = 'Ocorreu um erro ao excluír o evento!';
                echo json_encode($response);
            }
        }
        return;
    }



    public function excluir_pessoa(){



        if ($this->input->post('id')) {
          
            if($this->eventos_model->excluir_pessoa($this->input->post('id'))){
                
                $this->eventos_model->atualiza_alojamento($this->input->get('id_alojamento'));

                $response['type'] = 'success';
                $response['title'] = 'Exclusão';
                $response['message'] = 'evento excluído com sucesso!';
                echo json_encode($response);
            }else{
                $response['type'] = 'error';
                $response['title'] = 'Exclusão';
                $response['message'] = 'Ocorreu um erro ao excluír o evento!';
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

        $data['agendamentos'] =  $this->eventos_model->get_agendamentos();
    
        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/eventos/lista_agendamentos', $data);
    }


    public function lista_pessoas(){

           $this->set_menu_active(
                            array(
                                'menu' => 'agenda',
                                'submenu' => 'agenda-lista'
                                )
                            );

        $data['pessoas'] =  $this->eventos_model->get_pessoas($this->input->get('id'));
        $data['id_alojamento'] =  $this->input->get('id_alojamento');

        // var_dump($data['pessoas']);
        // exit;
        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/eventos/lista_pessoas', $data);
    }

    public function adicionar_imagem(){

  
         $dados['evento'] = $this->eventos_model->get_event($this->input->get('id'));
        $this->montaTela('site/eventos/formulario_galeria', $dados);
    }

    public function salvar_imagem(){
      
           if($this->input->post()){
            $id_noticia = $this->input->post('id');
            $db_img_galeria = array();
            $cont = count($_FILES['galeria']['name']);

            $files = $_FILES;
            $_FILES = array();

            $config_upload = array(
                            'upload_path' => FCPATH.'../public/imagens/evento/galeria',
                            'allowed_types' => 'jpg|png|gif',
                            'create_thumb' => FALSE,
                            // 'file_name' => hash('md5', uniqid(rand(0, 500)) . time() . rand(0, 500)),
                            'max_size' => 8 * 1024,
                            'remove_spaces' => TRUE
                            );

            $config_image_lib = array(
                                    'image_library' => 'gd2',
                                    // 'source_image' => $file_data['full_path'],
                                    // 'new_image' => FCPATH.'../files/uploads/galerias-fotos/'.$small_thumb,
                                   // 'width' => 150,
                                   // 'height' => 150
                                    );

            $this->load->library('upload', $config_upload);
            $this->load->library('image_lib', $config_image_lib);

            for ($i=0; $i < $cont; $i++) {
                $_FILES['galeria']['name']= $files['galeria']['name'][$i];
                $_FILES['galeria']['type']= $files['galeria']['type'][$i];
                $_FILES['galeria']['tmp_name']= $files['galeria']['tmp_name'][$i];
                $_FILES['galeria']['error']= $files['galeria']['error'][$i];
                $_FILES['galeria']['size']= $files['galeria']['size'][$i];

                $config_upload['file_name'] = hash('md5', uniqid(rand(0, 500)) . time() . rand(0, 500));

                $this->upload->initialize($config_upload);

                if ($this->upload->do_upload('galeria')){
                    $file_data = $this->upload->data();

                    $small_thumb = 'S_' . $file_data['file_name'];
                    $config_image_lib['new_image'] = FCPATH.'../public/imagens/evento/galeria/';
                    $config_image_lib['source_image'] = $file_data['full_path'];

                    $this->image_lib->initialize($config_image_lib);
                    $this->image_lib->resize();
                    array_push($db_img_galeria, array('imagem' => $file_data['file_name'], 'alojamento_id' => $id_noticia));
                     
                }   
            }
            }

            
            if (count($db_img_galeria)>0) {
                
                if ($this->eventos_model->salvar_galeria($db_img_galeria)) {
                         $_GET['type'] = 'success';
               
                    $_GET['title'] = 'Adicionado';
                    $_GET['message'] = 'galeria adicionada com sucesso!';


                        $this->lista();
                        $url = base_url(array('site'));
                        $this->output->append_output('<script>window.history.replaceState("", "", "'. $url .'")</script>');
                }


            }



    }

    public function imagem(){
        

         if($this->input->get('id')){
            $dados['evento'] = $this->eventos_model->get_event($this->input->get('id'));
            $dados['galeria'] = $this->eventos_model->get_galeria_noticia($this->input->get('id'));
            $this->montaTela('site/eventos/lista_galeria', $dados);
        }

    }

    public function imagem_excluir(){

                     $galeria = $this->eventos_model->get_galeria_imagem($this->input->post('id'));
                  
                    if($this->eventos_model->excluir_imagem_galeria($this->input->post('id'))){
                        $apagar = FCPATH.'../public/imagens/evento/galeria/'.$galeria->imagem;
                        @unlink($apagar);
                        $response['type'] = 'success';
                        $response['title'] = 'Exclusão';
                        $response['message'] = 'excluído com sucesso!';
                        echo json_encode($response);
                    }else{
                        $response['type'] = 'error';
                        $response['title'] = 'Exclusão';
                        $response['message'] = 'Ocorreu um erro ao excluír!';
                        echo json_encode($response);
                    }

    }

}