<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends REST_Controller {

    function __construct( $config = 'rest' )
    {
        parent::__construct( $config );
        $this->load->database();
    }

	function index_get()
	{
		$id = $this->get( 'id' );
        if( $id === null ) :
            $user = $this->db->get('user')->result();
        else :
            $user = $this->db->get_where('user', [ 'id_user' => $id ] )->result();
        endif;

        if( $user ){
            $this->response( $user, 200 );
        }else{
            $this->set_response([
                'status' => FALSE,
                'message' => 'User could not be found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
	}

    function index_post()
    {
        $data = array(
            'id_user' => $this->post( 'id' ),
            'username'=> $this->post( 'username' ),
            'password'=> md5($this->post( 'password' ) ),
            'email'   => $this->post( 'email' ),
            'role'    => $this->post( 'role' ),
        );

        $this->db->insert('user', $data);
        $query = $this->db->affected_rows();
        if( $query > 0 ){
            $this->set_response([
                'status' => TRUE,
                'message' => 'Success'
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->set_response([
                'status' => FALSE,
                'message' => 'Failed'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    function index_put()
    {
        $id = $this->put( 'id_user' );
        $data = array(
            'id_user'  => $this->put( 'id_user' ),
            'username' => $this->put( 'username' ),
            'password' => md5($this->put( 'password' ) ),
            'email'    => $this->put( 'email' ),
            'role'     => $this->put( 'role' )
        );

        $this->db->update('user', $data, [ 'id_user' => $id ]);
        $query = $this->db->affected_rows();
        if( $query > 0 ){
            $this->set_response([
                'status' => TRUE,
                'message' => 'Success'
            ], REST_Controller::HTTP_OK);
        }else{
            $this->set_response([
                'status' => FALSE,
                'message' => 'Failed'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    function index_delete()
    {

        $id = $this->delete('id_user');

        if (  $id === null )
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'ID not set'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            $this->db->delete('user', [ 'id_user' => $id ] );
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

}
