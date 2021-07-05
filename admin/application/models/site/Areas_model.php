<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Areas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar_area($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('areas', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('areas', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function get_areas()
    {
        $this->db->select('*');
        $this->db->from('areas');
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
        $this->db->select('areas.titulo, areas.id As id_alojamento');
        $this->db->from('agenda_alojamento');
        $this->db->join('areas', 'areas.id=agenda_alojamento.areas_id');
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

    public function get_area($id=null)
    {
        if($id){
            $this->db->select('*');
            $this->db->from('areas');
            $this->db->where('id', $id);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->row();
            }else{
                return FALSE;
            }
        }
    }

    function excluir_area($id){
        $this->db->where('id', $id);
        if($this->db->delete('areas')){
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
        $this->db->update('areas');



    }


}
