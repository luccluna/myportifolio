<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_comentarios extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('comentarios/comentarios_model');

        $this->set_menu_active(
                            array(
                                'menu' => 'site',
                                'submenu' => 'loja-comentarios'
                                )
                            );
    }

    public function index()
    {
        $this->lista();
    }


    public function lista()
    {

      $data['comentarios'] =  $this->comentarios_model->get_comentarios();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/comentarios/lista', $data);
    }

    public function nova()
    {


        $this->montaTela('site/comentarios/comentarios');
    }



    function salvar_comentarios(){




        $this->load->helper('text');
        if($this->input->post()){
            if(!empty($_FILES['comentario']['name'])){
                $this->load->library('upload', array(
                        'upload_path' => FCPATH.'../assets/images/comentarios/',
                        'allowed_types' => 'jpg|png|gif',
                        'file_name' => hash('md5', uniqid(rand(0, 500)) . time() . rand(0, 500)),
                        'max_size' => 8 * 1024,
                        'remove_spaces' => TRUE
                    ));

                if ($this->upload->do_upload('comentario')){
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

            }else{
                if($this->input->post('comentario')){
                    $file_data['file_name'] = $this->input->post('comentario');
                }else{
                    $file_data['file_name'] = '';
                }
            }

            $dados = array(
                'titulo' => $this->input->post('titulo'),
                'imagem' => $file_data['file_name']
            );


              if($this->comentarios_model->salvar_comentario($dados)){
                $_GET['type'] = 'success';
                $_GET['title'] = 'Comentários';
                $_GET['message'] = 'Marca inserida com Sucesso!';
                $this->lista();
                $url = base_url(array('site', 'comentarios'));
                $this->output->append_output('<script>window.history.replaceState("", "Lamitié", "'. $url .'")</script>');

            }

        }
    }



public function excluir(){

  if ($id = $this->input->post('id')) {

      $comentario = $this->comentarios_model->get_comentario($id);
      if($comentario->imagem){
        if ($this->comentarios_model->delete_comentario($id)) {
          $apagar = FCPATH.'../assets/images/comentarios/' . $comentario->imagem;
          if (@unlink($apagar)) {
            $response['type'] = 'success';
            $response['title'] = 'Exclusão';
            $response['message'] = 'Marca excluída com sucesso!';
            echo json_encode($response);
          }else{
            $response['type'] = 'error';
            $response['title'] = 'Exclusão';
            $response['message'] = 'Ocorreu um erro ao excluír a Marca!';
            echo json_encode($response);
          }
        }
    }else{
      $this->comentarios_model->delete_comentario($id);
      $response['type'] = 'success';
      $response['title'] = 'Exclusão';
      $response['message'] = 'Marca excluída com sucesso!';
      echo json_encode($response);
    }
  }


}



public function desativar_comentarios(){

      if($this->input->get('id')){

          if($this->comentarios_model->desativar_comentario($this->input->get('id'))){
                  $_GET['type'] = 'success';
                  $_GET['title'] = 'Atualização';
                  $_GET['message'] = 'Produto atualizado com sucesso!';
                  $this->lista();
                  $url = base_url(array('loja', 'comentarios'));
                  $this->output->append_output('<script>window.history.replaceState("", "Lamitié", "'. $url .'")</script>');

          }else{

                  $_GET['type'] = 'error';
                  $_GET['title'] = 'Atualização';
                  $_GET['message'] = 'erro ao atualizar o comentario!';
                  $this->lista();
                  $url = base_url(array('loja', 'comentarios'));
                  $this->output->append_output('<script>window.history.replaceState("", "Lamitié", "'. $url .'")</script>');
          }

      }



}






}
