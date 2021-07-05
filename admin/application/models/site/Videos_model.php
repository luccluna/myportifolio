<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Videos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar_video($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('videos', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('videos', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function get_videos()
    {
        $this->db->select('*');
        $this->db->from('videos');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_video($id=null)
    {
        if($id){
            $this->db->select('*');
            $this->db->from('videos');
            $this->db->where('id', $id);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->row();
            }else{
                return FALSE;
            }
        }
    }

    function excluir_video($id){
        $this->db->where('id', $id);
        if($this->db->delete('videos')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}