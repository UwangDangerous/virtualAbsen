<?php 

class Home_model extends CI_Model{
    public function getDataAllRapat($id=0){
        if($id > 0){
            $this->db->where('id_rapat', $id) ; 
        }
        $adm = $this->session->userdata('pppomn');
        $this->db->where('status', 0) ;
        return $this->db->get('rapat')->result_array()  ;
    }

    public function getDataRapat($id=0){
        if($id > 0){
            $this->db->where('id_rapat', $id) ; 
        }
        $adm = $this->session->userdata('pppomn');
        $this->db->where('id', $adm) ;
        return $this->db->get('rapat')  ;
    }

    public function addDataRapat()
    {
        $query = [
            'judul' => $this->input->post('judul', true) ,
            'tempat' => $this->input->post('tempat', true) ,
            'tgl_rapat' => $this->input->post('tgl_rapat', true).' '. $this->input->post('jam_rapat') ,
            'meeting' => $this->input->post('meeting', true) ,
            'status' => 0 ,
            'id' => $this->session->userdata('pppomn') 
        ] ;

        if($this->db->insert('rapat', $query)) {
            $pesan = [
                'pesan' => 'Data Berhasl Disimpan',
                'warna' => 'success'
            ] ;
        }else{
            $pesan = [
                'pesan' => 'Data Gagal Disimpan',
                'warna' => 'danger'
            ];
        }

        $this->session->set_flashdata($pesan) ;
        redirect(MYURL) ;
    }
}