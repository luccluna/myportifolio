<?php

class Parcelas extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('geral_model');
         $this->load->model('configuracoes_model');
         $this->load->model('parcelas_model');
    }


    public function carne_pirapora()
    {
        $this->load->view('emissoes/carne_pirapora');
    }



    function gerar() {
        /*PEGANDO ACESSO DO USUÁRIO*/
            $dados['usuario_acesso'] = $this->geral_model->getDadosUsuarioAcesso();
        $this->load->view('parcelas/gerar',$dados);
    }

    function baixar() {
        $this->load->model('lojamodel');
        $query = $this->lojamodel->verifica_caixa();
        if ($query) {
            $this->load->view('parcelas/baixar');
        } else {
            echo '<span id="childrenOfDialog">&nbsp;&nbsp;&nbsp;&nbsp;</span>';
            echo '<script>alert("O caixa está fechado, é necessario abrir para acessar este módulo!");';
            echo '$("#childrenOfDialog").parents(".ui-dialog-content:first").dialog("close");';
            echo '</script>';
        }

    }

    function confirmar_baixa(){
        if($this->geral_model->confirmar_baixa_parcela_codigo_bar($_POST['idparcela'])){

            //REMOVENDO DA REMARCACAO
            $this->geral_model->limpa_remarcacao_parcelas($_POST['idparcela']);


            return true;
        }else{
            return false;
        }
    }

    function update_valores() {
        $this->geral_model->update_valores_plano();
    }

    function atualiza_parcelas_geradas() {
        $this->geral_model->atualiza_parcelas_geradas();
    }

    function gerar_parcelas() {



        $datas = $this->geral_model->get_datas_parcelas($_POST['id']);


//        echo '<pre>';
//        print_r($datas);
//        exit;
        $verifica_parcelas_geradas = $this->geral_model->verifica_parcelas_geradas($_POST['id']);



        if ($verifica_parcelas_geradas == 0) {

            if($_SESSION['idfilial'] == 2){
                $cobrador = 100;
            }else if($_SESSION['idfilial'] == 1){
                $cobrador = 2;
            }




            $unica[0] = array(
                'data_vencimento' => $datas->data_1_parcela,
                'valor' => $datas->valor_1_parcela,
                'entrada_plano' => 1,
                'status' => 1,
                'idcobrador' => $cobrador,
                'valor_pgto' => $datas->valor_1_parcela,
                'data_baixa_alteracao' => $datas->data_1_parcela,
                'idcliente_titular' => $_POST['id']
            );
//            $unica[1] = array(
//                'data_vencimento' => $datas->data_2_parcela,
//                'valor' => $datas->valor_2_parcela,
//                'status' => 0,
//                'idcliente_titular' => $_POST['id']
//            );
            $insere_parcelas_unica = $this->geral_model->insert_parcelas($unica);
            $this->geral_model->update_parcelas_unicas($_POST['id']);

            $insere_parcelas_unica = TRUE;

            if ($insere_parcelas_unica && $_POST['qtd'] > 0) {
                for ($i = 1; $i <= $_POST['qtd']; $i++) {
                    $data[$i] = array(
                        'data_vencimento' => monthCalculate($datas->data_2_parcela, $i - 1),
                        'valor' => $datas->valor_2_parcela,
                        'status' => 0,
                        'idcliente_titular' => $_POST['id']
                    );
                }
            }
            $insere_parcelas = $this->geral_model->insert_parcelas($data);
        } else {
            $ultima_data = $this->geral_model->verifica_ultima_data($_POST['id']);
//            echo $ultima_data;
//            exit;
            if (sizeof($ultima_data) > 0) {
                $ultima_data = $ultima_data[0]->data_vencimento;
            } else {
                $ultima_data = $datas->data_2_parcela;
            }

            for ($i = 0; $i <= $_POST['qtd']; $i++) {
                $data[$i] = array(
                    'data_vencimento' => monthCalculate($ultima_data, $i),
                    'valor' => $datas->valor_2_parcela,
                    'status' => 0,
                    'idcliente_titular' => $_POST['id']
                );
            }
            $insere_parcelas = $this->geral_model->insert_parcelas($data);
        }

        if ($insere_parcelas) {
            $parcelas['parcelas'] = $this->geral_model->get_parcelas($_POST['id']);
            $parcelas['cobradores'] = $this->geral_model->getDados('cobradores');
            $this->load->view('parcelas/mostrar', $parcelas);
        }
    }



    function gerar_parcelas_n() {

        $datas = $this->geral_model->get_datas_parcelas($_POST['id']);
        $verifica_parcelas_geradas = $this->geral_model->verifica_parcelas_geradas($_POST['id']);
        $salario_minimo = $this->geral_model->getSalarioMinimo();
//        echo $verifica_parcelas_geradas;
//        print_r($verifica_parcelas_geradas);
//       echo sizeof($verifica_parcelas_geradas);
//       exit;

        if ($verifica_parcelas_geradas == 0) {
//            $unica[0] = array(
//                'data_vencimento' => $datas->data_1_parcela,
//                'valor' => $datas->valor_1_parcela,
//                'status' => 0,
//                'idcliente_titular' => $_POST['id']
//            );
            $unica[1] = array(
                'data_vencimento' => $datas->data_2_parcela,
                'valor' => $datas->valor_2_parcela,
                'status' => 0,
                'idcliente_titular' => $_POST['id']
            );
            $insere_parcelas_unica = $this->geral_model->insert_parcelas($unica);
            $this->geral_model->update_parcelas_unicas($_POST['id']);

            if ($insere_parcelas_unica && $_POST['qtd'] > 0) {
                for ($i = 1; $i < $_POST['qtd']; $i++) {
                    $data[$i] = array(
                        'data_vencimento' => monthCalculate($datas->data_2_parcela, $i),
                        'valor' => $datas->valor_2_parcela,
                        'status' => 0,
                        'idcliente_titular' => $_POST['id']
                    );
                }
            }
            $insere_parcelas = $this->geral_model->insert_parcelas($data);
        } else {
            $ultima_data = $this->geral_model->verifica_ultima_data($_POST['id']);

            if (sizeof($ultima_data) > 0) {
                $ultima_data = $ultima_data[0]->data_vencimento;
                $decremento = 0;
            } else {
                $ultima_data = $datas->data_2_parcela;
                $decremento = 1;
            }

            for ($i = 1; $i <= $_POST['qtd']; $i++) {
                $data[$i] = array(
                    'data_vencimento' => monthCalculate($ultima_data, $i - $decremento),
                    'valor' => ($datas->taixa * $salario_minimo[0]->valor) / 100,
                    'status' => 0,
                    'idcliente_titular' => $_POST['id']
                );
            }
            $insere_parcelas = $this->geral_model->insert_parcelas($data);
            $decremento = 0;
        }

        if ($insere_parcelas) {
            $parcelas['parcelas'] = $this->geral_model->get_parcelas($_POST['id']);
//            echo '<pre>';
//            print_r($parcelas);
//            exit;
            $parcelas['cobradores'] = $this->geral_model->getDados('cobradores');

            /*PEGANDO ACESSO DO USUÁRIO*/
            $parcelas['usuario_acesso'] = $this->geral_model->getDadosUsuarioAcesso();


            $this->load->view('parcelas/mostrar', $parcelas);
        }
    }

    public function buscar_parcelas() {

        /*PEGANDO ACESSO DO USUÁRIO*/
        $parcelas['usuario_acesso'] = $this->geral_model->getDadosUsuarioAcesso();

        $parcelas['parcelas'] = $this->geral_model->get_parcelas($_POST['id']);

        // echo '<pre>';
        // print_r($parcelas['parcelas']);
        // exit;
        //VERIFICANDO SE EXITE ALGUMA AMBULANCIA PARCELA
        $parcelas['parcela_atrasado'] = 0;

        if(sizeof($parcelas['parcelas']) > 0){

                foreach ($parcelas['parcelas'] as $val) {
                            
                        if($val->status == 0 && $val->data_vencimento < date('Y-m-d')){
                                        $parcelas['parcela_atrasado'] = 1;
                                    }
                }
        }



        $parcelas['ambulancias'] = $this->geral_model->get_ambulancias_titular_pagar($_POST['id']);

        // echo '<pre>';
        // print_r($parcelas['ambulancias']);
        // exit;

         //VERIFICANDO SE EXITE ALGUMA AMBULANCIA ATRASADA
        $parcelas['ambulancia_atrasado'] = 0;

        if(sizeof($parcelas['ambulancias']) > 0){

                foreach ($parcelas['ambulancias'] as $val) {
                            
                        if($val->status == 0 && $val->data <= date('Y-m-d')){
                                        $parcelas['ambulancia_atrasado'] = 1;
                                    }
                }
        }






        $parcelas['materiais'] = $this->geral_model->get_materiais_titular_pagar($_POST['id']);

        //VERIFICANDO SE EXITE ALGUM MATERIAL ATRASADO
        $parcelas['material_atrasado'] = 0;



        if(sizeof($parcelas['materiais']) > 0){

                foreach ($parcelas['materiais'] as $val) {
                            
                        if(!empty($val->parcelas) && $val->status == 0){
                            foreach($val->parcelas as $parcela){
                                    
                                    if($parcela->status == 0 && $parcela->data_vencimento <= date('Y-m-d')){
                                        $parcelas['material_atrasado'] = 1;
                                    }
                            }
                        }
                }
        }

        $parcelas['cobradores'] = $this->geral_model->getDados('cobradores');

        // echo '<pre>';
        // print_r($parcelas['materiais']);
        // exit;

        $this->load->view('parcelas/mostrar', $parcelas);
    }

    public function excluir_parcela() {

        if ($this->input->post('idparcela')) {
            $retorno = $this->geral_model->excluir_parcela('parcelas', 'idparcela', $this->input->post('idparcela'));
        }
        if ($retorno) {
            $mens = 'Parcela excluida!';
        } else {
            $mens = 'Erro ao excluir!';
        }
    }

    public function buscar_parcelas_atrasadas() {
        $parcelas = $this->geral_model->get_parcelas_atrasadas($_POST['id']);
//        $parcelas['cobradores'] = $this->geral_model->getDados('cobradores');
        echo' <script type="text/javascript">
    $(document).ready(function() {
        $(":text").setMask();
    });
    </script>
            <label class="formLabel1" for="data_vencimento">Data Vencimento</label>
            <label class="formLabel1" for="valor">Valor</label>
    <br/>
    <input class="text1 ui-corner-all validate[required]" readonly="readonly" type="text" alt="date" id="data_vencimento" value="' . inverteData($parcelas[0]->data_vencimento, '/') . '" />'
        . '<input class="text1 ui-corner-all validate[required]" readonly="readonly" type="text" alt="decimal" id="valor" value="' . $parcelas[0]->valor . '" />'
        . '';
    }

    public function buscar_parcelas_baixa() {
        $parcelas = $this->geral_model->get_parcelas_baixa($_POST['id']);
//        $parcelas['cobradores'] = $this->geral_model->getDados('cobradores');
        if (sizeof($parcelas) > 0) {
            echo' <script type="text/javascript">
    $(document).ready(function() {
        $(":text").setMask();
        $(".datepicker").datepicker();
    });
    </script>
            <label class="formLabel1" for="data_vencimento">Data Vencimento</label>
            <label class="formLabel1" for="valor">Valor</label>
    <br/>
    <input class="text1 ui-corner-all validate[required] datepicker" readonly="readonly" type="text" alt="date" id="data_vencimento" value="' . inverteData($parcelas[0]->data_vencimento, '/') . '" />'
            . '<input class="text1 ui-corner-all validate[required]" readonly="readonly" type="text" alt="decimal" id="valor" value="' . $parcelas[0]->valor . '" />'
            . '<br>'
                    . '<label class="formLabel1" for="titular">Titular</label><br>'
                    . '<input class="text2 ui-corner-all validate[required]" readonly="readonly" type="text" id="nome" value="' . $parcelas[0]->nome . '" />';
        } else {
            return false;
        }
    }

    function busca_titular_baixa(){
        $parcelas = $this->geral_model->get_dados_parcela_paga($_POST['idparcela']);
//        $parcelas['cobradores'] = $this->geral_model->getDados('cobradores');
        if (sizeof($parcelas) > 0) {
            echo' <script type="text/javascript">
    $(document).ready(function() {
        $(":text").setMask();
        $(".datepicker").datepicker();
    });
    </script>
            <label class="formLabel1" for="data_vencimento">Data Vencimento</label>
            <label class="formLabel1" for="valor">Valor</label>
    <br/>
    <input class="text1 ui-corner-all validate[required] datepicker" readonly="readonly" type="text" alt="date" id="data_vencimento" value="' . inverteData($parcelas[0]->data_vencimento, '/') . '" />'
            . '<input class="text1 ui-corner-all validate[required]" readonly="readonly" type="text" alt="decimal" id="valor" value="' . $parcelas[0]->valor . '" />'
            . '<br>'
                    . '<label class="formLabel1" for="titular">Titular</label><br>'
                    . '<input class="text2 ui-corner-all validate[required]" readonly="readonly" type="text" id="nome" value="' . $parcelas[0]->nome . '" />';
        }
    }

    public function buscar_parcelas_alterar() {

        /*PEGANDO ACESSO DO USUÁRIO*/
        $parcelas['usuario_acesso'] = $this->geral_model->getDadosUsuarioAcesso();


        $parcelas['parcelas'] = $this->geral_model->get_parcelas($_POST['id']);
        $parcelas['cobradores'] = $this->geral_model->getDados('cobradores');
//          echo '<pre>';
//        print_r($parcelas);
//        exit;
        $this->load->view('parcelas/alterar', $parcelas);
    }

    function pagar() {




        $this->load->model('lojamodel');
        $query = $this->lojamodel->verifica_caixa();
        if ($query) {
              if ($_POST['status'] == 'false') {
            $status = 0;
        } else if ($_POST['status'] == 'true') {
            $status = 1;
        }
        $data = array(
            'data_baixa_alteracao' => inverteData($_POST['data_baixa_alteracao'], '/'),
            'idparcela' => $_POST['idparcela'],
            'idcobrador' => $_POST['idcobrador'],
            'status' => $status,
            'valor_pgto' => $_POST['valor_pgto'],
            'pgUser' => $this->syssession->getSess('userId'),
            'pgHorario' => date("d-m-Y H:i:s"),
            'pgMetodo' => 'baixa_manual',
            'pgCaixa' => $query[0]->idcaixa
        );

        if($update_parcela = $this->geral_model->update_parcelas($data)){
            //REMOVENDO DA REMARCACAO
            $this->geral_model->limpa_remarcacao_parcelas($_POST['idparcela']);
        }

        } else {
            echo '<span id="childrenOfDialog">&nbsp;&nbsp;&nbsp;&nbsp;</span>';
            echo '<script>alert("O caixa está fechado, é necessario abrir para acessar este módulo!");';
            echo '$("#childrenOfDialog").parents(".ui-dialog-content:first").dialog("close");';
            echo '</script>';
        }
    }


    function pagar_ambulancia() {




        $this->load->model('lojamodel');
        $query = $this->lojamodel->verifica_caixa();
        if ($query) {
              if ($_POST['status'] == 'false') {
            $status = 0;
        } else if ($_POST['status'] == 'true') {
            $status = 1;
        }
        $data = array(
            'data_baixa_alteracao' => inverteData($_POST['data_baixa_alteracao'], '/'),
            'idservico_ambulancia' => $_POST['idservico_ambulancia'],
            'idcobrador' => $_POST['idcobrador'],
            'status' => $status,
            'valor_pgto' => $_POST['valor_pgto'],
            'pgUser' => $this->syssession->getSess('userId'),
            'pgHorario' => date("d-m-Y H:i:s"),
            'pgCaixa' => $query[0]->idcaixa
        );

        if($update_parcela = $this->geral_model->update_ambulancias($data)){
            //REMOVENDO DA REMARCACAO
           // $this->geral_model->limpa_remarcacao_parcelas($_POST['idparcela']);

        }

        } else {
            echo '<span id="childrenOfDialog">&nbsp;&nbsp;&nbsp;&nbsp;</span>';
            echo '<script>alert("O caixa está fechado, é necessario abrir para acessar este módulo!");';
            echo '$("#childrenOfDialog").parents(".ui-dialog-content:first").dialog("close");';
            echo '</script>';
        }
    }


    /*RECEBENDO PARCELAS DE MATERIAL*/

    function pagar_material(){

        // echo '<pre>';
        // print_r($_POST);
        // exit;

        $this->load->model('lojamodel');
        $query = $this->lojamodel->verifica_caixa();
        if ($query) {
              if ($_POST['status'] == 'false') {
            $status = 0;
        } else if ($_POST['status'] == 'true') {
            $status = 1;
        }
        $data = array(
            'idemprestimo_parcela' => $_POST['idemprestimo_parcela'],
            'status' => $status,
            'data_pgto' => inverteData($_POST['data_pgto'], '/'),
            'pgCobrador' => $_POST['pgCobrador'],
            'pgUser' => $this->syssession->getSess('userId'),
            'pgHorario' => date("Y-m-d H:i:s"),
            'pgCaixa' => $query[0]->idcaixa
        );

        if($update_parcela = $this->geral_model->update_parcelas_materiais($data)){
            //REMOVENDO DA REMARCACAO
           // $this->geral_model->limpa_remarcacao_parcelas($_POST['idparcela']);

        }

        } else {
            echo '<span id="childrenOfDialog">&nbsp;&nbsp;&nbsp;&nbsp;</span>';
            echo '<script>alert("O caixa está fechado, é necessario abrir para acessar este módulo!");';
            echo '$("#childrenOfDialog").parents(".ui-dialog-content:first").dialog("close");';
            echo '</script>';
        }


    }


    function pagar_alterada() {

        if ($_POST['status'] == 'false') {
            $status = 0;
        } else if ($_POST['status'] == 'true') {
            $status = 1;

            //REMOVENDO DA REMARCACAO
            $this->geral_model->limpa_remarcacao_parcelas($_POST['idparcela']);
        }
        $data = array(
            'data_baixa_alteracao' => inverteData($_POST['data_baixa_alteracao'], '/'),
            'idparcela' => $_POST['idparcela'],
            'idcobrador' => $_POST['idcobrador'],
            'status' => $status,
            'valor_pgto' => $_POST['valor_pgto'],
            'pgUser' => $this->syssession->getSess('userId'),
            'pgHorario' => date("d-m-Y H:i:s")
        );
        $update_parcela = $this->geral_model->update_parcelas_alterada($data);
    }

    function alterar_dados_parcela() {

        $data = array(
            'data_baixa_alteracao' => inverteData($_POST['data_baixa_alteracao'], '/'),
            'data_vencimento' => inverteData($_POST['data_vencimento'], '/'),
            'idparcela' => $_POST['idparcela'],
            'idcobrador' => $_POST['idcobrador'],
            'valor' => $_POST['valor_pgto']
        );
        if ($_POST['status'] == 1) {
            $data['valor_pgto'] = $_POST['valor_pgto'];
        }
        $update_parcela = $this->geral_model->update_parcelas_valores($data);
    }

