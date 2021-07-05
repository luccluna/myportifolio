<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }




    public function salvar_usuarios($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('usuarios', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('usuarios', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }


    public function get_usuarioss(){

        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->order_by('id', 'DESC');
        if($query = $this->db->get()){
            return $query->result();

        }else{
            return false;
        }
    }


    public function get_usuarios($id){

        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('id', $id);
        if($query = $this->db->get()){
            return $query->row();
        }else{
            return false;
        }
    }

    public function delete_usuarios($id){
        $this->db->where('id', $id);
        if ($this->db->delete('usuarios')) {
          return true;
      }else{
          return false;
      }

  }


  public function salvar_conteudo($dados, $id=NULL)
  {
    if($id){
        $this->db->where('id', $id);
        if($this->db->update('usuarios', $dados))
        {
            return true;
        }
        else{
            return false;
        }
    }else{
        if($this->db->insert('usuarios', $dados))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

public function get_conteudo()
{
    $this->db->select('*');
    $this->db->from('usuarios');
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return $query->row();
    }else{
        return FALSE;
    }
}




}
