<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site extends TEC_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('loja_model');
    $this->load->model('publicacoes_model');
    $this->load->model('noticias_model');

      //$this->output->enable_profiler(true);

  }

  public function error()
  {
   show_404();
 }

 public function index($par=NULL){


  $this->load->library('pagination');
  $segment = 2;
  $pagina = ($this->uri->segment($segment)) ? (int) $this->uri->segment($segment) - 1: 0;
  $itens_pagina =5;

  $num_itens = $this->noticias_model->get_num_noticias();

  $dados['ultimas_noticias'] = $this->noticias_model->get_ultimas_noticias($pagina, $itens_pagina);
  $dados['paginacao'] = $this->pagination->generate('home',$num_itens, $itens_pagina, $segment);



  $dados['noticias_destaque'] = $this->noticias_model->get_noticias_destaque();
  $dados['noticias_populares'] = $this->noticias_model->get_noticias_populares();
  $dados['noticias_globais'] = $this->noticias_model->get_noticias_globais();
  $dados['escolha_editor'] = $this->noticias_model->get_escolha_editor();
  $dados['dica_do_dia'] = $this->noticias_model->get_dica_do_dia();
  $dados['videos_destaque'] = $this->noticias_model->get_videos_destaque();

  $this->montaTela('site/home', $dados, 'home');

}

