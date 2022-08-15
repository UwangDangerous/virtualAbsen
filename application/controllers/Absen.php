<?php 

    class Absen extends CI_Controller{
        public function __construct() 
        {
            parent::__construct() ;
            $this->load->library('form_validation');
            $this->load->model('Absen_model') ;
        } 

        public function index() {
            $data['judul'] = "Absen Virtual" ;
            $data['absen'] = $this->Absen_model->getDataAbsen()->result_array() ;
            
            $this->load->view('temp/header', $data) ;
            $this->load->view('absen/index') ;
            $this->load->view('temp/footer') ;
        }

        public function tambah() {
            $data['judul'] = "Tambah Absen Virtual" ;
            
            $this->form_validation->set_rules('judul', 'Judul', 'required');
            $this->form_validation->set_rules('tgl_absen', 'Tanggal Rapat', 'required');
            $this->form_validation->set_rules('meeting', 'ID Meeting', 'required');
            $this->form_validation->set_rules('token_zoom', 'Token', 'required');

            if($this->form_validation->run() == FALSE) {
                $this->load->view('temp/header', $data) ;
                $this->load->view('absen/tambah') ;
                $this->load->view('temp/footer') ;
            }else{
                $this->Absen_model->addDataAbsen() ;
            }
        }

        public function ubah($id) {
            $data['judul'] = "Ubah Data Absen Virtual" ;
            $data['absen'] = $this->Absen_model->getDataAbsen($id)->row_array() ;
            
            $this->form_validation->set_rules('judul', 'Judul', 'required');
            $this->form_validation->set_rules('tgl_absen', 'Tanggal Rapat', 'required');
            $this->form_validation->set_rules('meeting', 'ID Meeting', 'required');
            $this->form_validation->set_rules('token_zoom', 'Token', 'required');

            if($this->form_validation->run() == FALSE) {
                $this->load->view('temp/header', $data) ;
                $this->load->view('absen/ubah') ;
                $this->load->view('temp/footer') ;
            }else{
                $this->Absen_model->editDataAbsen($id) ;
            }
        }

        public function hapus($id) {
            $this->Absen_model->deleteDataAbsen($id) ;
        }

        public function selesai($id) {
            $this->Absen_model->finishDataAbsen($id) ;
        }
    }

?>