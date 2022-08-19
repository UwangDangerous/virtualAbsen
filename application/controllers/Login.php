<?php

class Login extends CI_Controller{
    public function __construct() 
    {
        parent::__construct() ;
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['judul'] = WEB ;

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('temp/header', $data) ;
            $this->load->view('login/index') ;
            $this->load->view('temp/footer') ;
        }else{
            
            $name = $this->input->post('username') ;
            $pass = $this->Utility_model->myHash($this->input->post('password')) ;

            $this->db->where('username', $name) ;
            $this->db->where('password', $pass) ;
            $data = $this->db->get('admin')->row_array() ;
            if($data){
                $this->session->set_userdata([
                    'pppomn' => $data['id'] ,
                    'pppomn_nama' => $data['nama_admin'],
                    'pppomn_lain' => $data['nama_lain'],
                ]) ;
                redirect(MYURL) ;
            }else{
                $this->session->set_flashdata('pesan', 'username / password salah') ;
                redirect(MYURL."login") ;
            }

        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(MYURL."login") ;
    }
}