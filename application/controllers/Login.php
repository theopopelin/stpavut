<?php

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index() {

        $this->session->ident='';
        $this->load->view('Header_view');
        $this->load->view('Login_view');
        $this->load->view('Footer_view');
    }

    public function verif() {

        if (($this->input->post('ident')=='admin') &&
           ($this->input->post('mdp')=='toto')) {
            $this->session->ident='admin';
            $this->load->view('Header_view');
            $this->load->view('Gestion_view');
            $this->load->view('Footer_view');
        } else {

            $this->load->view('Header_view');
            $this->load->view('CaMarchePas_view');
            $this->load->view('Footer_view');
        }
    }
}