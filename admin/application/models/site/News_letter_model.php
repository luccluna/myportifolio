<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_letter_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_news_letter()
    {
        $this->db->select('*');
        $this->db->from('newsletter');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }


     public function get_envio_ultimo()
    {
        $this->db->select('*');
        $this->db->from('envios');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return FALSE;
        }
    }

    function excluir_banner($id){
        $this->db->where('id', $id);
        if($this->db->delete('newsletter')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}