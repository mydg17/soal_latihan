<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Latsol extends REST_Controller {

    function __construct( $config = 'rest' )
    {
        parent::__construct( $config );
        $this->load->database();
    }

    function index_get()
	{
		$id = (int) $this->get( 'id' );
        if( $id ==! '' ) :
            $this->db->select('soal.id_soal as soal,soal.text_soal as pertanyaan,paket_soal.nama_paket as kategori');
            $this->db->from('paket_soal');
            $this->db->join('soal', 'soal.id_paket_soal = paket_soal.id_paket_soal', 'left');
            $this->db->where('soal.id_paket_soal', $id);
            
            $soal = $this->db->get()->result();
            $this->response( $soal, 200 );
        else :
            $this->set_response([
                'status' => FALSE,
                'message' => 'User could not be found'
            ], REST_Controller::HTTP_BAD_REQUEST);
        endif;
	}

    function index_post()
    {
        $data = array(
            'id_soal'   => $this->post( 'id_soal' ),
            'text_soal' => $this->post( 'text_soal' ),
            'id_user'   => $this->post( 'id_user' ),
            'id_paket_soal'   => $this->post( 'id_paket_soal' )
        );

        $insert_s    = $this->db->insert('soal', $data);
        $id_soal = $this->db->insert_id();

        $result = array();
        $count_data = count($this->post('text_pilgan'));
        for( $key = 0; $key < $count_data; $key++){
            $result[] = array(
                'id_pilgan'      => $this->post( 'id_pilgan' ),
                'id_soal'        => $id_soal,
                'text_pilgan'    => $this->post( 'text_pilgan' )[$key],
                'order_pilgan'   => $this->post( 'order_pilgan' )[$key]
            );
        }

        $insert_p =  $this->db->insert_batch('soal_pilgan', $result);


        if( $insert_p && $insert_s):
            $this->response( $data, 200 );
        else:
            $this->response( array( 'status' => 'fail', 502 ) );
        endif;
    }

    // function index_put()
    // {
    //     $id = (int) $this->put( 'id_pilgan' );
    //     $data = array(
    //         'id_pilgan'      => $this->put( 'id_pilgan' ),
    //         'id_soal'        => $this->put( 'id_soal' ),
    //         'text_pilgan'    => $this->put( 'text_pilgan' ),
    //         'order_pilgan'   => $this->put( 'order_pilgan' )
    //     );

    //     $this->db->where('id_pilgan', $id);
        
    //     $update = $this->db->update('soal_pilgan', $data);
        
    //     if( $update ):
    //         $this->response( $data, 200 );
    //     else:
    //         $this->response( array( 'status' => 'fail', 502 ));
    //     endif;
    // }

    // function index_delete()
    // {

    //     $id = (int) $this->delete('id');
        
    //     if ($id <= 0)
    //     {
    //         $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
    //     }

    //     $this->db->where( 'id_pilgan', $id );
        
    //     $this->db->delete('soal_pilgan');
    //     $query = $this->db->affected_rows();
    //     if( $query > 0 ){
    //         $this->set_response([
    //             'status' => TRUE,
    //             'user' => $id,
    //             'message' => 'deleted'
    //         ], REST_Controller::HTTP_OK);
    //     }else{
    //         $this->set_response([
    //             'status' => FALSE,
    //             'message' => 'User could not be found'
    //         ], REST_Controller::HTTP_BAD_REQUEST);
    //     }
    // }

}