//    function alterar_parcelas(){
//
//    }
    function alterar_baixa() {

        $dados['usuario_acesso'] = $this->geral_model->getDadosUsuarioAcesso();
        $this->load->view('parcelas/buscar_parcelas_alterar',$dados);
    }

    function remarcar() {
        $dados['remarcadas'] = $this->geral_model->get_parcelas_remarcadas();
        $this->load->view('parcelas/buscar_parcelas_remarcar', $dados);
    }

    function remarcar_cobrancas() {

        $dados = array(
            'idcliente_titular' => $_POST['id'],
            'data_vencimento' => inverteData($_POST['data_vencimento']),
            'data_remarcada' => inverteData($_POST['data_remarcada']),
            'valor' => $_POST['valor']
        );

        $verifica_remarcado = $this->geral_model->verifica_plano_remarcado($dados);

        if (sizeof($verifica_remarcado) > 0) {
            echo '<script>alert("Cobrança já remarcada para esta data!")</script>';
            $array['remarcadas'] = $this->geral_model->get_parcelas_remarcadas();
            $this->load->view('parcelas/mostrar_remarcadas', $array);
        } else {
            $possui_cobranca = $this->geral_model->verifica_plano_cobranca($dados);
            if (sizeof($possui_cobranca) > 0) {
                $limpa_cobranca = $this->geral_model->limpa_cobranca($dados);
            }
            $insere_remarcacao = $this->geral_model->insert_remarcacoes($dados);
            $dados['remarcadas'] = $this->geral_model->get_parcelas_remarcadas();
            $this->load->view('parcelas/mostrar_remarcadas', $dados);
        }
    }

    function excluir_parcelas() {
        $idsInscritos = explode(';', $this->input->post('idremarcadoes'));
        $cont = count($idsInscritos);
        for ($i = 0; $i < $cont; $i++) {
            $array = array(
                'idremarcacao' => $idsInscritos[$i]
            );
            $excluir = $this->geral_model->excluir_remarcacoes($array);
        }
        $dados['remarcadas'] = $this->geral_model->get_parcelas_remarcadas();
        $this->load->view('parcelas/mostrar_remarcadas', $dados);
    }


    /*2 VIA BOLETO*/

    function gerar_boletos() {
        $boleto = $this->geral_model->getDadosBoleto($this->uri->segment(3));


                //BUSCANDO LOGOS
        $logomarcas = $this->configuracoes_model->get_logomarcas();


        //SELECIONANDO O BANCO E DADOS DO BOLETO

        $dados_filial = $this->geral_model->getDadosFilial();


        if($dados_filial->banco == 'santander'){

            require FCPATH . 'assets/boleto/boleto_santander_banespa.php';

        }else if($dados_filial->banco == 'caixa'){

            require FCPATH . 'assets/boleto/boleto_cef_sigcb.php';

        }else if($dados_filial->banco == 'sicoob'){

            require FCPATH . 'assets/boleto/boleto_bancoob.php';

        }else if($dados_filial->banco == 'carne'){

            require FCPATH . 'assets/boleto/carne_sistema.php';

        }



    }

    function gerar_boletos_all() {
        $boleto = $this->geral_model->getDadosBoletos($this->uri->segment(3), $this->uri->segment(4));

        // echo '<pre>';
        // print_r($boleto);
        // exit;

        

        /*ELIMINANDO A IMPRESSÃO DO BOLETO RETROATIVO QUE CLIENTE AINDA NÃO PAGOU*/

if($this->uri->segment(4) == 2){

        if(!empty($boleto)){

            if(sizeof($boleto) > 12){
                //unset($boleto[0]);
                $aux = 1;
                for ($i=0; $i < sizeof($boleto) -1 ; $i++) {
                    $boleto[$i] = $boleto[$aux];
                    $aux++;
                }
                $aux = $aux -1;

                unset($boleto[$aux]);
            }
        }

    }
        // echo $aux;
        // echo '<pre>';
        // print_r($boleto);
        // exit();





//        require FCPATH . 'assets/boleto/boleto_bancoob_todos.php';

        //BUSCANDO LOGOS
        $logomarcas = $this->configuracoes_model->get_logomarcas();


        //SELECIONANDO O BANCO E DADOS DO BOLETO

        $dados_filial = $this->geral_model->getDadosFilial();


        if($dados_filial->banco == 'santander'){
            require FCPATH . 'assets/boleto/boleto_santander_banespa.php';
        }else if($dados_filial->banco == 'caixa'){
            require FCPATH . 'assets/boleto/boleto_cef_sigcb.php';
        }else if($dados_filial->banco == 'sicoob'){
            require FCPATH . 'assets/boleto/boleto_bancoob.php';
        }else if($dados_filial->banco == 'bradesco'){
            require FCPATH . 'assets/boleto/boleto_bradesco.php';
        }else if($dados_filial->banco == 'carne'){
            require FCPATH . 'assets/boleto/carne_sistema.php';
        }else if($dados_filial->banco == 'carne_blocos'){
            $dados['parcelas'] = $boleto;
           $this->load->view('parcelas/carne_blocos', $dados);
        }


        // if($_SESSION['idfilial'] == 1){
        //     require FCPATH . 'assets/boleto/boleto_santander_banespa.php';
        // }else if($_SESSION['idfilial'] == 2){
        //     require FCPATH . 'assets/boleto/boleto_cef_sigcb.php';
        // }


            //ATUALZIANDO CODIGO DE BARRAS
         $this->geral_model->atualiza_cod_barras($this->arr_boletos_atualiza_cod);
            //ATUALZIANDO NOSSO NUMERO
         $this->geral_model->atualiza_nosso_numero($this->arr_boletos_atualiza_nosso_num);

         

//        require FCPATH . 'assets/boleto/boleto_bancoob.php';
//        function dv_nosso_numero() {
//          $boleto = $this->geral_model->getDadosBoleto($this->uri->segment(3));
//        }
    }

    /*ATUALIZANDO CODIGO DE BARRAS DE TODOS OS BOLETOS*/
    public $arr_boletos_atualiza_cod = array();

    public $arr_boletos_atualiza_cod_impresso = array();


    public $arr_boletos_atualiza_nosso_num = array();



    function atualiza_numeros_boletos(){


        /*

        $boleto = $this->geral_model->getDadosBoletosAtualizarCodBarras();


        $arr_boletos_atualiza_cod = array();

        if($_SESSION['idfilial'] == 1){
            require FCPATH . 'assets/boleto/boleto_santander_banespa.php';
        }else if($_SESSION['idfilial'] == 2){
            require FCPATH . 'assets/boleto/boleto_cef_sigcb.php';
        }

        $this->geral_model->atualiza_cod_barras($this->arr_boletos_atualiza_cod);

        */

        /*ATUALIZANDO APENAS PESSOAL DA RENASCER*/

                //SELECIONANDO O BANCO E DADOS DO BOLETO

        $dados_filial = $this->geral_model->getDadosFilial();


        $boleto = $this->geral_model->getDadosBoletosAtualizarCodBarras();

        // echo '<pre>';
        // print_r($boleto);
        // exit;


        //$arr_boletos_atualiza_cod = array();

        require FCPATH . 'assets/boleto/boleto_bancoob.php';

        // echo '<pre>';
        // print_r($this->arr_boletos_atualiza_cod);
        // exit;


        //ATUALIZANDO CODIGO DE BARRAS
        // if($this->geral_model->atualiza_cod_barras($this->arr_boletos_atualiza_cod)){
        //     echo 'boletos atualizados';
        // }


        //ATUALIZANDO NOSSO NUMERO
        if($this->geral_model->atualiza_nosso_numero($this->arr_boletos_atualiza_nosso_num)){
            echo 'boletos atualizados';
        }

        ;


   /*    echo '<pre>';
        print_r($this->arr_boletos_atualiza_cod);
        exit();*/




    }


    function retorno_banco(){


        $this->load->model('lojamodel');
        $query = $this->lojamodel->verifica_caixa();
        if ($query) {
            $this->load->view('parcelas/upload_arquivo_retorno');
        } else {
            echo '<span id="childrenOfDialog">&nbsp;&nbsp;&nbsp;&nbsp;</span>';
            echo '<script>alert("O caixa está fechado, é necessario abrir para acessar este módulo!");';
            echo '$("#childrenOfDialog").parents(".ui-dialog-content:first").dialog("close");';
            echo '</script>';
        }

    }

    function novo_arq_retorno_move() {
        if (!empty($_FILES)) {
            $this->load->library('upload', array(
                'upload_path' => FCPATH . 'assets/uploads',
                'allowed_types' => '*',
                'file_name' => hash('sha1', uniqid(rand(0, 500)) . time() . rand(0, 500)),
                'max_size' => 64 * 1024,
                'remove_spaces' => TRUE
            ));

            if ($this->upload->do_upload('Filedata')) {
                $data = $this->upload->data();
                return $data['file_name'];
            }
        }

        return false;
    }

    public $arr_boletos = array();

    function validar_retorno_banco(){

        $arquivo = $this->novo_arq_retorno_move();
        // var_dump($arquivo);
        // exit;



        //PEGANDO DADOS DA CONTA DA FILIAL

            $dados_filial = $this->geral_model->getDadosFilial();

        //GERANDO UM NOVO

        if($dados_filial->banco == 'sicoob'){

            if($arquivo){
            $caminho_arquivo = $arquivo;
          //  require FCPATH . 'assets/retorno/exemplo_cnab240.php';
            $arr_boletos = array();
                include FCPATH . 'assets/retorno/retorno_sicoob.php';
               // var_export($boletos);


                // echo '<pre>';
                // print_r($this->arr_boletos);
                // exit;



            $this->geral_model->confirmar_arquivo_retorno($this->arr_boletos);
            }
            else{
                echo 'ARQUIVO NAO RECONHECIDO';
            }



        }else if($dados_filial->banco == 'santander'){


           if($arquivo){
            $caminho_arquivo = $arquivo;
          //  require FCPATH . 'assets/retorno/exemplo_cnab240.php';
            $arr_boletos = array();
                include FCPATH . 'assets/retorno/exemplo_cnab240_santander.php';
               // var_export($boletos);

              /*  echo '<pre>';
                print_r($this->arr_boletos);
                exit();*/



            $this->geral_model->confirmar_arquivo_retorno($this->arr_boletos);
            }
            else{
                echo 'ARQUIVO NAO RECONHECIDO';
            }


        }else if($dados_filial->banco == 'caixa'){


           if($arquivo){
            $caminho_arquivo = $arquivo;
          //  require FCPATH . 'assets/retorno/exemplo_cnab240.php';
            $arr_boletos = array();
                include FCPATH . 'assets/retorno/retorno_caixa.php';
               // var_export($boletos);

                // echo '<pre>';
                // print_r($this->arr_boletos);
                // exit();



            $this->geral_model->confirmar_arquivo_retorno($this->arr_boletos);
            }
            else{
                echo 'ARQUIVO NAO RECONHECIDO';
            }


        }else{
            echo 'remessa não homologada para esta filial';
            exit;
        }



// if($_SESSION['idfilial'] == 2){
//         if($this->input->post('caminho_arquivo')){
//             $caminho_arquivo = $this->input->post('caminho_arquivo');
//           //  require FCPATH . 'assets/retorno/exemplo_cnab240.php';
//             $arr_boletos = array();
//                 include FCPATH . 'assets/retorno/exemplo_cnab240.php';
//                // var_export($boletos);



//             $this->geral_model->confirmar_arquivo_retorno($this->arr_boletos);
//             }
//             else{
//                 echo 'ARQUIVO NAO RECONHECIDO';
//             }


//  }else if($_SESSION['idfilial'] == 1){
//            if($this->input->post('caminho_arquivo')){
//             $caminho_arquivo = $this->input->post('caminho_arquivo');
//           //  require FCPATH . 'assets/retorno/exemplo_cnab240.php';
//             $arr_boletos = array();
//                 include FCPATH . 'assets/retorno/exemplo_cnab240_santander.php';
//                // var_export($boletos);

//               /*  echo '<pre>';
//                 print_r($this->arr_boletos);
//                 exit();*/



//             $this->geral_model->confirmar_arquivo_retorno($this->arr_boletos);
//             }
//             else{
//                 echo 'ARQUIVO NAO RECONHECIDO';
//             }

//         }

      //  require FCPATH . 'assets/boleto/boleto_santander_banespa.php';




    }

