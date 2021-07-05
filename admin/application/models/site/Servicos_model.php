<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar_servico($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('servicos', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('servicos', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function get_servicos()
    {
        $this->db->select('*');
        $this->db->from('servicos');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_agendamentos()
    {
        $this->db->select('agenda_alojamento.*');
        $this->db->select('servicos.titulo, servicos.id As id_alojamento');
        $this->db->from('agenda_alojamento');
        $this->db->join('servicos', 'servicos.id=agenda_alojamento.servicos_id');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_pessoas($id)
    {
        $this->db->select('agenda_alojamento_pessoas.*');
        $this->db->from('agenda_alojamento_pessoas');
        $this->db->where('agenda_alojamento_id', $id);


        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_servico($id=null)
    {
        if($id){
            $this->db->select('*');
            $this->db->from('servicos');
            $this->db->where('id', $id);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->row();
            }else{
                return FALSE;
            }
        }
    }

    function excluir_servico($id){
        $this->db->where('id', $id);
        if($this->db->delete('servicos')){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function excluir_pessoa($id){

         $this->db->where('id', $id);


        if($this->db->delete('agenda_alojamento_pessoas')){
            return TRUE;
        }else{
            return FALSE;
        }

    }


    public function atualiza_alojamento($id)
    {

        $this->db->set('preenchidos', 'preenchidos-1', FALSE);
        $this->db->where('id', $id);
        $this->db->update('servicos');



    }


}
