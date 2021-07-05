<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_transparencia extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('site/transparencia_model');

        $this->set_menu_active(
                            array(
                                'menu' => 'transparencia',
                                'submenu' => 'lista-transparencia'
                                )
                            );
    }

    public function index()
    {
        $this->lista();
    }


    public function lista()
    {
        $data['transparencia'] =  $this->transparencia_model->get_transparencias();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/transparencia/lista', $data);
    }

    function novo_transparencia(){
        $this->montaTela('site/transparencia/formulario');
    }

    function salvar_transparencia(){
        if($this->input->post()){
            if(!empty($_FILES['transparencia']['name'])){
                $this->load->library('upload', array(
                        'upload_path' => FCPATH.'../public/imagens/transparencia',
                        'allowed_types' => 'jpg|png|gif',
                        'file_name' => hash('md5', uniqid(rand(0, 500)) . time() . rand(0, 500)),
                        'max_size' => 8 * 1024,
                        'remove_spaces' => TRUE
                    ));

                if ($this->upload->do_upload('transparencia')){
                    $file_data = $this->upload->data();
                    $this->load->library('image_lib', array(
                            'image_library' => 'gd2',
                            'source_image' => $file_data['full_path'],
                            'create_thumb' => FALSE,
                            'maintain_ratio' => TRUE,
                            'width' => 1920,
                            'height' => 650,
                            'quality' => '100%'
                        )
                    );
                    $this->image_lib->resize();
                }

                if($this->input->post('imagem_transparencia')){
                    if ($_FILES['transparencia']['name'] != $this->input->post('imagem_transparencia')) {
                        $apagar = FCPATH.'../public/imagens/transparencia/' . $this->input->post('imagem_transparencia');
                        @unlink($apagar);
                    }
                }
            }else{
                if($this->input->post('imagem_transparencia')){
                    $file_data['file_name'] = $this->input->post('imagem_transparencia');
                }else{
                    $file_data['file_name'] = '';
                }
            }

            $dados = array(
                'nome' => $this->input->post('nome'),
                'tipo' => $this->input->post('tipo'),
                'descricao' => $this->input->post('descricao'),
                'valor' => $this->input->post('valor'),
                'data' => $this->input->post('data'),
                
         
            );

            $id = NULL;

            //editar agenda
            if($this->input->post('id')){
                $id = $this->input->post('id');
            }

            if($this->transparencia_model->salvar_transparencia($dados, $id))
            {
                $_GET['type'] = 'success';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'atualizado com sucesso!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'cadastrado com sucesso!';
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar !';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar !';
                }
            }
            $this->lista();
            $url = base_url(array('transparencia'));
            $this->output->append_output('<script>window.history.replaceState("", "SWE", "'. $url .'")</script>');
        }
    }

    public function editar_transparencia()
    {
        if($this->input->get('id')){
            $dados['transparencia'] = $this->transparencia_model->get_transparencia($this->input->get('id'));

            $this->montaTela('site/transparencia/formulario', $dados);
        }
    }

    function excluir_transparencia(){
        if ($this->input->post('id')) {
            $transparencia = $this->transparencia_model->get_transparencia($this->input->post('id'));
            if($this->transparencia_model->excluir_transparencia($this->input->post('id'))){
   
                    
                $response['type'] = 'success';
                $response['title'] = 'Exclusão';
                $response['message'] = 'excluído com sucesso!';
                echo json_encode($response);
            }else{
                $response['type'] = 'error';
                $response['title'] = 'Exclusão';
                $response['message'] = 'Ocorreu um erro ao excluír !';
                echo json_encode($response);
            }
        }
        return;
    }



  

  public function upload_imagem($value='')
    {
      if(!empty($_FILES['imagem']['name'])){
        $this->load->library('upload', [
            'upload_path' => FCPATH.'../public/imagens/transparencia',
            'allowed_types' => 'jpg|png|gif',
            'file_name' => hash('md5', uniqid(rand(0, 500)) . time() . rand(0, 500)),
            'max_size' => 8 * 1024,
            'remove_spaces' => TRUE
          ]
        );
        if ($this->upload->do_upload('imagem')){
          $file_data = $this->upload->data();
          $this->load->library('image_lib', [
              'image_library' => 'gd2',
              'source_image' => $file_data['full_path'],
              'create_thumb' => FALSE,
              'maintain_ratio' => TRUE,
              'quality' => '100%'
            ]
          );
          //$this->image_lib->resize();
        }

        if($this->input->post('imagem_horario')){
          if ($_FILES['imagem']['name'] != $this->input->post('imagem_horario')) {
            $apagar = FCPATH.'../public/imagens/transparencia/' . $this->input->post('imagem_horario');
            @unlink($apagar);
          }
        }
      }else{
        if($this->input->post('imagem_horario')){
          $file_data['file_name'] = $this->input->post('imagem_horario');
        }else{
          $file_data['file_name'] = '';
        }
      }
      return $file_data;
    }


}