/*BAIXA DE BOLETOS POR COBRADORES*/
    public function baixa_cobradores(){



        $this->load->model('lojamodel');
        $query = $this->lojamodel->verifica_caixa();
        if ($query) {
            $data['cobradores'] = $this->geral_model->getDados('cobradores');
            $data['contForm'] = 0;
            $this->load->view('parcelas/baixa_cobradores',$data);
        } else {
            echo '<span id="childrenOfDialog">&nbsp;&nbsp;&nbsp;&nbsp;</span>';
            echo '<script>alert("O caixa está fechado, é necessario abrir para acessar este módulo!");';
            echo '$("#childrenOfDialog").parents(".ui-dialog-content:first").dialog("close");';
            echo '</script>';
        }
    }

    public function add_boleto_baixa(){

        $data['contForm'] = $this->input->post('cont');

        $this->load->view('parcelas/boleto_unico_cont', $data);

    }

    public function validar_boletos_cobradores(){
      /*  echo '<pre>';
        print_r($_POST);
        exit();*/



        if($_POST){

            $dados['cobrador'] = $this->input->post('idcobrador');
        for ($i = 0; $i <= $_POST['hd_qtd_exames']; $i++) {
            if($this->input->post('codigo_' . $i) != ''){
               $dados['boletos'][$i] = array(
                'cod_barras' => $this->input->post('codigo_' . $i)
             );
            }


        }

        $this->geral_model->confirmar_baixa_boletos_cobrador($dados);

        }else{
            echo 'erro ao validar';
        }


    }

    function alterar_dia_vencimento_parcelas(){

        if($this->geral_model->update_data_parcelas($_POST)){

        $parcelas['parcelas'] = $this->geral_model->get_parcelas($_POST['idcliente_titular']);
        $parcelas['cobradores'] = $this->geral_model->getDados('cobradores');
        $this->load->view('parcelas/alterar', $parcelas);

        }



    }



