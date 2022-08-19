<?php 

    class Home extends CI_Controller{

        public function __construct() 
        {
            parent::__construct() ;
            $this->load->library('form_validation');
            $this->load->model('Home_model');
        } 

        public function index() {
            // if($this->session->userdata('pppomn') != null) {
                $data['judul'] = WEB ;
                $data['data'] = $this->Home_model->getDataAllRapat() ;

                $this->load->view('temp/header', $data) ;
                // $this->load->view('temp/navbar') ;
                $this->load->view('home/index') ;
                $this->load->view('temp/footer') ;
            // }else{
            //     $this->session->set_flashdata('pesan' , 'tidak ada akses, silahkan login');
            //     redirect(MYURL."login") ;
            // }
        }

        public function rapat() {
            if($this->session->userdata('pppomn') != null) {
                $data['judul'] = WEB ;
                $data['data'] = $this->Home_model->getDataRapat()->result_array() ;

                $this->load->view('temp/header', $data) ;
                $this->load->view('temp/navbar') ;
                $this->load->view('home/rapat') ;
                $this->load->view('temp/footer') ;
            }else{
                $this->session->set_flashdata('pesan' , 'tidak ada akses, silahkan login');
                redirect(MYURL."login") ;
            }
        }

        public function tambah()
        {
            if($this->session->userdata('pppomn') != null) {
                $data['judul'] = "Tambah Rapat ".WEB ;

                $this->form_validation->set_rules('judul', 'Nama Rapat', 'required');
                $this->form_validation->set_rules('tempat', 'Lokasi', 'required');
                $this->form_validation->set_rules('tgl_rapat', 'Tanggal Rapat', 'required');
                $this->form_validation->set_rules('jam_rapat', 'Jam', 'required');

                if($this->form_validation->run() == FALSE) {
                    $this->load->view('temp/header', $data) ;
                    $this->load->view('temp/navbar') ;
                    $this->load->view('home/tambah') ;
                    $this->load->view('temp/footer') ;
                }else{
                    $this->Home_model->addDataRapat() ;
                }
            }else{
                $this->session->set_flashdata('pesan' , 'tidak ada akses, silahkan login');
                redirect(MYURL."login") ;
            }
        }


        

    }
?>