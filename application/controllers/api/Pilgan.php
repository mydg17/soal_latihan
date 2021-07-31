<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pilgan extends REST_Controller {

    function __construct( $config = 'rest' )
    {
        parent::__construct( $config );
        $this->load->database();
    }

	function index_get()
	{
		$id = (int) $this->get( 'id' );
        if( $id == '' ) :
            $paket = $this->db->get( 'soal_pilgan' )->result();
            
        else :
            $this->db->where('id_soal', $id); //id_soal
            $this->db->order_by('order_pilgan', 'asc');
            
            $paket = $this->db->get( 'soal_pilgan' )->result();
        endif;

        $this->response( $paket, 200 );
	}

    function index_post()
    {
        $data = array(
            'id_pilgan'      => $this->post( 'id_pilgan' ),
            'id_soal'        => $this->post( 'id_soal' ),
            'text_pilgan'    => $this->post( 'text_pilgan' ),
            'order_pilgan'   => $this->post( 'order_pilgan' )
        );

        $insert    = $this->db->insert('soal_pilgan', $data);
        $id_pilgan = $this->db->insert_id();

        if( $insert ):
            $this->response( $data, 200 );
        else:
            $this->response( array( 'status' => 'fail', 502 ) );
        endif;

        return $id_pilgan;
    }

    function index_put()
    {
        $id = (int) $this->put( 'id_pilgan' );
        $data = array(
            'id_pilgan'      => $this->put( 'id_pilgan' ),
            'id_soal'        => $this->put( 'id_soal' ),
            'text_pilgan'    => $this->put( 'text_pilgan' ),
            'order_pilgan'   => $this->put( 'order_pilgan' )
        );

        $this->db->where('id_pilgan', $id);
        
        $update = $this->db->update('soal_pilgan', $data);
        
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

        $this->db->where( 'id_pilgan', $id );
        
        $this->db->delete('soal_pilgan');
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
