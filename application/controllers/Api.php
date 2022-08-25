<?php 

use chriskacerguis\RestServer\RestController;

class Api extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Home_model') ;
    }

    public function rapat_get()
    {
        // Users from a data store e.g. database

        $id = $this->get( 'id' );

        if ( $id === null )
        {
            $query = $this->Home_model->getDataAllRapat() ;
            $data = [] ;
            if($query != null) {
                foreach($query as $d){
                    $tgl = explode(' ', $d['tgl_rapat']) ;
                    $data[] = [
                        'id' => $d['id_rapat'],
                        'admin' => $d['nama_admin'],
                        'judul' => $d['judul'],
                        'tempat' => $d['tempat'],
                        'tgl_rapat' => $this->Utility_model->formatTanggal($tgl[0]).' '.$tgl[1]
                    ] ;
                }
            }

            if ( $data )
            {
                // Set the response and exit
                $this->response( $data, 200 );
            }
            else
            {
                // Set the response and exit
                $this->response( [
                    'status' => false,
                    'message' => 'Data Tidak Ditemukan'
                ], 404 );
            }
        }
        else
        {
            $this->db->where('id_rapat', $id) ;

            $this->db->where('status', 0) ;
            
            $this->db->order_by('id_rapat', 'asc') ;
            $this->db->join('admin', 'admin.id = rapat.id') ;

            $query = $this->db->get("rapat")->row_array() ;

            $tgl = explode(' ', $query['tgl_rapat']) ;

            $data = [
                'id' => $query['id_rapat'],
                'admin' => $query['nama_admin'],
                'judul' => $query['judul'],
                'tempat' => $query['tempat'],
                'tgl_rapat' => $this->Utility_model->formatTanggal($tgl[0]).' '.$tgl[1]
            ] ;

            if ( $data )
            {
                $this->response( $data, 200 );
            }
            else
            {
                $this->response( [
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ], 404 );
            }
        }
    }

    public function absen_post()
    {
        $query = [
            'nip' => $this->post('nip'),
            'nama' => $this->post('nama'),
            'kehadiran' => $this->post('kehadiran'),
            'bidang' => $this->post('bidang'),
            'alamat_ip' => $this->post('alamat_ip'),
            'id_absen' => $this->post('id_absen')
        ] ;
        
        if($this->db->insert('form_absen', $query)) {
            $this->response([
                'status' => true,
                'message' => 'Absen Berhasil Disimpan'
            ], 200 );
        }else{
            $this->response([
                'status' => false,
                'message' => 'Absen Gagal Disimpan'
            ], 404) ;
        }
    }


    
}