<?php 

class Admin_model extends CI_Model{
    public function getDataAdmin($id=0)
    {
        if($id > 0){
            $this->db->where('id', $id) ;
        }
        return $this->db->get('admin') ;
    }

    public function addDataAdmin()
    {
        if($this->input->post('password') == null) {
            $password = $this->Utility_model->myHash('p$wd_p30mn') ;
        }else{
            $password = $this->Utility_model->myHash( $this->input->post('password') ) ;
        }

        $query = [
            'nama_admin' => $this->input->post('nama_admin', true) ,
            'nama_lain' => $this->input->post('nama_lain', true),
            'username' => $this->input->post('username', true),
            'password' => $password
        ];

        if($this->db->insert('admin', $query)){
            $pesan = ['pesan' => 'Data Berhasil Disimpan', 'warna' => 'success'] ;
        }else{
            $pesan = ['pesan' => 'Data Gagal Disimpan', 'warna' => 'danger'] ;
        }

        $this->session->set_flashdata($pesan) ;
        redirect(MYURL."admin") ;
    }
    public function editDataAdmin($id)
    {
        if($this->input->post('password') == null) {
            $password = $this->input->post('password_lama') ;
        }else{
            $password = $this->Utility_model->myHash( $this->input->post('password') ) ;
        }

        if($this->input->post('username') == null) {
            $username = $this->input->post('username_lama') ;
        }else{
            $username = $this->input->post('username') ;
        }

        $query = [
            'nama_admin' => $this->input->post('nama_admin', true) ,
            'nama_lain' => $this->input->post('nama_lain', true),
            'username' => $username,
            'password' => $password
        ];

        $this->db->where('id', $id) ;
        if($this->db->update('admin', $query)){
            $pesan = ['pesan' => 'Data Berhasil Diubah', 'warna' => 'success'] ;
        }else{
            $pesan = ['pesan' => 'Data Gagal Diubah', 'warna' => 'danger'] ;
        }

        $this->session->set_flashdata($pesan) ;
        redirect(MYURL."admin") ;
    }

    public function deleteDataAdmin($id)
    {
        $this->db->where('id', $id) ;
        if($this->db->delete('admin')){
            $pesan = ['pesan' => 'Data Berhasil Dihapus', 'warna' => 'success'] ;
        }else{
            $pesan = ['pesan' => 'Data Gagal Dihapus', 'warna' => 'danger'] ;
        }

        $this->session->set_flashdata($pesan) ;
        redirect(MYURL."admin") ;
    }
}