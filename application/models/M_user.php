<?php
defined('BASEPATH') or exit('No direct script access allowed');
use GuzzleHttp\Client;

class M_user extends CI_Model
{

    private $client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'https://latnew.test/api/',
            'auth'  => [ 'admin', '1234' ]
        ]);
    }

    //rest client
    public function getUser(){
        $response = $this->_client->request( 'GET','users', [
            'query' => [
                'X-API-KEY' => 'key-tutor007'
            ]
        ]);

        $result = $response->getBody()->getContents() ;
        return $result;
    }

    public function getUser_byID( $id ){
        $response = $this->_client->request( 'GET','users', [
            'query' => [
                'X-API-KEY' => 'key-tutor007',
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true) ;
        return $result;
    }

    public function createUser( ){
        $data = [
            'username'  =>  $this->input->post('nama'),
            'password'  =>  $this->input->post('pass'),
            'email'     =>  $this->input->post('mail'),
            'role'      =>  $this->input->post('role'),
            'X-API-KEY' => 'key-tutor007'
        ];

        $response = $this->_client->request( 'POST','users', [
            'form_params' => $data
        ]);
        
        $result = json_decode($response->getBody()->getContents(), true) ;
        return $result;
    }

    public function deleteUser( $id ){
        $response = $this->_client->request( 'DELETE','users', [
            'form_params' => [
                'X-API-KEY' => 'key-tutor007',
                'id_user' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true) ;
        return $result;
    } 
    
    public function editUser( ){
        $data = [
            'username'  =>  $this->input->post('nama'),
            'password'  =>  $this->input->post('pass'),
            'email'     =>  $this->input->post('mail'),
            'role'      =>  $this->input->post('role'),
            'id_user'   => $this->input->post('id'),
            'X-API-KEY' => 'key-tutor007'
        ];

        $response = $this->_client->request( 'PUT','users', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true) ;
        return $result;
        
    }

    public function authUser( ){
        // return $this->db->get_where('user', [ 'username' => $user, 'password' => $pass, 'role' => $role] );
        $data = [
            'username'  =>  $this->input->post('username'),
            'password'  =>  $this->input->post('password'),
            'role'      =>  $this->input->post('role'),
            'X-API-KEY' => 'key-tutor007'
        ];

        $response = $this->_client->request( 'POST','auth/login', [
            'form_params' => $data
        ]);
        
        $result = json_decode($response->getBody()->getContents(), true) ;
        return $result;
    }

    public function sesi_user(){
    if(isset($_COOKIE['log_token'])):
        $kunci = $this->config->item('thekey');
        return JWT::decode($_COOKIE['log_token'],$kunci);
    else:
        redirect('login','refresh');
    endif;
    }
     
}
