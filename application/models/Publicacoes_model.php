<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Publicacoes_model extends CI_Model {

 public function __construct() {
    parent::__construct();
}

public function get_num_publicacoes($busca=NULL)
{
    $this->db->from('alojamentos');
    if($busca){
        $this->db->like('titulo', $busca);
        $this->db->or_like('descricao', $busca);
    }
    return $this->db->count_all_results();
}

public function get_publicacoes($pagina, $itens_pagina, $busca=NULL)
{

    $this->db->select('*');
    $this->db->from('alojamentos')
    ->order_by('id', 'DESC')
    ->limit($itens_pagina, $itens_pagina * $pagina);
    if($busca){
        $this->db->like('titulo', $busca);
        $this->db->or_like('descricao', $busca);
    }
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return $query->result();
    }else{
        return FALSE;
    }

}

public function get_publicacoes_home(){

    $this->db->select('*')
    ->from('alojamentos')
    ->order_by('id', 'DESC')
    ->limit(3);
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return $query->result();
    }else{
        return FALSE;
    }

}

public function get_publicacao($id)
{
    $this->db->select('*')
    ->from('alojamentos')
    ->where('id', $id);
    $query = $this->db->get();
    if($query->num_rows() == 1){
        return $query->row();
    }else{
        return FALSE;
    }
}

public function get_publicacao_ultimas()
{
    $this->db->select('*')
    ->from('alojamentos');
    $this->db->limit(3);
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return $query->result();
    }else{
        return FALSE;
    }
}


public function get_publicacao_galeria($id)
{
    $this->db->select('*')
    ->from('galeria_alojamentos');
    $this->db->where('alojamento_id', $id);
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return $query->result();
    }else{
        return FALSE;
    }
}

public function get_areas($id=NULL)
{
    $this->db->select('*');
    $this->db->from('areas');
    if ($id) {
       $this->db->where('id', $id);
       return $this->db->get()->row();
   } else{
      $this->db->order_by('id', 'DESC');
      return $this->db->get()->result();
  }
}


public function get_servicos($id=NULL)
{
    $this->db->select('*');
    $this->db->from('servicos');
    if ($id) {
       $this->db->where('id', $id);
       return $this->db->get()->row();
   } else{
      $this->db->order_by('id', 'DESC');
      return $this->db->get()->result();
  }
}


public function get_clientes($id=NULL)
{
    $this->db->select('*');
    $this->db->from('marcas');
    if ($id) {
       $this->db->where('id', $id);
       return $this->db->get()->row();
   } else{
      $this->db->order_by('id', 'DESC');
      return $this->db->get()->result();
  }
}


public function get_depoimentos($id=NULL)
{
    $this->db->select('*');
    $this->db->from('depoimentos');
    if ($id) {
       $this->db->where('id', $id);
       return $this->db->get()->row();
   } else{
      $this->db->order_by('id', 'DESC');
      return $this->db->get()->result();
  }
}

public function get_depoimentos_home(){

    $this->db->select('*')
    ->from('depoimentos')
    ->order_by('id', 'DESC')
    ->limit(2);
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return $query->result();
    }else{
        return FALSE;
    }

}

}
