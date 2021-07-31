<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal extends REST_Controller {

    function __construct( $config = 'rest' )
    {
        parent::__construct( $config );
        $this->load->database();
    }

	function index_get()
	{
		$id = (int) $this->get( 'id' );
        if( $id == '' ) :
            $soal = $this->db->get('soal')->result();
            
        else :
            $this->db->where('id_soal', $id);
            $soal = $this->db->get('soal')->result();
        endif;

        $this->response( $soal, 200 );
	}

    function index_post()
    {
        $data = array(
            'id_soal'   => $this->post( 'id_soal' ),
            'text_soal' => $this->post( 'text_soal' ),
            'id_user'   => $this->post( 'id_user' ),
            'id_paket_soal'   => $this->post( 'id_paket_soal' )
        );

        $insert    = $this->db->insert('soal', $data);
        $id_soal = $this->db->insert_id();

        if( $insert ):
            $this->response( $data, 200 );
        else:
            $this->response( array( 'status' => 'fail', 502 ) );
        endif;

        return $id_soal;
    }

    function index_put()
    {
        $id = $this->put( 'id_soal' );
        $data = array(
            'id_soal'   => $this->put( 'id_soal' ),
            'text_soal' => $this->put( 'text_soal' ),
            'id_user'   => $this->put( 'id_user' ),
            'id_paket_soal'   => $this->put( 'id_paket_soal' )
        );

        $this->db->where('id_soal', $id);
        
        $update = $this->db->update('soal', $data);
        
        if( $update ):
            $this->response( $data, 200 );
        else:
            $this->response( array( 'status' => 'fail', 502 ));
        endif;
    }

    function index_delete()
    {

        $id =  $this->delete('id');
        
        if ($id <= 0)
        {
            $this->response(NULL, REST_Controller::HTTP_NOT_FOUND);
        }

        $this->db->where( 'id_soal', $id );
        
        $this->db->delete('soal');
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
