<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Loja_produtos extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('loja/produtos_model');
        $this->load->helper('form');
        $this->load->helper('text');

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
        $data['produtos'] =  $this->produtos_model->get_produtos();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }


        $this->montaTela('loja/lista', $data);
    }

    function novo_produto(){
       $data['categorias'] = $this->produtos_model->get_categorias();
            $data['produto'] = $this->produtos_model->get_produto($this->input->get('id'));
            $data['tamanhos'] = $this->produtos_model->get_tamanhos();
                                  // TAMANHOS
            $tam_prod = array();
            if ($tams = $this->produtos_model->get_tamanhos_produto($this->input->get('id'))) {
              foreach ($tams as $key => $value) {
                $tam_prod[] = $value->tamanhos_id;
              }
            }
            $data['tamanhos_produto'] = $tam_prod;
                            // Categorias
            $cat_prod = array();
            if ($cat = $this->produtos_model->get_categorias_produto($this->input->get('id'))) {
              foreach ($cat as $key => $value) {
                $cat_prod[] = $value->categorias_id;
              }
            }
            $data['categorias_produto'] = $cat_prod;

        $this->montaTela('loja/formulario', $data);
    }

    function salvar_produto(){


            if ($this->input->post('tamanhos')) {
                $tamanho = 1;
            }else{
                $tamanho = 0;
            }


        if($this->input->post()){
            $upload = $this->upload_imagem();
            $cats = $this->input->post('categorias');
            $dados = array(
                'titulo' => $this->input->post('nome'),
                'categorias_id' => $cats[0],
                'valor' => $this->input->post('valor'),
                'valor_antigo' => $this->input->post('valor_antigo'),
                'tamanhos' => $tamanho,
                'valor_frete' => $this->input->post('valor_frete'),
                'descricao' => $this->input->post('descricao'),
                'detalhes' => $this->input->post('detalhes'),
                'estoque' => $this->input->post('estoque'),
                'comprimento_embalagem' => $this->input->post('comprimento_embalagem'),
                'altura_embalagem' => $this->input->post('altura_embalagem'),
                'largura_embalagem' => $this->input->post('largura_embalagem'),
                'peso' => $this->input->post('peso'),
                // 'categoria_sexo' => $this->input->post('sexo'),
                'imagem' => $upload['file_name']

            );

            $tamanhos = array();
            $categorias = array();
            $id=NULL;
            //editar agenda
            if($this->input->post('id')){
                $id = $this->input->post('id');
            }

            if($id_produto = $this->produtos_model->salvar_produto($dados, $id))
            {   
               
                 foreach ($this->input->post('categorias') as $key => $value) {
                   array_push($categorias, array('categorias_id' => $value, 'produtos_id' => $id_produto));
                 }

                $this->produtos_model->salvar_categorias($categorias, $id);
                if (isset($_FILES['galeria'])) {
                $db_img_produtos = array();
                $files = $_FILES;
                $cont = count($_FILES['galeria']['name']);
                for ($i=0; $i < $cont; $i++) {

                    $this->load->library('upload', array(
                            'upload_path' => FCPATH.'../assets/images/product',
                            'allowed_types' => 'jpg|png|gif',
                            'file_name' => hash('md5', uniqid(rand(0, 500)) . time() . rand(0, 500)),
                            'max_size' => 8 * 1024,
                            'remove_spaces' => TRUE
                        ));

                    $_FILES['galeria']['name']= $files['galeria']['name'][$i];
                    $_FILES['galeria']['type']= $files['galeria']['type'][$i];
                    $_FILES['galeria']['tmp_name']= $files['galeria']['tmp_name'][$i];
                    $_FILES['galeria']['error']= $files['galeria']['error'][$i];
                    $_FILES['galeria']['size']= $files['galeria']['size'][$i];

                    if ($this->upload->do_upload('galeria')){
                        $file_data = $this->upload->data();
                        $this->load->library('image_lib', array(
                                'image_library' => 'gd2',
                                'source_image' => $file_data['full_path'],
                                'create_thumb' => FALSE,
                                'maintain_ratio' => TRUE,
                                //'width' => 800,
                                //'height' => 800,
                                'quality' => '100%'
                            )
                        );
                        $this->image_lib->resize();
                        array_push($db_img_produtos, array('foto' => $file_data['file_name'], 'produtos_id' => $id_produto));
                    }

                }
              }

                //´só é usado durante a edição, serve para apagar a imagem do servidor
                if($this->input->post('remove_imagem')){
                    if ($this->produtos_model->excluir_imagem($this->input->post('remove_imagem'))) {
                        foreach ($this->input->post('nome_imagem') as $imagem) {
                            $apagar = FCPATH.'../assets/images/produtos/' . $imagem;
                            @unlink($apagar);
                        }
                    }
                }



                //verifica se foi feito o upload de alguma imagem (mais usado durante a edição de produtos)
                if( isset($db_img_produtos) && count($db_img_produtos) > 0){
                    if($this->produtos_model->salvar_galeria($db_img_produtos)){
                        $_GET['type'] = 'success';
                        if($id){
                            $_GET['title'] = 'Atualização';
                            $_GET['message'] = 'Produto e galeria de imagem atualizados com sucesso!';
                        }else{
                            $_GET['title'] = 'Cadastro';
                            $_GET['message'] = 'Produto e galeria de imagem cadastrados com sucesso!';
                        }
                    }else{
                        $_GET['type'] = 'error';
                        if($id){
                            $_GET['title'] = 'Atualização';
                            $_GET['message'] = 'Ocorreu um erro ao atualizar a galeria de imagem do produto!';
                        }else{
                            $_GET['title'] = 'Cadastro';
                            $_GET['message'] = 'Ocorreu um erro ao cadastrar a galeria de imagem do produto!';
                        }
                    }
                }else{
                    $_GET['type'] = 'success';
                    if($id){
                        $_GET['title'] = 'Atualização';
                        $_GET['message'] = 'Produto atualizado com sucesso!';
                    }else{
                        $_GET['title'] = 'Cadastro';
                        $_GET['message'] = 'Produto cadastrado com sucesso!';
                    }
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar o produto!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar o produto!';
                }
            }
            $this->lista();
            $url = base_url(array('loja/produtos'));
            $this->output->append_output('<script>window.history.replaceState("", "Line Hair", "'. $url .'")</script>');
        }
    }

    public function editar_produto()
    {
        if($this->input->get('id')){
            $dados['categorias'] = $this->produtos_model->get_categorias();
            $dados['produto'] = $this->produtos_model->get_produto($this->input->get('id'));
            $dados['tamanhos'] = $this->produtos_model->get_tamanhos();
                                  // TAMANHOS
            $tam_prod = array();
            if ($tams = $this->produtos_model->get_tamanhos_produto($this->input->get('id'))) {
              foreach ($tams as $key => $value) {
                $tam_prod[] = $value->tamanhos_id;
              }
            }
            $dados['tamanhos_produto'] = $tam_prod;
                            // Categorias
            $cat_prod = array();
            if ($cat = $this->produtos_model->get_categorias_produto($this->input->get('id'))) {
              foreach ($cat as $key => $value) {
                $cat_prod[] = $value->categorias_id;
              }
            }
            $dados['categorias_produto'] = $cat_prod;

            $this->montaTela('loja/formulario', $dados);
        }
    }

    function excluir_produto(){


        if($this->produtos_model->excluir_produto($this->input->post('id'))){
                        $response['type'] = 'success';
                        $response['title'] = 'Exclusão';
                        $response['message'] = 'Produto excluído com sucesso!';
                        echo json_encode($response);
                    }else{
                        $response['type'] = 'error';
                        $response['title'] = 'Exclusão';
                        $response['message'] = 'Ocorreu um erro ao excluír o produto!';
                        echo json_encode($response);
                    }
                    exit;
        if ($this->input->post('id')) {

            if($galeria = $this->produtos_model->get_galeria_produto($this->input->post('id'))){
                if($this->produtos_model->excluir_galeria($this->input->post('id'))){
                    if($this->produtos_model->excluir_produto($this->input->post('id'))){
                        foreach ($galeria as $img) {
                            $apagar = FCPATH.'../assets/images/produtos/' . $img->imagem;
                            @unlink($apagar);
                        }
                        $response['type'] = 'success';
                        $response['title'] = 'Exclusão';
                        $response['message'] = 'Produto excluído com sucesso!';
                        echo json_encode($response);
                    }else{
                        $response['type'] = 'error';
                        $response['title'] = 'Exclusão';
                        $response['message'] = 'Ocorreu um erro ao excluír o produto!';
                        echo json_encode($response);
                    }
                }
            }else{
                if($this->produtos_model->excluir_produto($this->input->post('id'))){
                        $response['type'] = 'success';
                        $response['title'] = 'Exclusão';
                        $response['message'] = 'Produto excluído com sucesso!';
                        echo json_encode($response);
                    }else{
                        $response['type'] = 'error';
                        $response['title'] = 'Exclusão';
                        $response['message'] = 'Ocorreu um erro ao excluír o produto!';
                        echo json_encode($response);
                    }
            }
        }
        return;
    }


    public function desativar_produto(){

        if($this->input->get('id')){

            if($this->produtos_model->desativar_produto($this->input->get('id'))){
                    $_GET['type'] = 'success';
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Produto atualizado com sucesso!';
                    $this->lista();
                    $url = base_url(array('loja', 'produtos'));
                    $this->output->append_output('<script>window.history.replaceState("", "Meritus", "'. $url .'")</script>');

            }else{

                    $_GET['type'] = 'error';
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'erro ao atualizar o produto!';
                    $this->lista();
                    $url = base_url(array('loja', 'produtos'));
                    $this->output->append_output('<script>window.history.replaceState("", "Meritus", "'. $url .'")</script>');
            }

        }


    }



    public function destacar_produto(){

        if($this->input->get('id')){

            if($this->produtos_model->destaque_produto($this->input->get('id'))){
                    $_GET['type'] = 'success';
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Produto atualizado com sucesso!';
                    $this->lista();
                    $url = base_url(array('loja', 'produtos'));
                    $this->output->append_output('<script>window.history.replaceState("", "Meritus", "'. $url .'")</script>');

            }else{

                    $_GET['type'] = 'error';
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'erro ao atualizar o produto!';
                    $this->lista();
                    $url = base_url(array('loja', 'produtos'));
                    $this->output->append_output('<script>window.history.replaceState("", "Meritus", "'. $url .'")</script>');
            }

        }


    }



    public function upload_imagem($value='')
    	{



    		if(!empty($_FILES['imagem']['name'])){
    			$this->load->library('upload', [
    					'upload_path' => FCPATH.'../assets/images/product',
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
                // 'width' => 800,
                // 'height' => 800,
                'quality' => '100%'
    					]
    				);
            $this->image_lib->resize();
    			}

    			if($this->input->post('imagem_produto')){
    				if ($_FILES['imagem']['name'] != $this->input->post('imagem_produto')) {
    					$apagar = FCPATH.'../assets/images/product' . $this->input->post('imagem_produto');
    					@unlink($apagar);
    				}
    			}
    		}else{

    			if($this->input->post('imagem_produto')){
    				$file_data['file_name'] = $this->input->post('imagem_produto');
    			}else{
    				$file_data['file_name'] = '';
    			}
    		}

    		return $file_data;
    	}


}
