<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enquetes_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Gets

    
    public function get_enquetes(){

        $this->db->select("enquete.*");
        $this->db->from("enquete");

        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

      public function itens_enquetes($id){

        $this->db->select("itens_enquete.*");
        $this->db->from("itens_enquete");
        $this->db->where('enquete_id', $id);

        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

     public function get_enquetes_id($id){

        $this->db->select("enquete.*");

        $this->db->from("enquete");
        $this->db->where('id', $id);

        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return FALSE;
        }
        


    } 

 public function salvar_enquete($dados='',$id=NULL){

        if($id){
            $this->db->where('id', $id);
            if($this->db->update('enquete', $dados))
            {
                return true;

            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('enquete', $dados))
            {
                return $this->db->insert_id();
            }
            else
            {
                return false;
            }
        } 
    }


    public function salvar_itens_enquete($dados, $id){

    foreach ($dados as $key => $resp) {

        $data['texto_item'] = $resp['texto_item'];
  
        $data['enquete_id'] = $id;
        $this->db->insert('itens_enquete', $data);
        
    }


}

    public function salvar_editar_itens_enquete($dados, $id){


    foreach ($dados as $key => $resp) {

        $data['texto_item'] = $resp['texto_item'];
        
        $id_item = $resp['id'];

        if($id_item>0){


            $this->db->where('id',  $id_item);
            $this->db->update('itens_enquete', $data);

        }else{
        
         $data['enquete_id'] = $id;
         $this->db->insert('itens_enquete', $data);   

        }
        
    }
 
    }

public function mudar_status_ativar($id){


    $data = array(
               'status' => 1,

            );

$this->db->where('id', $id);
if($this->db->update('enquete', $data)) {

    return true;
}else{

     return false;

}

}

public function mudar_status_desativar($id){

       $data = array(
               'status' => 0,

            );

$this->db->where('id', $id);
if($this->db->update('enquete', $data)) {

    return true;
}else{

     return false;

}

}


public function verificar_status(){

        $this->db->select("enquete.*");
        $this->db->from("enquete");
        $this->db->where("status", 1);

        $query = $this->db->get();
        if($query->num_rows() > 0){
            return FALSE;
        }else{
            return TRUE;
        }

}


  public function get_titulo_enquete($id){

        $this->db->select('enquete.*');
        $this->db->from('enquete');
        $this->db->where('id', $id);
        if($query = $this->db->get()){
            return $query->row();
        }else{
            return false;
        }
    }


        public function get_itens_enquete($id){

        $this->db->select('itens_enquete.*');
        $this->db->from('itens_enquete');
        $this->db->where('itens_enquete.enquete_id', $id);
        if($query = $this->db->get()){
            return $query->result();
        }else{
            return false;
        }
    }


        public function get_parciais_enquete($id){

        $this->db->select('itens_enquete.id');
        $this->db->from('itens_enquete');
        $this->db->where('enquete_id', $id);

        if($query = $this->db->get()){

            $data = $query->result();
            foreach ($data as $key => $enquete) {
                $this->db->from('itens_enquete_respostas');
                $this->db->where('itens_enquete_respostas.itens_enquete_id', $enquete->id);

                  $data[$key]->total = $this->db->count_all_results();

            }

            return $data;
        }else{
            return false;
        }

    }


       public function get_total_votacoes($id){

        $this->db->select('itens_enquete_respostas.*');
        $this->db->from('itens_enquete_respostas');
        $this->db->join('itens_enquete', 'itens_enquete.id = itens_enquete_respostas.itens_enquete_id');
        $this->db->where('itens_enquete.enquete_id', $id);

        if($query = $this->db->get()){

            return $query->num_rows();
        }else{
            return false;
        }   
    }



}