<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sobre_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar_sobre($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('textos', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('textos', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function get_sobre()
    {
        $this->db->select('textos.*');
        $this->db->from('textos');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return FALSE;
        }
    }

    function excluir_sobre($id){
        $this->db->where('id', $id);
        if($this->db->delete('sobre')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}
