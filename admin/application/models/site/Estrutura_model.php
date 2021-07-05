<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estrutura_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function salvar_estrutura($dados, $id=NULL)
  {
    if($id){
      $this->db->where('id', $id);
      if($this->db->update('categorias', $dados))
      {
        return true;
      }
      else{
        return false;
      }
    }else{
      if($this->db->insert('categorias', $dados))
      {
        return true;
      }
      else
      {
        return false;
      }
    }
  }

  public function get_estruturas()
  {
    $this->db->select('*');
    $this->db->from('categorias');
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return FALSE;
    }
  }

  public function get_estrutura($id=null)
  {
    if($id){
      $this->db->select('*');
      $this->db->from('categorias');
      $this->db->where('id', $id);
      $query = $this->db->get();
      if($query->num_rows() > 0){
        return $query->row();
      }else{
        return FALSE;
      }
    }
  }

  function excluir_estrutura($id){
    $this->db->where('id', $id);
    if($this->db->delete('categorias')){
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
