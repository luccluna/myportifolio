<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar_noticia($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('noticias', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('noticias', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function get_noticias()
    {
        $this->db->select('*');
        $this->db->from('noticias');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_noticia($id=null)
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

        public function get_galeria_noticia($id=null)
    {
        if($id){
            $this->db->select('*');
            $this->db->from('galeria_noticias');
            $this->db->where('noticias_id', $id);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result();
            }else{
                return FALSE;
            }
        }
    }

    public function get_galeria_imagem($id=null)
    {
        if($id){
            $this->db->select('*');
            $this->db->from('galeria_noticias');
            $this->db->where('id', $id);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->row();
            }else{
                return FALSE;
            }
        }
    }

    function excluir_noticia($id){
        $this->db->where('id', $id);
        if($this->db->delete('noticias')){
            return TRUE;
        }else{
            return FALSE;
        }
    }


    function excluir_imagem_galeria($id){
        $this->db->where('id', $id);
        if($this->db->delete('galeria_noticias')){
            return TRUE;
        }else{
            return FALSE;
        }
    }


    function excluir_respostas_cometarios_noticia($id_noticia=''){

        $data = array();
        $this->db->select('noticias_comentarios.*');       
        $this->db->from('noticias_comentarios');       
        $this->db->where('noticias_comentarios.noticias_id', $id_noticia);

        $comentarios_noticias = $this->db->get();
        $data = $comentarios_noticias->result(); 

  


        //delete respostas dos comentarios selecionados 

        foreach ($data as $key => $val) {

            $this->db->where('noticias_comentarios_respostas.comentarios_id', $val->id);
            if($this->db->delete('noticias_comentarios_respostas')){

            }else{
                return false;
            }
        
            
        }


        return true;  

    }


    function excluir_cometarios_noticia($id=''){
        $this->db->where('noticias_id', $id);
        if($this->db->delete('noticias_comentarios')){
            return TRUE;
        }else{
            return FALSE;
        }

    }

       function confere_nome_url($nome_url=''){
        $this->db->select('*');
        $this->db->from('noticias');
        $this->db->where('nome_url', $nome_url);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }

    }



     public function salvar_galeria($fotos){

        foreach ($fotos as $key => $value) {
            
            $this->db->insert('galeria_noticias', $value);
        }
        return true;
    
    }

    public function get_categoria()
    {
        $this->db->select('*');
        $this->db->from('categorias');
        return $this->db->get()->result();
    }










}