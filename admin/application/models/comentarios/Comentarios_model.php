<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comentarios_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }




      public function salvar_comentario($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('comentarios', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('comentarios', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }


    public function get_comentarios(){

        $this->db->select('comentarios.*');
        $this->db->select('produtos.titulo');
        $this->db->select('clientes.nome');
        $this->db->from('comentarios');
        $this->db->join('produtos', 'comentarios.produtos_id=produtos.id');
        $this->db->join('clientes', 'comentarios.clientes_id=clientes.id');
        if($query = $this->db->get()){

            return $query->result();

        }else{
            return false;
        }
    }


    public function get_comentario($id){

        $this->db->select('comentarios.*');
        $this->db->from('comentarios');
        $this->db->where('id', $id);
        if($query = $this->db->get()){
            return $query->row();
        }else{
            return false;
        }
    }

    public function delete_comentario($id){
        $this->db->where('id', $id);
        if ($this->db->delete('comentarios')) {
          return true;
        }else{
          return false;
        }

    }

    function desativar_comentario($id){

        $this->db->select('comentarios.*');
        $this->db->from('comentarios');
        $this->db->where('id', $id);

        $dados = array();

       if($this->db->get()->row()->ativo == 0){

            $dados['ativo'] = 1;

       }else{

        $dados['ativo'] = 0;

       }
      $this->db->where('id', $id);
      if($this->db->update('comentarios', $dados)){
        return true;
      }else{
        return false;
      }


    }




}
