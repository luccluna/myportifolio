<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class L3_c2_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar_l3_c2($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('home_colunas', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('home_colunas', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function get_l3_c2()
    {
        $this->db->select('*');
        $this->db->from('home_colunas');
        $this->db->where('posicao_coluna', 'l3-c2');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return FALSE;
        }
    }

    function excluir_l3_c2($id){
        $this->db->where('id', $id);
        if($this->db->delete('home_colunas')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}