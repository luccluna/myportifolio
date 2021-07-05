<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contrato_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar_contrato($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('contratos', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('contratos', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function get_contrato()
    {
        $this->db->select('*');
        $this->db->from('contratos');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return FALSE;
        }
    }

    function excluir_contrato($id){
        $this->db->where('id', $id);
        if($this->db->delete('contratos')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}