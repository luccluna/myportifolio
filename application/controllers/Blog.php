<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends TEC_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('noticias_model');
    }

    public function index(){
    	
        $this->load->library('pagination');
        $segment = 2;
        $pagina = ($this->uri->segment($segment)) ? (int) $this->uri->segment($segment) - 1: 0;
        $itens_pagina = 10;
        $num_itens = $this->noticias_model->get_num_noticias();
        $noticias = $this->noticias_model->get_noticias($pagina, $itens_pagina);
        $paginacao = $this->pagination->generate(['blog'], $num_itens, $itens_pagina, $segment);
        $ultimas = $this->noticias_model->get_ultimas_noticias();
        
        $header = 'blog';
        

        $this->montaTela('site/blog/pagina', compact('noticias', 'ultimas', 'paginacao', 'header'), 'informativos');
    }

        public function visualizar()
    {
        $noticia = $this->noticias_model->get_noticia($this->uri->segment(2));
        if(!$noticia){
            show_404();
        }
        $ultimas = $this->noticias_model->get_noticia_ultimas();

        $galeria = $this->noticias_model->get_noticia_galeria($noticia->id);
      
        $this->montaTela('site/blog/pagina_interna', compact('noticia', 'ultimas', 'galeria'), 'informativos');
    }

    public function busca(){
        $busca = $this->input->get('busca');
       
        $this->load->library('pagination');
        $segment = 2;
        $pagina = ($this->uri->segment($segment)) ? (int) $this->uri->segment($segment) - 1: 0;
        $itens_pagina = 8;
        $num_itens = $this->noticias_model->get_num_noticias($busca);
        $noticias = $this->noticias_model->get_noticias($pagina, $itens_pagina, $busca);
        $paginacao = $this->pagination->generate(['blog'], $num_itens, $itens_pagina, $segment);
        $ultimas = $this->noticias_model->get_ultimas_noticias();
        $header = 'blog';
          $this->montaTela('site/blog/pagina', compact('noticias', 'paginacao', 'ultimas', 'busca',  'header'),  'informativos');
        
    }


  }
