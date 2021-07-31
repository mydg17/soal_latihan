<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Paket extends REST_Controller {

    function __construct( $config = 'rest' )
    {
        parent::__construct( $config );
        $this->load->database();
    }

	function index_get()
	{
		$id = (int) $this->get( 'id' );
        if( $id == '' ) :
            $paket = $this->db->get( 'paket_soal' )->result();
            
        else :
            $this->db->where('id_paket_soal', $id);
            $paket = $this->db->get( 'paket_soal' )->result();
        endif;

        $this->response( $paket, 200 );
	}

    function index_post()
    {
        $data = array(
            'id_paket_soal'  => $this->post( 'id_paket_soal' ),
            'nama_paket'     => $this->post( 'nama_paket' )
        );

        $insert    = $this->db->insert('paket_soal', $data);
        // $id_paket = $this->db->insert_id();

        if( $insert ):
            $this->response( $data, 200 );
        else:
            $this->response( array( 'status' => 'fail', 502 ) );
        endif;

        // return $id_paket;
    }

    function index_put()
    {
        $id = (int) $this->put( 'id_paket_soal' );
        $data = array(
            'id_paket_soal'  => $this->put( 'id_paket_soal' ),
            'nama_paket'     => $this->put( 'nama_paket' )
        );

        $this->db->where('id_paket_soal', $id);
        
        $update = $this->db->update('paket_soal', $data);
        
        if( $update ):
            $this->response( $data, 200 );
        else:
            $this->response( array( 'status' => 'fail', 502 ));
        endif;
    }

    function index_delete()
    {

        $id = (int) $this->delete('id');
        
        if ($id <= 0)
        {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        }

        $this->db->where( 'id_paket_soal', $id );
        
        $this->db->delete('paket_soal');
        $query = $this->db->affected_rows();
        if( $query > 0 ){
            $this->set_response([
                'status' => TRUE,
                'user' => $id,
                'message' => 'deleted'
            ], REST_Controller::HTTP_OK);
        }else{
            $this->set_response([
                'status' => FALSE,
                'message' => 'User could not be found'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

}
