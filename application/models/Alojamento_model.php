<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alojamento_model extends CI_Model {

   public function __construct() {
        parent::__construct();
    }

    public function get_num_alojamentos($busca=NULL)
    {
        $this->db->from('alojamentos');
        if($busca){
            $this->db->like('titulo', $busca);
            $this->db->or_like('texto', $busca);
        }
        return $this->db->count_all_results();
    }

    public function get_alojamentos($pagina, $itens_pagina, $busca=NULL)
    {
        $this->db->select('*')
                ->from('alojamentos')
                ->order_by('id', 'DESC')
                ->limit($itens_pagina, $itens_pagina * $pagina);
        if($busca){
            $this->db->like('titulo', $busca);
            $this->db->or_like('texto', $busca);
        }
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }



    public function get_ultimas_alojamentos()
    {
        $this->db->select('*')
                ->from('alojamentos')
                ->order_by('id', 'DESC')
                ->limit(3);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }


    public function get_alojamento($nome_url)
    {
        $this->db->select('*')
                ->from('alojamentos')
                ->where('id', $nome_url);
        $query = $this->db->get();
        if($query->num_rows() == 1){
            return $query->row();
        }else{
            return FALSE;
        }
    }
    public function get_ultimos_alojamento($id)
    {
        $this->db->select('*')
                ->from('alojamentos');
                $this->db->limit(3);
        $this->db->where('id !=', $id);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_home()
    {
        $this->db->select('*')
                ->from('home');
        $query = $this->db->get();
        if($query->num_rows() == 1){
            return $query->row();
        }else{
            return FALSE;
        }
    }

    public function salvar_agenda($data)
    {
        if($this->db->insert('agenda_alojamento', $data)){
            return $this->db->insert_id();
        }else{
            return FALSE;
        }
    }



    public function salvar_agenda_pessoas($id, $data)
    {

        foreach ($data as $key => $value) {
            $value['agenda_alojamento_id'] = $id;

            if($key == 0){
                $value['responsavel'] = 1;    
            }else{
                $value['responsavel'] = 0;    
            }

            if($this->db->insert('agenda_alojamento_pessoas', $value)){
           
             }else{
                   
            }
        }
        return true;
        

       
    }


        public function atualiza_alojamento($id, $pessoas)
    {

        $this->db->set('preenchidos', 'preenchidos+'.$pessoas, FALSE);
        $this->db->where('id', $id);
        $this->db->update('alojamentos');
        

       
    }





}
