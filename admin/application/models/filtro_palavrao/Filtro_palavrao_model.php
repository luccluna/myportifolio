<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filtro_palavrao_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Gets

    public function get_palavras_feias(){
        $this->db->select('lista_palavroes.*');
        $this->db->from('lista_palavroes');
        
        
        if($query = $this->db->get()){
            return $query->result();
        }else{

            return false;
        }

    }

    public function excluir_palavra($id){

        $this->db->where('id', $id);
        if($this->db->delete('lista_palavroes')){
            return true;
        }else{
            return false;
        }

    }

    public function salvar_palavra($dados, $id=null){

            if($id){
            $this->db->where('id', $id);
            if($this->db->update('lista_palavroes', $dados))
            {
                return true;

            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('lista_palavroes', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        } 

    }
    
    public function get_palavra($id){

        $this->db->select("lista_palavroes.*");
        $this->db->from("lista_palavroes");
        $this->db->where("id", $id);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return FALSE;
        }

    }



}