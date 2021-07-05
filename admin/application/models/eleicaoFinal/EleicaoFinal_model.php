<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EleicaoFinal_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar_eleicao($dados='',$id=NULL){
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('eleicao', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('eleicao', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        } 
    }



    public function excluir_eleicao($id=''){
        $this->db->where('id', $id);
        if($this->db->delete('eleicao')){
            return TRUE;
        }else{
            return FALSE;
        }

    }


    public function excluir_candidatos_eleicao($id=''){

        $this->db->where('candidatos_oficiais.eleicao_id', $id);
        if($this->db->delete('candidatos_oficiais')){
            return TRUE;
        }else{
            return FALSE;
        }

    }






    // Gets

     public function get_eleicao($id=''){

        $this->db->select('eleicao.*');
        $this->db->select('paises.descricao as pais_nome');
        $this->db->select('estados.descricao as estado_nome');
        $this->db->select('cidades.descricao as cidade_nome');
        $this->db->from('eleicao');
        $this->db->join('paises','paises.id = eleicao.paises_id',"left");
        $this->db->join('estados','estados.id = eleicao.estados_id',"left");
        $this->db->join('cidades','cidades.id = eleicao.cidades_id',"left");
        $this->db->where('eleicao.id',$id);

       /* 
        $query = $this->db->get()->row();
        echo "<pre>";
        print_r($query);
        echo "</pre>";
        exit();
        */

        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return FALSE;
        }

    }

    public function get_eleicoes(){

        $this->db->select('eleicao.*');
        $this->db->select('paises.descricao as pais_nome');
        $this->db->select('estados.descricao as estado_nome');
        $this->db->select('cidades.descricao as cidade_nome');
        $this->db->from('eleicao');
        $this->db->join('paises','paises.id = eleicao.paises_id', 'left');
        $this->db->join('estados','estados.id = eleicao.estados_id','left');
        $this->db->join('cidades','cidades.id = eleicao.cidades_id','left');

        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }

    }
    public function get_paises()
    {
        $this->db->select('paises.*');
        $this->db->from('paises');       
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_estados($pais_id="")
    {
        //retorna todos os estados com base em um país
        $this->db->select('estados.*');
        $this->db->from('estados');       
        $this->db->where('paises_id', $pais_id);       
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_cidades($estado_id="")
    {
        $this->db->select('cidades.*');
        $this->db->from('cidades');       
        $this->db->where('estados_id',$estado_id);       
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }


    public function get_candidatos_eleicao($eleicao=''){
        $this->db->select('candidatos_oficiais.*');        
        $this->db->from('candidatos_oficiais');        
        $this->db->where('candidatos_oficiais.eleicao_id', $eleicao);
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }        

    }

    public function excluir_votos_eleicao($eleicao=''){
        $this->db->select('candidatos_oficiais.*');        
        $this->db->from('candidatos_oficiais');        
        $this->db->where('candidatos_oficiais.eleicao_id', $eleicao);
        $query = $this->db->get();
        //tem candidato
        if($query->num_rows() > 0){
            $candidatos = $query->result(); 
                //excluir todos os votos para todos os candidatos     
                foreach ($candidatos as $key => $val) {
                    $this->db->where('candidatos_oficiais_votos.candidatos_oficiais_id', $val->id);
                    $this->db->delete('candidatos_oficiais_votos');                                
                }
                return true;
        }else{
            //não tem candidato não tem votos para excluir
            return true;
        }

        

        

    }














}