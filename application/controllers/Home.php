<?php 

    class Home extends CI_Controller{

        public function __construct() 
        {
            parent::__construct() ;
            $this->load->library('form_validation');
            $this->load->model('Home_model');
        } 

        public function index() {
            if($this->session->userdata('pppomn') != null) {
                $data['judul'] = WEB ;
                $data['data'] = $this->Home_model->getDataRapat()->result_array() ;

                $this->load->view('temp/header', $data) ;
                $this->load->view('temp/navbar') ;
                $this->load->view('home/index') ;
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
                $this->load->view('home/tambah') ;
                $this->load->view('temp/footer') ;
            }else{
                $this->Admin_model->addDataAdmin() ;
            }
        }


        

    }
?>