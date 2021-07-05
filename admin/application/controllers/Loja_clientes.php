<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Loja_clientes extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('loja/clientes_model');
        $this->load->helper('form');
        $this->load->helper('text');

        $this->set_menu_active(
                            array(
                                'menu' => 'loja',
                                'submenu' => 'loja-clientes'
                                )
                            );
    }

    public function index()
    {
        $this->lista();
    }


    public function lista()
    {
        $data['clientes'] =  $this->clientes_model->get_clientes();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('loja/clientes/lista', $data);
    }

    public function lista_enderecos()
    {
        $data['enderecos'] =  $this->clientes_model->get_enderecos($this->input->get('id'));

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('loja/clientes/lista_enderecos', $data);
    }


    function novo_cliente(){
        $data['categorias'] = $this->clientes_model->get_categorias();
        $this->montaTela('loja/clientes/formulario', $data);
    }

    function salvar_cliente(){
        // echo '<pre>';
        // var_dump($_FILES, $_POST);
        // exit;
        if($this->input->post()){
            $dados = array(
                'nome' => $this->input->post('nome'),
                'nome_url' => strtolower(url_title(convert_accented_characters($this->input->post('nome'), '-', TRUE))),
                'categorias_id' => $this->input->post('categoria'),
                'valor' => $this->input->post('valor'),
                'valor_antigo' => $this->input->post('valor_antigo'),
                'descricao' => $this->input->post('descricao'),
                'estoque' => $this->input->post('estoque'),
                'comprimento_embalagem' => $this->input->post('comprimento_embalagem'),
                'altura_embalagem' => $this->input->post('altura_embalagem'),
                'largura_embalagem' => $this->input->post('largura_embalagem'),
                'peso' => $this->input->post('peso'),
                'destaque' => ($this->input->post('destaque')) ? '1' : '0'
            );

            $id = NULL;

            //editar agenda
            if($this->input->post('id')){
                $id = $this->input->post('id');
            }

            if($id_cliente = $this->clientes_model->salvar_cliente($dados, $id))
            {
                $_GET['type'] = 'success';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'cliente atualizado com sucesso!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'cliente cadastrado com sucesso!';
                }
            }
            else
            {
                $_GET['type'] = 'error';
                if($id){
                    $_GET['title'] = 'Atualização';
                    $_GET['message'] = 'Ocorreu um erro ao atualizar o cliente!';
                }else{
                    $_GET['title'] = 'Cadastro';
                    $_GET['message'] = 'Ocorreu um erro ao cadastrar o cliente!';
                }
            }
            $this->lista();
            $url = base_url(array('loja'));
            $this->output->append_output('<script>window.history.replaceState("", "Acrilmoc", "'. $url .'")</script>');
        }
    }

    public function editar_cliente()
    {
        if($this->input->get('id')){
            $dados['categorias'] = $this->clientes_model->get_categorias();
            $dados['cliente'] = $this->clientes_model->get_cliente($this->input->get('id'));
            $this->montaTela('loja/clientes/formulario', $dados);
        }
    }

    function excluir_cliente(){
        if ($this->input->post('id')) {
            if($galeria = $this->clientes_model->get_galeria_cliente($this->input->post('id'))){
                if($this->clientes_model->excluir_galeria($this->input->post('id'))){
                    if($this->clientes_model->excluir_cliente($this->input->post('id'))){
                        foreach ($galeria as $img) {
                            $apagar = FCPATH.'../assets/images/clientes/' . $img->imagem;
                            @unlink($apagar);
                        }
                        $response['type'] = 'success';
                        $response['title'] = 'Exclusão';
                        $response['message'] = 'cliente excluído com sucesso!';
                        echo json_encode($response);
                    }else{
                        $response['type'] = 'error';
                        $response['title'] = 'Exclusão';
                        $response['message'] = 'Ocorreu um erro ao excluír o cliente!';
                        echo json_encode($response);
                    }
                }
            }else{
                if($this->clientes_model->excluir_cliente($this->input->post('id'))){
                        $response['type'] = 'success';
                        $response['title'] = 'Exclusão';
                        $response['message'] = 'cliente excluído com sucesso!';
                        echo json_encode($response);
                    }else{
                        $response['type'] = 'error';
                        $response['title'] = 'Exclusão';
                        $response['message'] = 'Ocorreu um erro ao excluír o cliente!';
                        echo json_encode($response);
                    }
            }
        }
        return;
    }

}