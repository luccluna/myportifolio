<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transparencia_model extends CI_Model {

   public function __construct() {
        parent::__construct();
    }

    public function get_transparencias($busca=NULL)
    {


        $this->db->select('*');
        $this->db->from('transparencia');

        return $this->db->get()->result();
    }







}
