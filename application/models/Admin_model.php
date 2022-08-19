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
        echo $password ;
    }
}