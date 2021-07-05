<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Loja extends TEC_Controller {

  public function __construct() {
    parent::__construct();

    $this->load->model('Loja_model');
  }

 

  public function calcula_frete(){
    $ids = $this->session->userdata('carrinho_IEA_2018_1a2s3d4f');

    if (is_null($ids)) {
      return $this->output->set_output(json_encode('vazio'));
    }
    $frete_PAC = 0.0;
    $frete_SEDEX = 0.0;
    foreach ($ids as $key => $id) {

      $data['produto'] = $this->Loja_model->get_produto($id->produto); //DADOS DO PRODUTO
      $cep = $this->input->post('cep');

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

    echo json_encode($fretes_todos);
  }




  public function calcula_frete_finalizar($cep){
    $ids = $this->session->userdata('carrinho_IEA_2018_1a2s3d4f');

    if (is_null($ids)) {
      return $this->output->set_output(json_encode('vazio'));
    }
    $frete_PAC = 0.0;
    $frete_SEDEX = 0.0;
    foreach ($ids as $key => $id) {

      $data['produto'] = $this->Loja_model->get_produto($id->produto); //DADOS DO PRODUTO


      $resultado = @file_get_contents('http://republicavirtual.com.br/web_cep.php?cep='.urlencode($cep).'&formato=query_string'); //VERIFICA O CEP

      if(!$resultado){  //SE O CEP NAO FOR VÁLIDO
        $resultado = "&resultado=0&resultado_txt=erro+ao+buscar+cep";
      }
      parse_str($resultado, $retorno);

      if($retorno['resultado']!=0){ //SE O CEP FOR VÁLIDO

        $this->load->library('frete');

        //array com os dados para busca do valor do frete
        $array_correios = array (
          'nCdEmpresa'          =>  "", // Código da empresa  (opcional)
          'sDsSenha'            =>  "" , // Senha da empresa   (opcional)
          'sCepOrigem'          =>  "39400059"  , // Cep de origem    (sem - hífen)
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

        $preco = $data['produto']->valor;

        $total = array(

          'totalPac' =>  number_format( str_replace(',' , '.', $frete[0]) + str_replace(',' , '.', $preco), 2, '.', ','),
          'totalSedex' =>  number_format(str_replace(',' , '.', $frete[1]) + str_replace(',' , '.', $preco), 2, '.', ',')
        );



        $frete['fretes'] = (object) $valores_frete;
        $frete['prazos'] = (object) $prazos_frete;
        $frete['totalFrete'] = (object) $total;


      }else{

        $frete = 'error';
      }

      $frete_PAC = (str_replace(',', '.', $frete['fretes']->fretePac[0])) + (float)$frete_PAC;
      $frete_SEDEX = (str_replace(',', '.', $frete['fretes']->freteSedex[0])) + (float)$frete_SEDEX;

    }

    $fretes_todos = array(
      'sedex' => number_format($frete_SEDEX,2,'.', ''),
      'pac' => number_format($frete_PAC,2,'.', ''),
      'sedex_prazo' => (string)$frete['prazos']->prazoSedex[0],
      'pac_prazo' => (string)$frete['prazos']->prazoPac[0]

    );

    return $fretes_todos;
  }


  public function fechar_pedido()
  {
  

    $produtos = $this->session->userdata('carrinho_IEA_2018_1a2s3d4f');//produtos do carrinho

    if ($this->input->post('tipo_endereco')){
      $usuario = $this->loja_model->get_usuario($this->auth->get_id_perfil());
      $endereco = array(
        'rua' => $usuario->rua,
        'cep' => $usuario->cep,
        'numero' => $usuario->numero,
        'telefone' => $usuario->telefone,
        'bairro' => $usuario->bairro,
        'complemento' => $usuario->complemento,
        'cidade' => $usuario->cidade,
        'uf' =>  $usuario->estado
      );

    }else{
      //DADOS DO ENDEREÇO
      $endereco = array(
        'rua' => $this->input->post('rua'),
        'cep' => $this->input->post('cep'),
        'numero' => $this->input->post('numero'),
        'telefone' => $this->input->post('telefone'),
        'bairro' => $this->input->post('bairro'),
        'complemento' => $this->input->post('complemento'),
        'cidade' => $this->input->post('cidade'),
        'uf' =>  $this->input->post('estado')
      );
    }
    //PEGA OS PRODUTOS DO CARRINHO
    $dados['produtos_vendidos'] = null;
    foreach ($produtos as $key => $produto) {
      $prod = $this->Loja_model->get_produto($produto->produto);
      $prod->{'qtd'} = $produto->quantidade;
      $prod->{'tamanhos_id'} = $produto->tamanho;
      $dados['produtos_vendidos'][] = $prod;
    }




    $this->load->library('Pagseguro');
    if ($this->input->post('tipo_endereco')) {
      $cliente = $usuario->nome;
    }else{
      $cliente = $this->input->post('nome_completo');
    }

    $sandbox = false;
    $credenciais = $this->pagseguro->getCredenciais($sandbox);

    $email = $credenciais['email'];
    $token = $credenciais['token'];
    $url_request = $credenciais['url_request'];

    //Campos da requisição pagseguro
    $request = array(
      'email'           => $email,
      'token'           => $token,
      //'receiverEmail'   => $email,
      'currency'        => 'BRL',
      //'redirectURL'     => base_url(array('loja', 'pagamento-finalizado')),
      //'notificationURL' => base_url(array('loja', 'notificacoes-pag'))
    );

    //nome do comprador
    $request['senderName'] = $cliente;
    //email
    $request['senderEmail'] = $this->auth->get_email_perfil();
    //dados do produto
    $valor_total = 0;
    foreach ($dados['produtos_vendidos'] as $key => $produto) {
      $request['itemId'.($key+1)] = $produto->id;
      $request['itemDescription'.($key+1)] = $produto->titulo;
      $request['itemQuantity'.($key+1)] = $produto->qtd;
      $request['itemAmount'.($key+1)] = $produto->valor;
      $valor_total=$valor_total+($produto->qtd*$produto->valor);
    }

    //calcula o frete
    $fretes = $this->calcularFrete_unico();
    $request['shippingCost'] = number_format((float)$fretes, 2, '.', '');

    // if($tipo_frete = $this->input->post('frete_tipo') == 'pac'){
    //   $prazo = $fretes['pac_prazo'];
    // }else{
    //   $request['shippingCost'] = number_format((float)$fretes['sedex'], 2, '.', '');
    //   $prazo = $fretes['sedex_prazo'];
    // }

    //Numero do pedido
    $request['reference'] = uniqid('U'.$fretes['sedex'].'-');

    // echo '<pre>';
    // var_dump($request);
    // exit;
    //Envia a requisição e obtém a resposta do pagseguro

    $response = $this->pagseguro->sendRequestPag($request, $sandbox);

    if( strlen($response)>3){
      $db_pedido = array(
        //'perfis_id' =>$this->auth->get_id_perfil(),

        'valor_total' => $valor_total+$request['shippingCost'],
        'valor' => $valor_total,
        'data' => date('Ymd'),
        'valor_frete' => $request['shippingCost'],
        'codigo_pag' => $response,
        // 'tipo_frete' => $tipo_frete,
        //'quantidade' => $this->input->post('quantidade'),
        'forma_pagamento' => '0',
        'codigo_pedido' => $request['reference'],
        'email_cliente' => $request['senderEmail'],
        'telefone_cliente' => $endereco['telefone'],
        'rua_entrega' => $endereco['rua'],
        'nome_cliente' => $cliente,
        'numero_entrega' => $endereco['numero'],
        'bairro_entrega' => $endereco['bairro'],
        'cep_entrega' => $endereco['cep'],
        'cidade_entrega' => $endereco['cidade'],
        'estado_entrega' => $endereco['uf'],
        'complemento_entrega' => $endereco['complemento'],
        'clientes_id' => $this->auth->get_id_perfil()
      );
      if($id_pedido = $this->Loja_model->salvar_pedido($db_pedido)){
        //Se a operação tiver sido bem sucedida, redirecionamos o cliente para o //
        //ambiente de pagamento.//
        if($this->Loja_model->salvar_pedido_produtos($dados['produtos_vendidos'], $id_pedido)){
          $this->Loja_model->atualiza_estoque_produto($dados['produtos_vendidos']);
          unset($_SESSION['carrinho_IEA_2018_1a2s3d4f']);
          echo json_encode($response);
        }
      }else{
        echo 'error';
      }
    }else{
      echo "error";
    }

  }



  public function notificacoes_pagseguro()
  {
    
      if($this->input->post('notificationType') && $this->input->post('notificationType') == 'transaction'){
          $sandbox = false;
          $this->load->library('Pagseguro');
          $result = $this->pagseguro->verificarNotificacoes($this->input->post('notificationCode'), $sandbox);
          $status = '';
        
          switch ($result->status) {
              case '1':
                      //aguardando pagamento
              $status = '1';
              break;
              case '2':
                      //em analise
              $status = '2';
              break;
              case '3':
                      //pago
              $status = '3';
              break;
              case '4':
                      //disponivel
              $status = '4';
              break;
              case '5':
                      //em disputa
              $status = '5';
              break;
              case '6':
                      //Devolvida
              $status = '6';
              break;
              case '7':
                      //cancelado
              $status = '7';
              break;
          }

          $tipo_pagamento = '';
          switch ($result->paymentMethod->type) {
              case '1':
                      //Cartão de crédito
              $tipo_pagamento = '1';
              break;
              case '2':
                      //Boleto
              $tipo_pagamento = '2';
              break;
              case '3':
                      //Débito online
              $tipo_pagamento = '3';
              break;
              case '4':
                      //Saldo pagSeguro
              $tipo_pagamento = '4';
              break;
              case '5':
                      //Oi Paggo
              $tipo_pagamento = '5';
              break;
              case '7':
                      //Depósito em conta
              $tipo_pagamento = '7';
              break;
          }
          if(strlen($status) > 0){
              if($this->Loja_model->existe_transacao(($result->code), $result->reference)){
                  $array = array('status_pedido' => $status, 'tipo_pagamento' => $tipo_pagamento);
                  $this->Loja_model->update_status_pagamento($result->reference, $array);
                  if($status == '3'){
                  // $this->Loja_model->atualiza_estoque($result->reference);
               }
           }else{
              $array = array('status_pedido' => $status, 'tipo_pagamento' => $tipo_pagamento, 'id_transacao' => str_replace("-", "", $result->code));
              $id_pedido = $this->Loja_model->update_status_pagamento($result->reference, $array);

              if($id_pedido){
                if($status == '3'){
                 //$this->Loja_model->atualiza_estoque($id_pedido->id);
             }
              }
       }
   }
  }else{

  }
  }



  public function pagamento_finalizado(){

    if(!empty($_GET['transaction_id']) && $this->session->userdata('pedido_atual')){
      //Atualizando status da inscrição para inscrição finalizada
      if($this->Loja_model->finalizar_pedido($this->session->userdata('pedido_atual'), str_replace("-", "", $_GET['transaction_id']))){
        //APAGANDO AS SESSÕES
        $this->session->unset_userdata('pedido_atual');
        if($this->auth->existe_sessao()){
          $this->pedido_finalizado();
        }else{
          redirect(base_url(),'refresh');
        }
      }
    }else{
      $this->session->unset_userdata('pedido_atual');
      if($this->auth->existe_sessao()){
        $this->pedido_finalizado();
      }else{
        redirect(base_url(),'refresh');
      }
    }
  }


  public function pedido_finalizado()
  {
    $this->montaTela('site/pedido-finalizado');
  }


  public function meus_pedidos()
  {
    $data['pedidos'] = $this->Loja_model->get_meus_pedidos($this->auth->get_id_perfil());
    $data['acao_historico'] = $this->rede_model->get_acao_historico();
    //var_dump($data);exit;
    $this->montaTela('site/meus_pedidos', $data);
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

public function atualiza_pagseguro(){

  $this->loja_model->atualiza_pagseguro($this->input->post('id_pedido'));

}


}
