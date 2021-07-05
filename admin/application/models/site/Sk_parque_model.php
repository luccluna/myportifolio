<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sk_parque_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar_sk_parque($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('sk_parque', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('sk_parque', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function get_sk_parque()
    {
        $this->db->select('*');
        $this->db->from('sk_parque');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return FALSE;
        }
    }

    function excluir_sk_parque($id){
        $this->db->where('id', $id);
        if($this->db->delete('sk_parque')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}