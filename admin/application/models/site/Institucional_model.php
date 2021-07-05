<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Institucional_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar_institucional($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('projeto_meritus', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('projeto_meritus', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }


    public function salvar_certificacao($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('certificacao', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('certificacao', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function salvar_servicos($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('servicos_publicos', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('servicos_publicos', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }


        public function salvar_termos($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('termos_de_uso', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('termos_de_uso', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function get_institucional()
    {
        $this->db->select('*');
        $this->db->from('institucional');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return FALSE;
        }
    }

    function excluir_institucional($id){
        $this->db->where('id', $id);
        if($this->db->delete('institucional')){
            return TRUE;
        }else{
            return FALSE;
        }
    }


    public function o_projeto(){

        $this->db->select('projeto_meritus.*');
        $this->db->from('projeto_meritus');

        if($query = $this->db->get()){

            return $query->row();
        }else{

            return false;
        }
    }


    public function certificacao(){

        $this->db->select('certificacao.*');
        $this->db->from('certificacao');

        if($query = $this->db->get()){

            return $query->row();
        }else{

            return false;
        }
    }

      public function ead(){

        $this->db->select('ead.*');
        $this->db->from('ead');

        if($query = $this->db->get()){

            return $query->row();
        }else{

            return false;
        }
    }
    public function salvar_editar_ead($descricao, $id){

             $this->db->where('id', $id);
            if($this->db->update('ead', $descricao)){
                return true;
            }else{
                return false;
            }



    }
    public function servicos_publicos(){

        $this->db->select('servicos_publicos.*');
        $this->db->from('servicos_publicos');

        if($query = $this->db->get()){

            return $query->result();
        }else{

            return false;
        }
    }


    public function servicos_publicos_by_id($id=''){

        $this->db->select('servicos_publicos.*');
        $this->db->from('servicos_publicos');

        if($query = $this->db->get()){

            return $query->row();
        }else{

            return false;
        }
    }

    public function termos_de_uso(){

        $this->db->select('termos_de_uso.*');
        $this->db->from('termos_de_uso');

        if($query = $this->db->get()){

            return $query->row();
        }else{

            return false;
        }
    }



   public function confere_nome_url_utilidade($nome_url=''){

        $this->db->select('*');
        $this->db->from('servicos_publicos');
        $this->db->where('nome_url', $nome_url);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }

    }

   public function salvar_utilidade($dados, $id=NULL)
    {
        if($id){
            $this->db->where('id', $id);
            if($this->db->update('servicos_publicos', $dados))
            {
                return true;
            }
            else{
                return false;
            }
        }else{
            if($this->db->insert('servicos_publicos', $dados))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }



    public function excluir_utilidade($id){
        $this->db->where('id', $id);
        if($this->db->delete('servicos_publicos')){
            return TRUE;
        }else{
            return FALSE;
        }
    }


}