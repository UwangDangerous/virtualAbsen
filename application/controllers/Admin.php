<?php 

class Admin extends CI_Controller{
    public function __construct()
    {
        parent::__construct() ;
        $this->load->model('Admin_model') ;
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['judul'] = "Halaman Admin ".WEB ;
        $data['admin'] = $this->Admin_model->getDataAdmin()->result_array() ;

        $this->load->view('temp/header', $data) ;
        $this->load->view('temp/navbar') ;
        $this->load->view('admin/index') ;
        $this->load->view('temp/footer') ;
    }

    public function tambah()
    {
        $data['judul'] = "Tambah Admin ".WEB ;

        $this->form_validation->set_rules('nama_admin', 'Nama Admin / Balai / Unit ', 'required');
        $this->form_validation->set_rules('nama_lain', 'Nama Lain', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('temp/header', $data) ;
            $this->load->view('temp/navbar') ;
            $this->load->view('admin/tambah') ;
            $this->load->view('temp/footer') ;
        }else{
            $this->Admin_model->addDataAdmin() ;
        }
    }
}