<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Processos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_processos()
    {
        $this->db->select('perfis_candidato_processos.*');
        $this->db->select('perfis_candidato_processos.id As id_processo');
        $this->db->select('perfis_candidato.*');
        $this->db->select('perfis.*');
        $this->db->join('perfis_candidato', 'perfis_candidato_processos.perfis_candidato_id=perfis_candidato.id');
        $this->db->join('perfis', 'perfis.id=perfis_candidato.perfis_id');
        $this->db->from('perfis_candidato_processos');

        return $this->db->get()->result();
    } 

    public function get_processo($id)
    {
        $this->db->select('perfis_candidato_processos.*');
        $this->db->from('perfis_candidato_processos');
        $this->db->where('id', $id);

        return $this->db->get()->row();
    } 


    public function get_candidatos()
    {
        $this->db->select('perfis_candidato.*');
        $this->db->select('perfis_candidato.id As id_candidato');
        $this->db->select('perfis.*');
        $this->db->select('partidos.descricao As nome_partido');
        $this->db->join('perfis', 'perfis.id=perfis_candidato.perfis_id');
        $this->db->join('partidos', 'partidos.id=perfis_candidato.partidos_id', 'left');
        $this->db->from('perfis_candidato');

        return $this->db->get()->result();
    }


    public function salvar_novo_processo($data, $id=null)
    {
        
        if($id){

                $dados['descricao_completa'] = $data['descricao_completa'];
                $dados['titulo'] = $data['titulo'];

                $this->db->where('id', $id);
                if($this->db->update('perfis_candidato_processos', $dados)){
                    return true;
                }else{
                    return false;
                }
            
        }else{

             if($this->db->insert('perfis_candidato_processos', $data)){
                     return true;
                }else{
                    return false;
                }

        }

      

    }

    public function excluir_processo($id){

        $this->db->where('id', $id);
        if($this->db->delete('perfis_candidato_processos')){
            return true;
        }else{
            return false;    
        }
        

    }


}