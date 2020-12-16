<?php
class Manifestations extends CI_Controller {

    public function index(){
        $this->load->model('Manifestations_model');
        $recup=$this->Manifestations_model->recupTous();
        $data['tous']=$recup;
        $this->load->view('Header_view');
        $this->load->view('Manifestations_view', $data);
        $this->load->view('Footer_view');
    }

    public function DataGraph($manif=1) {
        $this->load->model('Manifestations_model');
        $data["mesinfos"]=$this->Manifestations_model->infos($manif);
        $this->load->view('Graph_view', $data);

    }

    public function LeGraph($manif=1) {
        $data['manif']=$manif;
        $this->load->view('LeGraph_view', $data);
    }

    public function pdf() {
        $this->load->model('Manifestations_model');
        $recup=$this->Manifestations_model->recupTous();
        $data['tous']=$recup;
        $infosDocument=array('format' => 'A4', 'orientation' => 'P', 'unite' => 'mm');
        $data['infosDocument']=$infosDocument;
        $this->load->view('ManifsPdf_view', $data);
    }


    public function dataManif() {

        $this->load->model("Manifestations_model");
        $mesdatas=$this->Manifestations_model->recupTous();
        echo json_encode($mesdatas);
    }
    public function parPage($page=0) {

        $this->load->model('Manifestations_model');
        $recup=$this->Manifestations_model->recupParPage($page);

        $this->load->library('pagination');

        $config['base_url'] = base_url().'/Manifestations/ParPage/';
        $config['total_rows'] = $this->Manifestations_model->nbManifs();
        $config['per_page'] = 2;
        $config['first_link'] = 'Premier';
        $config['last_link'] = 'Dernier';

        $this->pagination->initialize($config);

        $data['page']=$recup;
        $data['pagination']=$this->pagination->create_links();

        $this->load->view('Header_view');
        $this->load->view('Manifestationsparpage_view', $data);
        $this->load->view('Footer_view');

    }
}