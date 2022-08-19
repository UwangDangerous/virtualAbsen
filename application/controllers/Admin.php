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
        if($this->session->userdata('pppomn') != null && $this->session->userdata('pppomn') == 1) {
            $data['judul'] = "Halaman Admin ".WEB ;
            $data['admin'] = $this->Admin_model->getDataAdmin()->result_array() ;
    
            $this->load->view('temp/header', $data) ;
            $this->load->view('temp/navbar') ;
            $this->load->view('admin/index') ;
            $this->load->view('temp/footer') ;
        }else{
            $this->session->set_flashdata('pesan' , 'tidak ada akses, silahkan login');
            redirect(MYURL."login") ;
        }
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

    public function ubah($id)
    {
        $data['judul'] = "Ubah Dat Admin ".WEB ;
        $data['data'] = $this->Admin_model->getDataAdmin($id)->row_array() ;
        
        $this->form_validation->set_rules('nama_admin', 'Nama Admin / Balai / Unit ', 'required');
        $this->form_validation->set_rules('nama_lain', 'Nama Lain', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('temp/header', $data) ;
            $this->load->view('temp/navbar') ;
            $this->load->view('admin/ubah') ;
            $this->load->view('temp/footer') ;
        }else{
            $this->Admin_model->editDataAdmin($id) ;
        }
    }

    public function hapus($id)
    {
        $this->Admin_model->deleteDataAdmin($id) ;
    }
}