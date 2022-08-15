<?php 

    class Absen_model extends CI_Model{
        public function getDataAbsen($id=0)
        {
            if($id>0){
                $this->db->where("id_absen", $id) ;
            }
            return $this->db->get("absen") ;
        }

        public function addDataAbsen()
        {
            $query = [
                'judul' => $this->input->post('judul') ,
                'tgl_absen' => $this->input->post('tgl_absen') ,
                'meeting' => $this->input->post('meeting') 
            ];

            if($this->db->insert("absen", $query)) {
                $pesan = [
                    "pesan" => "Data Berhasil Disimpan",
                    "warna" => "success"
                ];
            }else{
                $pesan = [
                    "pesan" => "Data Gagal Disimpan",
                    "warna" => "danger"
                ];
            }

            $this->session->set_flashdata($pesan) ;
            redirect(MYURL."absen") ;
        }

        public function editDataAbsen($id)
        {
            $query = [
                'judul' => $this->input->post('judul') ,
                'tgl_absen' => $this->input->post('tgl_absen') ,
                'meeting' => $this->input->post('meeting') 
            ];

            $this->db->where("id_absen", $id) ;
            $this->db->set($query) ;
            if($this->db->update("absen")) {
                $pesan = [
                    "pesan" => "Data Berhasil Diubah",
                    "warna" => "success"
                ];
            }else{
                $pesan = [
                    "pesan" => "Data Gagal Diubah",
                    "warna" => "danger"
                ];
            }

            $this->session->set_flashdata($pesan) ;
            redirect(MYURL."absen") ;
        }

        public function deleteDataAbsen($id)
        {
            $this->db->where("id_absen", $id) ;
            if($this->db->delete("absen")) {
                $pesan = [
                    "pesan" => "Data Berhasil Dihapus",
                    "warna" => "success"
                ];
            }else{
                $pesan = [
                    "pesan" => "Data Gagal Dihapus",
                    "warna" => "danger"
                ];
            }

            $this->session->set_flashdata($pesan) ;
            redirect(MYURL."absen") ;
        }

        public function finishDataAbsen($id)
        {
            $this->db->where("id_absen", $id) ;
            $this->db->set('status', 1) ;
            if($this->db->update("absen")) {
                $pesan = [
                    "pesan" => "Rapat Selesai, Data Berhasil Disimpan",
                    "warna" => "success"
                ];
            }else{
                $pesan = [
                    "pesan" => "Data Gagal Disimpan",
                    "warna" => "danger"
                ];
            }

            $this->session->set_flashdata($pesan) ;
            redirect(MYURL."absen") ;
        }
    }

?>