public function detalhes_produto($id){
  $dados['contato'] = $this->loja_model->get_contato();
  $dados['produtos'] = $this->loja_model->get_noticia($id);
  $dados['noticias'] = $this->loja_model->get_noticias();
  $dados['noticia'] = $this->noticias_model->get_noticia_galeria($id);
  $dados['acomodacoes'] = $this->publicacoes_model->get_publicacoes_home();

  
  $this->montaTela('site/produtos/detalhes', $dados, 'acomodacoes');

       /* $dados['banners_slide'] = $this->loja_model->get_promocoes_slides();
        $id = $this->input->get('produto');
        if ($dados['produto'] = $this->loja_model->get_produto($id)) {
        $dados['galeria'] = $this->loja_model->get_galeria_produtos($id);
        $dados['categorias'] = $this->loja_model->get_categorias_produto($id);
        $dados['recomendados'] = $this->loja_model->get_recomendados_produto($dados['produto']->categoria_sexo, $id);

        foreach ($dados['recomendados'] as $key => $value) {

          $fotos['galeria'] = $this->loja_model->get_galeria_produtos($value->id);
          $dados['recomendados'][$key]= (object)array_merge((array)$dados['recomendados'][$key], $fotos);

        }

        if ($dados['produto']->tamanhos == 1) {

          $dados['tamanhos'] = $this->loja_model->get_tamanhos($dados['produto']->id);

        }

        $this->montaTela('site/produtos/detalhes', $dados);
        }else{
          show_404();
        }*/
      }

      public function mapa(){
        $dados['contato'] = $this->loja_model->get_contato();
        $dados['acomodacoes'] = $this->publicacoes_model->get_publicacoes_home();

        $this->montaTela('site/contato/mapa', $dados, 'mapa');
      }


      public function modal_endereço(){
        $this->load->view('site/modal_endereco');
      }




      public function modal_login(){
        $this->load->view('modal_login');
      }



      public function pesquisar_produtos(){
        $dados['busca'] = $this->input->post('busca');
        $dados['produtos'] = $this->loja_model->get_all_produtos($dados['busca']);
        $this->load->view('site/lista_pesquisa', $dados);
      }


      public function sobre(){
        $dados['sobre'] = $this->loja_model->get_sobre();
        $dados['marcas'] = $this->loja_model->get_marcas();
        $dados['clientes'] = $this->publicacoes_model->get_clientes();
        $dados['contato'] = $this->loja_model->get_contato();
        $dados['noticias'] = $this->loja_model->get_noticias();
        $dados['acomodacoes'] = $this->publicacoes_model->get_publicacoes_home();
        $dados['conteudo'] = $this->loja_model->get_conteudo();
        $this->montaTela('site/sobre/sobre', $dados, 'sobre');
      }

      public function contato(){
        $dados['banners_slide'] = $this->loja_model->get_promocoes_slides();
        $dados['sobre'] = $this->loja_model->get_sobre();
        $dados['contato'] = $this->loja_model->get_contato();
        $dados['acomodacoes'] = $this->publicacoes_model->get_publicacoes_home();
        $this->montaTela('site/contato/contato', $dados, 'contato');
      }
      public function pre_reservas(){
        $dados['banners_slide'] = $this->loja_model->get_promocoes_slides();
        $dados['sobre'] = $this->loja_model->get_sobre();
        $dados['contato'] = $this->loja_model->get_contato();
        $dados['acomodacoes'] = $this->publicacoes_model->get_publicacoes_home();
        $this->montaTela('site/contato/pre_reservas', $dados, 'pre_reservas');
      }

      public function produtos(){

        $this->load->library('pagination');
        $segment = 2;
        $pagina = ($this->uri->segment($segment)) ? (int) $this->uri->segment($segment) - 1: 0;
        $itens_pagina = 9;
        $num_itens = $this->noticias_model->get_num_noticias();

        $dados['produtos'] = $this->noticias_model->get_noticias($pagina, $itens_pagina);
        $dados['paginacao'] = $this->pagination->generate(['acomodacoes'], $num_itens, $itens_pagina, $segment);

        $dados['contato'] = $this->loja_model->get_contato();
    // $dados['produtos'] = $this->loja_model->get_noticias_all();
        $dados['acomodacoes'] = $this->publicacoes_model->get_publicacoes_home();

// echo "<pre>";
//     var_dump($dados['paginacao']);
//     exit();
        $this->montaTela('site/produtos/lista', $dados, 'acomodacoes');
                          //BUSCA POR CATEGORIAS
    /*$categorias = null;
    if ($busca = $this->input->get('busca_categorias')) {
      $categorias = explode(":", $busca);

      if($categorias[0]==''){
        array_splice($categorias, 0, 1);
      }
    };

              //BUSCA POR PREÇO
      $ordem_preco = null;
      if($this->input->get('ordem')){
        $ordem_preco = $this->input->get('ordem');
      }
              //BUSCA POR TAMANHO
      $tamanho = null;
      if($this->input->get('tamanho')){
        $tamanho = $this->input->get('tamanho');
      }

              //BUSCA POR FAIXA DE PRECO
      $faixa_preco = null;
      if($this->input->get('min_preco') && $this->input->get('max_preco')){
        $faixa_preco = array(
          'min_preco' => $this->input->get('min_preco'),
          'max_preco' => $this->input->get('max_preco'),
        );
      }

//--------------------------------------------------
      $categorias = null;
      if ($this->input->get('busca_categorias')) {
          $categorias = $this->input->get('busca_categorias');
      }

      $busca = null;
      if ($this->input->get('busca')) {
      $busca = $this->input->get('busca');

      }
      $sexo=null;

            //INICIA A PAGINACAO
    $this->load->library('pagination');
    $segment = 2;
    $pagina = ($this->uri->segment($segment)) ? (int) $this->uri->segment($segment) - 1: 0;
    $itens_pagina = 12;//quantidade por pagina

    $dados['produtos'] = $this->loja_model->get_all_produtos($categorias, $sexo, $ordem_preco, $tamanho, $faixa_preco, $busca); // Pega os produtos

    $num_itens =  count($dados['produtos']); // quantidade de produtos


    $dados['categorias'] = $this->loja_model->get_categorias_sexo($sexo);

    $dados['produtos'] = $this->loja_model->get_all_produtos($categorias, $sexo, $ordem_preco, $tamanho, $faixa_preco, $pagina, $itens_pagina, $busca);
    $dados['paginacao'] = $this->pagination->generate(array('produtos/'), $num_itens, $itens_pagina, $segment);


    foreach ($dados['produtos'] as $key => $value) { // GALERIA DE FOTOS DOS PRODUTOS
      $fotos['galeria'] = $this->loja_model->get_galeria_produtos($value->id);
      $dados['produtos'][$key]= (object)array_merge((array)$dados['produtos'][$key], $fotos);
    }*/

    

    //$dados['termo_busca'] = $busca;
    //$dados['categorias_busca'] = $categorias;
    //$dados['preco'] = $ordem_preco;
    //$dados['tamanho'] = $tamanho;
    //$dados['min_preco'] = $faixa_preco['min_preco'];
    //$dados['max_preco'] = $faixa_preco['max_preco'];




  }


  public function envia_contato(){


    $this->load->library('email');
    $this->email->set_newline("\r\n");
    $config['charset'] = 'utf-8';
    $config['mailtype'] = 'html';
    $this->email->initialize($config);


    $this->email->from($_POST['email'], $_POST['nome']);
    $this->email->to('contato@hotelmundial.com.br');
    $this->email->reply_to($_POST['email'], 'Contato pelo Site');

    $this->email->subject($this->input->post('assunto'));

    $dados = array(
      'mensagem' => $this->input->post('mensagem'),
      'nome' => $this->input->post('nome'),
      'email' => $_POST['email']
    );


    $this->email->message($this->load->view('site/mensagem_email', $dados, TRUE));

    $this->email->send();
    redirect('email-ok');

  }

  public function ok(){
    $this->montaTela('email/ok');
  }
  public function assina_newsletter(){

    $email = $this->input->post('email');

    if($this->loja_model->salvar_newsletter($email)){
      $result = TRUE;
    }else{
      $result = FALSE;
    }

    echo json_encode($result);

  }


  public function meus_pedidos(){

    $dados = array(
      'pedidos' => $this->loja_model->get_meus_pedidos($this->auth->get_id_perfil())
    );
    $this->montaTela('site/meus-pedidos', $dados);
  }


  public function pedido_detalhes(){

    $dados = array(
      'produtos' => $this->loja_model->get_meus_pedidos_produtos($this->input->get('id')),
      'pedido' => $this->loja_model->get_pedido($this->input->get('id'))
    );

    $this->montaTela('site/pedido-detalhes', $dados);
  }



  public function atuacoes(){
   $dados['areas'] = $this->publicacoes_model->get_areas();

   $this->montaTela('site/atuacoes', $dados, 'institucional');
 }

 public function area($id){

   $dados['area'] = $this->publicacoes_model->get_areas($id);

   $this->montaTela('site/atuacoes_interna', $dados, 'institucional');
 }

 public function servicos(){

  $dados['servicos'] = $this->publicacoes_model->get_servicos();

  $this->montaTela('site/servicos', $dados, 'institucional' );
}

