<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Carrinho extends TEC_Controller {

  public function __construct() {
    parent::__construct();

    $this->load->model('Loja_model');
  }


  public function confirma_carrinho(){


    $carrinho=$this->session->userdata('carrinho_IEA_2018_1a2s3d4f');

    if (!$this->auth->existe_sessao()) {

      redirect(base_url('login').'?finalizar=true');
    }

    if($carrinho){
      $produtos = array();
      foreach ($carrinho as $key => $produto) {

        $prod = $this->loja_model->produtos_carrinho($produto->produto); // BUSCA O PRODUTO
        $prod->{'quantidade'} = $produto->quantidade; //ADICIONA A QUANTIDADE
        $prod->{'tamanho'} = $this->loja_model->get_tamanho($produto->tamanho);
        $produtos[] = $prod;
      }

      $carrinho['carrinho'] =  $produtos;
      $dados['usuario'] = $this->loja_model->get_usuario($this->auth->get_id_perfil());
      $dados['frete'] = $this->calcularFrete_unico();
      $dados['produtos'] = $carrinho['carrinho'];

      $this->montaTela('site/carrinho/finalizar', $dados);

    }else {

      $this->carrinho();
      $url = base_url('carrinho');
      $this->output->append_output('<script>window.history.replaceState("", "Loja Instituto", "'. $url .'"); swal("Carrinho vazio", "");</script>');

    }


  }


  public function modal_carrinho(){
    $carrinho=$this->session->userdata('carrinho_IEA_2018_1a2s3d4f');

    if($carrinho){
      $produto = array();

        $prod = $this->loja_model->produtos_carrinho($this->input->post('id')); // BUSCA O PRODUTO
        $prod->{'tamanho'} = $this->input->post('tamanho');//ADICIONA A tamanho
        $produto[] = $prod;
        $dados['novo'] =  $produto;


        $produto = array();
        foreach ($carrinho as $key => $value) {

        $cart = $this->loja_model->produtos_carrinho($carrinho[$key]->produto); // BUSCA O PRODUTO
        //$cart->{'quantidade'} = $carrinho[$key]->quantidade;//ADICIONA A QUANTIDADE
        $cart->{'tamanho'} = $carrinho[$key]->tamanho; //ADICIONA O TAMANHO
        $produto[] = $cart;

      }
      $dados['carrinho'] =  $produto;
    }

    $this->load->view('modal_carrinho', $dados );
  }

  public function add_carrinho(){
   
    $id_produto = $this->input->post('id');
    $tamanho = $this->input->post('tamanho');
    $quantidade = $this->input->post('quantidade');
    //verifica se está preenchido
    if ($carrinho = $this->session->userdata('carrinho_IEA_2018_1a2s3d4f')) {
      //verifica se ja existe o produto no carrinho
      $control = FALSE;
      foreach ($carrinho as $key => $produto) {
        if ($produto->produto == $id_produto && $produto->tamanho == $tamanho) {
          $produto->quantidade = $produto->quantidade+$quantidade;
          $control = true;
        }
      }

      if($control==FALSE){
        array_push($carrinho, (object) array('produto'=> $id_produto, 'quantidade'=> $quantidade, 'tamanho' => $tamanho ));
      }
    }else{
        //cria o carrinho com o produto selecionado
      $carrinho = array();
      array_push($carrinho, (object) array('produto'=> $id_produto, 'quantidade'=> $quantidade, 'tamanho' => $tamanho ));
    }

    $this->session->set_userdata('carrinho_IEA_2018_1a2s3d4f', $carrinho);
    unset($_COOKIE['carrinho']); //apaga o cookie caso exista
    setcookie('carrinho', serialize($this->session->userdata('carrinho_IEA_2018_1a2s3d4f')),time()+3600); //cria o novo cookie

    //busca os dados do produto adicionado no carrinho
    $dados_produto['produto'] = $this->loja_model->produtos_carrinho($id_produto);
    $dados_produto['tamanho'] = $tamanho;

    echo json_encode($dados_produto);
  }

  public function remove_carrinho(){
    $id_produto = $this->input->post('id');
    $tamanho = $this->input->post('tamanho');

    //verifica se está preenchido
    if ($carrinho = $this->session->userdata('carrinho_IEA_2018_1a2s3d4f')) {
      //verifica se ja existe o produto no carrinho
      $control = FALSE;
      foreach ($carrinho as $key => $produto) {
        if ($produto->produto == $id_produto && $produto->tamanho == $tamanho) {
          if ($produto->quantidade>1) {
            $produto->quantidade = $produto->quantidade-1;
            $control = true;
          }

        }
      }


    }

    $this->session->set_userdata('carrinho_IEA_2018_1a2s3d4f', $carrinho);
    unset($_COOKIE['carrinho']); //apaga o cookie caso exista
    setcookie('carrinho', serialize($this->session->userdata('carrinho_IEA_2018_1a2s3d4f')),time()+3600); //cria o novo cookie

    //busca os dados do produto adicionado no carrinho
    $dados_produto['produto'] = $this->loja_model->produtos_carrinho($id_produto);
    $dados_produto['tamanho'] = $tamanho;

    echo json_encode($dados_produto);
  }

  public function remove_todos_carrinho(){




    $id_produto = $this->input->post('id');
    $tamanho = $this->input->post('tamanho');
    $carrinho = $this->session->userdata('carrinho_IEA_2018_1a2s3d4f');


    if ($carrinho) {


      foreach ($carrinho as $key => $produto) {

        if ($produto->produto == $id_produto && $produto->tamanho == $tamanho) {

          unset($carrinho[$key]);

        }
      }



    }


    $this->session->set_userdata('carrinho_IEA_2018_1a2s3d4f', $carrinho);
    unset($_COOKIE['carrinho']); //apaga o cookie caso exista
    setcookie('carrinho', serialize($this->session->userdata('carrinho_IEA_2018_1a2s3d4f')),time()+3600); //cria o novo cookie

    //busca os dados do produto adicionado no carrinho
    $dados_produto['produto'] = $this->loja_model->produtos_carrinho($id_produto);
    // $dados_produto['tamanho'] = $tamanho;

    echo json_encode($dados_produto);
  }

  public function carrinho()
  {
    $carrinho=$this->session->userdata('carrinho_IEA_2018_1a2s3d4f');

    $tamanhos = null;
    if($carrinho) {
      $produtos = array();
      foreach ($carrinho as $key => $pdc) {
        $prod = $this->loja_model->produtos_carrinho($pdc->produto); // BUSCA O PRODUTO
        $prod->{'quantidade'} = $pdc->quantidade; //ADICIONA A QUANTIDADE
        $prod->{'tamanho'} = $this->loja_model->get_tamanho($pdc->tamanho); //PEGA OS TAMANHOS
        $produtos[] = $prod;
      }
      $carrinho['carrinho'] =  $produtos;
    }
    // $carrinho['banners_slide'] = $this->loja_model->get_promocoes_slides();

    // echo "<pre>";
    //  var_dump($carrinho['carrinho'][0]->tamanho->nome_tamanho);
    //   exit;

    $this->montaTela('site/carrinho/carrinho', $carrinho);
  }


  public function calcularFrete_unico(){
   $ids = $this->session->userdata('carrinho_IEA_2018_1a2s3d4f');
  
  

   if (is_null($ids)) {
    return $this->output->set_output(json_encode('vazio'));
  }
  $frete = 0;

  foreach ($ids as $key => $id) {

        $data['produto'] = $this->loja_model->get_produto($id->produto); //DADOS DO PRODUTO
    
  
        $frete+=$data['produto']->valor_frete * $id->quantidade;
      }
    
      return $frete;
    }



    public function cal_frete($cep){

     $ids = $this->session->userdata('carrinho_IEA_2018_1a2s3d4f');

     if (is_null($ids)) {
      return $this->output->set_output(json_encode('vazio'));
    }
    $frete_PAC = 0.0;
    $frete_SEDEX = 0.0;
    foreach ($ids as $key => $id) {

      $data['produto'] = $this->loja_model->get_produto($id->produto); //DADOS DO PRODUTO

      $resultado = @file_get_contents('http://republicavirtual.com.br/web_cep.php?cep='.urlencode($cep).'&formato=query_string'); //VERIFICA O CEP

      if(!$resultado){  //SE O CEP NAO FOR VÁLIDO
        $resultado = 0;
      }
      parse_str($resultado, $retorno);

      if($retorno['resultado']!=0){ //SE O CEP FOR VÁLIDO

        $this->load->library('frete');

        //array com os dados para busca do valor do frete
        $array_correios = array (
          'nCdEmpresa'          =>  "", // Código da empresa  (opcional)
          'sDsSenha'            =>  "" , // Senha da empresa   (opcional)
          'sCepOrigem'          =>  "39400005"  , // Cep de origem    (sem - hífen)
          'sCepDestino'         =>  $cep, // Cep de destino   (sem - hífen)
          'nVlPeso'             =>  $data['produto']->peso, // Peso da embalagem  (em kilogramas)
          'nCdFormato'          =>  "1" , // Formato da encomenda (1 para caixa/pacote, 2 para rolo/prisma)
          'nVlComprimento'      =>  $data['produto']->comprimento_embalagem, // Comprimento      (em cm somente números)
          'nVlAltura'           =>  $data['produto']->altura_embalagem,   // Altura
          'nVlLargura'          =>  $data['produto']->largura_embalagem, // Largura
          'nVlDiametro'         =>  "0" , // Diametro
          'sCdMaoPropria'       =>  "n" , // Mão própria      (s == sim, n == não)
          'nVlValorDeclarado'   =>  "0" , // Valor declarado    (valor ou 0)
          'sCdAvisoRecebimento' =>  "n"   , // Aviso de recebimento (s == sim, n == não)
          'StrRetorno'          =>  'xml'       , // Tipo de retorno    (xml / popup / url)
          'nCdServico'          =>  '41106,40010'    // Código do serviço
        );

        $fretes = $this->frete->calcularFrete($array_correios, false);

        foreach ($fretes as $key => $value) {

          $frete[] = ($value->Valor);

        }

        foreach ($fretes as $key => $value) {

          $prazo[] = ($value->PrazoEntrega);

        }
        $valores_frete = array(

          'fretePac' => $frete[0],
          'freteSedex' => $frete[1]
        );
        $prazos_frete = array(

          'prazoPac' => $prazo[0],
          'prazoSedex' => $prazo[1]
        );
        $frete['fretes'] = (object) $valores_frete;
        $frete['prazos'] = (object) $prazos_frete;

      }else{
        return $this->output->set_output(json_encode('error'));;
      }

      if (!isset($frete['fretes'])) {
       return $this->output->set_output(json_encode('error'));
     }
   }

   $fretes_todos = array(
    'sedex' => number_format((float)$frete['fretes']->freteSedex[0],2,',', ''),
    'pac' => number_format((float)$frete['fretes']->fretePac[0],2,',', ''),
    'sedex_prazo' => (string)$frete['prazos']->prazoSedex[0],
    'pac_prazo' => (string)$frete['prazos']->prazoPac[0]
  );
   return $fretes_todos;
 }



}
