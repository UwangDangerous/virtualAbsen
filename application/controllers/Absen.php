<?php 

class Absen extends CI_Controller{
    public function __construct() 
    {
        parent::__construct() ;
        $this->load->library('form_validation');
        $this->load->model("Absen_model") ;
    } 

    public function form($balai = 'TU') {
        $data['judul'] = "Virtual Absen Apel PPPOMN, ". $this->Utility_model->formatTanggal(date('Y-m-d'))  ;

        
        
        
        
        if(is_numeric($balai) == 1){
            $this->db->where('id_rapat', $balai) ;
        }else{
            $this->db->where('nama_lain', $balai) ;
            // echo 'ko' ;
        }
            // echo 'ok' ;
        // die ;
        // $this->db->like('tgl_rapat', date('Y-m-d')) ;
        $this->db->where('status', 0) ;
        
        $this->db->order_by('id_rapat', 'asc') ;
        $this->db->join('admin', 'admin.id = rapat.id') ;

        $data['form'] = $this->db->get("rapat")->row_array() ;

        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('nama', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('kehadiran', 'Kehadiran', 'required');
        $this->form_validation->set_rules('unit', 'Unit Kerja ', 'required');
        $this->form_validation->set_rules('bidang', 'Bidang / Balai ', 'required');
        // $this->form_validation->set_rules('tanda_tangan', 'Tanda Tangan', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('absen/form', $data) ;
        }else{
            $this->Absen_model->addFormAbsen() ;
        }
    }

    public function checkUser($nip = '0')
    {
        $url ='http://siasn.pom.go.id/api/v1/employees?q='.$nip.'&key=8bf66e5171a35c0c6dedd1a1f53cc0d8';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded", 'Accept: application/json'));
        /* make request */
        $resp = curl_exec($curl);
        $response = json_decode($resp, true);

        if($response['items'] != []) {
            $data = $response['items'][0]['nama'].'|'.$response['items'][0]['satker_']['satker_top_nama'].'|'.$response['items'][0]['satker_']['satker_nama'] ;
            if($response['items'][0]['nip'] == '196311091990032001'){
                if($response['items'][0]['nip'] != $nip){
                    $data = '||' ;
                }
            }
        }else{
            $data = '||' ;
        }

        echo $data ;
    }
}