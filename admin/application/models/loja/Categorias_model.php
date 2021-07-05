<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorias_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar_categoria($dados, $id=NULL)
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

    public function get_categorias()
    {
        $this->db->select('*');
        $this->db->from('categorias');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_categoria($id=null)
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

    function excluir_categoria($id){
        $this->db->where('id', $id);
        if($this->db->delete('categorias')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}