/*ALTERANDO VALORES DE TODAS AS PARCELAS EM ABERTO*/
    function alterar_valor_parcelas(){

        if($this->geral_model->update_valor_parcelas($_POST)){

        $parcelas['parcelas'] = $this->geral_model->get_parcelas($_POST['idcliente_titular']);
        $parcelas['cobradores'] = $this->geral_model->getDados('cobradores');
        $this->load->view('parcelas/alterar', $parcelas);

        }



    }






/*EMISSÃO DE REMESSA DE BOLETO COM REGISTRO*/

    function emissao_remessa_boletos(){
        $this->load->view('parcelas/emissao_remessa_boletos');
    }

    function gerar_aruivo_remessa_boletos(){



            $dados = $this->geral_model->get_boletos_remessa($_POST);


            // echo '<pre>';
            // print_r($dados[0]);
            // exit;



            //VERIFICANDO SE EXISTE PELO MENOS 1 BOLETO A SER ENVIADO
            if($dados[0]->tem_boleto == 1){



            //CRIANDO NOME DO AQUIVO
            $hoje = str_replace('-', '', date('d-m-Y')).'_'.time();
            $nome_arquivo_remessa= $hoje.".rem";


            //APAGANDO AQRUIVO DE HOJE

            $apagar = FCPATH . 'remessas_boletos/' . $nome_arquivo_remessa;
            @unlink($apagar);

            //exit;


            //PEGANDO DADOS DA CONTA DA FILIAL

            $dados_filial = $this->geral_model->getDadosFilial();

        //GERANDO UM NOVO

        if($dados_filial->banco == 'sicoob'){

            require FCPATH . 'assets/remessa/gerar_sicoob.php';

        }else if($dados_filial->banco == 'bradesco'){

            require FCPATH . 'assets/remessa/gerar_bradesco.php';

        }else{
            echo 'remessa não homologada para esta filial';
            exit;
        }





            //SALVANDO O NOME DO ARQUIVO PARA DONWLOAD

            if($this->geral_model->atualiza_nome_arquivo_remessa($dados[0]->id_ultima_remessa,$nome_arquivo_remessa,$dados[0]->idcliente_titular)){

                $link = base_url() . 'remessas_boletos/' . $nome_arquivo_remessa;

                echo ''
                . '<script>'
                . 'alert("Arquivo gerado com sucesso, será feito o download automaticamente do arquivo");'
                . 'window.open("' . base_url() . 'parcelas/download_arquivo_remessa/' . $nome_arquivo_remessa . '","_blank");'
                . '</script>';

                echo '<h3>Arquivo baixado com sucesso na pasta downloads do seu computador com o nome "'.$nome_arquivo_remessa.'"</h3>';



            }else{
                echo ''
                . '<script>'
                . 'alert("Ocorreu um erro ao gerar o arquivo de remessa.")'
                . '</script>';
            }




        }else{

            echo '<h3>Não existe nenhum boleto a ser enviado na data especificada ou a remessa já foi gerada.</h3>';

     }






    }

    function download_arquivo_remessa(){

               //FAZENDO O DOWNLOAD

                 $link = base_url() . 'remessas_boletos/' . $this->uri->segment(3);

                header('Content-type: octet/stream');
                // Indica o nome do arquivo como será "baixado". Você pode modificar e colocar qualquer nome de arquivo
                header('Content-disposition: attachment; filename="'.$this->uri->segment(3).'";');
                // Indica ao navegador qual é o tamanho do arquivo
                header('Content-Length: ');
                // Busca todo o arquivo e joga o seu conteúdo para que possa ser baixado
                readfile($link);

    }





    /*FIM EMISSÃO DE REMESSA DE BOLETO COM REGISTRO*/







