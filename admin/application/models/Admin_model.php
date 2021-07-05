<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function validar_login($cpf='', $senha='')
    {
        $this->db->select('id, email, cpf, nome');
        $this->db->from('usuarios');
        $this->db->where('cpf', $cpf);
        $this->db->where('senha', $senha);
        $this->db->where('status', 1);
        $query = $this->db->get();

        if($query->num_rows() == 1){
            return $query->row();
        }else{
            return FALSE;
        }
    }
}