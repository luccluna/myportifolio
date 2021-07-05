<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_num_noticias($categoria=NULL)
    {
        $this->db->select('noticias.*');
        $this->db->from('noticias');
        if ($categoria) {
            # code...
        $this->db->where('categoria_id', $categoria);
        }
        return $this->db->count_all_results();
    }

    public function get_noticias($pagina, $itens_pagina, $busca=NULL)
    {
        $this->db->select('id, titulo, nome_url, texto_breve, imagem, wifi, arcondicionado, cafedamanha, valor, acesso')
        ->from('noticias')
        ->order_by('id', 'DESC')
        ->limit($itens_pagina, $itens_pagina * $pagina);
        if($busca){
            $this->db->like('titulo', $busca);
            $this->db->or_like('texto', $busca);
        }
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_noticia_id($id=null)
    {
        if($id){
            $this->db->select('*');
            $this->db->from('noticias');
            $this->db->where('id', $id);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->row();
            }else{
                return FALSE;
            }
        }
    }



    public function get_noticias_destaque()
    {
        $this->db->select('noticias.id, noticias.titulo, noticias.nome_url, noticias.imagem, noticias.imagem_chamada, noticias.autor, noticias.data, categorias.nome, categorias.rgb');
        $this->db->from('noticias');
        $this->db->join('categorias','categorias.id=noticias.categoria_id');
        $this->db->where('tipo_noticia',0);
        $this->db->order_by('data', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_noticias_populares($categoria_id=NULL)
    {
        $this->db->select('noticias.id, noticias.titulo, noticias.nome_url, noticias.imagem, noticias.imagem_chamada, noticias.autor, noticias.data, categorias.nome, categorias.rgb, noticias.texto');
        $this->db->from('noticias');
        $this->db->join('categorias','categorias.id=noticias.categoria_id');
        if ($categoria_id!=NULL) {
            $this->db->where('categoria_id',$categoria_id);
        }
        $this->db->order_by('visualizacoes', 'DESC');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_noticias_globais($categoria_id=NULL)
    {
        $this->db->select('noticias.id, noticias.titulo, noticias.nome_url, noticias.imagem, noticias.imagem_chamada, noticias.autor, noticias.data, categorias.nome, categorias.rgb, noticias.texto');
        $this->db->from('noticias');
        $this->db->join('categorias','categorias.id=noticias.categoria_id');
        $this->db->where('tipo_noticia',1);
        if ($categoria_id!=NULL) {
            $this->db->where('categoria_id',$categoria_id);
        }
        $this->db->order_by('data', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_escolha_editor($categoria_id=NULL)
    {
        $this->db->select('noticias.id, noticias.titulo, noticias.nome_url, noticias.imagem, noticias.imagem_chamada, noticias.autor, noticias.data, categorias.nome, noticias.texto');
        $this->db->from('noticias');
        $this->db->join('categorias','categorias.id=noticias.categoria_id');
        $this->db->where('tipo_noticia',2);
        if ($categoria_id!=NULL) {
            $this->db->where('categoria_id',$categoria_id);
        }
        $this->db->order_by('data', 'DESC');
        $this->db->limit(4);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_dica_do_dia($categoria_id=NULL)
    {
        $this->db->select('noticias.id, noticias.titulo, noticias.nome_url, noticias.imagem, noticias.imagem_chamada, noticias.autor, noticias.data, categorias.nome');
        $this->db->from('noticias');
        $this->db->join('categorias','categorias.id=noticias.categoria_id');
        $this->db->where('noticias.tipo_noticia',3);
        if ($categoria_id!=NULL) {
            $this->db->where('categoria_id',$categoria_id);
        }
        $this->db->order_by('noticias.data', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_videos_destaque()
    {
        $this->db->select('*');
        $this->db->from('videos');
        $this->db->order_by('data', 'DESC');
        $this->db->limit(3);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_noticia_video($id)
    {
        $this->db->select('*');
        $this->db->from('videos');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return FALSE;
        }
    }

    public function get_ultimas_noticias($pagina=NULL, $itens_pagina=NULL, $categoria_id=NULL)
    {
        $this->db->select('noticias.id, noticias.titulo, noticias.nome_url, noticias.imagem, noticias.imagem_chamada, noticias.autor, noticias.data, categorias.rgb, categorias.nome, noticias.texto');
        $this->db->from('noticias');
        $this->db->join('categorias','categorias.id=noticias.categoria_id');

        if ($categoria_id!=NULL) {
            $this->db->where('categoria_id',$categoria_id);
        }

        $this->db->order_by('data', 'DESC');

        $this->db->limit($itens_pagina, $itens_pagina * $pagina);

        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function conta_noticias()
    {
        $this->db->select('categorias.nome, count(noticias.categoria_id) as qtd');
        $this->db->from('noticias');
        $this->db->join('categorias','categorias.id=noticias.categoria_id');
        $this->db->group_by('noticias.categoria_id');
        $this->db->order_by(count('noticias.categoria_id'),'DESC');
        $this->db->limit(4);
        return $this->db->get()->result();
    }


    public function todas_categorias()
    {
        $this->db->select('categorias.nome, categorias.id');
        $this->db->from('categorias');
        return $this->db->get()->result();
    }

    public function get_noticia($nome_url)
    {
        $this->db->select('*')
        ->from('noticias')
        ->where('nome_url', $nome_url);
        $query = $this->db->get();
        if($query->num_rows() == 1){
            return $query->row();
        }else{
            return FALSE;
        }
    }
    public function get_noticia_ultimas()
    {
        $this->db->select('*')
        ->from('noticias');
        $this->db->limit(3);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }


    public function get_noticia_galeria($id)
    {
        $this->db->select('*')
        ->from('galeria_noticias')
        ->order_by('id', 'DESC')
        ->limit(5);
        $this->db->where('noticias_id', $id);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_home()
    {
        $this->db->select('*')
        ->from('home');
        $query = $this->db->get();
        if($query->num_rows() == 1){
            return $query->row();
        }else{
            return FALSE;
        }
    }
}
