<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Areas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }




      public function salvar_area($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('areas', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('areas', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }


    public function get_area(){

        $this->db->select('areas.*');
        $this->db->from('areas');
        if($query = $this->db->get()){

            return $query->row();

        }else{
            return false;
        }



    }






}
