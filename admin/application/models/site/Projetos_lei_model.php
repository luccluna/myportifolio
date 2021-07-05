<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projetos_lei_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    public function get_projetos()
    {
        $this->db->select('*');
        $this->db->from('projetos_lei');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function salvar_projeto($dados, $id=NULL)
    {
        //var_dump($dados);exit();
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('projetos_lei', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('projetos_lei', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }


    public function get_projeto($id=null)
    {
        if($id){
            $this->db->select('*');
            $this->db->from('projetos_lei');
            $this->db->where('id', $id);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->row();
            }else{
                return FALSE;
            }
        }
    }

    function excluir_projeto($id){
        $this->db->where('id', $id);
        if($this->db->delete('projetos_lei')){
            return TRUE;
        }else{
            return FALSE;
        }
    }


    function excluir_votos_projeto($id=''){

        $this->db->where('projetos_lei_id', $id);
        if($this->db->delete('projetos_lei_has_curtidas')){
            return TRUE;
        }else{
            return FALSE;
        }

    }


    function excluir_cometarios_projeto($id=''){

        $this->db->where('projetos_lei_id', $id);
        if($this->db->delete('comentarios_projetos')){
            return TRUE;
        }else{
            return FALSE;
        }

    }



      function excluir_respostas_cometarios_projeto($id_projeto=''){
        //excluir todas as resposta onde o id do comentario pertence ao projeto 
        //todos os comentarios do projeto
        $data = array();
        $this->db->select('comentarios_projetos.*');       
        $this->db->from('comentarios_projetos');       
        $this->db->where('comentarios_projetos.projetos_lei_id', $id_projeto);

        $comentarios_projetos = $this->db->get();
        $data = $comentarios_projetos->result(); 

  


        //delete respostas dos comentarios selecionados 

        foreach ($data as $key => $val) {

            $this->db->where('repostas_comentarios_projetos.comentarios_projetos_id', $val->id);
            if($this->db->delete('repostas_comentarios_projetos')){

            }else{
                return false;
            }
        
            
        }


        return true;  

      
     


    }


    function confere_nome_url($nome_url=''){
        $this->db->select('*');
        $this->db->from('projetos_lei');
        $this->db->where('nome_url', $nome_url);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }

    }
















}