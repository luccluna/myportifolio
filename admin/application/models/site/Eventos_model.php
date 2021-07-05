<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eventos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar_evento($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('alojamentos', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('alojamentos', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function get_eventos()
    {
        $this->db->select('*');
        $this->db->from('alojamentos');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_event($id=null)
    {
        if($id){
            $this->db->select('*');
            $this->db->from('alojamentos');
            $this->db->where('id', $id);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->row();
            }else{
                return FALSE;
            }
        }
    }

    public function salvar_galeria($fotos){

        foreach ($fotos as $key => $value) {
            
            $this->db->insert('galeria_alojamentos', $value);
        }
        return true;
    
    }

    function excluir_imagem_galeria($id){
        $this->db->where('id', $id);
        if($this->db->delete('galeria_alojamentos')){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function get_galeria_imagem($id=null)
    {
        if($id){
            $this->db->select('*');
            $this->db->from('galeria_alojamentos');
            $this->db->where('id', $id);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->row();
            }else{
                return FALSE;
            }
        }
    }

    public function get_galeria_noticia($id=null)
    {
        if($id){
            $this->db->select('*');
            $this->db->from('galeria_alojamentos');
            $this->db->where('alojamento_id', $id);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result();
            }else{
                return FALSE;
            }
        }
    }

    public function get_agendamentos()
    {
        $this->db->select('agenda_alojamento.*');
        $this->db->select('alojamentos.titulo, alojamentos.id As id_alojamento');
        $this->db->from('agenda_alojamento');
        $this->db->join('alojamentos', 'alojamentos.id=agenda_alojamento.alojamentos_id');
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

    public function get_evento($id=null)
    {
        if($id){
            $this->db->select('*');
            $this->db->from('alojamentos');
            $this->db->where('id', $id);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->row();
            }else{
                return FALSE;
            }
        }
    }

    function excluir_evento($id){
        $this->db->where('id', $id);
        if($this->db->delete('alojamentos')){
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
        $this->db->update('alojamentos');
        

       
    }


}