/*GERANDO CARNE DE TODOS QUE ESTÃO QUITADOS */


function gerar_carne_all(){

$dados['filial'] = $this->geral_model->getDadosFilial();

    $dados['planos_venda'] = $this->geral_model->getDados('planos_venda');

    $dados['salario'] = $this->geral_model->getSalarioMinimo();

    $this->load->view('parcelas/gerar_carne_all',$dados);


}


function confirmar_gerar_carne_all(){

    // echo 'DESABILITADO, PROCURE O SUPORTE';

    
    $this->geral_model->confirmar_gerar_carne_all();
    
}


function setar_impressao_boletos(){
    $this->geral_model->setar_impressao_boletos();
}


/*IMPRIMINDO CUPOM DE PAGAMENTO*/

function imprimir_cupom_pagamento(){

    //BUSCANDO LOGOS
   // $logomarcas = $this->configuracoes_model->get_logomarcas();

   //PEGANDO DADOS DA CONTA DA FILIAL

   // $logo = $this->LoadWBMP(base_url().'>assets/img/logomarcas/'.$logomarcas[2]->imagem);

    $dados_filial = $this->geral_model->getDadosFilial();

    $parcela = $this->geral_model->getDadosCupom($_GET['idparcela']);



    // $cupom = '';

    // $cupom .= 'asdfasdfasdf';

    // $cupom .= PHP_EOL . '';
    // $cupom .= PHP_EOL . '';
    // $cupom .= PHP_EOL . '';
    // $cupom .= PHP_EOL . '';
    // $cupom .= 'asdfasdfasdf';
    // $cupom .= chr(27).chr(109);

        // $cupom['dados'] .= PHP_EOL . 'HORA ENTRADA: ' . $_GET['time'];
        // $cupom['dados'] .= PHP_EOL . 'HORA SAIDA: ' . $_GET['saida'];
        // $cupom['dados'] .= PHP_EOL . 'PERMANENCIA: ' . makeTimeFromSec((int) strtotime($_GET['saida']) - (int) strtotime($_GET['time']), 'hms');
        // $cupom['dados'] .= PHP_EOL . 'VALOR: R$ ' . number_format($_GET['valor_pagar'], 2, ',', '.');
        // $cupom['dados'] .= PHP_EOL . 'DESCONTO: R$ ' . number_format($_GET['desconto'], 2, ',', '.');
        // $cupom['dados'] .= PHP_EOL . 'VALOR PAGO: R$ ' . number_format($_GET['valor_pago'], 2, ',', '.');
        // $cupom['dados'] .= PHP_EOL . '';
        // $cupom['dados'] .= PHP_EOL . 'FUNCIONARIO: ' . $_GET['funcionario'];




       // $cupom['dados'] .= PHP_EOL . ''.chr(27).chr(119);
        //$cupom['dados'] .= PHP_EOL . '';
      //  $cupom['dados'] .= PHP_EOL . ' O GRUPO AVELAR  AGRADECE A';
      //  $cupom['dados'] .= PHP_EOL . '              PREFERENCIA!';
       // $cupom['dados'] .= PHP_EOL . '         TEC-CAR E UM PRODUTO DA';
        //$cupom['dados'] .= PHP_EOL . '          TECTOTUM TECNOLOGIA.';

        // echo $cupom['dados'];
        // exit;

        // $CI =& get_instance();

       //  $this->load->helper('file');
       //  $path = APPLICATION_FOLDER . '\\temporary.txt';


        $url  = 'http://localhost/sistema_plano/impressora/index.php/cupons/imprimir?';
        $url .= 'filial='.$dados_filial->nome_fantasia;
        $url .= '&data='.date('d/m/Y');
        $url .= '&hora='.date('H:i:s');
        $url .= '&cod_titular='.$parcela[0]->idcliente_titular;
        $url .= '&cod_parcela='.$parcela[0]->idparcela;
        $url .= '&valor='.number_format($parcela[0]->valor, 2, ',', '.');
        $url .= '&valor_pago='.number_format($parcela[0]->valor_pgto, 2, ',', '.');
        $url .= '&data_vencimento='.inverteData($parcela[0]->data_vencimento,'/');
        $url .= '&data_pagamento='.inverteData($parcela[0]->data_baixa_alteracao,'/');
        $url .= '&funcionario='.$parcela[0]->funcionario;
        $url .= '&cnpj='.$dados_filial->cnpj;
        $url .= '&telefone='.$dados_filial->telefone;
        $url .= '&logradouro='.$dados_filial->logradouro;
        $url .= '&numero='.$dados_filial->numero;
        $url .= '&bairro='.$dados_filial->bairro;
        $url .= '&cidade='.$dados_filial->cidade;
        $url .= '&estado='.$dados_filial->estado;

        echo redirect($url);
        // echo TRUE;



        //$url  = 'http://www.google.com';

    //$url  = 'http://www.google.com';



      // $this->output->set_output('<script src="'.$url.'"></script>');

     //  echo '<script src="'.$url.'"></script>';




        // $this->output->set_output('<script src="'. $url.'"></script>');



   // echo '<script>window.open("'.$url.'")</script>';

        // $curl = curl_init();

        // curl_setopt($curl, CURLOPT_URL, $url);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_POST, true);
        // curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($cupom));

        // $response = urldecode(curl_exec($curl));

        // $error = curl_error($curl);
        // $errno = curl_errno($curl);

        // curl_close($curl);

        // echo $response;

       //  write_file($path, $cupom);
       // // shell_exec('NET USE COM4 \\\\diogo-pc\\mp4200-th');
       //  echo $this->msdos_print($path, 'COM5', TRUE, TRUE);
}

