<?php
class Manifestations_model extends CI_model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function infos($m) {
        $req=$this->db->query("SELECT abo_ville,
        SUM(res_nbplaces) AS 
        totalresabo, manif_intitule FROM
         manifestations INNER JOIN
          reserver ON
           reserver._manif_id=manifestations.manif_id INNER JOIN 
            abonnes ON 
             abonnes.abo_id=reserver._abo_id
              WHERE manif_id=$m
              GROUP BY
             abo_ville");
        return $req->result();
    }

    public function recupTous() {
        $query=$this->db->get('manifestations');
        return $query->result();
    }

    public function recupParPage($page) {
        $query=$this->db->get('manifestations', 2, $page);
        return $query->result();
    }

    public function nbManifs() {

        $nb=$this->db->count_all('manifestations');
        return $nb;
    }
}