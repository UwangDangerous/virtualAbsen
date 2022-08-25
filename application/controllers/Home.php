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

        public function ubahRapat($id)
        {
            if($this->session->userdata('pppomn') != null) {
                $data['judul'] = "Ubah Rapat ".WEB ;
                $data['data'] = $this->Home_model->getDataRapat($id)->row_array() ;

                $this->form_validation->set_rules('judul', 'Nama Rapat', 'required');
                $this->form_validation->set_rules('tempat', 'Lokasi', 'required');
                $this->form_validation->set_rules('tgl_rapat', 'Tanggal Rapat', 'required');
                $this->form_validation->set_rules('jam_rapat', 'Jam', 'required');

                if($this->form_validation->run() == FALSE) {
                    $this->load->view('temp/header', $data) ;
                    $this->load->view('temp/navbar') ;
                    $this->load->view('home/ubah') ;
                    $this->load->view('temp/footer') ;
                }else{
                    $this->Home_model->editDataRapat($id) ;
                }
            }else{
                $this->session->set_flashdata('pesan' , 'tidak ada akses, silahkan login');
                redirect(MYURL."login") ;
            }
        }

        public function hapusRapat($id)
        {
            if($this->session->userdata('pppomn') != null) {
                    $this->Home_model->deleteDataRapat($id) ;
            }else{
                $this->session->set_flashdata('pesan' , 'tidak ada akses, silahkan login');
                redirect(MYURL."login") ;
            }
        }

        public function selesai($id)
        {
            if($this->session->userdata('pppomn') != null) {
                    $this->Home_model->clearDataRapat($id) ;
            }else{
                $this->session->set_flashdata('pesan' , 'tidak ada akses, silahkan login');
                redirect(MYURL."login") ;
            }
        }

        public function peserta($id) 
        {
            if($this->session->userdata('pppomn') != null) {
                $data['judul'] = "Peserta Rapat ".WEB ;
                $data['data'] = $this->Home_model->getDataPeserta($id) ;
                $data['judul_halaman'] = $this->db->get_where('rapat', ['id_rapat'=>$id])->row_array()['judul'] ;

                $this->form_validation->set_rules('judul', 'Nama Rapat', 'required');
                $this->form_validation->set_rules('tempat', 'Lokasi', 'required');
                $this->form_validation->set_rules('tgl_rapat', 'Tanggal Rapat', 'required');
                $this->form_validation->set_rules('jam_rapat', 'Jam', 'required');

                if($this->form_validation->run() == FALSE) {
                    $this->load->view('temp/header', $data) ;
                    $this->load->view('temp/navbar') ;
                    $this->load->view('home/peserta') ;
                    $this->load->view('temp/footer') ;
                }else{
                    $this->Home_model->editDataRapat($id) ;
                }
            }else{
                $this->session->set_flashdata('pesan' , 'tidak ada akses, silahkan login');
                redirect(MYURL."login") ;
            }
        }

        public function participant($id) 
        {
            if($this->session->userdata('pppomn') != null) {
                $data['judul'] = "Peserta Rapat ".WEB ;
                $data['data'] = $this->Home_model->getDataPeserta($id) ;
                $data['halaman'] = $this->db->get_where('rapat', ['id_rapat'=>$id])->row_array() ;
                $data['zoom'] = $this->db->get_where('zoom_participant', ['id_rapat', $id])->result_array() ;

                $this->form_validation->set_rules('judul', 'Nama Rapat', 'required');
                $this->form_validation->set_rules('tempat', 'Lokasi', 'required');
                $this->form_validation->set_rules('tgl_rapat', 'Tanggal Rapat', 'required');
                $this->form_validation->set_rules('jam_rapat', 'Jam', 'required');

                if($this->form_validation->run() == FALSE) {
                    $this->load->view('temp/header', $data) ;
                    $this->load->view('temp/navbar') ;
                    $this->load->view('home/peserta_zoom') ;
                    $this->load->view('temp/footer') ;
                }else{
                    $this->Home_model->editDataRapat($id) ;
                }
            }else{
                $this->session->set_flashdata('pesan' , 'tidak ada akses, silahkan login');
                redirect(MYURL."login") ;
            }
        }

        public function dataPesertaZoomApi($id_rapat)
        {
            $id = $this->input->post('id');
            $token = $this->input->post('token');
            // echo $id.'ok' ;
            // die ;

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.zoom.us/v2/metrics/meetings/$id/participants?page_size=1000",
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 1,
            CURLOPT_TIMEOUT => 300,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer $token",
                "content-type: application/json"
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
                // var_dump($data['participants']) ; die ;
                $data['peserta'] = $data['participants'] ;
                $data['id_rapat'] = $id_rapat ;
                $this->load->view('home/getPeserta', $data);
            }
        }

    }
?>