function msdos_print($file, $port, $unlink_after = FALSE, $return_output = FALSE) {
    if (file_exists($file)) {
        $output = shell_exec("PRINT {$file} /d:{$port}");

        if ($unlink_after === TRUE) {
            unlink($file);
        }
        if ($return_output === TRUE) {
            return $output;
        } else {
            return TRUE;
        }
    } else {
        return FALSE;
    }
}

function LoadWBMP($imgname)
{
    $im = @imagecreatefromwbmp($imgname); /* Attempt to open */
    if (!$im) { /* See if it failed */
        $im  = imagecreatetruecolor (20, 20); /* Create a blank image */
        $bgc = imagecolorallocate($im, 255, 255, 255);
        $tc  = imagecolorallocate($im, 0, 0, 0);
        imagefilledrectangle($im, 0, 0, 10, 10, $bgc);
        /* Output an errmsg */
        imagestring($im, 1, 5, 5, "Error loading $imgname", $tc);
    }
    return $im;
}

/*fim impressao*/



/*BAIXAR POR CODIGOS CLIENTE COM SEGURO APENAS PARA ORIGEM SAUDE SALINAS*/

function baixar_com_seguro() {
        $this->load->model('lojamodel');
        $query = $this->lojamodel->verifica_caixa();
        if ($query) {
            $this->load->view('parcelas/baixar_com_seguro');
        } else {
            echo '<span id="childrenOfDialog">&nbsp;&nbsp;&nbsp;&nbsp;</span>';
            echo '<script>alert("O caixa está fechado, é necessario abrir para acessar este módulo!");';
            echo '$("#childrenOfDialog").parents(".ui-dialog-content:first").dialog("close");';
            echo '</script>';
        }

    }

    public function buscar_parcelas_baixa_com_seguro() {
        $parcelas = $this->geral_model->get_parcelas_baixa_com_seguro($_POST['id']);
//        $parcelas['cobradores'] = $this->geral_model->getDados('cobradores');
        if (sizeof($parcelas) > 0) {
            echo' <script type="text/javascript">
    $(document).ready(function() {
        $(":text").setMask();
        $(".datepicker").datepicker();
    });
    </script>
            <label class="formLabel1" for="data_vencimento">Data Vencimento</label>
            <label class="formLabel1" for="valor">Valor</label>
    <br/>
    <input class="text1 ui-corner-all validate[required] datepicker" readonly="readonly" type="text" alt="date" id="data_vencimento" value="' . inverteData($parcelas[0]->data_vencimento, '/') . '" />'
            . '<input class="text1 ui-corner-all validate[required]" readonly="readonly" type="text" alt="decimal" id="valor" value="' . $parcelas[0]->valor . '" />'
            . '<br>'
                    . '<label class="formLabel1" for="titular">Titular</label><br>'
                    . '<input class="text2 ui-corner-all validate[required]" readonly="readonly" type="text" id="nome" value="' . $parcelas[0]->nome . '" />';
        } else {
            return false;
        }
    }



    function confirmar_baixa_com_codigo(){

        if($this->geral_model->confirmar_baixa_parcela_codigo_bar($_POST['idparcela'])){

            //REMOVENDO DA REMARCACAO
            $this->geral_model->limpa_remarcacao_parcelas($_POST['idparcela']);


            return true;
        }else{
            return false;
        }

    }



    /*BAIXA EM LOTE*/


    function baixa_em_lote(){

        // PEGANDO OS DADOS DA FILIAL
        $dados['filial'] = $this->get_filial();

        $dados['cidades'] = $this->geral_model->getDadosAsc('cidades','nome');
        $dados['bairros'] = $this->geral_model->getDadosAsc('bairros','nome');
        $dados['rotas'] = $this->geral_model->getDadosAsc('rotas','id');

        $this->load->view('parcelas/baixa_lote', $dados);
    }



    function get_dados_baixa_lote(){

        // echo '<pre>';
        // print_r($_POST);
        // exit;

        $this->load->model('relatorios_model');


         // PEGANDO OS DADOS DA FILIAL
         $dados['filial'] = $this->get_filial();


        if ($this->input->post('tipo') == 'a_vencer') {
            $dados['dados'] = $this->relatorios_model->getPlanosAvencer(inverteData($this->uri->segment(4), '-'), inverteData($this->uri->segment(5), '-'), $this->uri->segment(6), $this->uri->segment(7), $this->uri->segment(8), $this->uri->segment(9), $this->uri->segment(10));
            $dados['numero_ocorrencias'] = sizeof($dados['dados']);
            $dados['titulo'] = 'COBRANÇA DE PLANOS A VENCER';
           /*echo '<pre>';
            print_r($dados);
            exit;*/
            $view = 'relatorios/pdf/cobranca_planos_vencer';
        } else if ($this->input->post('tipo') == 'vencido') {
            
            $dados['dados'] = $this->parcelas_model->getPlanosVencidos(inverteData($this->input->post('data_inicio'), '-'), inverteData($this->input->post('data_fim'), '-'),$this->input->post('idcidade'), $this->input->post('idbairro'), $this->input->post('idrota'), $this->input->post('possui_seguro'), $this->input->post('order_by'));
            $dados['numero_ocorrencias'] = sizeof($dados['dados']);
            $dados['titulo'] = 'COBRANÇA DE PLANOS VENCIDOS';

        }else if ($this->input->post('tipo') == 'vencido_obito') {
            $dados['dados'] = $this->relatorios_model->getPlanosVencidosObito(inverteData($this->uri->segment(4), '-'), inverteData($this->uri->segment(5), '-'), $this->uri->segment(6), $this->uri->segment(7), $this->uri->segment(8), $this->uri->segment(9), $this->uri->segment(10));
            $dados['numero_ocorrencias'] = sizeof($dados['dados']);
            $dados['titulo'] = 'COBRANÇA DE PLANOS VENCIDOS COM ÓBITO';
            $view = 'relatorios/pdf/cobranca_planos_com_obito';
        } else if ($this->input->post('tipo') == 'escritorio') {
            $dados['dados'] = $this->relatorios_model->getPlanosVencidosLocal(inverteData($this->uri->segment(4), '-'), inverteData($this->uri->segment(5), '-'), 1, $this->uri->segment(6), $this->uri->segment(7), $this->uri->segment(8), $this->uri->segment(9), $this->uri->segment(10));
            $dados['numero_ocorrencias'] = sizeof($dados['dados']);
            $dados['titulo'] = 'COBRANÇA DE PLANOS VENCIDOS(ESCRITÓRIO)';
            $view = 'relatorios/pdf/cobranca_planos';
        } else if ($this->input->post('tipo') == 'residencia') {
            $dados['dados'] = $this->relatorios_model->getPlanosVencidosLocal(inverteData($this->uri->segment(4), '-'), inverteData($this->uri->segment(5), '-'), 2, $this->uri->segment(6), $this->uri->segment(7), $this->uri->segment(8), $this->uri->segment(9), $this->uri->segment(10));
            $dados['numero_ocorrencias'] = sizeof($dados['dados']);
            $dados['titulo'] = 'COBRANÇA DE PLANOS VENCIDOS(RESIDÊNCIA)';
            $view = 'relatorios/pdf/cobranca_planos';
        }else if ($this->input->post('tipo') == 'banco') {
            $dados['dados'] = $this->relatorios_model->getPlanosVencidosLocal(inverteData($this->uri->segment(4), '-'), inverteData($this->uri->segment(5), '-'), 3,$this->uri->segment(6), $this->uri->segment(7), $this->uri->segment(8), $this->uri->segment(9), $this->uri->segment(10));
            $dados['numero_ocorrencias'] = sizeof($dados['dados']);
            $dados['titulo'] = 'COBRANÇA DE PLANOS VENCIDOS(BANCO)';
            $view = 'relatorios/pdf/cobranca_planos';
        } else if ($this->input->post('tipo') == 'remarcado') {
            $dados['dados'] = $this->relatorios_model->getPlanosRemarcados(inverteData($this->uri->segment(4), '-'), inverteData($this->uri->segment(5), '-'), $this->uri->segment(6), $this->uri->segment(7), $this->uri->segment(8), $this->uri->segment(9), $this->uri->segment(10));
            $dados['numero_ocorrencias'] = sizeof($dados['dados']);
            $dados['titulo'] = 'COBRANÇA DE PLANOS REMARCADOS';
            $view = 'relatorios/pdf/cobranca_planos_remarcado';
        }else if ($this->input->post('tipo') == 'bairro') {
            $dados['dados'] = $this->relatorios_model->getPlanosVencidosBairro(inverteData($this->uri->segment(4), '-'), inverteData($this->uri->segment(5), '-'), $this->uri->segment(6), $this->uri->segment(7), $this->uri->segment(8), $this->uri->segment(9), $this->uri->segment(10));
            $dados['numero_ocorrencias'] = sizeof($dados['dados']);
            $dados['titulo'] = 'COBRANÇA DE PLANOS VENCIDOS POR BAIRRO';
            $dados['nome_bairro'] = $this->relatorios_model->get_nome_bairro($this->uri->segment(6));
            $view = 'relatorios/pdf/cobranca_planos_bairro';
        }

        // echo '<pre>';
        // print_r($dados['dados']);
        // exit;

        $dados['cobradores'] = $this->geral_model->getDados('cobradores');

        $dados['usuario_acesso'] = $this->geral_model->getDadosUsuarioAcesso();

        $this->load->view('parcelas/mostrar_parcelas_baixa_lote',$dados);

    }


    function pagar_todas_parcelas_titular() {




        $this->load->model('lojamodel');
        $query = $this->lojamodel->verifica_caixa();
        if ($query) {

        //VAMOS PEGAR TODAS AS PARCELAS DO FILTRO ESCOLHIDO DO TITULAR

       if($parcelas =  $this->parcelas_model->get_parcelas_atraso_titular_data($_POST)){

            foreach ($parcelas as $val) {

                        $data = array(
                            'data_baixa_alteracao' => date('Y-m-d'),
                            'idparcela' =>  $val->idparcela,
                            'idcobrador' => $_POST['idcobrador'],
                            'status' => 1,
                            'valor_pgto' => $val->valor,
                            'pgUser' => $this->syssession->getSess('userId'),
                            'pgHorario' => date("d-m-Y H:i:s"),
                            'pgMetodo' => 'baixa_manual',
                            'pgCaixa' => $query[0]->idcaixa
                        );


                                if($update_parcela = $this->parcelas_model->receber_parcelas_atraso($data)){
                                    //REMOVENDO DA REMARCACAO
                                    $this->geral_model->limpa_remarcacao_parcelas($val->idparcela);
                                }


            }

       }

        // echo '<pre>';
        // print_r($parcelas);
        // exit;








        } else {
            echo '<span id="childrenOfDialog">&nbsp;&nbsp;&nbsp;&nbsp;</span>';
            echo '<script>alert("O caixa está fechado, é necessario abrir para acessar este módulo!");';
            echo '$("#childrenOfDialog").parents(".ui-dialog-content:first").dialog("close");';
            echo '</script>';
        }
    }





    /*FIM BAIXA EM LOTE*/

    //SELECIONANDO OS DADOS DA FILIAL

