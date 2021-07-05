<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matriculas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar_matricula($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('matricula', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('matricula', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function get_matricula()
    {
        $this->db->select('*');
        $this->db->from('matricula');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return FALSE;
        }
    }

    function excluir_matricula($id){
        $this->db->where('id', $id);
        if($this->db->delete('matricula')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}