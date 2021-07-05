<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_secao1 extends TEC_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('site/secao1_model');

    $this->set_menu_active(
      array(
        'menu' => 'conteudo',
        'submenu' => 'site-secao1'
      )
    );
  }

  public function index()
  {
    $this->lista();
  }


  public function lista()
  {
    $data['secao1'] =  $this->secao1_model->get_secao1();

    if($this->input->get('type')){
      $notification = new stdClass;
      $notification->type = $this->input->get('type');
      $notification->title = $this->input->get('title');
      $notification->message = $this->input->get('message');
      $data['notification'] = $notification;
    }

    $this->montaTela('site/secao1/lista', $data);
  }

  function novo_secao1(){


    $dados['secao'] = $this->secao1_model->get_secao1();
    
    $this->montaTela('site/secao1/formulario', $dados);
  }



  public function salvar_secao1(){
  
    $this->secao1_model->salvar_secao1(null, $this->input->post('titulo1'), $this->input->post('texto1'),$this->input->post('id_secao1'));

    // $this->upload_file('imagem1', $this->input->post('titulo1'),$this->input->post('texto1'), 'imagem_secao1', $this->input->post('id_secao1'), 2);
    // $this->upload_file('imagem2', $this->input->post('titulo2'),$this->input->post('texto2'), 'imagem_secao2', $this->input->post('id_secao2'), 2);

    $_GET['title'] = 'Cadastro';
    $_GET['message'] = 'Anuncios atualizados com sucesso!';
    $_GET['type'] = 'success';
    $this->novo_secao1();
    $url = base_url(array('site/secao1'));
    $this->output->append_output('<script>window.history.replaceState("", "SWE", "'. $url .'")</script>');
  }



  function upload_file($imagem, $titulo, $texto, $imagem_secao, $id){

    if(!empty($_FILES[$imagem]['name'])){
      $this->load->library('upload', array(
        'upload_path' => FCPATH.'../assets/images/secao1',
        'allowed_types' => 'jpg|png|gif',
        'file_name' => hash('md5', uniqid(rand(0, 900)) . time() . rand(0, 900)),
        'max_size' => 8 * 1024,
        'remove_spaces' => TRUE
      ));
      if ($this->upload->do_upload($imagem)){
        $file_data = $this->upload->data();

        

        $this->load->library('image_lib', array(
          'image_library' => 'gd2',
          'source_image' => $file_data['full_path'],
          'create_thumb' => FALSE,
          'maintain_ratio' => TRUE,
      
        )
      );
       // $this->image_lib->resize();
        
          $teste = $this->secao1_model->salvar_secao1($file_data['file_name'], $titulo, $texto, $id);
        
      }

      if($imagem_secao){
        if ($_FILES[$imagem]['name'] != $imagem_secao && $teste) {
          $apagar = FCPATH.'../assets/images/secao1/' . $imagem_secao;
          @unlink($apagar);
        }
      }
    }else{

     
       $this->secao1_model->salvar_secao1(NULL, $titulo, $texto, $id);
     

    }
  }




}
