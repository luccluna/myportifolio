<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Galerias_fotos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar_galeria($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('galerias', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('galerias', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function salvar_fotos_galeria($dados)
    {
        // var_dump($dados);
        // exit;
        if($this->db->insert_batch('fotos_galerias', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
    }

    public function excluir_imagem($imagem)
    {
        $this->db->trans_start();
            foreach ($imagem as $id) {
                $this->db->where('id', $id);
                $this->db->delete('fotos_galerias');
            }
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function get_galerias()
    {
        $this->db->select('*');
        $this->db->from('galerias');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_fotos_galeria($idgaleria)
    {
        $this->db->select('*');
        $this->db->from('fotos_galerias');
        $this->db->where('galerias_id', $idgaleria);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_galeria($id=null)
    {
        if($id){
            $this->db->select('*');
            $this->db->from('galerias');
            $this->db->where('id', $id);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->row();
            }else{
                return FALSE;
            }
        }
    }

    function excluir_galeria($id){
        $this->db->where('galerias_id', $id);
        if($this->db->delete('fotos_galerias')){
            $this->db->where('id', $id);
            if($this->db->delete('galerias')){
                return TRUE;
            }else{
                return FALSE;
            }
        }else{
            return FALSE;
        }
    }
}