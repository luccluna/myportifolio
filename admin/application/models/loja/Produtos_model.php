<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar_produto($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('produtos', $dados))
            {
                return $id;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('produtos', $dados))
            {
                return $this->db->insert_id();
            }
            else
            {
                return false;
            }
        }
    }

    public function salvar_galeria($dados)
    {
        // var_dump($dados);
        // exit;
        if($this->db->insert_batch('produtos_fotos', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
    }

    public function salvar_tamanhos($dados, $id=NULL)
    {
        // var_dump($dados);
        // exit;

        if ($id) {
          $this->db->select('produto_tamanhos.*');
          $this->db->from('produto_tamanhos');
          $this->db->where('produtos_id', $id);
          $query = $this->db->get();
          if($query->num_rows()>0){

            foreach ($query->row() as $key => $value) {
              $this->db->where('produtos_id', $id);
              $this->db->delete('produto_tamanhos');
            }
          }
          if (count($dados)>0) {

          $this->db->insert_batch('produto_tamanhos', $dados);
        }

        }else {
          if($this->db->insert_batch('produto_tamanhos', $dados))
              {
                  return true;
              }
              else
              {
                  return false;
              }
        }


    }

    public function salvar_categorias($dados, $id=NULL)
    {
        // var_dump($dados);
        // exit;

        if ($id) {
          $this->db->select('categorias_produtos.*');
          $this->db->from('categorias_produtos');
          $this->db->where('produtos_id', $id);
          $query = $this->db->get();
          if($query->num_rows()>0){

            foreach ($query->row() as $key => $value) {
              $this->db->where('produtos_id', $id);
              $this->db->delete('categorias_produtos');
            }
          }
          if (count($dados)>0) {

          $this->db->insert_batch('categorias_produtos', $dados);
        }

        }else {
          if($this->db->insert_batch('categorias_produtos', $dados))
              {
                  return true;
              }
              else
              {
                  return false;
              }
        }


    }

    public function get_produtos()
    {
        $this->db->select('produtos.*');
        $this->db->from('produtos');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_tamanhos()
    {
        $this->db->select('tamanhos.*');
        $this->db->from('tamanhos');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_tamanhos_produto($id){
      $this->db->select('produto_tamanhos.tamanhos_id');
      $this->db->from('produto_tamanhos');
      $this->db->where('produtos_id', $id);
      $query = $this->db->get();
      if($query->num_rows() > 0){
          return $query->result();
      }else{
          return FALSE;
      }
    }

    public function get_categorias_produto($id){
      $this->db->select('categorias_produtos.categorias_id');
      $this->db->from('categorias_produtos');
      $this->db->where('produtos_id', $id);
      $query = $this->db->get();
      if($query->num_rows() > 0){
          return $query->result();
      }else{
          return FALSE;
      }
    }

    public function get_categorias()
    {
        $this->db->select('categorias.*');
        $this->db->from('categorias');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_produto($id=null)
    {
        if($id){
            $this->db->select('produtos.*');
            $this->db->from('produtos');
            $this->db->where('produtos.id', $id);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                $data = $query->row();
                $this->db->select('produtos_fotos.*');
                $this->db->from('produtos_fotos');
                $this->db->where('produtos_fotos.produtos_id', $id);
                $query_galeria = $this->db->get();
                if($query_galeria->num_rows() > 0){
                    $data->galeria = $query_galeria->result();
                }
                return $data;
            }else{
                return FALSE;
            }
        }
    }

    public function get_galeria_produto($id_produto='')
    {
        $this->db->select('galeria_produtos.*');
        $this->db->from('galeria_produtos');
        $this->db->where('galeria_produtos.produtos_id', $id_produto);
        $query_galeria = $this->db->get();
        if($query_galeria->num_rows() > 0){
            return $query_galeria->result();
        }else{
            return FALSE;
        }
    }

    public function excluir_imagem($imagem)
    {
        $this->db->trans_start();
            foreach ($imagem as $id) {
                $this->db->where('id', $id);
                $this->db->delete('produtos_fotos');
            }
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function excluir_galeria($id_produto='')
    {
        $this->db->where('produtos_id', $id_produto);
        if($this->db->delete('galeria_produtos')){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function excluir_produto($id){
        $this->db->where('id', $id);
        if($this->db->delete('produtos')){
            return TRUE;
        }else{
            return FALSE;
        }
    }


    function desativar_produto($id){

        $this->db->select('produtos.*');
        $this->db->from('produtos');
        $this->db->where('id', $id);

        $dados = array();

       if($this->db->get()->row()->ativo == 0){

            $dados['ativo'] = 1;

       }else{

        $dados['ativo'] = 0;

       }
      $this->db->where('id', $id);
      if($this->db->update('produtos', $dados)){
        return true;
      }else{
        return false;
      }


    }

    function destaque_produto($id){

        $this->db->select('produtos.*');
        $this->db->from('produtos');
        $this->db->where('id', $id);

        $dados = array();

       if($this->db->get()->row()->destaque == 0){

            $dados['destaque'] = 1;

       }else{

        $dados['destaque'] = 0;

       }
      $this->db->where('id', $id);
      if($this->db->update('produtos', $dados)){
        return true;
      }else{
        return false;
      }


    }
}
