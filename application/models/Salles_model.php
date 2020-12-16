<?php
class Salles_model extends CI_model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function recupToutes() {
        $query=$this->db->get('salles');
        return $query->result();
    }
}
