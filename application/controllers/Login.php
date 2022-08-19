<?php

class Login extends CI_Controller{
    public function __construct() 
    {
        parent::__construct() ;
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['judul'] = WEB ;
        $this->load->view('temp/header', $data) ;
        $this->load->view('login/index') ;
        $this->load->view('temp/footer') ;
    }
}