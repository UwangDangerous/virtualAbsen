<?php 

    class Absen2 extends CI_Controller{
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

        public function peserta_rapat($id) {
            $data['judul'] = "Absen Virtual" ;
            $data['absen'] = $this->Absen_model->getDataAbsen($id)->row_array() ;

            $this->db->where("id_absen", $id) ;
            $data['vir'] = $this->db->get("form_absen")->result_array() ;
            
            $this->load->view('temp/header', $data) ;
            $this->load->view('absen/peserta_rapat') ;
            $this->load->view('temp/footer') ;
        }

        public function peserta_zoom($id) {
            $data['judul'] = "Data Peserta Zoom" ;
            $data['absen'] = $this->Absen_model->getDataAbsen($id)->row_array() ;

            $this->db->where("id_absen", $id) ;
            $data['vir'] = $this->db->get("form_absen")->result_array() ;
            
            $this->load->view('temp/header', $data) ;
            $this->load->view('absen/peserta_zoom') ;
            $this->load->view('temp/footer') ;
        }

        public function dataPesertaZoomApi($id_absen)
        {
            $id = $this->input->post('id');
            $token = $this->input->post('token');
            // echo $id.'ok' ;
            // die ;

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.zoom.us/v2/metrics/meetings/$id/participants",
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 1,
            CURLOPT_TIMEOUT => 300,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer $token",
                "content-type: application/json",
                "page_size : 300"
            ),
            ));
            // header('Content-Type: application/json');
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                echo "cURL Error #:" . $err;
            }else {
                // echo $response;
                $data = json_decode($response, true) ;
                $data['peserta'] = $data['participants'] ;
                $data['id_absen'] = $id_absen ;
                $this->load->view('absen/getPeserta', $data);
            }
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