<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sk_centro_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar_sk_centro($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('sk_centro', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('sk_centro', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function get_sk_centro()
    {
        $this->db->select('*');
        $this->db->from('sk_centro');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return FALSE;
        }
    }

    function excluir_sk_centro($id){
        $this->db->where('id', $id);
        if($this->db->delete('sk_centro')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}