<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_institucional extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('site/institucional_model');

        $this->set_menu_active(
            array(
                'menu' => 'institucional',
                'submenu' => 'site-institucional'
            )
        );
    }

    public function index()
    {
        $data['projeto'] = $this->institucional_model->o_projeto();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/institucional/formulario', $data);
    } 

    public function certificacao()
    {

        $this->set_menu_active(
            array(
                'menu' => 'institucional',
                'submenu' => 'certificacao'
            )
        );

        $data['certificacao'] = $this->institucional_model->certificacao();
        

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/institucional/formulario_certificacao', $data);
    }

    /*EAD*/

    public function ead()
    {

        $this->set_menu_active(
            array(
                'menu' => 'institucional',
                'submenu' => 'ead'
            )
        );

        $data['ead'] = $this->institucional_model->ead();
        

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/institucional/formulario_ead', $data);
    }


    public function servicos_publicos()
    {

        $this->set_menu_active(
            array(
                'menu' => 'institucional',
                'submenu' => 'servicos'
            )
        );

        $data['servicos'] = $this->institucional_model->servicos_publicos();
        

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/institucional/formulario_servicos_publicos', $data);
    }


    public function termos_de_uso()
    {

        $this->set_menu_active(
            array(
                'menu' => 'institucional',
                'submenu' => 'termos'
            )
        );


        $data['termos'] = $this->institucional_model->termos_de_uso();
        

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/institucional/formulario_termos_de_uso', $data);
    }
    

    public function editar_termo_uso()
    {

        $this->set_menu_active(
            array(
                'menu' => 'institucional',
                'submenu' => 'termos_de_uso'
            )
        );


        $data['termos'] = $this->institucional_model->termos_de_uso();
        

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/institucional/editar_termo_de_uso', $data);
    }



    function editar_institucional(){

        if($this->input->post()){

            if(!empty($_FILES['imagem']['name'])){
                $this->load->library('upload', array(
                    'upload_path' => FCPATH.'../assets/images/paginas',
                    'allowed_types' => 'jpg|png|gif',
                    'file_name' => $_FILES['imagem']['name'],
                    'max_size' => 8 * 1024,
                    'remove_spaces' => TRUE
                ));

                if ($this->upload->do_upload('imagem')){
                    $file_data = $this->upload->data();
                    $this->load->library('image_lib', array(
                        'image_library' => 'gd2',
                        'source_image' => $file_data['full_path'],
                        'create_thumb' => FALSE,
                        'maintain_ratio' => TRUE,
                        'width' => 800,
                        'height' => 400
                    )
                );
                    $this->image_lib->resize();
                }

                if($this->input->post('imagem_institucional')){
                    if ($_FILES['imagem']['name'] != $this->input->post('imagem_institucional')) {
                        $apagar = FCPATH.'../files/uploads/institucional/' . $this->input->post('imagem_institucional');
                        @unlink($apagar);
                    }
                }
            }else{
                if($this->input->post('imagem_institucional')){
                    $file_data['file_name'] = $this->input->post('imagem_institucional');
                }else{
                    $file_data['file_name'] = '';
                }
            }

            $dados = array(
                'descricao'   => $this->input->post('descricao'),
                'imagem'    => $file_data['file_name']
            );
            
            $id = NULL;

            //editar agenda
            if($this->input->post('id')){
                $id = $this->input->post('id');
            }

            if($this->institucional_model->salvar_institucional($dados, $id))
            {
                $_GET['type'] = 'success';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Institucional atualizado com sucesso!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Institucional cadastrado com sucesso!';
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar o institucional!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar o institucional!';
                }
            }
            $this->index();
            $url = base_url(array('site', 'institucional'));
            $this->output->append_output('<script>window.history.replaceState("", "Acrilmoc", "'. $url .'")</script>');
        }
    }



    function editar_certificacao(){

        if($this->input->post()){

            if(!empty($_FILES['imagem']['name'])){
                $this->load->library('upload', array(
                    'upload_path' => FCPATH.'../assets/images/paginas',
                    'allowed_types' => 'jpg|png|gif',
                    'file_name' => $_FILES['imagem']['name'],
                    'max_size' => 8 * 1024,
                    'remove_spaces' => TRUE
                ));

                if ($this->upload->do_upload('imagem')){
                    $file_data = $this->upload->data();
                    $this->load->library('image_lib', array(
                        'image_library' => 'gd2',
                        'source_image' => $file_data['full_path'],
                        'create_thumb' => FALSE,
                        'maintain_ratio' => TRUE,
                        'width' => 800,
                        'height' => 400
                    )
                );
                    $this->image_lib->resize();
                }

                if($this->input->post('imagem_institucional')){
                    if ($_FILES['imagem']['name'] != $this->input->post('imagem_institucional')) {
                        $apagar = FCPATH.'../files/uploads/institucional/' . $this->input->post('imagem_institucional');
                        @unlink($apagar);
                    }
                }
            }else{
                if($this->input->post('imagem_institucional')){
                    $file_data['file_name'] = $this->input->post('imagem_institucional');
                }else{
                    $file_data['file_name'] = '';
                }
            }

            $dados = array(
                'descricao'   => $this->input->post('descricao'),
                'imagem'    => $file_data['file_name']
            );
            
            $id = NULL;

            //editar agenda
            if($this->input->post('id')){
                $id = $this->input->post('id');
            }

            if($this->institucional_model->salvar_certificacao($dados, $id))
            {
                $_GET['type'] = 'success';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Institucional atualizado com sucesso!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Institucional cadastrado com sucesso!';
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar o institucional!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar o institucional!';
                }
            }
            $this->certificacao();
            $url = base_url(array('site', 'editar-certificacao'));
            $this->output->append_output('<script>window.history.replaceState("", "Acrilmoc", "'. $url .'")</script>');
        }
    }



    function editar_servicos(){

        if($this->input->post()){

            if(!empty($_FILES['imagem']['name'])){
                $this->load->library('upload', array(
                    'upload_path' => FCPATH.'../assets/images/paginas',
                    'allowed_types' => 'jpg|png|gif',
                    'file_name' => $_FILES['imagem']['name'],
                    'max_size' => 8 * 1024,
                    'remove_spaces' => TRUE
                ));

                if ($this->upload->do_upload('imagem')){
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

                if($this->input->post('imagem_institucional')){
                    if ($_FILES['imagem']['name'] != $this->input->post('imagem_institucional')) {
                        $apagar = FCPATH.'../files/uploads/institucional/' . $this->input->post('imagem_institucional');
                        @unlink($apagar);
                    }
                }
            }else{
                if($this->input->post('imagem_institucional')){
                    $file_data['file_name'] = $this->input->post('imagem_institucional');
                }else{
                    $file_data['file_name'] = '';
                }
            }

            $dados = array(
                'descricao'   => $this->input->post('descricao'),
                'imagem'    => $file_data['file_name']
            );
            
            $id = NULL;

            //editar agenda
            if($this->input->post('id')){
                $id = $this->input->post('id');
            }

            if($this->institucional_model->salvar_servicos($dados, $id))
            {
                $_GET['type'] = 'success';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Institucional atualizado com sucesso!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Institucional cadastrado com sucesso!';
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar o institucional!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar o institucional!';
                }
            }
            $this->servicos_publicos();
            $url = base_url(array('site', 'editar-servicos'));
            $this->output->append_output('<script>window.history.replaceState("", "Acrilmoc", "'. $url .'")</script>');
        }
    }

    function gerar_novo_nome_url_utilidades($slug_url){        

        $contador = 1000000;
        for ($i=1; $i <$contador; $i++) {

           $novo_slug_url = $slug_url ."-" . $i;
           $test_url =  $this->institucional_model->confere_nome_url_utilidade($novo_slug_url);

           if($test_url == false){
            break;

        }


    }


    return $novo_slug_url;

}

