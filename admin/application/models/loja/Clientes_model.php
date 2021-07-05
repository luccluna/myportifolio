

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar_cliente($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('clientes', $dados))
            {
                return $id;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('clientes', $dados))
            {
                return $this->db->insert_id();
            }
            else
            {
                return false;
            }
        }
    }

    public function get_clientes()
    {
        $this->db->select('clientes.*');
        $this->db->from('clientes');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_enderecos($idcliente)
    {
        $this->db->select('enderecos.*');
        $this->db->from('enderecos');
        $this->db->where('clientes_id', $idcliente);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_cliente($id=null)
    {
        if($id){
            $this->db->select('clientes.*');
            $this->db->from('clientes');
            $this->db->where('clientes.id', $id);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                $data = $query->row();
                $this->db->select('galeria_clientes.*');
                $this->db->from('galeria_clientes');
                $this->db->where('galeria_clientes.clientes_id', $id);
                $query_galeria = $this->db->get();
                if($query_galeria->num_rows() > 0){
                    $data->galeria = $query_galeria->result();
                }
                return $data;
            }else{
                return FALSE;
            }
        }
    }

    public function get_galeria_cliente($id_cliente='')
    {
        $this->db->select('galeria_clientes.*');
        $this->db->from('galeria_clientes');
        $this->db->where('galeria_clientes.clientes_id', $id_cliente);
        $query_galeria = $this->db->get();
        if($query_galeria->num_rows() > 0){
            return $query_galeria->result();
        }else{
            return FALSE;
        }
    }

    public function excluir_imagem($imagem)
    {
        $this->db->trans_start();
        foreach ($imagem as $id) {
            $this->db->where('id', $id);
            $this->db->delete('galeria_clientes');
        }
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function excluir_galeria($id_cliente='')
    {
        $this->db->where('clientes_id', $id_cliente);
        if($this->db->delete('galeria_clientes')){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function excluir_cliente($id){
        $this->db->where('id', $id);
        if($this->db->delete('clientes')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}