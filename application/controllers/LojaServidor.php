<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
    
class Loja extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('rede_model');
        $this->load->model('Loja_model');
    }


    public function loja(){
        $data = $this->input->post();
        $this->load->library('pagination');
        $segment = 2;
        $pagina = ($this->uri->segment($segment)) ? (int) $this->uri->segment($segment) - 1: 0;
        $itens_pagina = 6;
        if(isset($data['busca']) && strlen( $data['busca'] )>0){
            $num_itens = $this->Loja_model->get_num_produtos_by_busca($data, $pagina, $itens_pagina);
        }else{
            $num_itens = $this->Loja_model->get_num_produtos();
           
        }
        $data['produtos'] = $this->Loja_model->get_produtos($data, $pagina, $itens_pagina);
        $data['paginacao'] = $this->pagination->generate(array('loja'), $num_itens, $itens_pagina, $segment);
        if($this->auth->get_tipo_perfil() == '2')
            $data['politico'] = TRUE;
        $this->montaTela('site/loja', $data);
    }

    public function detalhes(){
        $data['produto'] = $this->Loja_model->get_produto($this->input->post('id'));
        $data['fotos'] =$this->Loja_model->get_fotos($this->input->post('id'));
        $data['perfil'] = $this->rede_model->get_perfil($this->auth->get_id_perfil());
        $data['endereco'] = $this->rede_model->get_endereco($this->auth->get_id_perfil());

            if($data['endereco']){
                    $this->load->library('frete');


                //array com os dados para busca do valor do frete
                $array_correios = array (
                                'nCdEmpresa'          =>  "", // Código da empresa  (opcional)
                                'sDsSenha'            =>  "" , // Senha da empresa   (opcional)
                                'sCepOrigem'          =>  "39400059"  , // Cep de origem    (sem - hífen)
                                'sCepDestino'         =>  $data['endereco']->cep, // Cep de destino   (sem - hífen)
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

    

    $data['fretes'] = (object) $valores_frete;
    $data['prazos'] = (object) $prazos_frete;
    $data['totalFrete'] = (object) $total;
}
        if($this->auth->get_tipo_perfil() == '2')
            $data['politico'] = TRUE;

        $this->montaTela('site/detalhes_produto', $data);


    }


    public function fechar_pedido()
    {


        $produto = $this->Loja_model->get_produto($this->input->post('produto_id'));
        $endereco = $this->rede_model->get_endereco($this->auth->get_id_perfil());
        


        if($this->auth->existe_sessao()){

            $this->load->library('Pagseguro');

            $cliente = $this->auth->get_nome_perfil();


            /*$endereco = array(

                'rua' => $endereco->rua,
                'bairro' => $endereco->bairro,
                'cep' => $endereco->cep,
                'complemento' => $endereco->complemento,
                'numero' => $endereco->numero,
                'cidade' => $endereco->cidade,
                'uf' => $endereco->uf

                );*/

            //Vai usar o Sandbox, ou produção?
            $sandbox = true;

            //Baseado no ambiente, sandbox ou produção, definimos as credenciais
            //e URLs da API.
            $credenciais = $this->pagseguro->getCredenciais($sandbox);

            $email = $credenciais['email'];
            $token = $credenciais['token'];
            $url_request = $credenciais['url_request'];

            //Campos da requisição pagseguro
            $request = array(
                'email'           => $email,
                'token'           => $token,
                'receiverEmail'   => $email,
                'currency'        => 'BRL', 
                //'redirectURL'     => base_url(array('loja', 'pagamento-finalizado')),
                //'notificationURL' => base_url(array('loja', 'notificacoes-pag'))  
            );

            //nome do comprador
            $request['senderName'] = str_replace('  ', ' ', $cliente);

            //email
            $request['senderEmail'] = $this->auth->get_email_perfil();
    

                 $this->load->library('frete');
                //array com os dados para busca do valor do frete
                  $array_correios = array (
                                'nCdEmpresa'          =>  "", // Código da empresa  (opcional)
                                'sDsSenha'            =>  "" , // Senha da empresa   (opcional)
                                'sCepOrigem'          =>  "39400059"  , // Cep de origem    (sem - hífen)
                                'sCepDestino'         =>  $this->input->post('cep'), // Cep de destino   (sem - hífen)
                                'nVlPeso'             =>  $produto->peso, // Peso da embalagem  (em kilogramas)
                                'nCdFormato'          =>  "1" , // Formato da encomenda (1 para caixa/pacote, 2 para rolo/prisma)
                                'nVlComprimento'      =>  $produto->comprimento_embalagem, // Comprimento      (em cm somente números)
                                'nVlAltura'           =>  $produto->altura_embalagem,   // Altura
                                'nVlLargura'          =>  $produto->largura_embalagem, // Largura
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

            if($this->input->post('tipo_frete') == '41106'){

                $valor_frete = (object) $frete[0];
                $valor_frete = (number_format(str_replace(',' , '.', $valor_frete), 2, '.', ','));

            }else if($this->input->post('tipo_frete') == '40010'){

                $valor_frete = (object) $frete[1];
                $valor_frete = (number_format(str_replace(',' , '.', $valor_frete), 2, '.', ','));
            }

            $qtd = $this->input->post('quantidade');

            $valor_total = ($qtd*$produto->valor)+$valor_frete;


                //dados do produto
                $request['itemId1'] = $produto->id;
                $request['itemDescription1'] = $produto->titulo;
                $request['itemQuantity1'] = $this->input->post('quantidade');
                $request['itemAmount1'] = $produto->valor;


                $request['shippingCost'] = $valor_frete;

        

              //Numero do pedido
            $request['reference'] = uniqid('U'.$this->auth->get_id_perfil().'-');

                // echo '<pre>';
              // var_dump($request);
              // exit;
            //Envia a requisição e obtém a resposta do pagseguro
            
            $response = $this->pagseguro->sendRequestPag($request, $sandbox);
            

        
        
            if( strlen($response)>3){
                $db_pedido = array(
                                    'perfis_id' =>$this->auth->get_id_perfil(),
                                    'produtos_id' => $produto->id,
                                    'valor' => $produto->valor,
                                    'valor_total' => $valor_total,
                                    'data' => date('Ymd'),
                                    'valor_frete' => $valor_frete,
                                    'tipo_frete' => $this->input->post('tipo_frete'),
                                    'quantidade' => $this->input->post('quantidade'),
                                    'forma_pagamento' => '1',
                                    'codigo_pedido' => $request['reference'],
                                    );  

                if($this->Loja_model->salvar_pedido($db_pedido)){
                        //Se a operação tiver sido bem sucedida, redirecionamos o cliente para o
                        //ambiente de pagamento.
                            $newdata = array(
                            'pedido_atual'  => $request['reference']
                        );
                        $this->session->set_userdata($newdata);

                        $redirectURL = $url_request.$response;
                        header('Location: ' . $redirectURL);
                   
                }else{
                    echo 'error';
                }
            
        }else{
            echo "error";
        }
    
    }


}

    public function notificacoes_pagseguro()
    {
        if($this->input->post('notificationType') && $this->input->post('notificationType') == 'transaction'){
            $sandbox = true;
            $this->load->library('Pagseguro');
            $result = $this->pagseguro->verificarNotificacoes($this->input->post('notificationCode'), $sandbox);
            $status = '';
            switch ($result->status) {
                case '1':
                    //aguardando pagamento
                    $status = '1';
                    break;
                case '3':
                    //pago
                    $status = '2';
                    break;
                case '7':
                    //cancelado
                    $status = '9';
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
                if($this->Loja_model->existe_transacao(str_replace("-", "", $result->code), $result->reference)){
                    $array = array('status_pedido' => $status, 'tipo_pagamento' => $tipo_pagamento);
                    $this->Loja_model->update_status_pagamento($result->reference, $array);
                }else{
                    $array = array('status_pedido' => $status, 'tipo_pagamento' => $tipo_pagamento, 'id_transacao' => str_replace("-", "", $result->code));
                    $this->Loja_model->update_status_pagamento($result->reference, $array);
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

}