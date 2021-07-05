<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proposta_pedagogica_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar_proposta_pedagogica($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('proposta_pedagogica', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('proposta_pedagogica', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function get_proposta_pedagogica()
    {
        $this->db->select('*');
        $this->db->from('proposta_pedagogica');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return FALSE;
        }
    }

    function excluir_proposta_pedagogica($id){
        $this->db->where('id', $id);
        if($this->db->delete('proposta_pedagogica')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}