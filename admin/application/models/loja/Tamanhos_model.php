<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tamanhos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar_tamanho($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('produto_tamanhos', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('produto_tamanhos', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function salvar_novo_tamanho($dados)
    {
       
            if($this->db->insert('tamanhos', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        
    }




    public function get_tamanhos($id)
    {
        $this->db->select('produto_tamanhos.*');
        $this->db->from('produto_tamanhos');
        $this->db->select('tamanhos.tamanho As nome_tamanho');
        $this->db->join('tamanhos', 'produto_tamanhos.tamanhos_id = tamanhos.id');
        $this->db->where('produtos_id', $id);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }


    public function get_produto($id)
    {
        $this->db->select('produtos.titulo');
        $this->db->from('produtos');

        $this->db->where('id', $id);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return FALSE;
        }
    }

    public function get_all_tamanhos()
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

    public function get_tamanho($id=null)
    {
        if($id){
            $this->db->select('produto_tamanhos.*');

            $this->db->from('produto_tamanhos');
            $this->db->where('id', $id);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->row();
            }else{
                return FALSE;
            }
        }
    }

    function excluir_tamanho($id){
        $this->db->where('id', $id);
        if($this->db->delete('produto_tamanhos')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}