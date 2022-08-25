<?php 

    class Absen_model extends CI_Model{
        public function getDataAbsen($id=0)
        {
            if($id>0){
                $this->db->where("id_rapat", $id) ;
            }
            $this->db->order_by('tgl_rapat', 'desc') ;
            return $this->db->get("rapat") ;
        }

        // public function addDataAbsen()
        // {
        //     $query = [
        //         'judul' => $this->input->post('judul') ,
        //         'tgl_absen' => $this->input->post('tgl_absen') ,
        //         'token_zoom' => $this->input->post('token_zoom') ,
        //         'meeting' => $this->input->post('meeting') 
        //     ];

        //     if($this->db->insert("absen", $query)) {
        //         $pesan = [
        //             "pesan" => "Data Berhasil Disimpan",
        //             "warna" => "success"
        //         ];
        //     }else{
        //         $pesan = [
        //             "pesan" => "Data Gagal Disimpan",
        //             "warna" => "danger"
        //         ];
        //     }

        //     $this->session->set_flashdata($pesan) ;
        //     redirect(MYURL."absen") ;
        // }

        // public function editDataAbsen($id)
        // {
        //     $query = [
        //         'judul' => $this->input->post('judul') ,
        //         'tgl_absen' => $this->input->post('tgl_absen') ,
        //         'token_zoom' => $this->input->post('token_zoom') ,
        //         'meeting' => $this->input->post('meeting')  
        //     ];

        //     $this->db->where("id_absen", $id) ;
        //     $this->db->set($query) ;
        //     if($this->db->update("absen")) {
        //         $pesan = [
        //             "pesan" => "Data Berhasil Diubah",
        //             "warna" => "success"
        //         ];
        //     }else{
        //         $pesan = [
        //             "pesan" => "Data Gagal Diubah",
        //             "warna" => "danger"
        //         ];
        //     }

        //     $this->session->set_flashdata($pesan) ;
        //     redirect(MYURL."absen") ;
        // }

        // public function deleteDataAbsen($id)
        // {
        //     $this->db->where("id_absen", $id) ;
        //     if($this->db->delete("absen")) {
        //         $pesan = [
        //             "pesan" => "Data Berhasil Dihapus",
        //             "warna" => "success"
        //         ];
        //     }else{
        //         $pesan = [
        //             "pesan" => "Data Gagal Dihapus",
        //             "warna" => "danger"
        //         ];
        //     }

        //     $this->session->set_flashdata($pesan) ;
        //     redirect(MYURL."absen") ;
        // }

        // public function finishDataAbsen($id)
        // {
        //     $this->db->where("id_absen", $id) ;
        //     $this->db->set('status', 1) ;
        //     if($this->db->update("absen")) {
        //         $pesan = [
        //             "pesan" => "Rapat Selesai, Data Berhasil Disimpan",
        //             "warna" => "success"
        //         ];
        //     }else{
        //         $pesan = [
        //             "pesan" => "Data Gagal Disimpan",
        //             "warna" => "danger"
        //         ];
        //     }

        //     $this->session->set_flashdata($pesan) ;
        //     redirect(MYURL."absen") ;
        // }


        public function addFormAbsen()
        {
            $sig_string = $this->input->post('signature') ;
            // echo $sig_string ; die ;
            // $nama_file="signature_".date("his").".png";
            // file_put_contents(MYROUT.'tanda_tangan/'.$nama_file, file_get_contents($sig_string));
            // if(file_exists(base_url().'tanda_tangan/'.$nama_file)){
            //     echo "<p>File Signature berhasil disimpan - ".$nama_file."</p>";
            //     echo "<p style='border:solid 1px teal;width:355px;height:110px;'><img src='".$nama_file."'></p>";
            // }

            $query = [
                'nip' => $this->input->post('nip') ,
                'nama' => $this->input->post('nama') ,
                'kehadiran' => $this->input->post('kehadiran') ,
                'unit' => $this->input->post('unit') ,
                'bidang' => $this->input->post('bidang') ,
                'alamat_ip' => $this->input->ip_address() ,
                'id_rapat' => $this->input->post('id_rapat'),
                'tanda_tangan' => $sig_string
            ];
            // var_dump($query) ; die ;

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

?>