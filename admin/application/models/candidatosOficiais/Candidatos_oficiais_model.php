<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Candidatos_oficiais_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //pegar candidatos
    public function get_candidatos(){
        //pega candidatos e os joins possiveis
        $this->db->select('candidatos_oficiais.*');        
        $this->db->select('partidos.descricao as nome_partido');        
        $this->db->select('perfis.nome as nome_perfil');       
        $this->db->from('candidatos_oficiais'); 
        $this->db->join('partidos','partidos.id = candidatos_oficiais.partidos_id '); 
        $this->db->join('perfis','perfis.id = candidatos_oficiais.perfis_id '); 

        $query = $this->db->get();

        if($query->num_rows() > 0){
            $dados = $query->result();
           
                foreach ($dados as $key => $val){
                    //pega informacao sobre a eleicao que o candidato participa
                    $this->db->select('eleicao.periodo as nome_periodo, eleicao.tipo as valor_tipo_eleicao ');
                    $this->db->select('paises.descricao as nome_pais');
                    $this->db->select('estados.descricao as nome_estado');
                    $this->db->select('cidades.descricao as nome_cidade'); 
                    $this->db->from('eleicao');            
                    $this->db->join('paises','paises.id = eleicao.paises_id',"left");
                    $this->db->join('estados','estados.id = eleicao.estados_id',"left");
                    $this->db->join('cidades','cidades.id = eleicao.cidades_id',"left");
                    $this->db->where('eleicao.id', $val->eleicao_id);

                    $data = $this->db->get();
                    $val->dados_eleicao = $data->row();                
                }

            
            return $dados;
        }else{
            return FALSE;
        }

    }




    //pegar candidato
    public function get_candidato($id=''){
        //pega candidatos e os joins possiveis
        $this->db->select('candidatos_oficiais.*');        
        $this->db->select('partidos.descricao as nome_partido');        
        $this->db->select('perfis.nome as nome_perfil');       
        $this->db->from('candidatos_oficiais'); 
        $this->db->join('partidos','partidos.id = candidatos_oficiais.partidos_id '); 
        $this->db->join('perfis','perfis.id = candidatos_oficiais.perfis_id '); 
        $this->db->where('candidatos_oficiais.id', $id); 

        $query = $this->db->get();

        if($query->num_rows() > 0){
            $dados = $query->row();  

            //pega informacao sobre a eleicao que o candidato participa
            $this->db->select('eleicao.periodo as nome_periodo, eleicao.tipo as valor_tipo_eleicao ');
            $this->db->select('paises.descricao as nome_pais');
            $this->db->select('estados.descricao as nome_estado');
            $this->db->select('cidades.descricao as nome_cidade'); 
            $this->db->from('eleicao');            
            $this->db->join('paises','paises.id = eleicao.paises_id',"left");
            $this->db->join('estados','estados.id = eleicao.estados_id',"left");
            $this->db->join('cidades','cidades.id = eleicao.cidades_id',"left");
            $this->db->where('eleicao.id', $dados->eleicao_id);

            $data = $this->db->get();
            $dados->dados_eleicao = $data->row();                
       
            
            
            return $dados;
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
        $this->db->join('paises','paises.id = eleicao.paises_id',"left");
        $this->db->join('estados','estados.id = eleicao.estados_id',"left");
        $this->db->join('cidades','cidades.id = eleicao.cidades_id',"left");

        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }

    }

    public function get_partidos(){
        $this->db->select('partidos.*');        
        $this->db->from('partidos');        
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }

    }


     public function get_perfis_politico(){
        $this->db->select('perfis.*');        
        $this->db->from('perfis');        
        $this->db->where('tipo',2);        
        $query = $this->db->get();

        if($query->num_rows() > 0){
           // var_dump($query->result());exit();
            return $query->result();
        }else{
            return FALSE;
        }

    }    

    public function salvar_candidato($dados='',$id=NULL){
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('candidatos_oficiais', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('candidatos_oficiais', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        } 
    }


    public function excluir_candidato_oficial($id=''){
        $this->db->where('id', $id);
        if($this->db->delete('candidatos_oficiais')){
            return TRUE;
        }else{
            return FALSE;
        }

    }

    public function excluir_votos_candidato($dados=''){
         
        $this->db->where('candidatos_oficiais_votos.candidatos_oficiais_id', $dados->id);
        if($this->db->delete('candidatos_oficiais_votos')){
            return TRUE;
        }else{
            return FALSE;
        }

    }






}