function editar_termos(){


    if($this->input->post()){

        if(!empty($_FILES['imagem']['name'])){

            $this->load->library('upload', array(
                'upload_path' => FCPATH.'../assets/images/paginas',
                'allowed_types' => 'jpg|png|gif',
                'file_name' => $_FILES['imagem']['name'],
                'max_size' => 8 * 1024,
                'remove_spaces' => TRUE
            ));

            if ($this->upload->do_upload('imagem')){
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

            if($this->input->post('imagem_institucional')){
                if ($_FILES['imagem']['name'] != $this->input->post('imagem_institucional')) {
                    $apagar = FCPATH.'../files/uploads/institucional/' . $this->input->post('imagem_institucional');
                    @unlink($apagar);
                }
            }
        }else{
            if($this->input->post('imagem_institucional')){
                $file_data['file_name'] = $this->input->post('imagem_institucional');
            }else{
                $file_data['file_name'] = '';
            }
        }

        $dados = array(
            'descricao'   => $this->input->post('descricao'),
            'imagem'    =>  $_FILES['imagem']['name']
        );

        $id = NULL;

            //editar agenda
        if($this->input->post('id')){
            $id = $this->input->post('id');
        }

        if($this->institucional_model->salvar_termos($dados, $id))
        {
            $_GET['type'] = 'success';
            if($id){
                $_GET['title'] = 'Atualização';
                $_GET['message'] = 'Institucional atualizado com sucesso!';
            }else{
                $_GET['title'] = 'Cadastro';
                $_GET['message'] = 'Institucional cadastrado com sucesso!';
            }
        }
        else
        {
            $_GET['type'] = 'error';
            if($id){
                $_GET['title'] = 'Atualização';
                $_GET['message'] = 'Ocorreu um erro ao atualizar o institucional!';
            }else{
                $_GET['title'] = 'Cadastro';
                $_GET['message'] = 'Ocorreu um erro ao cadastrar o institucional!';
            }
        }
        $this->termos_de_uso();
        $url = base_url(array('site', 'editar-termos'));
        $this->output->append_output('<script>window.history.replaceState("", "Acrilmoc", "'. $url .'")</script>');
    }
}



public function editar_ead(){

    if(($data['descricao'] = $this->input->post('descricao')) && ($data['video'] = $this->input->post('video')) && $this->input->post('id_ead')){

        if($this->institucional_model->salvar_editar_ead($data, $this->input->post('id_ead'))){

            $_GET['type'] = 'success';
            $_GET['title'] = 'Atualização';
            $_GET['message'] = 'informações atualizadas com sucesso!';

        }else{

            $_GET['type'] = 'error';
            $_GET['title'] = 'Atualização';
            $_GET['message'] = 'Ocorreu um erro ao atualizar as informações!';

        }
    }

    $this->ead();
    $url = base_url(array('site', 'editar-ead'));
    $this->output->append_output('<script>window.history.replaceState("", "Acrilmoc", "'. $url .'")</script>');

}





public function utilidade_publica()
{

    $this->set_menu_active(
        array(
            'menu' => 'site',
            'submenu' => 'site-utilidade'
        )
    );

    $data['utilidades'] = $this->institucional_model->servicos_publicos();


    if($this->input->get('type')){
        $notification = new stdClass;
        $notification->type = $this->input->get('type');
        $notification->title = $this->input->get('title');
        $notification->message = $this->input->get('message');
        $data['notification'] = $notification;
    }

    $this->montaTela('site/utilidade_publica/lista', $data);
}



public function nova_utilidade()
{


    $this->set_menu_active(
        array(
            'menu' => 'site',
            'submenu' => 'site-utilidade'
        )
    );

    $this->montaTela('site/utilidade_publica/formulario');
}


public function editar_utilidade()
{      
    $data['utilidades'] = $this->institucional_model->servicos_publicos_by_id($this->input->get('id'));

    $this->set_menu_active(
        array(
            'menu' => 'site',
            'submenu' => 'site-utilidade'
        )
    );

    $this->montaTela('site/utilidade_publica/formulario', $data);
}


public function salvar_utilidade()
{

    $this->load->helper('text');
    if($this->input->post()){
        if(!empty($_FILES['utilidadeimg']['name'])){
            $this->load->library('upload', array(
                'upload_path' => FCPATH.'../assets/images/utilidades',
                'allowed_types' => 'jpg|png|gif',
                'file_name' => hash('md5', uniqid(rand(0, 500)) . time() . rand(0, 500)),
                'max_size' => 8 * 1024,
                'remove_spaces' => TRUE
            ));

            if ($this->upload->do_upload('utilidadeimg')){
                $file_data = $this->upload->data();
                $this->load->library('image_lib', array(
                    'image_library' => 'gd2',
                    'source_image' => $file_data['full_path'],
                    'create_thumb' => FALSE,
                    'maintain_ratio' => TRUE,
                    'width' => 800,
                    'height' => 400
                )
            );
                $this->image_lib->resize();
            }

            
            if($this->input->post('imagem_utilidade')){
                if ($_FILES['utilidadeimg']['name'] != $this->input->post('imagem_utilidade')) {
                    $apagar = FCPATH.'../assets/images/utilidades/' . $this->input->post('imagem_utilidade');
                    @unlink($apagar);
                }
            }
        }else{
            if($this->input->post('imagem_utilidade')){
                $file_data['file_name'] = $this->input->post('imagem_utilidade');
            }else{
                $file_data['file_name'] = '';
            }
        }



            //caso nome_url n seja unico
        $slug_url =  url_title(convert_accented_characters($this->input->post('titulo')), '-', TRUE);
        $test_url = $this->institucional_model->confere_nome_url_utilidade($slug_url);

        if($test_url){
                //ja existe essa slug
               $nome_url_gerado = $this->gerar_novo_nome_url_utilidades($slug_url);//gerar uma nova

               $dados = array(
                'titulo' => $this->input->post('titulo'),
                    //'nome_url' => url_title(convert_accented_characters($this->input->post('titulo')), '-', TRUE),
                'nome_url' => $nome_url_gerado,
                'conteudo' => $this->input->post('conteudo'),
                'imagem' => $file_data['file_name']
            );

           }else{

              $dados = array(
                'titulo' => $this->input->post('titulo'),
                'nome_url' => url_title(convert_accented_characters($this->input->post('titulo')), '-', TRUE),
                'conteudo' => $this->input->post('conteudo'),
                'imagem' => $file_data['file_name'],
                'data' => time()
            );


          }


          $id = NULL;

            //editar noticia
          if($this->input->post('id')){
            $id = $this->input->post('id');
        }else{
            $dados['data'] = time();
        }

        if($this->institucional_model->salvar_utilidade($dados, $id))
        {
            $_GET['type'] = 'success';
            if($id){
                $_GET['title'] = 'Atualização';
                $_GET['message'] = 'Notícia atualizada com sucesso!';
            }else{
                $_GET['title'] = 'Cadastro';
                $_GET['message'] = 'Notícia cadastrada com sucesso!';
            }
        }
        else
        {
            $_GET['type'] = 'error';
            if($id){
                $_GET['title'] = 'Atualização';
                $_GET['message'] = 'Ocorreu um erro ao atualizar a notícia!';
            }else{
                $_GET['title'] = 'Cadastro';
                $_GET['message'] = 'Ocorreu um erro ao cadastrar a notícia!';
            }
        }
        $this->utilidade_publica();
        $url = base_url(array('site', 'utilidade'));
        $this->output->append_output('<script>window.history.replaceState("", "Meritus", "'. $url .'")</script>');
    }
}


public function excluir_utilidade(){

    if($this->input->post('id')){

        if($this->institucional_model->excluir_utilidade($this->input->post('id'))){
            $response['type'] = 'success';
            $response['title'] = 'Exclusão';
            $response['message'] = 'utilidade excluída com sucesso!';
            echo json_encode($response);
        }else{
             $response['type'] = 'error';
             $response['title'] = 'Exclusão';
             $response['message'] = 'Erro ao excluir a utilidade!';
             echo json_encode($response);

     }
 }


}



}
