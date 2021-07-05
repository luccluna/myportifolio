<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anuncios_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

   


      public function salvar_anuncio($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('anuncios', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('anuncios', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }


    public function get_anuncio(){

        $this->db->select('anuncios.*');
        $this->db->from('anuncios');
        if($query = $this->db->get()){

            return $query->row();

        }else{
            return false;
        }



    }
    





}