public function depoimentos($id){  

  $this->load->library('pagination');
  $segment = 3;
  $pagina = ($this->uri->segment($segment)) ? (int) $this->uri->segment($segment) - 1: 0;
  $itens_pagina =3;

  $num_itens = $this->noticias_model->get_num_noticias();


  $dados['get_noticias'] = $this->noticias_model->get_noticia_id($id);
  $dados['escolha_editor'] = $this->noticias_model->get_escolha_editor();
  $dados['dica_do_dia'] = $this->noticias_model->get_dica_do_dia();
  $dados['ultimas_noticias'] = $this->noticias_model->get_ultimas_noticias($pagina, $itens_pagina);


  $this->montaTela('site/depoimentos', $dados, 'depoimentos');
}

public function satisfacao(){

  $this->montaTela('site/satisfacao');
}
public function clientes(){
 $dados['clientes'] = $this->publicacoes_model->get_clientes();

 $this->montaTela('site/clientes', $dados, 'institucional');
}

public function parceiros(){
 $dados['clientes'] = $this->publicacoes_model->get_clientes();

 $this->montaTela('site/parceiros', $dados, 'parceiros');
}


public function publicacoes($categoria_busca){




  $categorias = $this->noticias_model->todas_categorias();

  foreach ($categorias as $key => $value) {

    $cate = strtolower( preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $value->nome ) ));

    if($categoria_busca == $cate){
      $categoria_id = ($value->id);
    }

  }



  $this->load->library('pagination');
  $segment = 3;
  $pagina = ($this->uri->segment($segment)) ? (int) $this->uri->segment($segment) - 1: 0;
  $itens_pagina =3;

  $num_itens = $this->noticias_model->get_num_noticias($categoria_id);


  $dados['ultimas_noticias'] = $this->noticias_model->get_ultimas_noticias($pagina, $itens_pagina, $categoria_id);
  $dados['paginacao'] = $this->pagination->generate(['informativos/'.$categoria_busca], $num_itens, $itens_pagina, $segment);

  $dados['noticias_populares'] = $this->noticias_model->get_noticias_populares($categoria_id);
  $dados['noticias_globais'] = $this->noticias_model->get_noticias_globais($categoria_id);
  $dados['escolha_editor'] = $this->noticias_model->get_escolha_editor($categoria_id);
  $dados['dica_do_dia'] = $this->noticias_model->get_dica_do_dia($categoria_id);


  $this->montaTela('site/publicacoes', $dados, 'informativos');
}


public function publicacao($id){

  $contato = $this->loja_model->get_contato();
  $publicacao = $this->publicacoes_model->get_publicacao($id);
  if(!$publicacao){
    show_404();
  }
  $ultimas = $this->publicacoes_model->get_publicacao_ultimas();

  $galeria = $this->publicacoes_model->get_publicacao_galeria($id);
  $noticias = $this->loja_model->get_noticias();
  $acomodacoes = $this->publicacoes_model->get_publicacoes_home();


  $this->montaTela('site/publicacoes_interna',compact('ultimas','galeria','publicacao','contato','noticias','acomodacoes'), 'informativos');
}

public function salvar_comentario(){

  $dados = array();
  if ($_POST) {
    $dados['comentario'] = $this->input->post('comentario');
    $dados['produtos_id'] = $this->input->post('id');
    $dados['classificacao'] = $this->input->post('classificacao');
    $dados['clientes_id'] = $this->auth->get_id_perfil();
    $dados['data'] = date("Y-m-d");
  }

  if ($this->loja_model->salva_comentario($dados)) {
    $dados['nome'] = $this->auth->get_nome_perfil();
    $_GET['produto'] =   $dados['produtos_id'];
    $this->detalhes_produto();
    $url = base_url('detalhes-produto');
    $this->output->append_output('<script>window.history.replaceState("", "Lamitié", "'. $url .'"); swal("", "Comentário enviado")</script>');
  }
}

public function noticia_video($id){  

  $dados['video_noticia'] = $this->noticias_model->get_noticia_video($id);
  $dados['dica_do_dia'] = $this->noticias_model->get_dica_do_dia();

  $this->montaTela('site/noticia_video', $dados);
}



}
