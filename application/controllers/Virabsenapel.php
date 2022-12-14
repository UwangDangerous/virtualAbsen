<?php 

    class Virabsenapel extends CI_Controller{

        public function __construct() 
        {
            parent::__construct() ;
            $this->load->library('form_validation');
        } 

        public function index() {
            $data['judul'] = "Virtual Absen Apel PPPOMN, ". $this->Utility_model->formatTanggal(date('Y-m-d'))  ;
            $this->db->where('tgl_absen', date('Y-m-d')) ;
            $this->db->where('status', 0) ;
            $this->db->order_by('id_absen', 'asc') ;
            $data['form'] = $this->db->get("absen")->row_array() ;

            $this->form_validation->set_rules('nip', 'NIP', 'required');
            $this->form_validation->set_rules('nama', 'Nama Pegawai', 'required');
            $this->form_validation->set_rules('kehadiran', 'Kehadiran', 'required');
            $this->form_validation->set_rules('bidang', 'Bidang / Balai ', 'required');

            if($this->form_validation->run() == FALSE) {
                $this->load->view('virtual/index', $data) ;
            }else{
                $query = [
                    'nama' => $this->input->post('nama') ,
                    'nip' => $this->input->post('nip') ,
                    'kehadiran' => $this->input->post('kehadiran') ,
                    'bidang' => $this->input->post('bidang') ,
                    'alamat_ip' => $this->input->ip_address() ,
                    'id_absen' => $this->input->post('id_absen')
                ];

                if($this->db->insert("form_absen", $query)) {
                    $pesan = [
                        'pesan' => 'Data Berhasil Disimpan' ,
                        'warna' => 'success'
                    ];
                }else{
                    $pesan = [
                        'pesan' => 'Data Gagal Disimpan' ,
                        'warna' => 'danger'
                    ];
                }

                $this->session->set_flashdata($pesan) ;
                redirect(MYURL.'') ;
            }
        }

        public function tambah()
        {
            echo $this->input->post('cobaRadio') ;
        }

        

    }
?>