<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Secao1_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar_secao1($imagem, $titulo, $texto, $id)
    {

        if($id){
          $dados = array();
          
          if ($imagem) {
            $dados['imagem'] = $imagem;
          } if ($titulo) {
            $dados['titulo'] = $titulo;
          } if ($texto) {
            $dados['texto'] = $texto;
          }
            $this->db->set($dados);
            $this->db->where('id', $id);
            if($this->db->update('secao1'))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
           
            
                return false;
            
        }
    }

    public function get_secao1()
    {
        $this->db->select('*');
        $this->db->from('secao1');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    function excluir_secao1($id){
        $this->db->where('id', $id);
        if($this->db->delete('secao1')){
            return TRUE;
        }else{
            return FALSE;
        }
    }


    function get_promo_home(){

          $this->db->select('*');
          $this->db->from('promocoes_home');
          $query = $this->db->get();
          if($query->num_rows() == 1){
              return $query->row();
          }else{
              return FALSE;
          }

    }
    function get_promo_produtos(){

          $this->db->select('*');
          $this->db->from('promocoes_produtos');
          $query = $this->db->get();
          if($query->num_rows() <= 2){
              return $query->result();
          }else{
              return FALSE;
          }

    }

    function salvar_horario($dados, $id=NULL){
        
         
          $this->db->where('id', $id);
          if($this->db->update('promocoes_home', $dados)){
              return TRUE;
          }else{
              return FALSE;
          }
    }



    function salvar_promo_produtos($imagem=NULL, $descricao=NULL, $link=NULL, $id=NULL){
          if ($imagem) {
            $this->db->set('imagem', $imagem);
          }
          $this->db->set('descricao', $descricao);
          $this->db->where('id', $id);
          if($this->db->update('promocoes_produtos')){
              return TRUE;
          }else{
              return FALSE;
          }
    }





}