function get_filial(){

    $data = $this->geral_model->getDadosFilial();

    $data->logos = $this->geral_model->get_logomarcas();
            
    return $data;

}


/*ALTERANDO ENTRADA DO PLANO*/


function alterar_entrada_plano() {

        if ($_POST['entrada_plano'] == 'false') {
            $entrada_plano = 0;
        } else if ($_POST['entrada_plano'] == 'true') {
            $entrada_plano = 1;

            //REMOVENDO DA REMARCACAO
           // $this->geral_model->limpa_remarcacao_parcelas($_POST['idparcela']);
        }
        $data = array(
            'idparcela' => $_POST['idparcela'],
            'entrada_plano' => $entrada_plano
        );
        if($this->geral_model->update_entrada_plano($data)){
            echo TRUE;
        }
    }


/*FIM ALTERANDO ENTRAR*/


/*ATUALIZANDO AS PARCELAS ANTIGAS IMPORTADAS DO SISTEMA QUE NÃO VIERAM*/

function atualizando_parcelas_antigo_sistema() {
    $this->geral_model->atualizando_parcelas_antigo_sistema();
}

/*FIM ATUALIZANDO*/




/*CONSULTANDO REMESSAS*/

function consultar_remessas($msg = '') {
        // $dados['remessas'] = $this->geral_model->get_remessas();
        // $this->load->view('parcelas/consultar_remessas', $dados);

    $dados_filial = $this->geral_model->getDadosFilial();



        if ($_POST) {

            $remessas = array();

            $class = '';

            //Verificando se ha termo para filtrar tabela

            if ($this->input->post('term')) {

                $txt = $this->input->post('term');

            } else
                $txt = null;

            //Verificando se ha indicies para o limite

            if (isset($_POST['per_page']) && isset($_POST['current'])) {

                $lim = array($this->input->post('per_page'), ($this->input->post('per_page') * $this->input->post('current')));

            } else

                $lim = array(12, 0);

            //Escrevendo as linhas

            $remessas = $this->geral_model->getListasRemessa('emissoes_remessa', $txt, $lim[0], $lim[1], false, 'emissoes_remessa.arquivo', 'emissoes_remessa.arquivo', 'emissoes_remessa.id', NULL);
                
            // echo '<pre>';

            // print_r($titular);

            // exit;

            foreach ($remessas as $remessa) {

                if(!empty($remessa->titular)){
                    $nome_titular = '<b>TITULAR:</b> '.$remessa->titular.' - ';
                }else{
                    $nome_titular = '';
                }


                if ($remessa->remessa_enviada == 0) {
                    $remessa_enviada = '<b style="color:red">NÃO</b>';
                } else {
                    $remessa_enviada = '<b style="color:green">SIM</b> em ' . inverteData($remessa->data_hora_enviada,'/').' <b>POR </b>'. $remessa->usuario_envio ;
                }

                echo '<tr class="usuariostablerow' . $class . '">';

                echo '<td> '.$nome_titular.' <b>COD REMESSA:</b>' . $remessa->id . ' - <b> GERADA POR </b>' . $remessa->usuario_geracao . ' em ' . inverteData($remessa->data_hora,'/')  . ' <b>REMESSA ENVIADA:</b> - ' . $remessa_enviada . '</td>';
                

                echo '<td style="width: 60px">';

                echo '<span class="tooltip" title="Listar boletos dessa remessa" onclick="lista_boletos(' . $remessa->id . ')"><img src="' . base_url() . 'assets/img/icones/icone-opcoes.png"  width="20"/></span>';

                echo '<a download href="' .base_url().$dados_filial->pasta_remessas.'/'. $remessa->arquivo . '"><span class="tooltip" title="Baixar arquivo remessa"><img src="' . base_url() . 'assets/img/icones/download.png"  width="20"/></span></a>';

                if ($remessa->remessa_enviada == 0) {
                    echo '<span class="tooltip" title="Marcar como enviado" onclick="confirma_marcacao(' . $remessa->id . ')"><img src="' . base_url() . 'assets/img/icones/activate.png"  width="20"/></span>';
                }

                // if ($remessa->status == 1)

                // echo '<span class="tooltip" title="Desativar" onclick="chgstatus(1,' . $remessa->idcliente_titular . ')"><img src="' . base_url() . 'assets/img/icones/activate.png" width="20" /></span>';

                // else

                // echo '<span class="tooltip" title="Ativar" onclick="chgstatus(0,' . $remessa->idcliente_titular . ')"><img src="' . base_url() . 'assets/img/icones/excluir.png" width="20" /></span>';

                echo '</td></tr>';

                $class = ($class == '') ? ' alt' : '';

            }

        } else

            $this->load->view('parcelas/consultar_remessas', array('quant' => count($this->geral_model->getListasRemessa('emissoes_remessa', NULL, NULL, NULL, false, NULL, NULL, 'data_hora', NULL)), 'msg' => ($msg != '') ? $msg : null));

    }

    function set_remessa_enviada() {
        $this->geral_model->set_remessa_enviada($_POST['id']);

        $_POST = array();
        
        $this->consultar_remessas();
    }

    function listar_boletos() {
        $dados['boletos'] = $this->geral_model->get_boletos_remessa_id($_POST['id']);

        $this->load->view('parcelas/boletos_remessa', $dados);
    }



