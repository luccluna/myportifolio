<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Depoimentos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }




      public function salvar_depoimento($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('depoimentos', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('depoimentos', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }


    public function get_depoimento(){

        $this->db->select('depoimentos.*');
        $this->db->from('depoimentos');
        if($query = $this->db->get()){

            return $query->row();

        }else{
            return false;
        }



    }






}
