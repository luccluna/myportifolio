<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fotos_produtos extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('site/fotos_produtos_model');

        $this->set_menu_active(
                            array(
                              'menu' => 'Loja',
                              'submenu' => 'Loja-produtos'
                                )
                            );
    }

    public function index()
    {
        $this->lista();
    }


    public function lista()
    {
        $data['galerias'] =  $this->fotos_produtos_model->get_galerias($this->input->get('id'));
        $data['produto'] =  $this->fotos_produtos_model->get_produto($this->input->get('id'));

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/galerias_fotos/lista', $data);
    }

    function nova_galeria(){
        $this->montaTela('site/galerias_fotos/formulario');
    }

    function add_fotos(){
        $data['id'] = $this->input->get('id');
        $this->montaTela('site/galerias_fotos/formulario_fotos', $data);
    }

    function salvar_fotos(){

            $this->load->helper('text');
            $db_img_produtos = array();
            $files = $_FILES;
            $cont = count($_FILES['imagens']['name']);

            if ($id = $this->input->post('id')) {


              for ($i=0; $i < $cont; $i++) {

                  $this->load->library('upload', array(
                          'upload_path' => FCPATH.'../assets/images/product',
                          'allowed_types' => 'jpg|png|gif',
                          'file_name' => hash('md5', uniqid(rand(0, 500)) . time() . rand(0, 500)),
                          'max_size' => 8 * 1024,
                          'remove_spaces' => TRUE
                      ));

                  $_FILES['galeria']['name']= $files['imagens']['name'][$i];
                  $_FILES['galeria']['type']= $files['imagens']['type'][$i];
                  $_FILES['galeria']['tmp_name']= $files['imagens']['tmp_name'][$i];
                  $_FILES['galeria']['error']= $files['imagens']['error'][$i];
                  $_FILES['galeria']['size']= $files['imagens']['size'][$i];

                  if ($this->upload->do_upload('galeria')){
                      $file_data = $this->upload->data();
                      $this->load->library('image_lib', array(
                              'image_library' => 'gd2',
                              'source_image' => $file_data['full_path'],
                              'create_thumb' => FALSE,
                              'maintain_ratio' => TRUE,
                              // 'width' => 400,
                              // 'height' => 400
                          )
                      );

                      array_push($db_img_produtos, array('foto' => $file_data['file_name'], 'produtos_id' => $id));
                  }

              }



            if($this->fotos_produtos_model->salvar_galeria($db_img_produtos))
            {
                $_GET['type'] = 'success';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Galeria atualizada com sucesso!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Galeria cadastrada com sucesso!';
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar a galeria!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar a galeria!';
                }
            }
              $_GET['id'] = $id;
      }
            $this->lista();
            $url = base_url(array('loja','fotos-produto'));
            $this->output->append_output('<script>window.history.replaceState("", "Sólido Kids", "'. $url .'")</script>');

    }

    function salvar_fotos_(){
        // // echo '<pre>';
        // // var_dump($_FILES);
        // exit;
        if($this->input->post()){
            $id_galeria = $this->input->post('id');
            $db_img_galeria = array();
            $cont = count($_FILES['imagem']['name']);
            $files = $_FILES;
            $_FILES = array();

            $config_upload = array(
                            'upload_path' => FCPATH.'../files/uploads/galerias-fotos',
                            'allowed_types' => 'jpg|png|gif',
                            // 'file_name' => hash('md5', uniqid(rand(0, 500)) . time() . rand(0, 500)),
                            'max_size' => 8 * 1024,
                            'remove_spaces' => TRUE
                            );

            $config_image_lib = array(
                                    'image_library' => 'gd2',
                                    // 'source_image' => $file_data['full_path'],
                                    // 'new_image' => FCPATH.'../files/uploads/galerias-fotos/'.$small_thumb,
                                    'width' => 150,
                                    'height' => 150
                                    );

            $this->load->library('upload', $config_upload);
            $this->load->library('image_lib', $config_image_lib);

            for ($i=0; $i < $cont; $i++) {
                $_FILES['imagem']['name']= $files['imagem']['name'][$i];
                $_FILES['imagem']['type']= $files['imagem']['type'][$i];
                $_FILES['imagem']['tmp_name']= $files['imagem']['tmp_name'][$i];
                $_FILES['imagem']['error']= $files['imagem']['error'][$i];
                $_FILES['imagem']['size']= $files['imagem']['size'][$i];

                $config_upload['file_name'] = hash('md5', uniqid(rand(0, 500)) . time() . rand(0, 500));

                $this->upload->initialize($config_upload);

                if ($this->upload->do_upload('imagem')){
                    $file_data = $this->upload->data();

                    $small_thumb = 'S_' . $file_data['file_name'];
                    $config_image_lib['new_image'] = FCPATH.'../files/uploads/galerias-fotos/'.$small_thumb;
                    $config_image_lib['source_image'] = $file_data['full_path'];

                    $this->image_lib->initialize($config_image_lib);
                    $this->image_lib->resize();
                    array_push($db_img_galeria, array('imagem' => $file_data['file_name'], 'small_thumb' => $small_thumb, 'galerias_id' => $id_galeria));
                }
            }
            // echo '<pre>';
            // var_dump($db_img_galeria);
            // exit;

            //´só é usado durante a edição, serve para apagar a imagem do servidor
            if($this->input->post('remove_imagem')){
                if ($this->fotos_produtos_model->excluir_imagem($this->input->post('remove_imagem'))) {
                    foreach ($this->input->post('nome_imagem') as $imagem) {
                        $apagar1 = FCPATH.'../files/uploads/galerias-fotos/' . $imagem;
                        $apagar2 = FCPATH.'../files/uploads/galerias-fotos/S_' . $imagem;
                        @unlink($apagar1);
                        @unlink($apagar2);
                    }
                }
            }

            //verifica se foi feito o upload de alguma imagem (mais usado durante a edição de produtos)
            if(count($db_img_galeria) > 0){
                if($this->fotos_produtos_model->salvar_fotos_galeria($db_img_galeria)){
                    $_GET['type'] = 'success';
                    if($this->input->post('remove_imagem')){
                        $_GET['title'] = 'Atualização';
                        $_GET['message'] = 'Galeria de imagem atualizada com sucesso!';
                    }else{
                        $_GET['title'] = 'Cadastro';
                        $_GET['message'] = 'Galeria de imagem cadastrada com sucesso!';
                    }
                }else{
                    $_GET['type'] = 'error';
                    if($this->input->post('remove_imagem')){
                        $_GET['title'] = 'Atualização';
                        $_GET['message'] = 'Ocorreu um erro ao atualizar a galeria de imagem!';
                    }else{
                        $_GET['title'] = 'Cadastro';
                        $_GET['message'] = 'Ocorreu um erro ao cadastrar a galeria de imagem!';
                    }
                }
            }
            $this->lista();
            $url = base_url(array('lista'));
            $this->output->append_output('<script>window.history.replaceState("", "Sólido Kids", "'. $url .'")</script>');
        }
    }

    public function editar_galeria()
    {
        if($this->input->get('id')){
            $dados['galeria'] = $this->fotos_produtos_model->get_galeria($this->input->get('id'));
            $this->montaTela('site/galerias_fotos/formulario', $dados);
        }
    }

    function excluir_galeria(){

        if ($this->input->post('id')) {
            $foto = $this->fotos_produtos_model->get_foto($this->input->post('id'));

            if($this->fotos_produtos_model->excluir_galeria($this->input->post('id'))){
                $apagar = FCPATH.'../assets/images/product/' . $foto->foto;
                @unlink($apagar);
                $response['type'] = 'success';
                $response['title'] = 'Exclusão';
                $response['message'] = 'Foto excluída com sucesso!';
                echo json_encode($response);
            }else{
                $response['type'] = 'error';
                $response['title'] = 'Exclusão';
                $response['message'] = 'Ocorreu um erro ao excluír a Foto!';
                echo json_encode($response);
            }
        }
        return;
    }

}