/*FIM CONSULTA REMESSA*/

/*EMISSÃO DE REMESSA AVULSA POR TITULAR*/

function emitir_remessa_avulsa(){
   $this->load->view('parcelas/remessa_avulsa');
}


public function buscar_parcelas_em_aberto() {

        /*PEGANDO ACESSO DO USUÁRIO*/
        $parcelas['usuario_acesso'] = $this->geral_model->getDadosUsuarioAcesso();

        $parcelas['parcelas'] = $this->geral_model->get_parcelas_aberto($_POST['id']);

        // echo '<pre>';
        // print_r($parcelas['parcelas']);
        // exit;
        //VERIFICANDO SE EXITE ALGUMA AMBULANCIA PARCELA
        $parcelas['parcela_atrasado'] = 0;

        if(sizeof($parcelas['parcelas']) > 0){

                foreach ($parcelas['parcelas'] as $val) {
                            
                        if($val->status == 0 && $val->data_vencimento < date('Y-m-d')){
                                        $parcelas['parcela_atrasado'] = 1;
                                    }
                }
        }



        $this->load->view('parcelas/mostrar_em_aberto', $parcelas);
    }



    function gerar_remessa_avulsa(){


        $idsInscritos = explode(';', $this->input->post('idsparcelas'));
        $cont = count($idsInscritos);
        
        for ($i = 0; $i < $cont; $i++) {
            
            $array[$i] = $idsInscritos[$i];

        }

        

        /*BAIXANDO A REMESSA DO TITULAR*/

             $dados_filial = $this->geral_model->getDadosFilial();


               $dados = $this->geral_model->get_dados_remessa_avulsa($array);


                // echo '<pre>';
                // print_r($dados);
                // exit;


            //VERIFICANDO SE EXISTEM OS BOLETOS
            if($dados[0]->tem_boleto == 1){



            //CRIANDO NOME DO AQUIVO
            $hoje = str_replace('-', '', date('d-m-Y')).'_AV'.time().'_'.$dados[0]->idcliente_titular;
            $nome_arquivo_remessa= $hoje.".rem";
            $pasta_remessas = $dados_filial->pasta_remessas;

            //TEMOS QUE PEGAR O NUMERO DA ULTIMA REMESSA
            $sequencial = $this->geral_model->get_sequencial_remessa();


            //APAGANDO AQRUIVO DE HOJE

            // $apagar = FCPATH . 'remessas_boletos/' . $nome_arquivo_remessa;
            // @unlink($apagar);

            //exit;

            // echo '<pre>';
            // print_r($dados);
            // exit;


            //GERANDO UM NOVO

            //require FCPATH . 'assets/remessa/gerar.php';

            if($dados_filial->banco == 'sicoob'){
                        require FCPATH . 'assets/remessa/gerar_caixa.php';
            }else if($dados_filial->banco == 'bradesco'){

            require FCPATH . 'assets/remessa/gerar_bradesco.php';

          }


                        //VAMOS SALVAR A REMESSA
            $this->geral_model->salvar_sequencial_remessa($dados[0]->idcliente_titular,$sequencial);

            //SALVANDO O NOME DO ARQUIVO PARA DONWLOAD

            if($this->geral_model->atualiza_nome_arquivo_remessa($dados[0]->id_ultima_remessa,$nome_arquivo_remessa,$dados[0]->idcliente_titular)){

               $link =  base_url() . 'download?' . http_build_query(array('pasta' =>$pasta_remessas, 'arquivo' =>$nome_arquivo_remessa));



              /*  //FAZENDO DOWNLOAD
                // Aquivo tem que ser caminho, base_url é link http, não vai dar certo OK?
                // Ai no caso esse controller vai ser chamado naquele window.open certo?ISSO


                $arquivo = $link;

                $file = new SplFileInfo($arquivo);
                $tamanho = $file->getSize();
                $extension = $file->getExtension();

                $this->output
                    ->set_output(file_get_contents($arquivo))
                    ->set_header('Content-Disposition: attachment')
                    // Se quiser definir o nome do arquivo de download, você troca a de cima por
                    // ->set_header('Content-Disposition: attachment; filenam="o_nome_que_eu_quero.php"')
                    ->set_header("Content-Length: {$tamanho}")

                    // Aqui eu deixei text/plain pq não existe extensão .rem, mas se você passar só a extensão
                    // funciona em todos os arquivos que estão em application/config/mimes.php
                    ->set_content_type('text/plain');
*/

               echo $link;

                // return ''
                // . 'alert("ARQUIVO DE REMESSA DESTE CLIENTE GERADO COM SUCESSO, CLIQUE EM OK QUE SERÁ BAIXADO AUTOMATICAMENTE, CASO NÃO BAIXE VERIFIQUE EM CONSULTA DE REMESSAS!");'
                // . 'window.open("' . $link . '","_blank");';               



            }else{
                echo 'erro';
                // return ''
                // . 'alert("Ocorreu um erro ao gerar o arquivo de remessa. Entrar em contato imediadamente no suporte (38) 3015 7901")';
            }




        }else{
            echo 'erro';

            // return ''
            //     . 'alert("Ocorreu um erro ao gerar o arquivo de remessa. Entrar em contato imediadamente no suporte (38) 3015 7901")';

     }







                /*FIM BAIXANDO A REMESSA*/


                    // echo '<pre>';
                    // print_r($array);
                    // exit;

        }

/*FIM EMISSAO*/






}
