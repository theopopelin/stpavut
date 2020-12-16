<?php
class Catalogue extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
    }

    public function index(){

        require_once(base_url().'../../assets/tcpdf/tcpdf.php');
        $pdf=new TCPDF();
        $pdf->addPage();
        $monTexte='<h1>Bonjour Bienvenue à st pavut</h1>';
        $pdf->writeHTML($monTexte);
        $pdf->Output('stpavut.pdf');


    }

}
