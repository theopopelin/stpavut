<?php
class Gestion extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->library('Grocery_CRUD');
    }

    public function index(){


        if (!empty($this->session->ident)&& ($this->session->ident == 'admin'))  {

            $this->load->view('Header_view');
            $this->load->view('Gestion_view');
            $this->load->view('Footer_view');

        } else {

            redirect('Login');
        }
    }

    public function salles()
{
    $crud = new Grocery_CRUD();
    $crud->set_theme('datatables');
    $crud->set_table('salles');
    $output = $crud->render();
    $this->load->view('Header_view');
    $this->load->view('Gestion_view');
    $this->load->view('GestionAffiche_view', (array) $output);
    $this->load->view('Footer_view_nojs');
}
    public function manifestations()
    {
        $crud = new Grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('manifestations');
        $output = $crud->render();
        $this->load->view('Header_view');
        $this->load->view('Gestion_view');
        $this->load->view('GestionAffiche_view', (array) $output);
        $this->load->view('Footer_view_nojs');
    }
    public function abonnes()
    {
        $crud = new Grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('abonnes');
        $output = $crud->render();
        $this->load->view('Header_view');
        $this->load->view('Gestion_view');
        $this->load->view('GestionAffiche_view', (array) $output);
        $this->load->view('Footer_view_nojs');
    }
}
