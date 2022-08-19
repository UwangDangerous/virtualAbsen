<?php 

class Home_model extends CI_Model{
    public function getDataRapat($id=0){
        if($adm = $this->session->userdata('pppomn') != 1) {
            $this->db->where('id', $adm) ;
        }

        if($id > 0){
            $this->db->where('id_rapat', $id) ; 
        }

        return $this->db->get('rapat')  ;
    }
}