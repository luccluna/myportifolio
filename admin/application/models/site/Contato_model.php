<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contato_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar_contato($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('contato', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('contato', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function get_contato()
    {
        $this->db->select('*');
        $this->db->from('contato');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return FALSE;
        }
    }

    function excluir_contato($id){
        $this->db->where('id', $id);
        if($this->db->delete('contato')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}
