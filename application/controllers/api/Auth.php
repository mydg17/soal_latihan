<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Auth extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    

    public function login_post()
    {
        $user = $this->post('username'); 
        $pass = md5($this->post('password')); 
        $role = $this->post('role');

        $data = array(
            'username' => $user, 
            'password' => $pass, 
            'role' => $role
        );

        $kunci = $this->config->item('thekey');
        $invalidLogin = ['status' => 'Invalid Login']; 
        $val = $this->db->get_where('user',$data)->row(); 
        $query = $this->db->affected_rows();
        if( $query > 0 ){  
        	$token['id'] = $val->id_user;  //From here
            $token['username'] = $val->username;
            $token['role'] = $val->role;
            $date = new DateTime();
            $token['iat'] = $date->getTimestamp();
            $token['exp'] = $date->getTimestamp() + 60*60*5; 
            $output['token'] = JWT::encode($token,$kunci ); 
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
        // else {
        //     $this->set_response([
        //         'status' => FALSE,
        //         'message' => 'Failed'
        //     ], REST_Controller::HTTP_BAD_REQUEST);
        // }
    }

}
