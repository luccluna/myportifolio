<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TEC_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('loja_model');
        $this->load->model('publicacoes_model');
        $this->load->model('noticias_model');
        }

    public function set_menu_active($menu='')
    {
        $this->active_menu = $menu;
    }

    // public function set_type_user($menu='')
    // {
    //     $this->active_menu = $menu;
    // }

    //recebe a url da pagina para ser adicionada no conteudo
    public function montaTela($paginaConteudo, $data = NULL, $header=NULL)
    {   

        //$carrinho=$this->session->userdata('carrinho_IEA_2018_1a2s3d4f');
        $contato['sobre'] = $this->loja_model->get_contato();
        // if($carrinho) {
        //   if(isset($_COOKIE['carrinho_IEA_2018_1a2s3d4f'])){
        //     $carrinho= unserialize($_COOKIE['carrinho_IEA_2018_1a2s3d4f']);
        //   }
        //     $produtos = array();
        //     foreach ($carrinho as $key => $pdc) {
        //       $prod = $this->loja_model->produtos_carrinho($pdc->produto); // BUSCA O PRODUTO
        //       $prod->{'quantidade'} = $pdc->quantidade; //ADICIONA A QUANTIDADE
        //       $produtos[] = $prod;
        //     }
        //     $carrinho['carrinho'] =  $produtos;

        // }
        $contato['header'] = $header;
        $contato['contato_empresa'] = $this->loja_model->get_contato();
        $contato['depoimento'] = $this->publicacoes_model->get_depoimentos_home();
        $contato['ultimas_noticias'] = $this->noticias_model->get_ultimas_noticias();
        $contato['conta_noticias'] = $this->noticias_model->conta_noticias();
        $this->load->view('includes/header', $contato);
        $this->load->view($paginaConteudo, $data);
        $this->load->view('includes/footer');
    }


    public function montaTelaInterna($paginaConteudo, $data = NULL)
    {

        $carrinho=$this->session->userdata('carrinho_IEA_2018_1a2s3d4f');
        $contato['sobre'] = $this->loja_model->get_contato();

        if($carrinho) {
          if(isset($_COOKIE['carrinho_IEA_2018_1a2s3d4f'])){
            $carrinho= unserialize($_COOKIE['carrinho_IEA_2018_1a2s3d4f']);
          }
            $produtos = array();
            foreach ($carrinho as $key => $pdc) {
              $prod = $this->loja_model->produtos_carrinho($pdc->produto); // BUSCA O PRODUTO
              $prod->{'quantidade'} = $pdc->quantidade; //ADICIONA A QUANTIDADE
              $produtos[] = $prod;
            }
            $carrinho['carrinho'] =  $produtos;
        }
        $carrinho['contato_empresa'] = $this->loja_model->get_contato();
        $this->load->view('includes/header-interna', $carrinho);
        $this->load->view($paginaConteudo, $data);
        $this->load->view('includes/footer', $contato);
    }

  
}
