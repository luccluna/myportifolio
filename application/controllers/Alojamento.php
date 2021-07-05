<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Alojamento extends TEC_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Alojamento_model');
    }

    public function index(){
    	
        $this->load->library('pagination');
        $segment = 2;
        $pagina = ($this->uri->segment($segment)) ? (int) $this->uri->segment($segment) - 1: 0;
        $itens_pagina = 8;
        $num_itens = $this->Alojamento_model->get_num_alojamentos();
        $alojamentos = $this->Alojamento_model->get_alojamentos($pagina, $itens_pagina);
        $paginacao = $this->pagination->generate(['blog'], $num_itens, $itens_pagina, $segment);




        $this->montaTela('site/alojamento/pagina', compact('alojamentos'));

    }

    public function detalhes()
    {



        $alojamento = $this->Alojamento_model->get_alojamento($this->input->get('id'));

        if(!$alojamento){
            show_404();
        }

        $ultimos = $this->Alojamento_model->get_ultimos_alojamento($this->input->get('id'));

        $this->montaTela('site/alojamento/pagina_interna', compact('alojamento', 'ultimos'));
    }

    public function busca(){
        $busca = $this->input->get('busca');

        $this->load->library('pagination');
        $segment = 2;
        $pagina = ($this->uri->segment($segment)) ? (int) $this->uri->segment($segment) - 1: 0;
        $itens_pagina = 3;
        $num_itens = $this->Alojamento_model->get_num_alojamento($busca);
        $alojamento = $this->Alojamento_model->get_alojamento($pagina, $itens_pagina, $busca);
        $paginacao = $this->pagination->generate(['blog'], $num_itens, $itens_pagina, $segment);
        $ultimas = $this->Alojamento_model->get_ultimas_alojamento();
        $this->montaPagina('alojamento/lista_alojamento', compact('alojamento', 'paginacao', 'ultimas', 'busca'), 'header_interna');
    }


    public function agendar(){


        if ($tipo = $this->input->get('tipo')) {

            if (!$alojamento = $this->Alojamento_model->get_alojamento($this->input->get('alo'))) {
               show_404();
           }


           if ($tipo=='individual') {
            $vagas = 1;
            $this->montaTela('site/alojamento/agendar_formulario', compact('vagas', 'alojamento', 'tipo'));

        }elseif ($tipo=='familia' || $tipo=='caravana'){
            
            $vagas = $alojamento->vagas;
            
            $this->montaTela('site/alojamento/agendar_formulario', compact('vagas', 'alojamento', 'tipo'));

        }else{
           show_404();
       }



   }else{

    $id_aloja = $this->input->get('id');

    $this->montaTela('site/alojamento/agendar', compact('id_aloja'));

}


}


public function finalizar_agendamento(){

    
    $pessoas=array();
    for ($i=0; $i < $this->input->post('alojamento') ; $i++) { 

        if (isset($_POST['nome'.$i]) && $_POST['nome'.$i]) {
            $dados['nome'] = $_POST['nome'.$i];
            $dados['cidade'] = $_POST['cidade'.$i];
            $dados['email'] = $_POST['email'.$i];
            $dados['telefone'] = $_POST['telefone'.$i];
            array_push($pessoas, $dados);
        }    


    }


    if(count($pessoas) > 0){
        $dados = null;
        $dados['data'] = date("d/m/Y");
        $dados['tipo'] = $this->input->post('tipo');
        $dados['pessoas'] = count($pessoas);
        $dados['alojamentos_id'] = $this->input->post('id_alojamento');
    }

    if($id = $this->Alojamento_model->salvar_agenda($dados) ){

        $this->Alojamento_model->atualiza_alojamento($dados['alojamentos_id'], $dados['pessoas']);

        if($this->Alojamento_model->salvar_agenda_pessoas($id, $pessoas)){
            redirect(base_url('sucesso-agendamento'));
        }else{
            redirect(base_url('error-agendamento'));
        }
    }
}

public function sucesso_agendamento(){
    $this->montaTela('site/alojamento/sucesso');
}    public function error_agendamento(){
    $this->montaTela('site/alojamento/error');
}


}
