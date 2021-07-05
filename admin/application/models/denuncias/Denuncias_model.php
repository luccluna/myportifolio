<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Denuncias_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Gets

    
    public function get_tipos_denuncias(){

        $this->db->select("tipos_denuncia.*");
        $this->db->from("tipos_denuncia");

        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }


    }
    public function get_denuncias(){

        $this->db->select("denuncia_perfil.*");
        $this->db->from("denuncia_perfil");
        $this->db->select("perfis.nome As denunciado, perfis.id As id_denunciado");
        $this->db->join("perfis", "perfis.id=perfis_id_denunciado");
        $this->db->select("tipos_denuncia.nome_tipo_denuncia");
        $this->db->join("tipos_denuncia", "tipos_denuncia.id=tipos_denuncia_id");
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }


    }
    public function excluir_tipo_denuncia($id){

        $this->db->where('id', $id);
        if($this->db->delete('tipos_denuncia')){
            return true;
        }else{
            return false;
        }

    }

    public function salvar_tipo_denuncia($dados, $id=null){

            if($id){
            $this->db->where('id', $id);
            if($this->db->update('tipos_denuncia', $dados))
            {
                return true;

            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('tipos_denuncia', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        } 

    }
    
    public function get_tipo($id){

         $this->db->select("tipos_denuncia.*");
        $this->db->from("tipos_denuncia");
        $this->db->where("id", $id);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return FALSE;
        }

    }



}