<?php
defined('BASEPATH') or exit('No direct script access allowed');
use GuzzleHttp\Client;

class M_pilgan extends CI_Model
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
    public function getPilgan(){
        $response = $this->_client->request( 'GET','pilgan', [
            'query' => [
                'X-API-KEY' => 'key-tutor007'
            ]
        ]);

        $result = $response->getBody()->getContents() ;
        return $result;
    }

    public function getPilgan_byID( $id ){
        $response = $this->_client->request( 'GET','pilgan', [
            'query' => [
                'X-API-KEY' => 'key-tutor007',
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true) ;
        return $result;
    }

    public function createPilgan( ){
        $data = [
            'id_pilgan'      => $this->input->post( 'id' ),
            'id_soal'        => $this->input->post( 'id_soal' ),
            'text_pilgan'    => $this->input->post( 'text' ),
            'order_pilgan'   => $this->input->post( 'order' ),
            'X-API-KEY' => 'key-tutor007'
        ];

        $response = $this->_client->request( 'POST','pilgan', [
            'form_params' => $data
        ]);
        
        $result = json_decode($response->getBody()->getContents(), true) ;
        return $result;
    }

    public function deletePilgan( $id ){
        $response = $this->_client->request( 'DELETE','pilgan', [
            'form_params' => [
                'X-API-KEY' => 'key-tutor007',
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true) ;
        return $result;
    } 
    
    public function editPilgan( ){
        $data = [
            'id_pilgan'  =>  $this->input->post('id'),
            'text_pilgan'  =>  $this->input->post('text_pilgan'),
            'id_user'     =>  $this->input->post('id_user'),
            'id_paket_pilgan'      =>  $this->input->post('id_paket_pilgan'),
            'X-API-KEY' => 'key-tutor007'
        ];

        $response = $this->_client->request( 'PUT','pilgan', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true) ;
        return $result;
        
    }
}
