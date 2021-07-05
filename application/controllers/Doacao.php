<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Doacao extends TEC_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('doacao_model');
    }

    public function index(){
    	
        // $this->load->library('pagination');
        // $segment = 2;
        // $pagina = ($this->uri->segment($segment)) ? (int) $this->uri->segment($segment) - 1: 0;
        // $itens_pagina = 8;
        // $num_itens = $this->doacao_model->get_num_doacao();
        // $doacao = $this->doacao_model->get_doacao($pagina, $itens_pagina);
        // $paginacao = $this->pagination->generate(['blog'], $num_itens, $itens_pagina, $segment);
        // $ultimas = $this->doacao_model->get_ultimas_doacao();
      


        $this->montaTela('site/doacao/pagina');

    }

        public function visualizar()
    {

        
        
        $noticia = $this->doacao_model->get_noticia($this->uri->segment(2));
        if(!$noticia){
            show_404();
        }
        $ultimas = $this->doacao_model->get_noticia_ultimas();

        $this->montaTela('site/blog/pagina_interna', compact('noticia', 'ultimas'));
    }

    public function busca(){
        $busca = $this->input->get('busca');

        $this->load->library('pagination');
        $segment = 2;
        $pagina = ($this->uri->segment($segment)) ? (int) $this->uri->segment($segment) - 1: 0;
        $itens_pagina = 3;
        $num_itens = $this->doacao_model->get_num_doacao($busca);
        $doacao = $this->doacao_model->get_doacao($pagina, $itens_pagina, $busca);
        $paginacao = $this->pagination->generate(['blog'], $num_itens, $itens_pagina, $segment);
        $ultimas = $this->doacao_model->get_ultimas_doacao();
        $this->montaPagina('doacao/lista_doacao', compact('doacao', 'paginacao', 'ultimas', 'busca'), 'header_interna');
    }


  }
