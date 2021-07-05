<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banners_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function salvar_banner($dados, $id=NULL)
  {
    if($id){
      $this->db->where('id', $id);
      if($this->db->update('banners', $dados))
      {
        return true;
      }
      else{
        return false;
      }
    }else{
      if($this->db->insert('banners', $dados))
      {
        return true;
      }
      else
      {
        return false;
      }
    }
  }

  public function get_banners()
  {
    $this->db->select('*');
    $this->db->from('banners');
    $query = $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return FALSE;
    }
  }

  public function get_banner($id=null)
  {
    if($id){
      $this->db->select('*');
      $this->db->from('banners');
      $this->db->where('id', $id);
      $query = $this->db->get();
      if($query->num_rows() > 0){
        return $query->row();
      }else{
        return FALSE;
      }
    }
  }

  function excluir_banner($id){
    $this->db->where('id', $id);
    if($this->db->delete('banners')){
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
