<?php 

class Home_model extends CI_Model{
    public function getDataAllRapat($id=0){
        if($id > 0){
            $this->db->where('id_rapat', $id) ; 
        }
        $adm = $this->session->userdata('pppomn');
        $this->db->where('status', 0) ;
        $this->db->join('admin', 'admin.id = rapat.id') ;
        $this->db->order_by('id_rapat', 'desc') ;
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
            'token_zoom' => $this->input->post('token_zoom', true),
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
        redirect(MYURL.'home/rapat') ;
    }

    public function editDataRapat($id)
    {
        $query = [
            'judul' => $this->input->post('judul', true) ,
            'tempat' => $this->input->post('tempat', true) ,
            'tgl_rapat' => $this->input->post('tgl_rapat', true).' '. $this->input->post('jam_rapat') ,
            'meeting' => $this->input->post('meeting', true) ,
            'token_zoom' => $this->input->post('token_zoom', true)
        ] ;

        $this->db->where('id_rapat', $id) ;
        $this->db->set($query) ;
        if($this->db->update('rapat')) {
            $pesan = [
                'pesan' => 'Data Berhasl Diubah',
                'warna' => 'success'
            ] ;
        }else{
            $pesan = [
                'pesan' => 'Data Gagal Diubah',
                'warna' => 'danger'
            ];
        }

        $this->session->set_flashdata($pesan) ;
        redirect(MYURL.'home/rapat') ;
    }

    public function clearDataRapat($id)
    {
        $this->db->where('id_rapat', $id) ;
        $this->db->set('status', 1) ;
        if($this->db->update('rapat')) {
            $pesan = [
                'pesan' => 'Rapat Telas Selesai',
                'warna' => 'success'
            ] ;
        }else{
            $pesan = [
                'pesan' => 'Data Gagal Disimpan',
                'warna' => 'danger'
            ];
        }

        $this->session->set_flashdata($pesan) ;
        redirect(MYURL.'home/rapat') ;
    }

    public function deleteDataRapat($id)
    {
        $this->db->where('id_rapat', $id) ;
        if($this->db->delete('rapat')) {
            $pesan = [
                'pesan' => 'Data Berhasl Dihapus',
                'warna' => 'success'
            ] ;
        }else{
            $pesan = [
                'pesan' => 'Data Gagal Dihapus',
                'warna' => 'danger'
            ];
        }

        $this->session->set_flashdata($pesan) ;
        redirect(MYURL.'home/rapat') ;
    }
}