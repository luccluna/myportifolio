<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promocoes_slides_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar_promocao($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('promocoes_slides', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('promocoes_slides', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function get_promocoes_slides()
    {
        $this->db->select('*');
        $this->db->from('promocoes_slides');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_promocao($id=null)
    {
        if($id){
            $this->db->select('*');
            $this->db->from('promocoes_slides');
            $this->db->where('id', $id);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->row();
            }else{
                return FALSE;
            }
        }
    }

    function excluir_promocao($id){
        $this->db->where('id', $id);
        if($this->db->delete('promocoes_slides')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}
